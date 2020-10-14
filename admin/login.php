<?php 

require 'fungsi/fungsi.php';

 ?>

<!DOCTYPE html>
<html>
<title>LOGIN ADMIN</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/png" href="<?= url() ?>vendors/img/icon2.png">
<link rel="stylesheet" href="<?= url() ?>vendors/css/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="<?= url() ?>vendors/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?= url() ?>vendors/css/bootstrap.min.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}

body, html {
  height: 100%;
  line-height: 1.8;
}

/* Full height image header */
.bgimg-1 {
  background-position: center;
  background-size: cover;
  background-image: url("/w3images/mac.jpg");
  min-height: 100%;
}

.w3-bar .w3-button {
  padding: 16px;
}

a {
  
}
</style>
<body>

<!-- Navbar (sit on top) -->
    <nav class="navbar navbar-default navbar-fixed-top navbar-custom">
      <div class="container">
        <div class="navbar-header page-scroll">
          <a class="navbar-brand">Login Admin Tabungan</a>
        </div>
      </div>
    </nav>  

    <section class="bagian3">
            <div class="container-fluid">
        <div class="row">
          <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h1 class="panel-title text-center">Login</h1>
              </div>
              <div class="panel-body">
                <form class="form" action="" method="post">
                  <div class="form-group input-group">
                    <span class="input-group-addon"><i class="fa fa-laptop"></i></span>
                    <input class="form-control" type="text" name="user"  required="" placeholder="Masukkan username Anda">
                  </div>
                 
                  <div class="form-group input-group">
                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                    <input class="form-control" type="password" name="pass" value="" required="" placeholder="Password">
                  </div>
                 
                  <div class="form-group">
                    <a href="index.php">
                      <button type="button" name="button" class="btn btn-danger">Batal</button>
                    </a>

                    <input class="btn btn-success" type="submit" name="daftar" value="Masuk">
                  </div>
                  <?php 
                  if (@$_POST['daftar']) {
                    include ("pro_login.php");
                  }
                   ?>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

<!-- Promo Section - "We know design" -->




<!-- MODAL -->
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
<!-- Footer -->
<footer class="w3-center w3-black w3-padding-64">
  <div class="w3-xlarge w3-section">
    <i class="fa fa-facebook-official w3-hover-opacity" data-toggle="modal" data-target="#exampleModalCenterFB"></i>
    <i class="fa fa-github w3-hover-opacity" data-toggle="modal" data-target="#exampleModalCenterGIT"></i>
    <i class="fa fa-whatsapp w3-hover-opacity" data-toggle="modal" data-target="#exampleModalCenterWA"></i>
   
    <i class="fa fa-linkedin w3-hover-opacity" data-toggle="modal" data-target="#exampleModalCenterLIN"></i>
  </div>
  <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-text-green">w3.css</a></p>
</footer>
<!-- END MODAL -->

 <!-- jQuery -->
    <script src="<?= url() ?>vendors/jquery/jquery.min.js"></script>

    <!--include-->
    <script src="<?= url() ?>vendors/js/bootstrap.min.js"></script>
 
<script>
// Modal Image Gallery
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  var captionText = document.getElementById("caption");
  captionText.innerHTML = element.alt;
}


// Toggle between showing and hiding the sidebar when clicking the menu icon
var mySidebar = document.getElementById("mySidebar");

function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
  } else {
    mySidebar.style.display = 'block';
  }
}

// Close the sidebar with the close button
function w3_close() {
    mySidebar.style.display = "none";
}
</script>


</body>
</html>
