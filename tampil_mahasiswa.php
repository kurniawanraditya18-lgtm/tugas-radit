<?php
// tampil_mahasiswa.php
ini_set('display_errors', 1);
error_reporting(E_ALL);
header('Content-Type: text/html; charset=utf-8');

require_once 'Database.php';

try {
    $pdo = Database::getInstance();
} catch (PDOException $e) {
    // Jika koneksi gagal, tampilkan pesan jelas
    die("Koneksi database gagal: " . $e->getMessage());
}

$jurusan = 'Teknik Informatika';

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Mahasiswa</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>Daftar Mahasiswa Jurusan Teknik Informatika</h1>

    <table>
        <thead>
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Jurusan</th>
            </tr>
        </thead>
        <tbody>
        <?php
        try {
            // gunakan named param dan eksekusi dengan array (lebih sederhana)
            $sql = "SELECT nim, nama, jurusan FROM mahasiswa WHERE jurusan = :jurusan";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([':jurusan' => $jurusan]);

            $mahasiswas = $stmt->fetchAll();

            if (count($mahasiswas) > 0) {
                foreach ($mahasiswas as $mhs) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($mhs['nim'] ?? '') . "</td>";
                    echo "<td>" . htmlspecialchars($mhs['nama'] ?? '') . "</td>";
                    echo "<td>" . htmlspecialchars($mhs['jurusan'] ?? '') . "</td>";
                    echo "</tr>";
                }
            } else {
                // jika kosong, tampilkan pesan dan debug optional
                echo "<tr><td colspan='3'>Tidak ada data mahasiswa untuk jurusan '{$jurusan}'.</td></tr>";
                // debug: uncomment baris berikut jika ingin tahu apakah query jalan tapi kosong
                // var_dump($stmt->errorInfo());
            }
        } catch (PDOException $e) {
            echo "<tr><td colspan='3'>Error saat query: " . htmlspecialchars($e->getMessage()) . "</td></tr>";
        }
        ?>
        </tbody>
    </table>
</body>
</html>