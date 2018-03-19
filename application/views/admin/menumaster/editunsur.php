 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Edit Unsur Kegiatan</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Unsur Kegiatan</li>

      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            
            <form role="form" method="POST" action="<?php echo base_url('admin/Menumaster/editunsur')?>">
              <div class="box-body">
                <input type="hidden" name="edit_idunsur" id="edit_idunsur" value="<?php echo $unsur_kegiatann->id_unsur ?>">
                <div class="form-group">
                  <label>Nama Unsur</label>
                  <input type="text" class="form-control" placeholder="Masukkan Unsur Kegiatan" name="txt_unsur" id="namaunsur" value="<?php echo $unsur_kegiatann->nama_unsur ?>">
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
        <?php foreach($unsur_kegiatan as $u):{
          ?>

          $('#edit_idunsur').val('<?php echo $u['id_unsur']?>');
          $('#namaunsur').val('<?php echo $u['nama_unsur']?>');
          <?php
        }
      endforeach
      ?>
      });
    </script>