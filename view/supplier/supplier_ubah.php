<?php
include'../../class/supplier_class.php';
include'../../class/function.php';
$db = new Database();
$db->connectMySQL();
$supplier = new supplier();
$d  = $supplier->bacasupp($id_supp);
?>
   <div class="form-group">
            <label for="recipient-name" class="control-label"><span class="label label-success">Nama SUpplier</span></label>
            <input type="hidden" class="form-control" name="id_supp" value="<?php echo $d['id_supp']; ?>">
            <input type="text" class="form-control" name="nm_supp" value="<?php echo $d['nm_supp']; ?>" required>
          </div>
           <div class="form-group">
            <label for="recipient-name" class="control-label">Alamat lengkap</label>
            <input type="text" class="form-control" name="alamat" value="<?php echo $d['alamat']; ?>" required>
          </div>
            <div class="form-group">
            <label for="recipient-name" class="control-label">No Telpon</label>
            <input type="text" class="form-control" name="telp" value="<?php echo $d['telp']; ?>"required>
          </div>
            <div class="form-group">
            <label for="recipient-name" class="control-label">Nomor Fax</label>
            <input type="text" class="form-control" name="fax" value="<?php echo $d['fax']; ?>" required>
          </div>
               <div class="form-group">
            <label for="recipient-name" class="control-label">Rekening</label>
            <input type="text" class="form-control" name="rek" value="<?php echo $d['rek']; ?>"  required>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="control-label">Email</label>
            <input type="text" class="form-control" name="email" value="<?php echo $d['email']; ?>" required>
            <input type="hidden" class="form-control" name="date_input" value="<?php echo $d['date_input']; ?>" required>
          </div>