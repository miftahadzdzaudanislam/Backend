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

        if ($students->isNotEmpty()) {
            $data = [
                'message' => 'Berhasil akses data',
                'data' => $students
            ];
            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Data Student tidak ada'
            ];
            return response()->json($data, 200);
        }

    }

    // Metode store untuk menambahkan data
    public function store(Request $request) {        
        if ($request->filled('nama', 'nim', 'email', 'jurusan')) {
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
        } else {
            $data = [
                'message' => 'Data gagal ditambahkan'
            ];
    
            return response()->json($data, 404);
        }
    }

    // Metode untuk mengubah data
    public function update($id, Request $request) {
        $students = Student::find($id);

        if ($students) {
            $students->update([
                // pemanggilan kolom database dengan eloquent
                'nama' => $request->nama ?? $students->nama,
                'nim' => $request->nim ?? $students->nim,
                'email' => $request->email ?? $students->email,
                'jurusan' => $request->jurusan ?? $students->jurusan
            ]);

            $data = [
                'message' => 'Berhasil mengubah data',
                'data' => $students
            ];

            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Data tidak ditemukan'
            ];

            return response()->json($data, 404);
        }
    }

    public function destroy($id) {
        $students = Student::find($id);

        if ($students) {
            $students->delete();
    
            $data = [
                'message' => 'Berhasil menghapus data',
                'data' => $students
            ];

            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Data tidak ditemukan',
            ];

            return response()->json($data, 404);
        }
    }

    public function show($id) {
        $students = Student::find($id);

        if ($students) {
            $data = [
                'message' => 'Menampilkan detail data',
                'data' => $students
            ];

            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Data tidak ditemukan',
            ];

            return response()->json($data, 404);
        }
    }
}
