<?php
include'../../class/supplier_class.php';
include'../../class/function.php';
$db = new Database();
$db->connectMySQL();
$supplier = new supplier();
?>
 <table id="example" class="table table-hover">
    <thead>
      <tr>
        <th>ID SUPP</th>
        <th>NAMA SUPPLIER</th>
        <th>ALAMAT</th>
        <th>TELP</th>
        <th>FAX</th>
        <th>REK</th>
        <th>EMAIL</th>
        <th>DATE INPUT</th>
        <th>AKSI</th>
      </tr>
    </thead>
    <tbody>
         <?php
      $arraysupplier=$supplier->showsupp();
      if (count($arraysupplier)) {
      foreach($arraysupplier as $d) {
    ?>
      <tr>
        <td><?php echo $d['id_supp']; ?></td>
        <td><?php echo $d['nm_supp']; ?></td>
        <td><?php echo $d['alamat']; ?></td>
        <td><?php echo $d['telp']; ?></td>
        <td><?php echo $d['fax']; ?></td>
        <td><?php echo $d['rek']; ?></td>
        <td><?php echo $d['email']; ?></td>
        <td><?php echo $d['date_input']; ?></td>
        <td><a href="" data-id="<?php echo $d['id_supp']; ?>" class="btn btn-primary btn-xs ubah-supplier" role="button">Ubah</a></td>
        
      </tr>
      <?php 
  }
}
?>
    </tbody>
  </table>
 <a class="btn btn-primary btn-xs add-supplier" href="?r=fpk&pg=fpk_form" role="button">Tambah Data</a>
<!-- MODAL FORM SUPPLIER -->
<div class="modal fade" id="modal-supplier" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                        <input type="submit" name="simpan" value="Simpan" class="btn btn-default" >
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                        
                    </div>
                </div>
                </form>
<?php
 if($_POST['simpan']){
  $supplier->addsupp(
  $_POST['id_supp'],  
  $_POST['nm_supp'],
  $_POST['alamat'],
  $_POST['telp'],
  $_POST['fax'],
  $_POST['rek'],
  $_POST['email'],
  $_POST['date_input']);
  echo"<meta http-equiv='refresh' content='0;url=?r=supplier&pg=supplier'>";
 }
?>
            </div>
        </div>

        <!-- MODAL UBAH DATA SUPPLIER -->
<div class="modal fade" id="modal-ubah-supplier" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <form action="" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel"></h4>
                    </div>
                    <div class="modal-body">
                    </div>
                    <div class="modal-footer">
                        <input type="submit" name="update_supp" value="Update data" class="btn btn-primary" >
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        
                    </div>
                </div>
                </form>
<?php
 if($_POST['update_supp']){
  $supplier->updatesupp(
  $_POST['id_supp'],  
  $_POST['nm_supp'],
  $_POST['alamat'],
  $_POST['telp'],
  $_POST['fax'],
  $_POST['rek'],
  $_POST['email'],
  $_POST['date_input']);
  echo"<meta http-equiv='refresh' content='0;url=?r=supplier&pg=supplier'>";
 }
?>
            </div>
        </div>

