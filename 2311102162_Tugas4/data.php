<?php
// 1. Menentukan header agar browser tahu ini adalah JSON
header('Content-Type: application/json');

// 2. Membuat array data sesuai instruksi tugas
$data = [
    'nama' => 'Idansama',
    'pekerjaan' => 'CEO',
    'lokasi' => 'Garut Barat'
];

// 3. Mengubah array menjadi JSON dan menampilkannya
echo json_encode($data);
?>