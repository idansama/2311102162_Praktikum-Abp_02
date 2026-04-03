<?php
$mahasiswa = [
    ["nama" => "Go-Youn-jung", "nim" => "2311102123", "tugas" => 80, "uts" => 75, "uas" => 85],
    ["nama" => "Baek-Je-na", "nim" => "2311102124", "tugas" => 60, "uts" => 65, "uas" => 70],
    ["nama" => "Baek Ha-rin", "nim" => "2311102125", "tugas" => 90, "uts" => 88, "uas" => 95],
    ["nama" => "Baek Ah-jin", "nim" => "2311102126", "tugas" => 85, "uts" => 80, "uas" => 90]
];

function hitungNilaiAkhir($tugas, $uts, $uas) {
    return (0.3 * $tugas) + (0.3 * $uts) + (0.4 * $uas);
}

function tentukanGrade($nilai) {
    if ($nilai >= 85) return "A";
    elseif ($nilai >= 75) return "B";
    elseif ($nilai >= 65) return "C";
    elseif ($nilai >= 50) return "D";
    else return "E";
}

$totalNilai = 0;
$nilaiTertinggi = 0;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(to right, #4facfe, #00f2fe);
        }
        .card {
            border-radius: 15px;
        }
        h2 {
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="card shadow p-4">
        <h2 class="text-center mb-4">📊 Data Nilai Mahasiswa</h2>

        <table class="table table-bordered table-hover text-center">
            <thead class="table-dark">
                <tr>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Nilai Akhir</th>
                    <th>Grade</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>

            <?php foreach ($mahasiswa as $mhs): ?>
                <?php
                    $nilaiAkhir = hitungNilaiAkhir($mhs['tugas'], $mhs['uts'], $mhs['uas']);
                    $grade = tentukanGrade($nilaiAkhir);
                    $status = ($nilaiAkhir >= 65) ? "Lulus" : "Tidak Lulus";

                    $totalNilai += $nilaiAkhir;
                    if ($nilaiAkhir > $nilaiTertinggi) {
                        $nilaiTertinggi = $nilaiAkhir;
                    }
                ?>

                <tr>
                    <td><?= $mhs['nama']; ?></td>
                    <td><?= $mhs['nim']; ?></td>
                    <td><?= number_format($nilaiAkhir, 2); ?></td>
                    <td>
                        <span class="badge bg-primary"><?= $grade; ?></span>
                    </td>
                    <td>
                        <?php if ($status == "Lulus"): ?>
                            <span class="badge bg-success">Lulus</span>
                        <?php else: ?>
                            <span class="badge bg-danger">Tidak Lulus</span>
                        <?php endif; ?>
                    </td>
                </tr>

            <?php endforeach; ?>

            </tbody>
        </table>

        <?php
        $rataRata = $totalNilai / count($mahasiswa);
        ?>

        <div class="row text-center mt-4">
            <div class="col-md-6">
                <div class="alert alert-info">
                    <b>Rata-rata Kelas:</b><br>
                    <?= number_format($rataRata, 2); ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="alert alert-warning">
                    <b>Nilai Tertinggi:</b><br>
                    <?= number_format($nilaiTertinggi, 2); ?>
                </div>
            </div>
        </div>

    </div>
</div>

</body>
</html>