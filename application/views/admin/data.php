<?php $this->load->view("atribut/headeradmin") ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Dosen
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Daftar Dosen</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="exampleb 2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>NIP</th>
                  <th>Pangkat/Golongan Ruang</th>
                  <th>Jabatan Fungsional</th>
                  <th>Unit Kerja</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>
                  	<a href="" class="btn btn-xs btn-success"><i class="fa fa-level-down"></i> Validasi Akun </a>
                    <a href="" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span></a>
                    <a href="" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span></a>
                  </td>

                </tr>

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
<?php $this->load->view("atribut/template_script") ?>
<?php $this->load->view("atribut/footer") ?>