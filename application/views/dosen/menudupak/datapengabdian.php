 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Data Pengabdian</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">DATA PENGABDIAN</li>
      </ol>
    </section>
    <!-- Main content -->
  
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h2 class="box-title">Data Pengabdian <?php echo $this->session->userdata('username') ?></h2>
              <a href="<?php echo base_url('dosen/Pengabdian/tambahPengabdian') ?>" class="btn btn-info pull-right"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Unsur Pengabdian</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="alert alert-success" style="display: none;"></div>
              <table id="tabelPengabdian" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Uraian Kegiatan</th>
                  <th>Kegiatan</th>
                  <th>Bentuk</th>
                  <th>Tempat</th>
                  <th>Tanggal</th>
                  <th>Satuan Hasil</th>
                  <th>Angka Kredit</th>
                  <th>Jumlah Angka Kredit</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody> 
                  <?php foreach ($pengabdian as $pend):?>
                <tr>
                  <td><?php echo $pend['id_pengabdian'] ?></td>
                  <td><?php echo $pend['nama_uraian'];?></td>
                  <td><?php echo $pend['kegiatan'];?></td>
                  <td><?php echo $pend['bentuk'];?></td>
                  <td><?php echo $pend['tempat'];?></td>
                  <td><?php echo $pend['tanggal'];?></td>
                  <td><?php echo $pend['satuan_hasil'];?></td>
                  <td><?php echo $pend['angka_kredit'];?></td>
                  <td><?php echo $pend['jumlah_ak'];?></td>
                                    <td>
                     <a href="<?php echo base_url('dosen/Pengabdian/editPengabdian/').$pend['id_pengabdian']?>" class="btn btn-warning btn-xs btn_edit_personil"><span class="fa fa-pencil"></span></a>
                    <a href="<?php echo base_url('dosen/Menudupak/deletePengabdian/').$pend['id_pengabdian']?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin akan menghapus data?');"><span class="fa fa-trash"></span></a>
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
    $('#tabelPengabdian').DataTable();
  });
</script>