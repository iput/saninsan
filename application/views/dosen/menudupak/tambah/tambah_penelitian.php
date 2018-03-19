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
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <!-- /.box-header -->
            <!-- form start -->
            <?= form_open_multipart('dosen/Penelitian/addJudul',['class'=>'form-vertical'])?>
              <div class="box-body">
               <div class="form-group">
                  <label>Sub Kegiatan Penelitian</label>
                  <div>
                  <select class="form-control" name="subPenelitian" id="subPenelitian">
                    <option value="">Pilih Sub Kegiatan</option>
                    <?php foreach ($penelitian as $row): ?>
                      <option value="<?php echo $row['id_sub'] ?>"><?php echo $row['nama_sub'] ?></option>
                    <?php endforeach ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                  <label>Uraian Penelitian</label>
                  <div>
                  <select class="form-control" name="cb_uraian" id="cb_uraian">
                    <option value="">Pilih Uraian Kegiatan</option>
                  </select>
                </div>
              </div>
              <div class="form-group required">
                   <label>Judul Penelitian/Karya Ilmiah</label>
                   <div>
                   <input type="text" name="txt_judul" class="form-control" placeholder="Judul Penelitian">
                   </div>
              </div>
              <div class="form-group required">
                   <label>Link</label>
                   <div>
                   <input type="text" name="txt_link" class="form-control" placeholder="Link penelitian">
                   </div>
              </div>
              <div class="form-group required">
                   <label>Satuan Hasil</label>
                   <div>
                   <input type="text" name="txt_satuan" class="form-control">
                   </div>
              </div>
              <div class="form-group required">
                   <label>Jumlah Volume Kegiatan</label>
                   <div>
                   <input type="text" name="txt_jumlahv" id="exampleInputFile" class="form-control">
                   </div>
              </div>
              <div class="form-group">
                   <label >Lampiran SK</label>
                   <div>
                     <input type="file" name="userfile">
                   </div>
              </div>

            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-flat"><i class="glyphicon glyphicon-save"></i> Simpan</button>
              <a href="<?php echo base_url('dosen/Penelitian') ?>" class="btn btn-warning btn-flat"><i class="glyphicon glyphicon-remove"></i> Batal</a>
            </div>
            
          <?= form_close();?>
        </div>
      </div>
    </div>
  </section>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    $('#subPenelitian').change(function(){
        var subpenelitian = $('#subPenelitian').val();
        $.ajax({
          url : '<?php echo base_url('dosen/Penelitian/getUraian') ?>',
          type: 'GET',
          data: 'suburaian='+subpenelitian,
          dataType:'json',
          success: function(data){
            var uraian = `<select id="cb_uraian" name="cb_uraian">
            <option value="">Pilih Uraian</option>`;
            for (var i = 0; i < data.length; i++) {
              uraian += '<option value="'+data[i].id_uraian+'">'+data[i].nama_uraian+'</option>';
            }
            uraian+='</select>';
            $('#cb_uraian').html(uraian);
          }
        });
      });
    });
</script>