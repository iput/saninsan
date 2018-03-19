 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Data Pendidikan</h1>
      <small><?php echo $this->session->userdata('username') ?></small>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">DATA PENDIDIKAN </li>
      </ol>
    </section>
    <!-- Main content -->
          

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <a href="<?php echo base_url('dosen/Pendidikan/Cetak') ?>" class="btn btn-success btn-flat"><i class="fa fa-print"></i> Cetak Data</a>
              <a href="<?php echo base_url('dosen/Pendidikan/tambahPendidikan') ?>" class="btn btn-info btn-flat pull-right"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Unsur Pendidikan</a>
            </div>
            
            <!-- /.box-header -->
            <div class="box-body">
              <div class="alert alert-success" style="display: none;"></div>
              <table id="tabelPendidikan" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Uraian Kegiatan</th>
                  <th>Tempat/Instansi</th>
                  <th>Tanggal</th>
                  <th>Satuan Hasil</th>
                  <th>Angka Kredit</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php $jumlahAkhir=0; ?>
                   <?php foreach ($pendidikan as $pend):?>
                    <?php $jumlahAkhir+=$pend['jumlah_ak']; ?>
                <tr>
                  <td><?php echo $pend['id_pendidikan'] ?></td>
                  <td><?php echo $pend['nama_uraian'];?></td>
                  <td><?php echo $pend['tempat'];?></td>
                  <td><?php echo $pend['tanggal'];?></td>
                  <td><?php echo $pend['satuan_hasil'];?></td>
                  <td><span class="badge bg-green"><?php echo $pend['jumlah_ak'];?> </span></td>
                  <td>
                     <a href="<?php echo base_url('dosen/Pendidikan/editPendidikan/').$pend['id_pendidikan']?>" class="btn btn-warning btn-xs btn_edit_personil"><span class="fa fa-pencil"></span></a>
                    <a href="<?php echo base_url('dosen/Menudupak/deletePendidikan/').$pend['id_pendidikan']?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin akan menghapus data?');"><span class="fa fa-trash"></span></a>
                  </td>

                </tr>
                <?php endforeach;?>
                </tbody>
                <tfoot>
                  <tr>
                    <td colspan="5">Jumlah</td>
                    <td colspan="2"><?php echo $jumlahAkhir ?></td>
                  </tr>
                </tfoot>
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
    $('#tabelPendidikan').DataTable();
  });
</script>