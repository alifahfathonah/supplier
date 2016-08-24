<?php
include'../../class/supplier_class.php';
include'../../class/function.php';
$db = new Database();
$db->connectMySQL();
$supplier = new supplier();
$harga = new harga();
?>
  <div class="form-group">
            <label for="recipient-name" class="control-label">Harga</label>
            <input type="hidden" class="form-control" name="id_mat" value="<?php echo $_GET['id_mat']; ?>" required>
            <input type="text" class="form-control" name="harga" required>
          </div>
           <div class="form-group">
            <label for="recipient-name" class="control-label">Catatan</label>
            <input type="text" class="form-control" name="note" required>
          </div>
            <div class="form-group">
            <label for="recipient-name" class="control-label">Tanggal Update</label>
            <input type="text" class="form-control" name="date_up" id="datepicker" required>
          </div>
          
    