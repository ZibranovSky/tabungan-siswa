<?php

include_once "sesi.php";

$modul = (isset($_GET['s']))?$_GET['s']:"awal";
switch($modul){
	case 'awal': default: include "modul/siswa/title.php"; break;
	case 'simpan': include "modul/admin/simpan.php"; break;
	case 'hapus': include "modul/admin/hapus.php"; break;
	case 'ubah': include "modul/admin/ubah.php"; break;
	case 'update': include "modul/admin/update.php"; break;
	
}
?>

