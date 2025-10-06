<?php
require_once 'Mahasiswa.php';
require_once 'Dosen.php';
require_once 'Staff.php';

// Buat object dari Mahasiswa dan Dosen
// ✅ PINDAHKAN FUNCTION KE SINI (SEBELUM DIPANGGIL)
function tampilkanInfoUser(User $user)
{
    echo "Polymorphism: " . $user->getUsername() . " memiliki peran sebagai " . $user->getRole();
    
    // Jika objek adalah Staff, tampilkan departemen juga
    if ($user instanceof Staff) {
        echo " (Departemen: " . $user->getDepartemen() . ")";
    }
    echo "<br>";
}

// KODE PRAKTIKUM
$mahasiswa = new Mahasiswa('Budi');
$dosen = new Dosen('Dr. Siti');

// Panggil method getRole() pada keduanya
echo "Info User:<br>";
echo "<h2>Info User:</h2>";
echo $mahasiswa->getUsername() . " adalah seorang " . $mahasiswa->getRole() . "<br>";
echo $dosen->getUsername() . " adalah seorang " . $dosen->getRole() . "<br>";

echo "<hr>";

// Demonstrasi Polymorphism
function tampilkanInfoUser(User $user)
{
    echo "Polymorphism: " . $user->getUsername() . " memiliki peran sebagai " . $user->getRole() . "<br>";
}

// Panggil fungsi dengan object mahasiswa dan dosen
// Demonstrasi Polymorphism (PRAKTIKUM)
echo "<h2>Demonstrasi Polymorphism:</h2>";
tampilkanInfoUser($mahasiswa);
tampilkanInfoUser($dosen);

echo "<hr>";

// Panggil method kirimNotifikasi() pada object dosen
// Demonstrasi Interface (PRAKTIKUM)
echo "<h2>Demonstrasi Interface:</h2>";
$dosen->kirimNotifikasi("Jadwal kuliah besok dibatalkan.");

echo "<hr>";

// ✅ LATIHAN 3: POLYMORPHISM LEBIH KOMPLEKS
echo "<h2>Latihan 3: Polymorphism Lebih Kompleks</h2>";

// Buat array berisi beberapa objek
$objects = [
    new Mahasiswa('Budi'),
    new Dosen('Dr. Siti'),
    new Staff('Ahmad', 'IT Support'),
    new Mahasiswa('Sari'),
    new Dosen('Prof. Joko'),
    new Staff('Dewi', 'Administrasi')
];

// Loop array dan panggil tampilkanInfoUser() untuk masing-masing
foreach ($objects as $obj) {
    tampilkanInfoUser($obj);
    
    // Jika objek mengimplementasikan Login, panggil login()
    if ($obj instanceof Login) {
        echo "Testing login: ";
        $obj->login($obj->getUsername(), "1234"); // Password benar
        
        echo "Testing login dengan password salah: ";
        $obj->login($obj->getUsername(), "wrong"); // Password salah
    }
    
    echo "---<br>";
}

// ✅ Tampilkan info staff terpisah
echo "<h2>Info Staff:</h2>";
$staff = new Staff('Ahmad', 'IT Support');
echo $staff->getUsername() . " adalah seorang " . $staff->getRole() . 
     " di departemen " . $staff->getDepartemen() . "<br>";
?>