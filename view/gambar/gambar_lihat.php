<?php
include'../../class/supplier_class.php';
include'../../class/function.php';
$db = new Database();
$db->connectMySQL();
$supplier = new supplier();
$harga = new harga();
$material = new material();
$datafile = new datafile();
$mat = $material->bacamat($id_mat);

?>
<div class="alert alert-success" role="alert">
<?php echo $mat['nm_mat']; ?> || <?php echo $mat['nm_supp']; ?>
</div>
 <div class="row">
         <?php
      $arraytampilDatafile=$datafile->tampilDatafile($id_mat);
      if (count($arraytampilDatafile)) {
      foreach($arraytampilDatafile as $d) {
    ?>
   
  <div class="col-sm-6 col-md-4">
    <a href="#" class="thumbnail">
      <img src="file_gambar/<?php echo $d['gambar']; ?>" alt="...">
    </a>
    <a class="btn btn-danger btn-xs" href="?aksi=hapus&kode_file=<?php echo $d['kode_file'];?>" role="button"><span class=" glyphicon glyphicon-trash" aria-hidden="true"></span>&nbsp;Delete</a>
    <a class="btn btn-success btn-xs" href="" role="button"><span class=" glyphicon glyphicon-picture" aria-hidden="true"></span>&nbsp;<?php echo $d['nama_file']; ?></a>

  </div>
      <?php 
  }
}
?>
</div>



