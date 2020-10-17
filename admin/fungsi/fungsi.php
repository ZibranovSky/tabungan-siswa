<?php 
// KONEKSI-------------------------------------------------------------------------

// $koneksi = mysqli_connect('localhost', 'root', '', 'tabungan_siswa');


$servername = "localhost";
$database = "tabungan_siswa";
$username = "root";
$password = "";

// untuk tulisan bercetak tebal silakan sesuaikan dengan detail database Anda
// membuat koneksi
$koneksi = mysqli_connect($servername, $username, $password, $database);
// mengecek koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}



//URL-----------------------------------------------------------
function url(){
	return $url = "//localhost/tabungan-siswa-master/";
}

//SUMMON ADMIN
function summon_admin(){
global $koneksi;

$id = $_SESSION['idtabsis'];

return $query = mysqli_query($koneksi, "SELECT * FROM tb_admin WHERE id = '$id'");


}

// SELECT ADMIN
function select_admin(){
	global $koneksi;
	return mysqli_query($koneksi, "SELECT * FROM tb_admin ORDER BY id DESC");
}
// INSERT ADMIN
function insert_admin(){
	global $koneksi;
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$nama = $_POST['nama'];
	$telepon = $_POST['telepon'];
	$foto = $_FILES['foto']['name'];

	// cek username

	$tambah = mysqli_query($koneksi, "SELECT * FROM tb_admin WHERE username='$username'");
	$row = mysqli_fetch_row($tambah);

	if ($row) {
		echo "<div class='alert alert-danger alert-dismissable'>
  			<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
  			Maaf, username sudah ada.
  			</div>";
	}else{
			if ($foto != "") {
		$allowed_ext = array('png','jpg');
		$x = explode(".", $foto);
		$ekstensi = strtolower(end($x));
		$file_tmp = $_FILES['foto']['tmp_name'];
		$angka_acak = rand(1,999);
   		$nama_file_baru = $angka_acak.'-'.$foto;
   		    if (in_array($ekstensi, $allowed_ext) 	=== true) {
      			move_uploaded_file($file_tmp, 'img/admin/'.$nama_file_baru);
      			$result = mysqli_query($koneksi, "INSERT INTO tb_admin SET username='$username', password='$password', nama='$nama', telepon='$telepon', foto='$nama_file_baru'");
      			if ($result) {
      			  header("location: index.php?m=admin");
      				}else{
      			  echo "gagal";
      				}
    }



	}
	}


}

// HAPUS ADMIN
function hapus_admin(){
	global $koneksi;
	$id = $_POST['id'];
	$sql   = "SELECT * FROM tb_admin WHERE id='$id'";
	$hapus = mysqli_query($koneksi,$sql);
	$r     = mysqli_fetch_array($hapus);

	$foto = $r['foto'];
	//hapus foto
	unlink("img/admin/$foto");
	return mysqli_query($koneksi, "DELETE FROM tb_admin WHERE id = '$id'");
}

// EDIT ADMIN
function update_admin(){
	global $koneksi;

	$id = $_POST['id'];
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$nama = $_POST['nama'];
	$telepon = $_POST['telepon'];
	$foto = $_FILES['foto']['name'];

	// Unlink
	$sql   = "SELECT * FROM tb_admin WHERE id='$id'";
	$hapus = mysqli_query($koneksi,$sql);
	$r     = mysqli_fetch_array($hapus);

	$hapus_foto = $r['foto'];

	// cek username

	$tambah = mysqli_query($koneksi, "SELECT * FROM tb_admin WHERE username='$username'");
	$row = mysqli_fetch_row($tambah);

	if(isset($_POST['ubahfoto'])){
		
		if ($foto != "") {
		$allowed_ext = array('png','jpg');
		$x = explode(".", $foto);
		$ekstensi = strtolower(end($x));
		$file_tmp = $_FILES['foto']['tmp_name'];
		$angka_acak = rand(1,999);
   		$nama_file_baru = $angka_acak.'-'.$foto;
   		    if (in_array($ekstensi, $allowed_ext) 	=== true) {
      			move_uploaded_file($file_tmp, 'img/admin/'.$nama_file_baru);
      			$result = mysqli_query($koneksi, "UPDATE tb_admin SET username='$username', password='$password', nama='$nama', telepon='$telepon', foto='$nama_file_baru' WHERE id='$id'");
      			if ($result) {
      			  unlink("img/admin/$hapus_foto");
      				}else{
      			  echo "gagal";
      				}
    }



	}
	}else{
		return mysqli_query($koneksi, "UPDATE tb_admin SET username='$username', password='$password', nama='$nama', telepon='$telepon' WHERE id='$id'");
	}
}

