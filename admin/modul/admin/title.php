<?php 
require 'fungsi/fungsi.php';
foreach (summon_admin() as $adm): 

if (isset($_POST['simpan'])) {
  insert_admin();
}

if (isset($_POST['hapus-adm'])) {
  hapus_admin();
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dashboard</title>
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
        <li><a href="#">Admin</a></li>
       
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
          <div class="navbar-header">
        </div>
      </nav>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav hidden-xs">
      <img src="<?= url() ?>vendors/img/icon2big.png">
      <ul class="nav nav-pills nav-stacked">
        <li><a href="index.php?m=awal">Dashboard</a></li>
        <li class="active"><a href="index.php?m=admin&s=awal">Admin</a></li>
   
        <li><a href="logout.php">Logout</a></li>
      </ul><br>
    </div>
    <br>
    
    <div class="col-sm-9">
      <!-- Button trigger modal -->
      <div class="well">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  Tambah data
</button>

<!-- modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah data admin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="username" aria-describedby="emailHelp" placeholder="Masukkan Username">
    <small id="emailHelp" class="form-text text-muted">Masukkan username</small>
  </div>
  <div class="form-group">
    <label>Password</label>
    <input type="password" class="form-control" id="exampleInputEmail1" name="password" aria-describedby="emailHelp" placeholder="Masukkan Password">
    <small class="form-text text-muted">Masukkan Password</small>
  </div>
  <div class="form-group">
    <label>Nama</label>
    <input type="text" class="form-control" aria-describedby="emailHelp" name="nama" placeholder="Masukkan Nama">
    <small id="emailHelp" class="form-text text-muted">Masukkan Nama</small>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Telepon</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="telepon" aria-describedby="emailHelp" placeholder="Masukkan Nomor Telepon">
    <small id="emailHelp" class="form-text text-muted">Masukkan Nomor Telepon</small>
  </div>
  <div class="form-group">
    <label>Foto</label>
    <input type="file"  aria-describedby="emailHelp" name="foto" placeholder="Masukkan Foto"><p style="color: red;">PNG/JPG</p>
    <small id="emailHelp" class="form-text text-muted">Masukkan Foto</small>
  </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="simpan" class="btn btn-primary">Save changes</button>
      </div>
        </form>
    </div>
  </div>
</div>
      </div>


       <div class="row">
        <div class="col-sm-12">
          <div class="well">
             <div class="table-responsive table--no-card m-b-30">
                <table class="table table-borderless table-striped table-earning">
                  <thead>
                    <tr>
                        <th>NO</th> 
                        <th>Id Admin</th>
                        <th>Nama</th>
                        <th>Telepon</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                           
                                                
                    </tr>
                  </thead>
                <tbody>     
                    <?php 
                      $i = 1;
                      foreach (select_admin() as $key):

                     ?>
                          <tr>
                              <td><?= $i++;?></td>
                              <td><?=  $key['id'];?></td>
                              <td><?=  $key['nama'];?></td>
                              <td><?=  $key['telepon'];?></td>
                              <td><img src="img/admin/<?=  $key['foto'];?>" height="150"></td>
                              <td>
                                <!-- Trigger Modal Hapus -->
                              <div data-toggle="modal" data-target="#hapus-admin<?= $key['id'] ?>">
                              <button type="button" class="btn btn-danger datapotensi" data-toggle="tooltip" title="Hapus">
                              <i class="fa fa-trash"></i>
                              </button>
                              </div>

                              <!-- Modal Hapus -->
                            <form action="" method="POST">
                      <div class="modal fade" id="hapus-admin<?= $key['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="hapus-admin<?= $key['id'] ?>" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <b><p class="modal-title" id="hapus-admin<?= $key['id'] ?>" style="text-align: center; font-size: 18px;">Apakah anda yakin ingin dihapus?</p></b>
                        </div>
                        <div class="modal-body">
                          <div class="modal-body">
                            <p>ID</p>
                            <b><p><?= $key['id']; ?></p></b>
                            <p>Nama Admin</p>
                        <b><p><?= $key['nama'] ?></p></b>
                        <p>Nomor Telepon</p>
                        <b><p><?= $key['telepon'] ?></p></b>
                        <p>Foto</p>
                        <b><img src="img/admin/<?= $key['foto']; ?>" height="150"></b>
                          <input type="hidden" name="id" value="<?= $key['id'] ?>" class="form-control" hidden>
                          </div>
                         
                        </div>
                        <div class="modal-footer">
                          <button type="submit" name="hapus-adm" class="btn btn-danger">Hapus</button>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        </div>
                      </div>
                    </div>
                  </div>
                    </form>

                              </td>
                              </tr>
                              <?php endforeach; ?>
                </tbody>
                    </table>
                                    
                        </div>
          </div>
        </div>

      </div> 
<!--                 <div class="table-responsive">
            <table class="table table-bordered" style="color: black;">
        <thead>
          <tr>
                                          
                                 <th scope="col">Id Admin</th>
                                 <th scope="col">Nama</th>
                                 <th scope="col">Telepon</th>
                                 <th scope="col">Foto</th>
          </tr>
        </thead>
        <tbody>
<?php 

$i = 1;
foreach (select_admin() as $key):

?>
          <tr>
            <th scope="row"><?= $i++; ?></th>
            <td><?php echo $key['id'];?></td>
                                            <td><?php echo $key['nama'];?></td>
                                            <td><?php echo $key['telepon'];?></td>
                                            <td><?php echo $key['foto'];?></td>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
    </div> -->

    </div>
  </div>
</div>
  <script src="<?= url() ?>vendors/jquery/jquery.min.js"></script>
  <script src="<?= url() ?>vendors/js/bootstrap.min.js"></script> </body>
</html>
<?php endforeach; ?>