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
        <!-- left column -->
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h2 class="box-title">Tambah Data Pengabdian</h2>
            </div>
            <div class="box-body">
              <?= form_open_multipart('dosen/Pengabdian/addMK',['class'=>'form-vertical'])?>
               <div class="form-group">
                  <label  >Sub Kegiatan Pengabdian</label>
                    <select class="form-control" name="subPengabdian" id="subPengabdian">
                      <option value="">Pilih Sub Kegiatan</option>
                      <?php foreach ($pengabdian as $row): ?>
                        <option value="<?php echo $row['id_sub'] ?>"><?php echo $row['nama_sub'] ?></option>
                      <?php endforeach ?>
                    </select>
                </div>
              <div class="form-group">
                  <label  >Uraian Pengajaran</label>
                  <select class="form-control" name="cb_uraian" id="cb_uraian">
                    <option value="">Pilih Uraian Kegiatan</option>
                  </select>
              </div>
              <div class="form-group required">
                   <label  >Kegiatan</label>
                   <input type="text" id="exampleInputFile" class="form-control" placeholder="Kegiatan Pengabdian" name="txt_keg">
              </div>
              <div class="form-group">
                   <label  >Bentuk</label>
                   <input type="text" id="exampleInputFile" placeholder="Produk yang dihasilkan" class="form-control" placeholder="Bentuk Pengabdian" name="txt_bentuk">
              </div>
              <div class="form-group">
                   <label  >Tempat</label>
                   <input type="text" id="t" class="form-control" placeholder="Tempat Pengabdian" name="txt_tempat">
              </div>
              <div class="form-group">
                   <label  >Tanggal</label>
                   <input type="date" name="txt_tgl" class="form-control">
              </div>
              <div class="form-group required">
                   <label  >Satuan Hasil</label>
                   <input type="text" name="txt_satuan" id="exampleInputFile" class="form-control">
              </div>
              <div class="form-group required">
                <label  >Lampiran SK</label>
                <input type="file" name="userfile" class="form-control">
              </div>
              <div class="form-group required" >
                  <button type="submit" class="btn btn-primary btn-flat"><i class="glyphicon glyphicon-save"></i> Simpan</button>
                  <a href="<?php echo base_url('dosen/Pengajaran') ?>" class="btn btn-warning btn-flat"><i class="glyphicon glyphicon-remove"></i> Batal</a>
              </div>
              <?= form_close();?>
            </div>
           
        </div>
    </div>
  </section>

</div>
  <script type="text/javascript">
    $(document).ready(function(){
      $('#subPengabdian').change(function(){
        var pengabdian = $('#subPengabdian').val();
        $.ajax({
          url: '<?php echo base_url('dosen/Pengabdian/getUraian') ?>',
          type: 'GET',
          data: 'pengabdian='+pengabdian,
          dataType: 'json',
          success: function(data){
            var uraian = `<select id="cb_uraian" name="cn_uraian">
            <option value="">Pilih uraian</option>`;
            for (var i = 0; i < data.length; i++) {
              uraian+= '<option value="'+data[i].id_uraian+'">'+data[i].nama_uraian+'</option>';
            }
            uraian+='</select>';
            $('#cb_uraian').html(uraian);
          }
        });
      });
    });
  </script>