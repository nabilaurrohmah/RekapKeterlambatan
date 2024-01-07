<?php

namespace App\Http\Controllers;

use App\Models\Lates;
use App\Models\Students;
use Illuminate\Http\Request;

class LatesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lates = Lates::with('students')->get();
        return view('administrator.lates.index', compact('lates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Students::all();
        return view('administrator.lates.create', compact('students'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_id' => 'required',
            'data_time_late' => 'required',
            'information' => 'required',
            'bukti' => 'required',
        ]);

        Lates::create([
            'name_id' => $request->name_id,
            'data_time_late' => $request->data_time_late,
            'information' => $request->information,
            'bukti' => $request->bukti,
        ]);

        // $lates = Lates::create($request->except('file'));

        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            $late->addMediaFromRequest('file')->toMediaCollection('file');
        }

        return redirect()->back()->with('succses', 'Berhasil menambahkan data keterlambatan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lates $lates)
    {
        return view('lates.show', compact('lates'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lates $lates, $id)
    {
        $lates = Lates::with('students')->find($id);

        return view('administrator.lates.edit', compact('lates'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Late $late)
    {
        $request->validate([
            'date_time_late' => 'required',
            'information' => 'required',
            'bukti' => 'required',
        ]);

        $lates = Lates::create($request->except('file'));

        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            $late->addMediaFromRequest('file')->toMediaCollection('file');
        }

        return redirect()->route('lates.home')->with('succses', 'Berhasil mengubah data keterlambatan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lates $lates, $id)
    {
        Lates::where('id', $id)->delete();

        return redirect()->back()->with('deleted', 'Berhasil menghapus data!');
    }
}
