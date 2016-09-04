<?php
include'../../class/supplier_class.php';
include'../../class/function.php';
$db = new Database();
$db->connectMySQL();
$supplier = new supplier();
$harga = new harga();
$datafile = new datafile();
$material = new material();
$mat = $material->bacamat($id_mat);
?>
<div class="alert alert-success" role="alert">
<?php echo $mat['nm_mat']; ?> || <?php echo $mat['nm_supp']; ?>
</div>
  <div class="form-group">
            <label for="recipient-name" class="control-label">Nama Gambar</label>
            <input type="hidden" class="form-control" name="id_mat" value="<?php echo $_GET['id_mat']; ?>" required>
            <input type="text" class="form-control" name="nama_file" required>
          </div>
           <div class="form-group">
          <label class="btn btn-success btn-file">
          Pilih File <input type="file" name="gambar" style="display: none;">&nbsp;&nbsp;<span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>
          </label>
          </div>

          
    