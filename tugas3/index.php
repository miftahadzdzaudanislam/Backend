<?php
require 'animal.php';

$listHewan = new Animal(['Ayam', 'Kucing', 'Pinguin']);

echo 'Methode Index untuk menampilkan data hewan<br>';
$listHewan->index();
echo '<br>';

echo 'Methode Store untuk menambahkan data hewan<br>';
$listHewan->store('Burung');
$listHewan->index();
echo '<br>';

echo 'Methode Update untuk mengubah data hewan<br>';
$listHewan->update(0, 'Jerapah');
$listHewan->index();
echo '<br>';

echo 'Methode Destroy untuk menghapus data hewan<br>';
$listHewan->destroy(1);
$listHewan->index();
echo '<br>';