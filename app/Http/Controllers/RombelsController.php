<?php

namespace App\Http\Controllers;

use App\Models\Rombels;
use Illuminate\Http\Request;

class RombelsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rombel = Rombels::all();
        return view('administrator.rombels.index', compact('rombel'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('administrator.rombels.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'rombel' => 'required'
        ]);

        Rombels::create([
            'rombel' => $request->rombel
        ]);

        return redirect()->route('rombels.home')->with('succses', 'Berhasil menambahkan data rombel');
  
    }

    /**
     * Display the specified resource.
     */
    public function show(Rombels $rombel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rombels $rombel, $id)
    {
        $rombels = Rombels::find($id);

        return view('administrator.rombels.edit', compact('rombel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rombels $rombel)
    {
        $request->validate([
            'rombel' => 'required'
        ]);
        
        Rombels::where('id', $id)->update([
            'rombel' => $request->rombel
            
        ]);

        return redirect()->route('rombels.home')->with('succses', 'Berhasil mengubah data rombel');
  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rombels $rombel, $id)
    {
        Rombels::where('id', $id)->delete();

        return redirect()->back()->with('deleted', 'Berhasil menghapus data!');
    }
}
