<?php
include "koneksi.php";
$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM prodi WHERE id='$id'");
$row = mysqli_fetch_array($data);

if (isset($_POST['update'])) {
    $nama = $_POST['nama_prodi'];
    $kode = $_POST['kode_prodi'];
    $status = $_POST['status'];
    $jenjang = $_POST['jenjang'];
    $kaprodi = $_POST['kaprodi'];
    $fakultas = $_POST['fakultas'];

    mysqli_query($koneksi, "UPDATE prodi SET 
        nama_prodi='$nama',
        kode_prodi='$kode',
        status='$status',
        jenjang='$jenjang',
        kaprodi='$kaprodi',
        fakultas='$fakultas'
        WHERE id='$id'");
    header("Location: index.php");
}
?>

<h2>Edit Data Prodi</h2>
<form method="post">
    Nama Prodi: <input type="text" name="nama_prodi" value="<?= $row['nama_prodi'] ?>"><br>
    Kode Prodi: <input type="text" name="kode_prodi" value="<?= $row['kode_prodi'] ?>"><br>
    Status:
    <select name="status">
        <option value="aktif" <?= $row['status']=='aktif'?'selected':'' ?>>Aktif</option>
        <option value="tidak aktif" <?= $row['status']=='tidak aktif'?'selected':'' ?>>Tidak Aktif</option>
    </select><br>
    Jenjang: <input type="text" name="jenjang" value="<?= $row['jenjang'] ?>"><br>
    Kaprodi: <input type="text" name="kaprodi" value="<?= $row['kaprodi'] ?>"><br>
    Fakultas: <input type="text" name="fakultas" value="<?= $row['fakultas'] ?>"><br><br>
    <input type="submit" name="update" value="Update">
</form>

