<?php
class Animal{
    // Property
    public $namaHewan = [];

    // Method Constructor
    public function __construct($data){
        $this->namaHewan = $data;
    }

    // Method Index untuk menampilkan data
    public function index(){
        foreach ($this->namaHewan as $hewan) {
            echo 'Nama Hewan : '. $hewan;
            echo '<br>';
        }
        return;
    }

    // Method Store untuk menambahkan data hewan
    public function store($data){
        array_push($this->namaHewan, $data);
    }

    // Method Update untuk mengubah data hewan
    public function update($index, $data){
        $this->namaHewan[$index] = $data;
    }

    // Method Destroy untuk menghapus data hewan
    public function destroy($index){
        array_splice($this->namaHewan, $index, 1);
    }
}