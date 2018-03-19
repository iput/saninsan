 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Edit Sub Kegiatan</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Sub Kegiatan</li>

      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            
            <form role="form" method="POST" action="<?php echo base_url('admin/Menumaster/editSubkegiatan')?>">
              <div class="box-body">
      <input type="hidden" name="edit_idsub" id="edit_idsub" value="<?php echo $sub_kegiatannn->id_sub ?>">
               
                <div class="form-group">
                  <label>Id Unsur</label>
                  <input type="text" class="form-control" placeholder="Masukkan Sub Kegiatan" name="txt_unsur" id="id_unsur" value="<?php echo $sub_kegiatannn->id_unsur ?>">
                  <label>Nama Sub Kegiatan</label>
                  <input type="text" class="form-control" placeholder="Masukkan Sub Kegiatan" name="txt_namasub" id="namasub" value="<?php echo $sub_kegiatannn->nama_sub ?>">
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
        <?php foreach($sub_kegiatan as $u):{
          ?>

          $('#edit_idsub').val('<?php echo $u['id_sub']?>');
          $('#id_unsur').val('<?php echo $u['id_unsur']?>');
          $('#namasub').val('<?php echo $u['nama_unsur']?>');
          <?php
        }
      endforeach
      ?>
      });
    </script>