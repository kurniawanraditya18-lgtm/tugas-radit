<?php
include "koneksi.php";

if (isset($_POST['simpan'])) {
    $nama = $_POST['nama_prodi'];
    $kode = $_POST['kode_prodi'];
    $status = $_POST['status'];
    $jenjang = $_POST['jenjang'];
    $kaprodi = $_POST['kaprodi'];
    $fakultas = $_POST['fakultas'];

    $query = "INSERT INTO prodi (nama_prodi, kode_prodi, status, jenjang, kaprodi, fakultas)
              VALUES ('$nama','$kode','$status','$jenjang','$kaprodi','$fakultas')";
    mysqli_query($koneksi, $query);
    header("Location: index.php");
}
?>

<h2>Tambah Data Prodi</h2>
<form method="post">
    Nama Prodi: <input type="text" name="nama_prodi"><br>
    Kode Prodi: <input type="text" name="kode_prodi"><br>
    Status:
    <select name="status">
        <option value="aktif">Aktif</option>
        <option value="tidak aktif">Tidak Aktif</option>
    </select><br>
    Jenjang: <input type="text" name="jenjang"><br>
    Kaprodi: <input type="text" name="kaprodi"><br>
    Fakultas: <input type="text" name="fakultas"><br><br>
    <input type="submit" name="simpan" value="Simpan">
</form>

