<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class StudentController extends Controller
{
    // Metode index untuk melihat data
    public function index() {
        // student = DB::table('students')->get(); // untuk query builder
        $students = Student::all(); // menggunakan eloquent
        $data = [
            'message' => 'Berhasil akses data',
            'data' => $students
        ];
        return response()->json($data, 200);
    }

    // Metode store untuk menambahkan data
    public function store(Request $request) {
        $input = [
            // pemanggilan kolom database dengan eloquent
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'jurusan' => $request->jurusan
        ];
        
        $students = Student::create($input);

        $data = [
            'message' => 'Berhasil menambahkan data',
            'data' => $students
        ];

        return response()->json($data, 201);
    }

    // Metode untuk mengubah data
    public function update($id, Request $request) {
        $students = Student::find($id);

        $students->update([
            // pemanggilan kolom database dengan eloquent
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'jurusan' => $request->jurusan
        ]);

        $data = [
            'message' => 'Berhasil mengubah data',
            'data' => $students
        ];

        return response()->json($data, 200);
    }

    public function destroy($id) {
        $students = Student::find($id);

        $students->delete();

        $data = [
            'message' => 'Berhasil menghapus data',
            'data' => $students
        ];

        return response()->json($data, 201);
    }
}
