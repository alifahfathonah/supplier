<?php
include'../../class/supplier_class.php';
include'../../class/function.php';
$db = new Database();
$db->connectMySQL();
$supplier = new supplier();
?>
   <div class="form-group">
            <label for="recipient-name" class="control-label"><span class="label label-success">Nama Material</span></label>
            <input type="hidden" class="form-control" name="id_mat" value="<?php echo kdauto("material","MAT"); ?>">
            <input type="text" class="form-control" name="nm_mat" required>
          </div>
           <div class="form-group">
            <label for="recipient-name" class="control-label">Satuan</label>
            <input type="text" class="form-control" name="satuan" required>
          </div>
            <div class="form-group">
            <label for="recipient-name" class="control-label">Keyword</label>
            <input type="text" class="form-control" name="keyword" required>
          </div>
             <div class="form-group">
            <label for="recipient-name" class="control-label">Supplier</label>
            <select required class="form-control" name="id_supp">
            <option value="">Pilih Supplier</option>
              <?php
                $arraysupplier=$supplier->showsupp();
                if (count($arraysupplier)) {
                foreach($arraysupplier as $d) {
                 ?>
                    <option value="<?php echo $d['id_supp']?>"><?php echo $d['nm_supp'];?></option>
                    <?php 
                        }
                      }
                    ?>
             
            </select>
          </div>

    