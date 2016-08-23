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

 class Ujian {
     function tambahsoal($id_soal,$id_app,$pertanyaan,$pil_a,$pil_b,$pil_c,$pil_d,$jawaban,$stat,$id_unit)
    {
      $query="INSERT INTO soal_ujian (id_soal,id_app,pertanyaan,pil_a,pil_b,pil_c,pil_d,jawaban,stat,id_unit)
      VALUES('$id_soal','$id_app','$pertanyaan','$pil_a','$pil_b','$pil_c','$pil_d','$jawaban','$stat','$id_unit')";
      $hasil=mysql_query($query);
    }
      function tampilsoal(){
    $query = mysql_query("SELECT a.*, b.* FROM soal_ujian a, unit b WHERE a.id_unit=b.id_unit");
    while($row=mysql_fetch_array($query))
      $data[]=$row;
    if(isset($data)){
      return $data;
    }
 }
      function tes_soal(){
    $query = mysql_query("SELECT a.*, b.*,
    (SELECT COUNT(id_soal) AS total FROM soal_ujian WHERE id_unit=$_GET[unit]) total
     FROM soal_ujian a, unit b WHERE a.id_unit=b.id_unit AND a.id_unit=$_GET[unit]");
    #$jumlah=mysql_num_rows($query);
    while($row=mysql_fetch_array($query))
      $data[]=$row;
    if(isset($data)){
      return $data;
    }
 }
    function bacasoal($id_soal)
      {
      $query=mysql_query("SELECT a.*, b.* FROM soal_ujian a, unit b WHERE a.id_unit=b.id_unit AND id_soal='$_GET[id_soal]'");
      $data=mysql_fetch_array($query);
      $data[]=$row;
      if(isset($data)){
        return $data;
      }
    }
    function updatesoal($id_soal,$id_app,$pertanyaan,$pil_a,$pil_b,$pil_c,$pil_d,$jawaban,$stat,$id_unit){
      $query=mysql_query("UPDATE soal_ujian SET id_app='$id_app',pertanyaan='$pertanyaan',pil_a='$pil_a', pil_b='$pil_b', pil_c='$pil_c',
        pil_d='$pil_d', jawaban='$jawaban', stat='$stat', id_unit='$id_unit' WHERE id_soal='$id_soal'");
    }
}
 class pelamar
 {
  function log_melamar($username, $password) 
      {
        #untuk memastikan user id yang di input adalah tipe data integer karena id_kelomok terdiri dari angka
        #untuk salah satu pencegahan sql injection
        $username = $_POST['username'];
        $password = md5($password);
        $result = mysql_query("SELECT * FROM pelamar WHERE username='$username' AND password='$password'");
        $pelamar_data = mysql_fetch_array($result);
        $no_rows = mysql_num_rows($result);
        if ($no_rows == 1) 
        {
          $_SESSION['login'] = TRUE;
          $_SESSION['username'] = $pelamar_data['username'];
          $_SESSION['nama'] = $pelamar_data['nama'];
          $_SESSION['id_pelamar'] = $pelamar_data['id_pelamar'];
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
    function pelamar_logout()
      {
        $_SESSION['login'] = FALSE;
        session_destroy();
      }
   
        function addpelamar($id_pelamar,$email,$username,$nama,$jekel,$tgl_lahir,$tempat_lahir,$pendidikan,$agama,$kewarganegaraan,$alamat,$hp,$stat,$password,$foto,$date_reg)
    {
      $query="INSERT INTO pelamar (id_pelamar,email,username,nama,jekel,tgl_lahir,pendidikan,tempat_lahir,agama,kewarganegaraan,alamat,hp,stat,password,foto,date_reg)
      VALUES('$id_pelamar','$email','$username','$nama','$jekel','$tgl_lahir','$pendidikan','$tempat_lahir','$agama','$kewarganegaraan','$alamat','$hp','$stat','$password','$foto','$date_reg')";
      $hasil=mysql_query($query);
    }
        function updatepelamar($id_pelamar,$email,$username,$nama,$jekel,$tgl_lahir,$pendidikan,$tempat_lahir,$agama,$kewarganegaraan,$alamat,$hp,$stat,$password,$foto,$date_reg){
    $query=mysql_query("UPDATE pelamar SET email='$email', username='$username', nama='$nama', jekel='$jekel', tgl_lahir='$tgl_lahir', pendidikan='$pendidikan',  tempat_lahir='$tempat_lahir',
     agama='$agama', kewarganegaraan='$kewarganegaraan', alamat='$alamat', hp='$hp', 
      stat='$stat', password='$password',foto='$foto', date_reg='$date_reg' WHERE id_pelamar='$id_pelamar'");
    move_uploaded_file($_FILES['foto']['tmp_name'],"file_foto/".$foto);
    }
    function tampilpelamar(){
    $query = mysql_query("SELECT * FROM pelamar");
    while($row=mysql_fetch_array($query))
      $data[]=$row;
    if(isset($data)){
      return $data;
    }
 }
    function bacapelamar($id_pelamar)
      {
      $query=mysql_query("SELECT * FROM pelamar WHERE id_pelamar='$_GET[id_pelamar]'");
      $data=mysql_fetch_array($query);
      $data[]=$row;
      if(isset($data)){
        return $data;
      }
    }
}
   class Fpk
  {
    
    function tambahfpk($id_fpk,$user_id,$id_unit,$jabatan,$jml_keb,$jekel,$usia1,$usia2,$pendidikan,$pengalaman,$deskripsi,$alasan,$tgl_fpk,$approve)
    {
      $query="INSERT INTO fpk (id_fpk,user_id,id_unit,jabatan,jml_keb,jekel,usia1,usia2,pendidikan,pengalaman,deskripsi,alasan,tgl_fpk,approve)
      VALUES('$id_fpk','$user_id','$id_unit','$jabatan','$jml_keb','$jekel','$usia1','$usia2','$pendidikan','$pengalaman','$deskripsi','$alasan','$tgl_fpk','$approve')";
      $hasil=mysql_query($query);
    }
    function tampilfpk(){
    $query = mysql_query("SELECT a.*, b.* FROM fpk a, unit b WHERE a.id_unit=b.id_unit");
    while($row=mysql_fetch_array($query))
      $data[]=$row;
    if(isset($data)){
      return $data;
    }
  }
    function bacafpk($id_fpk)
      {
      $query=mysql_query("SELECT * FROM fpk WHERE id_fpk='$_GET[id_fpk]'");
      $data=mysql_fetch_array($query);
      $data[]=$row;
      if(isset($data)){
        return $data;
      }
    }
    function updatefpk($id_fpk,$user_id,$id_unit,$jabatan,$jml_keb,$jekel,$usia1,$usia2,$pendidikan,$pengalaman,$deskripsi,$alasan,$tgl_fpk,$approve){
    $query=mysql_query("UPDATE fpk SET user_id='$user_id', id_unit='$id_unit', jabatan='$jabatan', jml_keb='$jml_keb', jekel='$jekel', usia1='$usia1',
      usia2='$usia2', pendidikan='$pendidikan', pengalaman='$pengalaman', deskripsi='$deskripsi', alasan='$alasan', 
      tgl_fpk='$tgl_fpk', approve='$approve' WHERE id_fpk='$id_fpk'");
    }
      function Approve_fpk($id_fpk,$approve){
       $query=mysql_query("UPDATE fpk SET approve='$approve' WHERE id_fpk='$id_fpk'");
      }

  }
  /**
  * 
  */
  class Unit
  {
    
    function showunit()
    {
    $query = mysql_query("SELECT * FROM unit");
      while($row=mysql_fetch_array($query))
        $data[]=$row;
      if(isset($data)){
      return $data;
    }
    }
  }
  /**
  *  class untuk informasi recruitment
  */
  /**
  * 
  */
  class Apply
  {
    
    function addapply($id_app,$id_pelamar,$id_info)
    {
      if($_POST){
      $kode_app=$_POST['id_app']; 
      $cek_apply=mysql_num_rows(mysql_query
        ("SELECT * FROM apply WHERE  id_app='$_POST[id_app]'"));
      if ($cek_apply > 0){
       echo "<script type='text/javascript'>window.alert('Anda sudah pernah melakukan Apply pada lowongan pekerjaan ini !')</script>";
     }
     else{
     # Kalau nomor faktur belum ada silahkan di simpan
       $query="INSERT INTO apply (id_app,id_pelamar,id_info)
      VALUES('$id_app','$id_pelamar','$id_info')";
      $hasil=mysql_query($query);
    }
  }
  }
    function tampilapply(){
        $query = mysql_query("SELECT a.*, b.*,c.*,d.*,e.* FROM apply a, pelamar b, info_rec c, fpk d, unit e WHERE a.id_pelamar=b.id_pelamar AND a.id_info=c.id_info AND c.id_fpk=d.id_fpk AND d.id_unit=e.id_unit  AND a.id_pelamar=$_SESSION[id_pelamar]");
        while($row=mysql_fetch_array($query))
         $data[]=$row;
        if(isset($data)){
          return $data;
    }

    }   #show data apply for hrd
        function showapply(){
        #$query = mysql_query("SELECT a.*, b.*,c.*,d.*,e.*,f.* FROM apply a LEFT JOIN hasil_seleksi f
        #ON f.id_app=a.id_app, pelamar b, info_rec c, fpk d, unit e WHERE a.id_pelamar=b.id_pelamar 
        #AND a.id_info=c.id_info AND c.id_fpk=d.id_fpk AND d.id_unit=e.id_unit");
        $query = mysql_query("SELECT a.*, b.*,c.*,d.*,e.* FROM apply a, pelamar b, info_rec c, fpk d, unit e WHERE a.id_pelamar=b.id_pelamar 
        AND a.id_info=c.id_info AND c.id_fpk=d.id_fpk AND d.id_unit=e.id_unit");
        while($row=mysql_fetch_array($query))
         $data[]=$row;
        if(isset($data)){
          return $data;
    }

    }
      function updateApply($id_app,$aktif){
       $query=mysql_query("UPDATE apply SET aktif='$aktif' WHERE id_app='$id_app'");
      }
  }
  /**
  * simpan jawaban ujian
  */
  class Jawab {

    function simpanJawaban ($id_app,$id_soal,$pilihan,$total){
      $query="INSERT INTO jawaban_ujian (id_app,id_soal,pilihan)VALUES('$id_app','$id_soal','$pilihan')";
      mysql_query($query);
      echo"<meta http-equiv='refresh' content='0;url=?r=seleksi&pg=hasil_seleksi_pelamar'>";

    }
    function tampilJawab($id_app){
        $query = mysql_query("SELECT  a.*,b.* FROM soal_ujian a, jawaban_ujian b WHERE a.id_soal=b.id_soal AND id_app='$_GET[id_app]'");
        while($row=mysql_fetch_array($query))
         $data[]=$row;
        if(isset($data)){
          return $data;
    }
  }
  function hitungJawaban(){
        $query = mysql_query("SELECT count(*) as x,a.*,b.* FROM soal_ujian a, jawaban_ujian b WHERE a.id_soal=b.id_soal and a.jawaban=b.pilihan");
        $data=mysql_fetch_array($query);
        $data[]=$row;
      if(isset($data)){
        return $data;
      }
    }
   function getNilai($id_app){
        $query = mysql_query("SELECT count(*) as x,a.*,b.* FROM soal_ujian a, jawaban_ujian b WHERE a.id_soal=b.id_soal and a.jawaban=b.pilihan AND id_app='$_GET[id_app]'");
        $data=mysql_fetch_array($query);
        $data[]=$row;
      if(isset($data)){
        return $data;
      }
    }
  }

  /**
  * class data hasil ujian
  */
  class Hasil_ujian{
    function tambah_h_u($id_hasil_s,$id_app,$id_hasil,$adm,$tgl_int,$interview,$final,$note){
      $query="INSERT INTO hasil_seleksi (id_hasil_s,id_app,id_hasil,adm,tgl_int,interview,final,note)
      VALUES('$id_hasil_s','$id_app','$id_hasil','$adm','$tgl_int','$interview','$final','$note')";
      $hasil=mysql_query($query);
    }
      function update_h_u($id_hasil_s,$id_app,$id_hasil,$adm,$tgl_int,$interview,$final,$note){
      $query=mysql_query("UPDATE hasil_seleksi SET id_app='$id_app',id_hasil='$id_hasil',adm='$adm',tgl_int='$tgl_int',interview='$interview',
      final='$final', note='$note' WHERE id_hasil_s='$id_hasil_s'");
  }
    function showHasil(){
    $query = mysql_query("SELECT a.*,b.*,c.*,d.*,e.*,f.* FROM hasil_seleksi a, apply b, pelamar c, info_rec d, fpk e,unit f 
    WHERE a.id_app=b.id_app AND b.id_pelamar=c.id_pelamar AND b.id_info=d.id_info AND d.id_fpk=e.id_fpk AND e.id_unit=f.id_unit");
    while($row=mysql_fetch_array($query))
      $data[]=$row;
    if(isset($data)){
      return $data;
    }
  }
     function bacaHasil($id_hasil_s)
      {
      $query=mysql_query("SELECT * FROM hasil_seleksi WHERE id_hasil_s='$_GET[id_hasil_s]'");
      $data=mysql_fetch_array($query);
      $data[]=$row;
      if(isset($data)){
        return $data;
      }
    }
      function pengumuman(){
    $query = mysql_query("SELECT a.*,b.*,c.*,d.*,e.*,f.* FROM hasil_seleksi a, apply b, pelamar c, info_rec d, fpk e,unit f 
    WHERE a.id_app=b.id_app AND b.id_pelamar=c.id_pelamar AND b.id_info=d.id_info AND d.id_fpk=e.id_fpk AND e.id_unit=f.id_unit AND c.id_pelamar=$_SESSION[id_pelamar]");
    while($row=mysql_fetch_array($query))
      $data[]=$row;
    if(isset($data)){
      return $data;
    }
  }
  }
  class Info
  {
      function tambahinfo($id_info,$user_id,$id_fpk,$ket,$date_open,$date_close,$gaji_dari, $gaji_sampai,$stat)
    {
      $query="INSERT INTO info_rec (id_info,user_id,id_fpk,ket,date_open,date_close,gaji_dari,gaji_sampai,stat)
      VALUES('$id_info','$user_id','$id_fpk','$ket','$date_open','$date_close','$gaji_dari','$gaji_sampai','$stat')";
      $hasil=mysql_query($query);
    }
        function tampilinfo(){
        $query = mysql_query("SELECT a.*, b.*,c.*, 
        #(SELECT COUNT(id_info) AS total FROM apply as ap left join info_rec as i on ap.id_info=i.id_info )total
        (SELECT COUNT(id_app) AS total FROM apply as ap left join info_rec as a on ap.id_info=a.id_info WHERE ap.id_info=a.id_info) total
         FROM info_rec a, fpk b, unit c WHERE a.id_fpk=b.id_fpk AND b.id_unit=c.id_unit AND a.stat='Open'");
        while($row=mysql_fetch_array($query))
          $data[]=$row;
        if(isset($data)){
          return $data;
    }
  }
     function detail_info($id_info)
      {
      $query=mysql_query("SELECT a.*, b.*,c.* FROM info_rec a, fpk b, unit c WHERE a.id_fpk=b.id_fpk AND b.id_unit=c.id_unit AND id_info='$_GET[id_info]'");
      $data=mysql_fetch_array($query);
      $data[]=$row;
      if(isset($data)){
        return $data;
      }
    }
   function bacainfo($id_info)
      {
      $query=mysql_query("SELECT * FROM info_rec WHERE id_info='$_GET[id_info]'");
      $data=mysql_fetch_array($query);
      $data[]=$row;
      if(isset($data)){
        return $data;
      }
    }
    function updateinfo($id_info,$user_id,$id_fpk,$ket,$date_open,$date_close,$gaji_dari,$gaji_sampai,$stat){
      $query=mysql_query("UPDATE info_rec SET user_id='$user_id',id_fpk='$id_fpk',ket='$ket',date_open='$date_open',date_close='$date_close',gaji_dari='$gaji_dari',gaji_sampai='$gaji_sampai',
        stat='$stat' WHERE id_info='$id_info'");
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
