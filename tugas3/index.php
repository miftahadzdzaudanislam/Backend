<?php
require 'animal.php';

// Membuat objek hewan
$listHewan = new Animal(['Ayam', 'Kucing', 'Pinguin']);

// menampilkan data hewan
echo 'Method Index untuk menampilkan data hewan<br>';
$listHewan->index();
echo '<br>';

// menampilkan data hewan yang sudah ditambah
echo 'Method Store untuk menambahkan data hewan<br>';
$listHewan->store('Burung');
$listHewan->index();
echo '<br>';

// menampilkan data hewan yang sudah di ubah
echo 'Method Update untuk mengubah data hewan<br>';
$listHewan->update(0, 'Jerapah');
$listHewan->index();
echo '<br>';

// menampilkan data hewan yang sudah ada yang hapus
echo 'Method Destroy untuk menghapus data hewan<br>';
$listHewan->destroy(1);
$listHewan->index();
echo '<br>';