//SELECT SISWA
function select_siswa(){
	global $koneksi;
	return mysqli_query($koneksi, "SELECT * FROM tb_siswa ORDER BY id DESC");
	


}

// HAPUS SISWA
function hapus_siswa(){
	global $koneksi;
	$id = $_POST['id'];
	$query = "DELETE FROM tb_siswa WHERE id = '$id'";
	return mysqli_query($koneksi, $query);
}

// INSERT SISWA
function insert_siswa(){
	global $koneksi;

	$nama = $_POST['nama'];
	$kelas = $_POST['kelas'];
	$alamat = $_POST['alamat'];
	$notlp = $_POST['notlp'];


	$save = "INSERT INTO tb_siswa SET nama='$nama', kelas='$kelas', alamat='$alamat', notlp='$notlp'";
    return $query = mysqli_query($koneksi, $save);
 
}

// EDIT SISWA
function edit_siswa(){
	global $koneksi;

	$id = $_POST['id'];
	$nama = $_POST['nama'];
	$kelas = $_POST['kelas'];
	$alamat = $_POST['alamat'];
	$notlp = $_POST['notlp'];

	return mysqli_query($koneksi, "UPDATE tb_siswa SET nama='$nama', kelas='$kelas', alamat='$alamat', notlp='$notlp' WHERE id='$id'");
}
//JUMLAH SISWA
function jumlah_siswa()
{
global $koneksi;
$sql = "SELECT count(id) AS jsiswa FROM tb_siswa";
$query = mysqli_query($koneksi, $sql);
$key = mysqli_fetch_assoc($query);
	echo $key['jsiswa'];


}

// SELECT KELAS
function select_kelas(){
	global $koneksi;

	return mysqli_query($koneksi, "SELECT * FROM tb_kelas");
}
//HAPUS KELAS
function insert_kelas(){
	global $koneksi;

	$nama_kelas = $_POST['nama_kelas'];

	return mysqli_query($koneksi, "INSERT INTO tb_kelas SET nama_kelas = '$nama_kelas'");
}

function hapus_kelas(){
	global $koneksi;

	$id = $_POST['id'];

	return mysqli_query($koneksi, "DELETE FROM tb_kelas WHERE id='$id'");
}


//EDIT KELAS
function edit_kelas(){
	global $koneksi;
	$id = $_POST['id'];
	$nama_kelas = $_POST['nama_kelas'];

	return mysqli_query($koneksi, "UPDATE tb_kelas SET nama_kelas = '$nama_kelas' WHERE id='$id'");

}
// select tabungan
function select_tabungan(){
	global $koneksi;
	// return  mysqli_query($koneksi, "SELECT  id_tabungan, id_siswa,
	// 															  setoran,
	// 															  penarikan,
	// 															  saldo,
	// 															  sum(penarikan) as 																		  jumlah_penarikan,
	// 															  sum(setoran) as jumlah_setoran,
																  
	// 															  id,
	// 															  nama,
	// 															  jenis_kelamin,
	// 															  kelas,
	// 															  tempat
																		
	// 															  from 
	// 															  siswa, tb_tabungan
	// 															  where
	// 															  id_siswa = id
	// 															  group by nama ASC");
	return mysqli_query($koneksi, "SELECT id_tabungan, nama, kelas, saldo FROM tb_tabungan");
}

//insert setoran awal
function insert_setoran_awal(){
	global $koneksi;

	$id = $_POST['id_siswa'];
	$nama = $_POST['nama'];
	$kelas = $_POST['kelas'];
	$tanggal = $_POST['tanggal'];
	$saldo = $_POST['saldo'];

	// Cek apakah id siswa ada
	$tambah = mysqli_query($koneksi, "SELECT * FROM tb_tabungan WHERE id_siswa='$id'");
	$row = mysqli_fetch_row($tambah);

	if ($row) {
		echo "<div class='alert alert-danger alert-dismissable'>
  			<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
  			Maaf data dengan id ".$id." sudah ada.
  			</div>";
	}else{
		 $query =  "INSERT INTO tb_tabungan SET id_siswa='$id', nama='$nama',kelas='$kelas', tanggal='$tanggal', setoran=0, penarikan=0, saldo='$saldo'";
		 mysqli_query($koneksi, $query);
		 header("location: index.php?m=tabungan&s=print&id_siswa=$id");
	}

	// $sql = "SELECT id, nama, kelas, tanggal, saldo FROM tb_tabungan ORDER BY id_tabungan DESC";

	


}

