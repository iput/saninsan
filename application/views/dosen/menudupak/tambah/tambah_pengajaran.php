  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Data Pengajaran</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">DATA PENGAJARAN</li>
      </ol>
    </section>
    <!-- Main content -->

    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h2 class="box-title">Tambah Data Pengajaran</h2>
            </div>
            <div class="box-body">
              <?= form_open_multipart('dosen/Pengajaran/addMK',['class'=>'form-vertical'])?>
               <div class="form-group">
                  <label>Sub Kegiatan Pengajaran</label>
                  <select class="form-control" name="subPengajaran" id="subPengajaran">
                    <option value="">Pilih Sub Kegiatan</option>
                    <?php foreach ($pengajaran as $row): ?>
                      <option value="<?php echo $row['id_sub'] ?>"><?php echo $row['nama_sub'] ?></option>
                    <?php endforeach ?>
                  </select>
              </div>
              <div class="form-group">
                  <label>Uraian Pengajaran</label>
                  <select class="form-control" name="cb_uraian" id="cb_uraian">
                    <option value="">Pilih Uraian Kegiatan</option>
                  </select>
              </div>
              <div class="form-group">
                <label>Mata Kuliah</label>
                <input type="text" class="form-control" placeholder="Mata Kuliah" name="txt_mk">
              </div>
              <div class="form-group">
                  <label>SKS</label>
                  <select class="form-control" name="txt_sks">
                    <option value="">Pilih SKS</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                  </select>
              </div>
              <div class="form-group">
                  <label>Semester</label>
                  <select class="form-control" name="txt_smt">
                    <option value="">Pilih Semester</option>
                    <option value="1">Ganjil</option>
                    <option value="0">Genap</option>
                  </select>
              </div>
              <div class="form-group">
                  <label>Tahun Akademik</label>
                  <select class="form-control" name="txt_tahun">
                    <option value="">Tahun Akademik mengajar</option>
                        <?php
                          $now = date('Y');
                            for ($i = $now; $i > 1990; $i--) {
                                echo "<option value=" . $i . ">" . $i . "</option>";
                              }
                        ?>
                  </select>
              </div>
              <div class="form-group">
                <label>Tempat/Instansi</label>
                <input type="text" class="form-control" placeholder="Tempat/Instansi" name="txt_tempat">
              </div>
              <div class="form-group required">
                   <label>Tanggal</label>
                   <input type="date" name="txt_tgl" class="form-control">
              </div>
              <div class="form-group required">
                <label>Satuan Hasil</label>
                <input type="text" name="txt_satuan" id="satuan" class="form-control" placeholder="satuan hasil">
              </div>
              <div class="form-group">
                <label>Lampiran SK</label>
                <input type="file" name="userfile" class="form-control">
              </div>
              <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-flat"><i class="glyphicon glyphicon-save"></i> Simpan</button>
                  <a href="<?php echo base_url('dosen/Pengajaran') ?>" class="btn btn-warning btn-flat"><i class="glyphicon glyphicon-remove"></i> Batal</a>
              </div>
              <?= form_close();?>
            </div>
           
        </div>
      </div>
    </div>
  </section>

</div>
  <script type="text/javascript">
    $(document).ready(function(){
      $('#subPengajaran').change(function(){
        var pengajaran = $('#subPengajaran').val();
        $.ajax({
          url: '<?php echo base_url('dosen/Pengajaran/getUraian') ?>',
          type: 'GET',
          data: 'pengajaran='+pengajaran,
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