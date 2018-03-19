<?php $this->load->view("atribut/headeradmin") ?>
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Unsur Kegiatan</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Unsur Kegiatan</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header withborder">
              <button data-toggle="modal" data-target="#tambahUnsur" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Unsur</button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="exampleb 2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Unsur Kegiatan</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php foreach ($unsur_kegiatan as $unsur):?>
                <tr>
                  <td><?php echo $unsur['id_unsur'];?></td>
                  <td><?php echo $unsur['nama_unsur'];?></td>
                  <td>
                    <a href="<?php echo base_url('admin/Kegiatan/subunsur/').$unsur['id_unsur']?>" class="btn btn-xs btn-success"><i class="fa fa-level-down"></i> Tambah Sub Kegiatan </a>

                    <a href="<?php echo base_url('admin/Menumaster/getUnsur/').$unsur['id_unsur']?>" class="btn btn-warning btn-xs btn_edit_personil"><span class="fa fa-pencil"></span> Edit </a>
                    <a href="<?php echo base_url('admin/Menumaster/deleteUnsur/').$unsur['id_unsur']?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin akan menghapus data?');"><span class="fa fa-trash"></span> Hapus </a>
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
  <div class="modal fade" tabindex="-1" role="dialog" id="tambahUnsur">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <button class="close" data-dismiss="modal">&times;</button>
        <h2 class="modal-title">Tambah Unsur</h2>
      </div>
      <div class="modal-body">
                    <form role="form" method="POST" action="<?php echo base_url('admin/Menumaster/addunsur')?>">
              <div class="box-body">
                <div class="form-group">
                  <label>Nama Unsur</label>
                  <input type="text" class="form-control" placeholder="Masukkan Unsur Kegiatan" name="txt_unsur">
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
<?php $this->load->view("atribut/footer") ?>
