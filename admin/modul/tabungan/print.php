<?php 
require 'fungsi/fungsi.php';
foreach (select_print_tabungan() as $key):
 ?>
<!DOCTYPE html>
<html>
<head>
	  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/png" href="<?= url() ?>vendors/img/icon2.png">
<link rel="stylesheet" href="<?= url() ?>vendors/css/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="<?= url() ?>vendors/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?= url() ?>vendors/css/bootstrap.min.css">
	<title>Print</title>
</head>
<body>
	<div class="row">
		<div class="container">
			<div class="jumbotron">
				<center>
					<img src="<?= url() ?>vendors/img/icon2big.png"> <b>&nbsp Tabungan Siswa</b>
				</center>
			</div>
		</div>
	</div>

		<table class="table">
				<tr>
					<td style="width:10%;">
						Nama 
					</td>
					<td>
						: <?php echo $key['nama']; ?>
					</td>
				</tr>
				<tr>					
					<td>
						Kelas
					</td>
					<td>
						: <?php echo $key['kelas'] ; ?>
					</td>
				</tr>
				
			</table>
			<br>
			<table class="table table-striped">
					<tr>
						<th>
							No
						</th>
						<th>
							Tanggal
						</th>
						<th>
							Setoran
						</th>
						<th>
							Penarikan
						</th>
						<th>
							Saldo
						</th>
					</tr>
					<?php $no = 1; ?>
					<tr>
						<td>
							<?php echo $no++ ; ?>
						</td>
						<td>

							<?= $key['tanggal'];?>
						</td>
						<td>
							<?= "Rp.".($key['setoran']);?>
						</td>
						<td>
							<?= "Rp.".($key['penarikan']); ?>
						</td>
						<td>
							<?= "Rp.".($key['saldo']); ?>
						</td>
					</tr>
				<?php endforeach; ?>
					
				</table>
			<br><br>
			<div class="pull-right">
				<h5>Tanda Tangan</h5>
				<h5>Yang Bersangkutan</h5>
				<br><br><br>
				<h5>Penyetor</h5>
			</div>

	<script>
					window.print();
				</script>
  <script src="<?= url() ?>vendors/jquery/jquery.min.js"></script>
  <script src="<?= url() ?>vendors/js/bootstrap.min.js"></script> </body>
</body>
</html>