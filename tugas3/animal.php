<?php
class Animal{
    // Property
    public $namaHewan = [];

    // Methode Constructor
    public function __construct($data){
        $this->namaHewan = $data;
    }

    // Methode Index untuk menampilkan data
    public function index(){
        foreach ($this->namaHewan as $hewan) {
            echo 'Nama Hewan : '. $hewan;
            echo '<br>';
        }
        return;
    }

    // Methode Store untuk menambahkan data hewan
    public function store($data){
        array_push($this->namaHewan, $data);
    }

    // Methode Update untuk mengubah data hewan
    public function update($index, $data){
        $this->namaHewan[$index] = $data;
    }

    // Methode Destroy untuk menghapus data hewan
    public function destroy($index){
        array_splice($this->namaHewan, $index, 1);
    }
}