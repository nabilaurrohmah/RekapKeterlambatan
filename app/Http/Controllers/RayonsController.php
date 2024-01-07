<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Rayons;
use Illuminate\Http\Request;

class RayonsController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rayons = Rayons::with('user')->simplePaginate(10);
        return view('administrator.rayons.index', compact('rayons'));
        // $rayons = Rayons::all();
        // return view('administrator.rayons.index', compact('rayons'));
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('administrator.rayons.create', ['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'rayon' => 'required',
            'user_id' => 'required',
        ]);

        Rayons::create([
            'rayon' => $request->rayon,
            'user_id' => $request->user_id,
        ]);

        return redirect()->back()->with('succses', 'Berhasil menambahkan data rayon');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rayons $rayons)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rayons $rayons, $id)
    {
        $rayons = Rayons::with('user')->find($id);
        $users = User::all();

        return view('administrator.rayons.edit', compact('rayons', 'users'));
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Rayons $rayons
     * @return \Illuminate\Http\Request $request
     */
    public function update(Request $request, Rayons $rayons)
    {
        $request->validate([
            'rayon' => 'required',
            'user_id'=> 'required',
        ]);

        Rayons::where('id', $id)->update([
            'rayon' => $request->rayon,
            'user_id' => $request->user_id,
        ]);

        return redirect()->route('rayons.home')->with('succses', 'Berhasil mengubah data rayon');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rayons $rayons, $id)
    {
        Rayons::where('id', $id)->delete();

        return redirect()->back()->with('deleted', 'Berhasil menghapus data!');
    }
}
