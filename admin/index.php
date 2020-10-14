<?php
session_start();
include_once "sesi.php";
$modul=(isset($_GET['m']))?$_GET['m']:"awal";
$jawal="Admin || Admin";
switch($modul){
    case 'awal': default: $aktif="Beranda"; $judul="Beranda $jawal"; include "awal.php"; break;
    case 'admin': $aktif="Admin"; $judul="Modul $jawal"; include "modul/admin/index.php"; break;
   	case 'siswa': $aktif="siswa"; $judul="Modul $jawal"; include "modul/siswa/index.php"; break;
   	case 'kelas': $aktif="Kelas"; $judul="Modul $jawal"; include "modul/kelas/index.php"; break;
   	case 'tabungan': $aktif="Tabungan"; $judul="Modul $jawal"; include "modul/tabungan/index.php"; break;
    
   
}

?>
