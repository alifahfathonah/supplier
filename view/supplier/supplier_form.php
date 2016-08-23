<?php
include'../../class/supplier_class.php';
include'../../class/function.php';
$db = new Database();
$db->connectMySQL();
$supplier = new supplier();
?>
   <div class="form-group">
            <label for="recipient-name" class="control-label"><span class="label label-success">Nama SUpplier</span></label>
            <input type="hidden" class="form-control" name="id_supp" value="<?php echo kdauto("supplier","SUP"); ?>">
            <input type="text" class="form-control" name="nm_supp" required>
          </div>
           <div class="form-group">
            <label for="recipient-name" class="control-label">Alamat lengkap</label>
            <input type="text" class="form-control" name="alamat" required>
          </div>
            <div class="form-group">
            <label for="recipient-name" class="control-label">No Telpon</label>
            <input type="text" class="form-control" name="telp" required>
          </div>
            <div class="form-group">
            <label for="recipient-name" class="control-label">Nomor Fax</label>
            <input type="text" class="form-control" name="fax" required>
          </div>
               <div class="form-group">
            <label for="recipient-name" class="control-label">Rekening</label>
            <input type="text" class="form-control" name="rek" required>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="control-label">Email</label>
            <input type="text" class="form-control" name="email" required>
            <input type="hidden" class="form-control" name="date_input" value="<?php echo date('y-m-d'); ?>" required>
          </div>