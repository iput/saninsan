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
              <div class="table-responsive">
                <table id="tabeldosen" class="table table-bordered table-striped table-hover table-responsive">
                  <thead>
                    <tr>
                      <td>NIP</td>
                      <td>Nama</td>
                      <td>Pangkat/Golongan</td>
                      <td>Jabatan</td>
                      <td>Unit Kerja</td>
                      <td><i class="glyphicon glyphicon-cog"></i></td>
                    </tr>
                  </thead>
                          <tbody>
                              <?php foreach ($dosen as $row): ?>
                                  <tr>
                                      <td><?php echo $row['nip'] ?></td>
                                      <td><?php echo $row['nama'] ?></td>
                                      <td><?php echo $row['pangkat'] .' / ' .$row['golongan'] ?></td>
                                      <td><?php echo $row['jabatan'] ?></td>
                                      <td><?php echo $row['unit'] ?></td>
                                      <td>
                                          <a href="<?php echo site_url('admin/pengajuan/detail?code='.$row['id_dosen']) ?>" class="btn btn-xs btn-success"><i class="fa fa-level-down"></i> Lihat Data Kegiatan </a>
                                          <a href="" class="btn btn-warning btn-xs btn_edit_personil"><span class="fa fa-pencil"></span>Verifikasi Data</a>
                                      </td>
                                  </tr>
                              <?php endforeach ?>
                          </tbody>
                </table>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
  </div>
          <?php $this->load->view("atribut/template_script") ?>
          <?php $this->load->view("atribut/footer") ?>