// insert setoran / tambah setoran
function tambah_setoran(){
	global $koneksi;

	$id_tabungan = $_POST['id_tabungan'];
	$id_siswa = $_POST['id_siswa'];
	$nama = $_POST['nama'];
	$kelas = $_POST['kelas'];
	$tanggal = $_POST['tanggal'];
	$setoran = $_POST['setoran'];
	$saldo = $_POST['saldo'];

	// Penambahan saldo
	$tambah_saldo = $saldo + $setoran;

	//cek id siswa
	$tambah = mysqli_query($koneksi, "SELECT * FROM tb_tabungan WHERE id_siswa='$id_siswa'");
	$row = mysqli_fetch_row($tambah);

	if ($row) {
		$query = mysqli_query($koneksi, "UPDATE tb_tabungan SET  id_siswa = '$id_siswa', nama='$nama', kelas='$kelas', tanggal='$tanggal', setoran='$setoran', penarikan=0, saldo='$tambah_saldo' WHERE id_tabungan='$id_tabungan'");
		header("location: index.php?m=tabungan&s=print&id_siswa=$id_siswa");
	}else{
		$query =  "INSERT INTO tb_tabungan SET id_siswa='$id', nama='$nama',kelas='$kelas', tanggal='$tanggal', setoran='setoran', penarikan=0, saldo='$setoran'";
		 mysqli_query($koneksi, $query);
		 header("location: index.php?m=tabungan&s=print&id_siswa=$id");
	}



	

	

	

	if ($query) {
		
	}else{
		echo "gagal";
	}
}

// Penarikan saldo
function penarikan_saldo(){
	global $koneksi;

	$id_tabungan = $_POST['id_tabungan'];
	$id_siswa = $_POST['id_siswa'];
	$nama = $_POST['nama'];
	$kelas = $_POST['kelas'];
	$tanggal = $_POST['tanggal'];
	$penarikan = $_POST['penarikan'];
	$saldo = $_POST['saldo'];

	// penarikan saldo

	$penarikan_saldo = $saldo - $penarikan;

	$query = mysqli_query($koneksi, "UPDATE tb_tabungan SET  id_siswa = '$id_siswa', nama='$nama', kelas='$kelas', tanggal='$tanggal', setoran=0, penarikan='$penarikan', saldo='$penarikan_saldo' WHERE id_tabungan='$id_tabungan'");

	if ($query) {
		header("location: index.php?m=tabungan&s=print&id_siswa=$id_siswa");
	}else{
		echo "gagal";
	}
}

// jumlah uang beranda
function jumlah_tabungan(){
	global $koneksi;

	return mysqli_query($koneksi, "SELECT count(id_tabungan) AS jtab, count(id_siswa) AS jsiswa, sum(setoran) AS jsetoran, sum(penarikan) AS jpenarikan, sum(saldo) AS jsaldo FROM tb_tabungan");

	

}

// Delete Tabungan
function hapus_tabungan(){
	global $koneksi;

	$id_tabungan = $_POST['id_tabungan'];

	return mysqli_query($koneksi, "DELETE FROM tb_tabungan WHERE id_tabungan = '$id_tabungan'");
}



// select print
function select_print_siswa(){
  global $koneksi;

  $id = $_GET['id_siswa'];

  return mysqli_query($koneksi, "SELECT * FROM tb_siswa where id = '$id' ");
}

function select_print_tabungan(){
  global $koneksi;

  $id = $_GET['id_siswa'];

  return mysqli_query($koneksi, "SELECT * FROM tb_tabungan where id_siswa = '$id' ");
}

// function rupiah 

function rupiah($angka){
	$hasil = "Rp. ". number_format($angka,2,',','.');
	return $hasil;
}

 ?>
