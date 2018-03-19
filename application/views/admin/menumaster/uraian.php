<?php $this->load->view("atribut/headeradmin") ?>
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Uraian Kegiatan</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Uraian Kegiatan</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header withborder">
              <button data-toggle="modal" data-target="#tambahUraian" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Uraian Kegiatan</button>
            </div>
             <!-- /.box-header -->
            <div class="box-body">
              <table id="tabelUraian" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Unsur Kegiatan</th>
                  <th>Sub Kegiatan</th>
                  <th>Uraian Kegiatan</th>
                  <th>Poin AK</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php foreach ($lihaturaianku as $ur):?>
                <tr>
                  <td><?php echo $ur['id_uraian'];?></td>
                  <td><?php echo $ur['nama_unsur'];?></td>
                  <td><?php echo $ur['nama_sub'];?></td>
                  <td><?php echo $ur['nama_uraian'];?></td>
                  <td><?php echo $ur['angka_kredit'];?></td>
                  <td>
                    <a href="<?php echo base_url('admin/Kegiatan/uraian/').$ur['id_uraian']?>" class="btn btn-xs btn-success"><i class="fa fa-level-down"></i> Tambah Uraian Kegiatan </a>

                    <a href="<?php echo base_url('admin/Menumaster/getUraianKegiatan/').$ur['id_uraian']?>" class="btn btn-warning btn-xs btn_edit_personil"><span class="fa fa-pencil"></span> Edit </a>
                    <a href="<?php echo base_url('admin/Menumaster/deleteUraian/').$ur['id_uraian']?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin akan menghapus data?');"><span class="fa fa-trash"></span> Hapus </a>
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
  </div>
  <div class="modal fade" tabindex="-1" role="dialog" id="tambahUraian">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <button class="close" data-dismiss="modal">&times;</button>
        <h2 class="modal-title">Tambah Uraian Kegiatan</h2>
      </div>
      <div class="modal-body">
                    <form role="form" method="POST" action="<?php echo base_url('admin/Menumaster/adduraian')?>">
              <div class="box-body">
                <div class="form-group">
                  <label>Id Sub</label>
                  <input type="text" class="form-control" placeholder="Masukkan Id Sub" name="txt_idsub">
                  <label>Nama Uraian Kegiatan</label>
                  <input type="text" class="form-control" placeholder="Masukkan Uraian Kegiatan" name="txt_uraian">
                  <label>Angka Kredit</label>
                  <input type="text" class="form-control" placeholder="Angka Kredit" name="txt_angka">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
      </div>
      </div>
    </div>
  </div>
  <?php $this->load->view("atribut/template_script") ?>
<script type="text/javascript">
  $(function(){
    $('#tabelUraian').DataTable();
  });
</script>
<?php $this->load->view("atribut/footer") ?>