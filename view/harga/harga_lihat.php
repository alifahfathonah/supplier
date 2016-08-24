<?php
include'../../class/supplier_class.php';
include'../../class/function.php';
$db = new Database();
$db->connectMySQL();
$supplier = new supplier();
$harga = new harga();
?>
 <table id="example" class="table table-hover">
    <thead>
      <tr>
        <th>Material</th>
        <th>Harga</th>
        <th>Tgl Update</th>
        <th>Note</th>
      </tr>
    </thead>
    <tbody>
         <?php
      $arrayharga=$harga->showharga($id_mat);
      if (count($arrayharga)) {
      foreach($arrayharga as $d) {
    ?>
      <tr>
        <td><?php echo $d['id_mat']; ?></td>
        <td><?php echo rupiah($d['harga']); ?></td>
        <td><?php echo dateToindo($d['date_up']); ?></td>
        <td><?php echo $d['note']; ?></td>
      </tr>
      <?php 
  }
}
else {
  echo '<div class="alert alert-danger" role="alert">Opps !!! Datane ora ono !</div>';
}
?>
    </tbody>
  </table>
