<?php 
require 'fungsi/fungsi.php';

if (isset($_POST['edit'])) {
	update_admin();
}

foreach (summon_admin() as $adm): 


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Profil</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/png" href="<?= url() ?>vendors/img/icon2.png">
<link rel="stylesheet" href="<?= url() ?>vendors/css/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="<?= url() ?>vendors/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?= url() ?>vendors/css/bootstrap.min.css">

  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 550px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }

    .footer-fixed {
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
    }
 
        
    /* On small screens, set height to 'auto' for the grid */
    @media screen and (max-width: 767px) {
      .row.content {height: auto;} 
    }
  </style>
</head>
<body>

<nav class="navbar navbar-inverse visible-xs">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <img src="<?= url() ?>vendors/img/icon2big.png">
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php?m=awal">Dashboard</a></li>

        <li><a href="index.php?m=siswa&s=awal">Siswa</a></li>
        <li><a href="index.php?m=kelas&s=awal">Kelas</a></li>
        <li><a href="index.php?m=tabungan&s=awal">Tabungan</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
          <div class="navbar-header">

        </div>
        <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">
               <img src="img/admin/<?= $adm['foto'];?>" height="50"> </i> <?php echo $adm['nama']; ?>
              </a>
              <ul class="dropdown-menu dropdown-user">
                <li>
                 <a href="index.php?m=admin&s=profil"><i class="fa fa-user"></i> Profil</a>
                    
                
                </li><br>
                <li>
                  <a href="logout.php" onclick="return confirm('yakin ingin logout?');"> <i class="fa fa-sign-out"></i> Logout</a>
                 
                  
                </li>
              </ul>
            </li>
          </ul>
      </nav>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav hidden-xs">
      <img src="<?= url() ?>vendors/img/icon2big.png">
      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="index.php?m=awal"><i class="fa fa-diamond" aria-hidden="true"></i>
Dashboard</a></li>

        <li><a href="index.php?m=siswa&s=awal"><i class="fa fa-users" aria-hidden="true"></i>
Siswa</a></li>
        <li><a href="index.php?m=kelas&s=awal"><i class="fa fa-graduation-cap" aria-hidden="true"></i>
Kelas</a></li>
        <li><a href="index.php?m=tabungan&s=awal"><i class="fa fa-book" aria-hidden="true"></i>

Tabungan</a></li>
        <li><a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a></li>
      </ul><br>
    </div>
    <br>
   
      
   
    <div class="col-sm-9">
      <div class="well">
        <h4>Profil</h4>
       
      </div>


    </div>
         <div class="col-sm-9">
      <div class="well">
       <div class="table-responsive">
       	<table class="table table-borderless">
       		<tbody>
       			<tr>
       				<td>Nama :</td>
       				<td><?= $adm['nama'];?></td>
       			</tr>
       			<tr>
       				<td>Telepon :</td>
       				<td><?= $adm['telepon'];?></td>
       			</tr>
       			<tr>
       				<td>Foto :</td>
       				<td><img src="img/admin/<?= $adm['foto'];?>" height="150" data-target="#view_image" data-toggle="modal">

                <!-- modal view image -->
                <div class="modal fade" id="view_image" tabindex="-1" role="dialog" aria-labelledby="view_image" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
          <!--       <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  <b><p class="modal-title" id="view_image" style="text-align: center; font-size: 18px;">Edit Data Admin</p></b>
                </div> -->
                <!-- Modal Body -->
              <!--   <div class="modal-body"> </div> -->
                <center><img src="img/admin/<?= $adm['foto'];?>" height="512"></center>
               
              </div>
            </div>
              </td>
       			</tr>
       			<tr>
       				<td>
       					<!-- Trigger modal edit -->
       				<div data-toggle="modal" data-target="#edit-profil<?= $adm['id'] ?>">
                  <button type="button" class="btn btn-info datapotensi" data-toggle="tooltip" title="Edit">
                    <i class="fa fa-edit"></i>
                  </button>
                </div>
                <!-- Modal edit -->
                          <div class="modal fade" id="edit-profil<?= $adm['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="edit-profil<?= $adm['id'] ?>" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  <b><p class="modal-title" id="edit-profil<?= $adm['id'] ?>" style="text-align: center; font-size: 18px;">Edit Data Admin</p></b>
                </div>
                <!-- Modal Body -->
                <div class="modal-body">
                 <form action="" method="POST" enctype="multipart/form-data">
                  <input type="hidden" value="<?= $adm['id'] ?>" name="id">

  <div class="form-group">
    <label>Username</label>
    <input type="text" class="form-control" value="<?= $adm['username'];?>" id="exampleInputEmail1" name="username" aria-describedby="emailHelp" placeholder="Masukkan nama">
   
  </div>
    <div class="form-group">
    <label>Password</label>
    <input type="password" class="form-control"  id="exampleInputEmail1" name="password" aria-describedby="emailHelp" placeholder="Masukkan nama">
   
  </div>
    <div class="form-group">
    <label>Nama Admin</label>
    <input type="text" class="form-control" value="<?= $adm['nama'];?>" id="exampleInputEmail1" name="nama" aria-describedby="emailHelp" placeholder="Masukkan nama">
   
  </div>
    <div class="form-group">
    <label>Telepon Admin</label>
    <input type="text" class="form-control" value="<?= $adm['telepon'];?>" id="exampleInputEmail1" name="telepon" aria-describedby="emailHelp" placeholder="Masukkan nama">
   
  </div>

   <div class="form-group">
    <label>Foto Admin</label>
    <img src="img/admin/<?= $adm['foto'];?>" height="150"><br>
   	 <input type="checkbox" name="ubahfoto" value="true">Klik jika ingin ubah foto <br>
  </div>

      <div class="form-group">
    <label>Masukkan Foto Baru</label>
    <input type="file" name="foto">
   
  </div>
  

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="edit" class="btn btn-primary">Save changes</button>
      </div>
        </form>
                </div>
              </div>
            </div>
       				</td>
       			</tr>
       		</tbody>
       	</table>
       	
       </div> 	
       
      </div>

      
    </div> 
    
  </div>
