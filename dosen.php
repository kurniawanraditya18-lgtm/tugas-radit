<?php
require_once 'User.php';
require_once 'Notifikasi.php';
require_once 'Login.php';  // ✅ TAMBAH INI

class Dosen extends User implements Notifikasi
class Dosen extends User implements Notifikasi, Login  // ✅ TAMBAH "Login"
{
    public function __construct($nama)
    {
        parent::__construct($nama);
        $this->role = "Dosen";
    }
    

    public function getRole()
    {
        return $this->role;
    }
    

    public function kirimNotifikasi($pesan)
    {
        echo "Mengirim notifikasi ke Dosen " . $this->username . ": " . $pesan . "<br>";
        echo "Mengirim notifikasi ke Dosen ". $this->username. ": ". $pesan. "<br>";
    }

    // ✅ TAMBAH METHOD login() INI
    public function login($username, $password)
    {
        if ($password == "1234") {
            echo "Login berhasil untuk dosen " . $this->username . "<br>";
            return true;
        } else {
            echo "Login gagal untuk dosen " . $this->username . "<br>";
            return false;
        }
    }
}
?>