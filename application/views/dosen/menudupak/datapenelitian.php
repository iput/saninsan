 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Data Penelitian</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">DATA PENELITIAN</li>
      </ol>
    </section>
    <!-- Main content -->
    
  <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h2 class="box-title">Data Penelitian <?php echo $this->session->userdata('username') ?></h2>
              <a href="<?php echo base_url('dosen/Penelitian/tambah') ?>" class="btn btn-info pull-right"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Unsur Penelitian</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="alert alert-success" style="display: none;"></div>
              <table id="tabelPenelitian" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Uraian Kegiatan</th>
                  <th>Judul Penelitian</th>
                  <th>Link</th>
                  <th>Satuan Hasil</th>
                  <th>Angka Kredit</th>
                  <th>Jumlah Angka Kredit</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                 <tbody>
                   <?php foreach ($penelitian as $pen):?>
                <tr>
                  <td><?php echo $pen['id_penelitian'] ?></td>
                  <td><?php echo $pen['nama_uraian'];?></td>
                  <td><?php echo $pen['judul'];?></td>
                  <td><?php echo $pen['link'];?></td>
                  <td><?php echo $pen['satuan_hasil'];?></td>
                  <td><?php echo $pen['angka_kredit'];?></td>
                  <td><?php echo $pen['jumlah_ak'];?></td>
                  <td>
                     <a href="<?php echo base_url('dosen/Penelitian/editPenelitian/').$pen['id_penelitian']?>" class="btn btn-warning btn-xs btn_edit_personil"><span class="fa fa-pencil"></span></a>
                    <a href="<?php echo base_url('dosen/Menudupak/deletePenelitian/').$pen['id_penelitian']?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin akan menghapus data?');"><span class="fa fa-trash"></span></a>
                  </td>

                </tr>
                <?php endforeach;?>
                
                </tbody>
                </table>
            </div>
          </div>
        </div>
      </div>
    </section>
<script type="text/javascript">
  <?php if ($this->session->flashdata('sukses')): ?>
  $('.alert-success').html('<?php echo $this->session->flashdata('sukses') ?>').fadeIn();
<?php endif ?>
</script>
<script type="text/javascript">
  $(function(){
    $('#tabelPenelitian').DataTable();
  });
</script>