</div>
<!-- Footer -->
<footer class="w3-center w3-black w3-padding-64">
  <div class="w3-xlarge w3-section">
    <i class="fa fa-facebook-official w3-hover-opacity" data-toggle="modal" data-target="#exampleModalCenterFB"></i>
    <i class="fa fa-github w3-hover-opacity" data-toggle="modal" data-target="#exampleModalCenterGIT"></i>
    <i class="fa fa-whatsapp w3-hover-opacity" data-toggle="modal" data-target="#exampleModalCenterWA"></i>
   
    <i class="fa fa-linkedin w3-hover-opacity" data-toggle="modal" data-target="#exampleModalCenterLIN"></i>
  </div>
  <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-text-green">w3.css</a></p>
  <p class="text-muted" style="font-size: 16px;">Copyright &copy;<script>document.write(new Date().getFullYear());</script> Muhamad Zibran Fitadiyatama All rights reserved</p>

</footer>
    <!-- FACEBOOK -->
    <div class="modal fade" id="exampleModalCenterFB" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <strong>FACEBOOK</strong><br>
       <p><a href="https://www.facebook.com/zibran.vitadiyatama.7/" target="_blank">https://www.facebook.com/zibran.vitadiyatama.7/</a></p>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

      </div>
       
    </div>
  </div>
</div>
</div>
    <!-- GITHUB -->
 <div class="modal fade" id="exampleModalCenterGIT" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <strong>GITHUB</strong><br>
       <p><a href="https://github.com/ZibranovSky" target="_blank">https://github.com/ZibranovSky</a></p>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

      </div>
       
    </div>
  </div>
</div>
</div>
  <!-- WHATSAPP -->
 <div class="modal fade" id="exampleModalCenterWA" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <strong>WHATSAPP</strong><br>
       <p>0895-6357-29348</p>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

      </div>
       
    </div>
  </div>
</div>
</div>
  <!-- LINKEDIN -->
   <div class="modal fade" id="exampleModalCenterLIN" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <strong>LINKEDIN</strong><br>
       <p><a href="https://www.linkedin.com/in/muhammad-zibran-fitadiyatama-6550801a9/" target="_blank">https://www.linkedin.com/in/muhammad-zibran-fitadiyatama-6550801a9/</a></p>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

      </div>
       
    </div>
  </div>
</div>
</div>
  <script src="<?= url() ?>vendors/jquery/jquery.min.js"></script>
  <script src="<?= url() ?>vendors/js/bootstrap.min.js"></script> </body>
</html>
<?php endforeach; ?>
