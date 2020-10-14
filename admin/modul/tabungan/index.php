<?php

include_once "sesi.php";

$modul=(isset($_GET['s']))?$_GET['s']:"awal";
switch($modul){
	case 'awal': default: include "modul/tabungan/title.php"; break;
	case 'tambah_setoran': include "modul/tabungan/tambah_setoran.php"; break;
	case 'setoran_awal': include "modul/tabungan/setoran_awal.php"; break;
	case 'penarikan': include "modul/tabungan/penarikan.php"; break;
	case 'print': include "modul/tabungan/print.php"; break;
	
	
}
?>
