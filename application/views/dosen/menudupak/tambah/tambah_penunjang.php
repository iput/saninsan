 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Data Penunjang</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">DATA PENUNJANG</li>
      </ol>
    </section>
    <!-- Main content -->

    <section class="content">
          <!-- general form elements -->
     <div class="box">
       <div class="box-header with-border">
         <h2 class="box-title">Tambah Unsur Penunjang</h2>
       </div>
       <div class="box-body">
         <?= form_open_multipart('dosen/Penunjang/addMK',['class'=>'form-vertical'])?>
               <div class="form-group">
                  <label>Sub Kegiatan Penunjang</label>
                  <select class="form-control" name="subPenunjang" id="subPenunjang">
                    <option value="">Pilih Sub Kegiatan</option>
                    <?php foreach ($penunjang as $row): ?>
                      <option value="<?php echo $row['id_sub'] ?>"><?php echo $row['nama_sub'] ?></option>
                    <?php endforeach ?>
                  </select>
              </div>
              <div class="form-group">
                  <label>Uraian Penunjang</label>
                  <select class="form-control" name="cb_uraian" id="cb_uraian">
                    <option value="">Pilih Uraian Kegiatan</option>
                  </select>
              </div>
              <div class="form-group">
                   <label>Kegiatan</label>
                   <input type="text" id="exampleInputFile" placeholder="Kegiatan Penunjang" class="form-control" name="txt_keg">
              </div>
              <div class="form-group">
                   <label>Tingkat/Kedudukan</label>
                   <input type="text" id="t" placeholder="Tingkat/Kedudukan" class="form-control" name="txt_tingkat">
              </div>
              <div class="form-group">
                   <label>Tempat</label>
                   <input type="text" id="t" class="form-control" placeholder="Tempat" name="txt_tempat">
              </div>
              <div class="form-group">
                   <label>Tanggal</label>
                   <input type="date" name="txt_tgl" class="form-control">
              </div>
              <div class="form-group required">
                   <label>Satuan Hasil</label>
                   <input type="text" name="txt_satuan" id="exampleInputFile" class="form-control">
              </div>
              
             <div class="form-group">
                <label>Lampiran SK</label>
                <input type="file" name="userfile" class="form-control">
              </div>
              <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-flat"><i class="glyphicon glyphicon-save"></i> Simpan</button>
                  <a href="<?php echo base_url('dosen/Penunjang') ?>" class="btn btn-warning btn-flat"><i class="glyphicon glyphicon-remove"></i> Batal</a>
              </div>
              <?= form_close();?>
       </div>
     </div>     
  </section>

</div>
    <script type="text/javascript">
    $(document).ready(function(){
      $('#subPenunjang').change(function(){
        var penunjang = $('#subPenunjang').val();
        $.ajax({
          url: '<?php echo base_url('dosen/Penunjang/getUraian') ?>',
          type: 'GET',
          data: 'penunjang='+penunjang,
          dataType: 'json',
          success: function(data){
            var uraian = `<select id="cb_uraian" name="cb_uraian">
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