<?php
include "koneksi.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Prodi</title>
</head>
<body>
<h2>Data Program Studi</h2>
<a href="tambah.php">+ Tambah Data</a>
<br><br>

<table border="1" cellpadding="8">
<tr>
    <th>No</th>
    <th>Nama Prodi</th>
    <th>Kode Prodi</th>
    <th>Status</th>
    <th>Jenjang</th>
    <th>Kaprodi</th>
    <th>Fakultas</th>
    <th>Aksi</th>
</tr>

<?php
$no = 1;
$data = mysqli_query($koneksi, "SELECT * FROM prodi");
while ($row = mysqli_fetch_array($data)) {
    echo "<tr>
        <td>$no</td>
        <td>{$row['nama_prodi']}</td>
        <td>{$row['kode_prodi']}</td>
        <td>{$row['status']}</td>
        <td>{$row['jenjang']}</td>
        <td>{$row['kaprodi']}</td>
        <td>{$row['fakultas']}</td>
        <td>
            <a href='edit.php?id={$row['id']}'>Edit</a> |
            <a href='hapus.php?id={$row['id']}' onclick=\"return confirm('Yakin hapus?')\">Hapus</a>
        </td>
    </tr>";
    $no++;
}
?>
</table>
</body>
</html>
<?php
include 'config.php';
$result = mysqli_query($conn, "SELECT * FROM prodi");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Prodi</title>
</head>
<body>
    <h2>Data Program Studi</h2>
    <a href="tambah.php">+ Tambah Data</a>
    <br><br>

    <table border="1" cellpadding="8">
        <tr>
            <th>ID</th>
            <th>Nama Prodi</th>
            <th>Kode Prodi</th>
            <th>Status</th>
            <th>Jenjang</th>
            <th>Kaprodi</th>
            <th>Fakultas</th>
            <th>Aksi</th>
        </tr>

        <?php while($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['nama_prodi'] ?></td>
            <td><?= $row['kode_prodi'] ?></td>
            <td><?= $row['status'] ?></td>
            <td><?= $row['jenjang'] ?></td>
            <td><?= $row['kaprodi'] ?></td>
            <td><?= $row['fakultas'] ?></td>
            <td>
                <a href="edit.php?id=<?= $row['id'] ?>">Edit</a> | 
                <a href="hapus.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin hapus data?')">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
