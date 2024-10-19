<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public $animals = ["Ayam", "Jerapah", "Bison"];

    // Menampilkan data animals
    public function index() {
        echo "Menampilkan data Hewan";
        echo "<br>";
        foreach ($this->animals as $hewan) {
            echo "Nama Hewan : $hewan";
            echo "<br>";
        }
    }

    // Menambah data animals
    public function store(Request $request) {
        // menambah data dengan array_push
        array_push($this->animals, $request->hewan);
        
        // Menampilkan data terbaru
        $this->index();

        echo "Menambah hewan baru $request->hewan";
        echo "<br>";
    }

    public function update(Request $request, $id) {
        // Mengubah data hewan
        $this->animals[$id] = $request->hewan;

        // Menampilkan data terbaru
        $this->index();

        echo "Mengubah data pada di id ke $id";
        echo "<br>";
    }

    public function destroy($id) {
        // Menghapus data hewan
        array_splice($this->animals, $id, 1);

        // Menampilkan data terbaru
        $this->index();

        echo "Menghapus data pada id ke $id";
    }
}
