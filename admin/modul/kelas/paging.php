<?php 
$koneksi = mysqli_connect('localhost', 'root', '', 'tabungan_siswa');
global $koneksi;

    $batas = 5;
$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
$halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;

$previous = $halaman - 1;
$next = $halaman + 1;

$data = mysqli_query($koneksi, "SELECT * FROM tb_kelas");
$jumlah_data = mysqli_num_rows($data);
$total_halaman = ceil($jumlah_data / $batas);

$data_kelas = mysqli_query($koneksi, "SELECT * FROM tb_kelas LIMIT $halaman_awal, $batas");
$nomor = $halaman_awal+1;

foreach ($data_kelas as $key):
  ?>
    



<tr>
                              <td><?= $i++;?></td>
                            
                              <td><?=  $key['nama_kelas'];?></td>
                             

                              
                              <td>
                                <!-- Trigger Modal Hapus -->
                              <div data-toggle="modal" data-target="#hapus-admin<?= $key['id'] ?>">
                              <button type="button" class="btn btn-danger datapotensi" data-toggle="tooltip" title="Hapus">
                              <i class="fa fa-trash"></i>
                              </button>
                              </div>

                              <!-- Modal Hapus -->
                            <form action="" method="POST">
                      <div class="modal fade" id="hapus-admin<?= $key['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="hapus-admin<?= $key['nis'] ?>" aria-hidden="true">
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
                   
                        <p>Kelas</p>
                        <b><p><?= $key['nama_kelas']; ?></p></b>
                        
                       
                        
                       
                          <input type="hidden" name="id" value="<?= $key['id'] ?>" class="form-control" hidden>
                          </div>
                         
                        </div>
                        <div class="modal-footer">
                          <button type="submit" name="hapus-siswa" class="btn btn-danger">Hapus</button>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        </div>
                      </div>
                    </div>
                  </div>
                    </form><br>
                    <!-- Trigger Modal Edit -->
                  <div data-toggle="modal" data-target="#edit-siswa<?= $key['id'] ?>">
                  <button type="button" class="btn btn-info datapotensi" data-toggle="tooltip" title="Edit">
                    <i class="fa fa-edit"></i>
                  </button>
                </div>

                              <!-- Modal Edit-->
          <div class="modal fade" id="edit-siswa<?= $key['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="edit-siswa<?= $key['id'] ?>" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  <b><p class="modal-title" id="edit-siswa<?= $key['id'] ?>" style="text-align: center; font-size: 18px;">Edit Data Siswa</p></b>
                </div>
                <div class="modal-body">
                 <form action="" method="POST" enctype="multipart/form-data">
                  <input type="hidden" value="<?= $key['id'];?>" name="id">
  <div class="form-group">
    <label>Nama Kelas</label>
    <input type="text" class="form-control" value="<?= $key['nama_kelas'];?>" id="exampleInputEmail1" name="nama_kelas" aria-describedby="emailHelp" placeholder="Masukkan nama">
    <small class="form-text text-muted">Masukkan nama kelas</small>
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
                              <?php endforeach; ?>