 <?php
include'../../class/supplier_class.php';
include'../../class/function.php';
$db = new Database();
$db->connectMySQL();
$supplier = new supplier();
$material = new material();
?>
 <table id="example" class="table table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nama Material</th>
        <th>Satuan</th>
        <th>Harga</th>
        <th>Supplier</th>
        <th>Telpon</th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
     <?php
      $arraymat=$material->showmat();
      if (count($arraymat)) {
      foreach($arraymat as $d) {
    ?>
      <tr>
        <td><?php echo $d['id_mat']; ?></td>
        <td><?php echo $d['nm_mat']; ?></td>
        <td><?php echo $d['satuan']; ?></td>
        <td>10.000.000</td>
        <td><?php echo $d['nm_supp']; ?></td>
        <td><?php echo $d['telp']; ?></td>
        <td></td>
        <td></td>
        <td></td>
        <td><a href="?r=fpk&pg=fpk_edit&id_fpk=10001" class="btn btn-warning btn-xs disabled" role="button">Edit</a></td>
        
      </tr>
<?php 
}
}
?>
    </tbody>
  </table>
 <a class="btn btn-default btn-xs add-material" href="?r=fpk&pg=fpk_form" role="button">Tambah Data</a>


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