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
        echo "Menambah hewan baru";
        echo "<br>";

        // menambah data dengan array_push
        array_push($this->animals, $request->hewan);

        // Menampilkan data terbaru
        $this->index();
    }
}
