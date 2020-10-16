<?php 
$koneksi = mysqli_connect('localhost', 'root', '', 'tabungan_siswa');
global $koneksi;

$batas = 5;
$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
$halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;

$previous = $halaman - 1;
$next = $halaman + 1;

$data = mysqli_query($koneksi, "SELECT * FROM tb_tabungan");
$jumlah_data = mysqli_num_rows($data);
$total_halaman = ceil($jumlah_data / $batas);

$data_tabungan = mysqli_query($koneksi, "SELECT * FROM tb_tabungan LIMIT $halaman_awal, $batas");
$nomor = $halaman_awal+1;

foreach ($data_tabungan as $tab):
  ?>

     <tr>
                              <td><?= $i++;?></td>
                              
                              <td><?=  $tab['nama'];?></td>
                              <td><?=  $tab['kelas'];?></td>
                             <td><?=rupiah($tab['saldo']);?></td> 
                              <!--  <td><?= $tab['jumlah_setoran'] - $tab['jumlah_penarikan']; ?></td> -->
                             

                              
                              <td>
                                <!-- Trigger Modal Hapus -->
                              <div data-toggle="modal" data-target="#hapus-admin<?= $tab['id_tabungan'] ?>">
                              <button type="button" class="btn btn-danger datapotensi" data-toggle="tooltip" title="Hapus">
                              <i class="fa fa-trash"></i>
                              </button>
                              </div>

                              <!-- Modal Hapus -->
                            <form action="" method="POST">
                      <div class="modal fade" id="hapus-admin<?= $tab['id_tabungan'] ?>" tabindex="-1" role="dialog" aria-labelledby="hapus-admin<?= $tab['id_tabungan'] ?>" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <b><p class="modal-title" id="hapus-admin<?= $tab['id_tabungan'] ?>" style="text-align: center; font-size: 18px;">Apakah anda yakin ingin dihapus?</p></b>
                        </div>
                        <div class="modal-body">
                          <div class="modal-body">
                   
                          <P>ID tabungan</P>
                          <b><p><?= $tab['id_tabungan']; ?></p></b>

                          <p>Nama</p>
                          <b><p><?= $tab['nama'];?></p></b>

                          <p>Kelas</p>
                          <b><p><?= $tab['kelas'];?></p></b>

                          <p>Saldo</p>
                          <b><p><?=rupiah($tab['saldo']);?></p></b>
                        
                       
                        
                       
                          <input type="hidden" name="id_tabungan" value="<?= $tab['id_tabungan'] ?>" class="form-control" hidden>
                          </div>
                         
                        </div>
                        <div class="modal-footer">
                          <button type="submit" name="hapus-tabungan" class="btn btn-danger">Hapus</button>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        </div>
                      </div>
                    </div>
                  </div>
                    </form><br>

                    <!-- Trigger Lihat Detail -->
                  <div data-toggle="modal" data-target="#edit-siswa<?= $tab['id_tabungan'] ?>">
                  <button type="button" class="btn btn-info datapotensi" data-toggle="tooltip" title="Edit">
                    <i class="fa fa-eye"></i>
                  </button>
                </div>

                              <!-- Modal Lihat Detail-->
          <div class="modal fade" id="edit-siswa<?= $tab['id_tabungan'] ?>" tabindex="-1" role="dialog" aria-labelledby="edit-siswa<?= $tab['id_tabungan'] ?>" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  <b><p class="modal-title" id="edit-siswa<?= $tab['id_tabungan'] ?>" style="text-align: center; font-size: 18px;">Lihat Detail Tabungan</p></b>
                </div>
                <div class="modal-body">
                 
   <P>ID tabungan</P>
                          <b><p><?= $tab['id_tabungan']; ?></p></b>

                          <p>Nama</p>
                          <b><p><?= $tab['nama'];?></p></b>

                          <p>Kelas</p>
                          <b><p><?= $tab['kelas'];?></p></b>

                          <p>Setoran</p>
                          <b><p><?= rupiah($tab['setoran']);?></p></b>

                          <p>Penarikan</p>
                          <b><p><?=rupiah($tab['penarikan']);?></p></b>


                          <p>Saldo</p>
                          <b><p><?=rupiah($tab['saldo']);?></p></b>
                        

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a target="_blank" href="index.php?m=tabungan&s=print&id_siswa=<?= $tab['id_siswa'];?>"><button type="submit" name="edit" class="btn btn-primary">Print</button></a>
      </div>
       
                </div>
              </div>
            </div>

                              </td>
                              </tr>
                            <?php endforeach; ?>
                              
