<?php 
  error_reporting(0);
  class Database {
  private $dbHost="localhost";
  private $dbUser="hendri";
  private $dbPass="900973";
  private $dbName="59. supplier";
  function connectMySQL() {
  mysql_connect($this->dbHost, $this->dbUser, $this->dbPass);
  mysql_select_db($this->dbName) or die ("Database Tidak Ditemukan di Server"); 
  }
  }

  class User
  {
    
    function cek_login($user_id, $password) 
      {
        #untuk memastikan user id yang di input adalah tipe data integer karena id_kelomok terdiri dari angka
        #untuk salah satu pencegahan sql injection
        $user_id = (int)$_POST['user_id'];
        $password = md5($password);
        $result = mysql_query("SELECT * FROM user WHERE user_id='$user_id' AND password='$password'");
        $user_data = mysql_fetch_array($result);
        $no_rows = mysql_num_rows($result);
        if ($no_rows == 1) 
        {
          $_SESSION['login'] = TRUE;
          $_SESSION['user_id'] = $user_data['user_id'];
          $_SESSION['nm_lengkap'] = $user_data['nm_lengkap'];
          $_SESSION['level'] = $user_data['level'];
          return TRUE;
        }
          else 
            {
              return FALSE;
            }
      }
    // Ambil Sesi 
    function get_sesi() 
      {
        return $_SESSION['login'];
      }
  
    // Logout 
    function user_logout()
      {
        $_SESSION['login'] = FALSE;
        session_destroy();
      }
    }
 /**
 * 
 */

 class Supplier {
     function addsupp($id_supp,$nm_supp,$marketing,$alamat,$telp,$fax,$rek,$email,$date_input)
    {
      $query="INSERT INTO supplier (id_supp,nm_supp,marketing,alamat,telp,fax,rek,email,date_input)
      VALUES('$id_supp','$nm_supp','$marketing','$alamat','$telp','$fax','$rek','$email','$date_input')";
      $hasil=mysql_query($query);
    }
      function showsupp(){
    $query = mysql_query("SELECT * FROM supplier ORDER BY nm_supp");
    while($row=mysql_fetch_array($query))
      $data[]=$row;
    if(isset($data)){
      return $data;
    }
 }
    function bacasupp($id_supp)
      {
      $query=mysql_query("SELECT * FROM supplier WHERE id_supp='$_GET[id_supp]'");
      $data=mysql_fetch_array($query);
      $data[]=$row;
      if(isset($data)){
        return $data;
      }
    }
    function updatesupp($id_supp,$nm_supp,$marketing,$alamat,$telp,$fax,$rek,$email,$date_input){
      $query=mysql_query("UPDATE supplier SET nm_supp='$nm_supp',marketing='$marketing',alamat='$alamat',telp='$telp', fax='$fax', rek='$rek',
        email='$email', date_input='$date_input' WHERE id_supp='$id_supp'");
    }
}
   class Material {
     function addmaterial($id_mat,$id_supp,$nm_mat,$satuan,$keyword)
    {
      $query="INSERT INTO material (id_mat,id_supp,nm_mat,satuan,keyword)
      VALUES('$id_mat','$id_supp','$nm_mat','$satuan','$keyword')";
      $hasil=mysql_query($query);
    }
      function showmat(){
    $query = mysql_query("SELECT a.*, b.*
     # (SELECT harga AS hrg FROM harga WHERE harga.id_mat=a.id_mat)hrg
     FROM material a, supplier b WHERE a.id_supp=b.id_supp ORDER BY b.id_supp");
    while($row=mysql_fetch_array($query))
      $data[]=$row;
    if(isset($data)){
      return $data;
    }
 }
    function bacamat($id_mat)
      {
      $query=mysql_query("SELECT a.*, b.* FROM material a, supplier b WHERE a.id_supp=b.id_supp AND id_mat='$_GET[id_mat]'");
      $data=mysql_fetch_array($query);
      $data[]=$row;
      if(isset($data)){
        return $data;
      }
    }
    function updatemat($id_mat,$id_supp,$nm_mat,$satuan,$keyword){
      $query=mysql_query("UPDATE material SET id_supp='$id_supp',nm_mat='$nm_mat',satuan='$satuan', keyword='$keyword' WHERE id_mat='$id_mat'");
    }
}
class Harga {
   function addharga($id_mat,$harga,$note,$date_up)
    {
      $query="INSERT INTO harga (id_mat,harga,note,date_up)
      VALUES('$id_mat','$harga','$note','$date_up')";
      $hasil=mysql_query($query);
    }
        function showharga($id_mat){
    $query = mysql_query("SELECT a.* FROM harga a WHERE a.id_mat='$_GET[id_mat]'");
    while($row=mysql_fetch_array($query))
      $data[]=$row;
    if(isset($data)){
      return $data;
    }
  }

}

class Datafile  {
  
  function tambahDatafile($id_mat,$nama_file,$gambar)
      {
      $query="INSERT INTO datafile(id_mat,nama_file,gambar)
      VALUES('$id_mat','$nama_file','$gambar')";
      move_uploaded_file($_FILES['gambar']['tmp_name'],"file_gambar/".$gambar);
      #if ($_FILES['gambar']['name']) {
      #     $newname = "file_gambar/".date('YmdHis_').$_FILES['gambar']['name'];
      #     $copied = copy($_FILES['gambar']['tmp_name'], $newname);
      #if(!$copied){
      #echo "error";
      #}
      #}
      $hasil= mysql_query($query);
  }
      function tampilDatafile($id_mat) {
      $query = mysql_query("SELECT * FROM datafile WHERE id_mat='$_GET[id_mat]' ");
      while($row=mysql_fetch_array($query))
      $data[]=$row;
      return $data;
  }

  function bacaDatafile ($kode_file){
  $query=mysql_query("SELECT * FROM datafile WHERE kode_file='$_GET[kode_file]'");
  $data=mysql_fetch_array($query);
      $data[]=$row;
      if(isset($data)){
        return $data;
      }
  }
  //update data file
  function updateDatafile ($kode_file,$id_mat,$nama_file,$gambar){
  if (empty($gambar)){
      $query=mysql_query("UPDATE datafile SET
      id_mat='$id_mat',nama_file='$nama_file'WHERE kode_file='$kode_file'");
      $hasil= mysql_query($query);
       echo"<meta http-equiv='refresh' content='0;url=?page=datafile/file_view&id_mat=".$_GET['id_mat']."'>";
  }
  else 
  {
      $query=mysql_query("UPDATE datafile SET
      id_mat='$id_mat',nama_file='$nama_file',gambar='$gambar' WHERE kode_file='$kode_file'");
      move_uploaded_file($_FILES['gambar']['tmp_name'],"file_gambar/".$gambar);
      $hasil= mysql_query($query);
       echo"<meta http-equiv='refresh' content='0;url=?page=datafile/file_view&id_mat=".$_GET['id_mat']."'>";
  }
  }
  function hapusfile($kode_file) {
    $query = mysql_query("DELETE FROM datafile WHERE kode_file='$kode_file'");
  }
  }


  class Menu
  {
      function tampilMenu(){
    $query = mysql_query("SELECT * FROM menu ORDER BY id_menu,parent");
    while($row=mysql_fetch_array($query))
      $data[]=$row;
    if(isset($data)){
      return $data;
    }
  }
    
      function tambahMenu($id_menu,$title, $folder,$link, $level,$parent, $icon, $urut) {
    $query = "INSERT INTO menu (id_menu,title, folder, link,level, parent, icon, urut)
              VALUES ('$id_menu','$title', '$folder', '$link', '$level', '$parent', '$icon', '$urut')";
    $hasil = mysql_query($query);
  }

    function comboParent(){
    $query =  mysql_query("select id_menu,title from menu where parent='0'");
    while($row=mysql_fetch_array($query))
      $data[]=$row;
    if(isset($data)){
      return $data;
    }
  }
    function bacaMenu($id_menu)
      {
      $query=mysql_query("SELECT * FROM menu WHERE id_menu='$_GET[id_menu]'");
      $data=mysql_fetch_array($query);
      $data[]=$row;
      if(isset($data)){
        return $data;
      }
    }
     function updateMenu ($id_menu,$title, $folder,$link, $level,$parent, $icon, $urut)
    {
      $query=mysql_query("UPDATE menu SET title='$title', folder='$folder',link='$link',level='$level',parent='$parent',
        icon='$icon',urut='$urut'  WHERE id_menu='$id_menu'");
    }
  function menuNavigasi($user){
    $menu = mysql_query("select * from menu where parent='0'");
    #$menu = mysql_query("SELECT a.username,b.id_menu,b.baca,b.tulis,c.* FROM ms_user a, ms_menu_user b, ms_menu c WHERE a.username=b.username AND b.id_menu=c.id_menu AND a.username ='$user' AND b.baca='Y' AND c.parent='0' AND a.blokir='N' ORDER BY urut ASC");
    while($row=mysql_fetch_array($menu))
      $data[]=$row;
    if (isset($data)){
      return($data);
    }
  }
  function subMenuNavigasi($menu,$user){
    //$smenu = mysql_query("select * from ms_menu where parent='$menu' order by urut asc");
    $smenu = mysql_query("select * from menu where parent='$menu'");
    $ada    = mysql_num_rows($smenu);
    if($ada==0){
      $data[]=$ada;
      if (isset($data)){
        return false;
      } 
    }else{
      while($row=mysql_fetch_array($smenu))
        $data[]=$row;
      if (isset($data)){
        return($data);
      }
    }
  }
  }

function rupiah($nilai, $pecahan = 0) {
    return number_format($nilai, $pecahan, ',', '.');
}
  

?>
