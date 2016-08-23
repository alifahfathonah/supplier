<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">MASTER DATA SUPPLIER</div>
  <div class="panel-body">
 <table id="example" class="table table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Unit</th>
        <th>Jabatan</th>
        <th>Jml Keb</th>
        <th>Gender</th>
        <th>Usia</th>
        <th>Pendidikan</th>
        <th>Pengalaman</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
          
      <tr>
        <td>10001</td>
        <td><strong>IT Departemen</strong></td>
        <td>PHP Programmer / Web Programmer</td>
        <td>3</td>
        <td>L</td>
        <td>20 s/d 30 Thn</td>
        <td>S1 (Teknology Informasi/Ilmu Komputer)</td>
        <td><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>24 Juli 2016</td>
        <td><a class="btn btn-info btn-xs edit-record" href="#" role="button" data-id="10001">Detail</a>&nbsp;
            <a class="btn btn-default btn-xs disabled" href="?r=info&pg=info_form&id_approve=10001" role="button">Approve</a>&nbsp;
            <a href="?r=fpk&pg=fpk_edit&id_fpk=10001" class="btn btn-warning btn-xs disabled" role="button">Edit</a></td>
        
      </tr>

      <tr>
        <td>10003</td>
        <td><strong>Marketing</strong></td>
        <td>Marketing / Digital Marketing</td>
        <td>2</td>
        <td>L</td>
        <td>20 s/d 20 Thn</td>
        <td>2 Tahun</td>
        <td><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>24 Juli 2016</td>
        <td><a class="btn btn-info btn-xs edit-record" href="#" role="button" data-id="10003">Detail</a>&nbsp;
            <a class="btn btn-default btn-xs disabled" href="?r=info&pg=info_form&id_approve=10003" role="button">Approve</a>&nbsp;
            <a href="?r=fpk&pg=fpk_edit&id_fpk=10003" class="btn btn-warning btn-xs disabled" role="button">Edit</a></td>
        
      </tr>

      <tr>
        <td>10002</td>
        <td><strong>Finance</strong></td>
        <td>Accounting / Tax Consulting</td>
        <td>2</td>
        <td>P</td>
        <td>20 s/d 30 Thn</td>
        <td>S1 Akuntasi / Manajemen Keuangan</td>
        <td><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>24 Juli 2016</td>
        <td><a class="btn btn-info btn-xs edit-record" href="#" role="button" data-id="10002">Detail</a>&nbsp;
            <a class="btn btn-default btn-xs disabled" href="?r=info&pg=info_form&id_approve=10002" role="button">Approve</a>&nbsp;
            <a href="?r=fpk&pg=fpk_edit&id_fpk=10002" class="btn btn-warning btn-xs disabled" role="button">Edit</a></td>
        
      </tr>

      <tr>
        <td>10004</td>
        <td><strong>Administrasi</strong></td>
        <td>Administrasi</td>
        <td>2</td>
        <td>L/P</td>
        <td>20 s/d 30 Thn</td>
        <td>S1 Management</td>
        <td><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>24 Juli 2016</td>
        <td><a class="btn btn-info btn-xs edit-record" href="#" role="button" data-id="10004">Detail</a>&nbsp;
            <a class="btn btn-primary btn-xs " href="?r=info&pg=info_form&id_approve=10004" role="button">Approve</a>&nbsp;
            <a href="?r=fpk&pg=fpk_edit&id_fpk=10004" class="btn btn-warning btn-xs " role="button">Edit</a></td>
        
      </tr>
    </tbody>
  </table>
 <a class="btn btn-default btn-xs add-supplier" href="?r=fpk&pg=fpk_form" role="button">Tambah Data</a>
</div>
</div>
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
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <input type="submit" name="update" value="Update" class="btn btn-danger" >
                    </div>
                </div>
                </form>
            </div>
        </div>

