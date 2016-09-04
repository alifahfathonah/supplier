 <?php
include'../../class/supplier_class.php';
include'../../class/function.php';
$db = new Database();
$db->connectMySQL();
$supplier = new supplier();
$material = new material();
$datafile = new datafile();
$harga = new harga();
if (isset($_GET['aksi']))
{
  if ($_GET['aksi'] == 'hapus')
  {
    // baca ID dari parameter ID nasabah yang akan dihapus
    $kode_file = $_GET['kode_file'];
    // proses hapus data nasabah berdasarkan ID via method
    $datafile->hapusfile($kode_file);  
  }
}
?>
 <table id="example" class="table table-hover">
    <thead>
      <tr>
        <th>Supplier</th>
        <th>Marketing</th>
        <th>Telpon</th>
        <th>Nama Material / Barang / Jasa</th>
        <th>Satuan</th>
        <th>Img</th>
        <th>Harga</th>
        <th>Ubah</th>
      </tr>
    </thead>
    <tbody>
     <?php
      $arraymat=$material->showmat();
      if (count($arraymat)) {
      foreach($arraymat as $d) {
    ?>
      <tr>
         <td>
          <button type="button" class="btn btn-info btn-xs d-supplier" data-id="<?php echo $d['id_supp']; ?>">
          <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>
          </button>
          <?php echo $d['nm_supp']; ?></td>
          <td><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span> <?php echo $d['marketing']; ?></td>
          <td><?php echo $d['telp']; ?></td>
        <td><?php echo $d['nm_mat']; ?><input type="hidden" value="<?php echo $d['keyword']; ?>"></td>
        <td><?php echo $d['satuan']; ?></td>
        <td>
          <button type="button" class="btn btn-info btn-xs lihat-gambar" data-id="<?php echo $d['id_mat']; ?>">
          <span class="glyphicon glyphicon-camera" aria-hidden="true"></span>
          </button>
          <button type="button" class="btn btn-info btn-xs upload-gambar" data-id="<?php echo $d['id_mat']; ?>">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
          </button>
          

        </td>
        <td>
          <button type="button" class="btn btn-success btn-xs add-harga" data-id="<?php echo $d['id_mat']; ?>">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
          </button>
          <button type="button" class="btn btn-success btn-xs detail-harga" data-id="<?php echo $d['id_mat']; ?>">
          <span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span>
          </button>
        </td>
       
        
        <td>
          <button type="button" class="btn btn-info btn-xs ubah-material" data-id="<?php echo $d['id_mat']; ?>">
          <span class="glyphicon glyphicon-link" aria-hidden="true"></span>
          </button>
      </tr>
<?php 
}
}
?>
    </tbody>
  </table>
 <a class="btn btn-primary btn-xs add-material" href="?r=fpk&pg=fpk_form" role="button">Tambah Data</a>


<!-- MODAL FORM SUPPLIER -->
<div class="modal fade" id="modal-material" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <form action="" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel"></h4>
                    </div>
                    <div class="modal-body">
                    </div>
                    <div class="modal-footer">
                        <input type="submit" name="simpan" value="Simpan" class="btn btn-primary" >
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        
                    </div>
                </div>
                </form>
<?php
 if($_POST['simpan']){
  $material->addmaterial(
  $_POST['id_mat'],  
  $_POST['id_supp'],
  $_POST['nm_mat'],
  $_POST['satuan'],
  $_POST['keyword']);
  echo"<meta http-equiv='refresh' content='0;url=?r=material&pg=material'>";
 }
?>
            </div>
        </div>

        <!-- MODAL UBAH DATA SUPPLIER -->
<div class="modal fade" id="modal-ubah-material" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <form action="" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel"></h4>
                    </div>
                    <div class="modal-body">
                    </div>
                    <div class="modal-footer">
                        <input type="submit" name="update_mat" value="Update data" class="btn btn-primary" >
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        
                    </div>
                </div>
                </form>
<?php
 if($_POST['update_mat']){
  $material->updatemat(
  $_POST['id_mat'],  
  $_POST['id_supp'],
  $_POST['nm_mat'],
  $_POST['satuan'],
  $_POST['keyword']);
  echo"<meta http-equiv='refresh' content='0;url=?r=material&pg=material'>";
 }
?>
            </div>
        </div>

            <!-- MODAL HARGA MATERIAL -->
<div class="modal fade" id="modal-harga" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <form action="" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel"></h4>
                    </div>
                    <div class="modal-body">
                    </div>
                    <div class="modal-footer">
                        <input type="submit" name="add_harga" value="Tambah Harga" class="btn btn-primary" >
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        
                    </div>
                </div>
                </form>
<?php
 if($_POST['add_harga']){
  $harga->addharga(
  #$_POST['id_harga'],
  $_POST['id_mat'],  
  $_POST['harga'],
  $_POST['note'],
  $_POST['date_up']);
  echo"<meta http-equiv='refresh' content='0;url=?r=material&pg=material'>";
 }
?>
            </div>
        </div>
        <div class="modal fade" id="modal-detail-harga" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <form action="" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel"></h4>
                    </div>
                    <div class="modal-body">
                    </div>
                    <div class="modal-footer">
                        
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        
                    </div>
                </div>
                </form>

            </div>
        </div>
          <!--MODAL DETAIL SUPPLIER -->
           <div class="modal fade" id="modal-detail-supplier" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <form action="" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel"></h4>
                    </div>
                    <div class="modal-body">
                    </div>
                    <div class="modal-footer">
                        
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        
                    </div>
                </div>
                </form>

            </div>
        </div>
        <!--MODAL UPLOAD GAMBAR  -->
           <div class="modal fade" id="modal-upload-gambar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
             <form action="" method="post" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel"></h4>
                    </div>
                    <div class="modal-body">
                    </div>
                    <div class="modal-footer">
                         <input type="submit" name="upload_gambar" value="Upload Gambar" class="btn btn-success" >
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>                      
                    </div>
                </div>
                </form>
                  <?php
                      if($_POST['upload_gambar']){
                      $id_mat=$_POST['id_mat'];
                      $nama_file=$_POST['nama_file'];
                      $gambar=$id_mat."_".$_FILES['gambar']['name'];
                      $datafile->tambahDatafile($id_mat,$nama_file,$gambar);
                      }
                      ?>

            </div>
        </div>
        <!--MODAL UPLOAD GAMBAR  -->
           <div class="modal fade" id="modal-lihat-gambar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
             <form action="" method="post" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel"></h4>
                    </div>
                    <div class="modal-body">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>                      
                    </div>
                </div>
                </form>
            </div>
        </div>