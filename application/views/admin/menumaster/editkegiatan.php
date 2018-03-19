 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Edit Uraian Kegiatan</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Uraian Kegiatan</li>

      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            
            <form role="form" method="POST" action="<?php echo base_url('admin/Menumaster/editUraian')?>">
              <div class="box-body">
      <input type="hidden" name="edit_iduraian" id="edit_iduraian" value="<?php echo $uraian_kegiatannn->id_uraian ?>">
               
                <div class="form-group">
                  <label>Id Sub</label>
                  <input type="text" class="form-control" placeholder="Masukkan id Sub" name="txt_idsub" id="id_sub" value="<?php echo $uraian_kegiatannn->id_sub ?>">
                  <label>Nama Uraian Kegiatan</label>
                  <input type="text" class="form-control" placeholder="Masukkan Uraian Kegiatan" name="txt_namauraian" id="namauraian" value="<?php echo $uraian_kegiatannn->nama_uraian ?>">
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
    </section>

    <script type="text/javascript">
      $(function(){
        <?php foreach($uraian_kegiatan as $ur):{
          ?>

          $('#edit_iduraian').val('<?php echo $u['id_uraian']?>');
          $('#id_sub').val('<?php echo $u['id_sub']?>');
          $('#namauraian').val('<?php echo $u['nama_uraian']?>');
          <?php
        }
      endforeach
      ?>
      });
    </script>