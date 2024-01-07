<?php

namespace App\Http\Controllers;

use App\Models\Rayons;
use App\Models\Rombels;
use App\Models\Students;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index()
    {
        $students = students::with(['rombel', 'rayon'])->simplePaginate(10);

        return view('administrator.students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rombels = Rombels::all();
        $rayons = Rayons::all();
        return view('administrator.students.create', compact('rombels', 'rayons'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required',
            'name' => 'required',
            'rombel_id' => 'required',
            'rayon_id' => 'required',
        ],
        [
            'nis.required' => 'nis siswa harus diisi',
            'name.required' => 'nama siswa harus diisi',
            'rombel_id.required' => 'rombel harus dipilih',
            'rayon_id.required' => 'rayon harus dipilih',
        ]);

        Students::create([
            'nis' => $request->nis,
            'name' => $request->name,
            'rombel_id' => $request->rombel_id,
            'rayon_id' => $request->rayon_id,
        ]);

        return redirect()->route('students.index')->with('success', 'Berhasil menambahkan data students.');
    }

    /**
     * Display the specified resource.
     * 
     * @param \App\Models\Students\students
     */

    public function show(Student $student)
    {
       //
    }

    /**
     * show the form for editing the specified resource
     * 
     * @param \App\Models\Student $student
     * @return \Illuminate\Http\Response
     */

    public function edit(Student $student,$id)
    {
        $students = Students::with('rombels', 'rayons')->find($id);
        $rombels = Rombels::all();
        $rayons = Rayons::all();
        return view('administrator.students.edit', compact('student', 'rombels', 'rayons'));
    }

    /**
     * show the form for editing the specified resource
     * 
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Student $student
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $request->validate([
            'nis' => 'required',
            'name' => 'required',
            'rombel_id' => 'required',
            'rayon_id' => 'required',
        ]);

        Students::where('id', $id)->update([
            'nis' => $request->nis,
            'name' => $request->name,
            'rombel_id' => $request->rombel_id,
            'rayon_id' => $request->rayon_id,
        ]);

        return redirect()->route('students.index')->with('success', 'Berhasil mengubah data student');
    }

    /**
     * Remove the specified resource from stroge.
     * 
     * @param \App\Models\Students $students
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $students = Students::find($id);

        if (!$students) {
            return redirect()->back()->with('gagal', 'Data tidak ditemukan');
        }

        if ($siswaUsingStudents) {
            return redirect()->back()->with('gagal', 'data siswa digunakan oleh data keterlambatan');
        }

        $students->delete();

        return redirect()->route('students.index')->with('deleted', 'Berhasil menghapus data');
    }
}