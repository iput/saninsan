 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1><i class="glyphicon glyphicon-pencil"></i> Data Pendidikan</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">EDIT DATA PENDIDIKAN</li>
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
            <div class="box-body">
              <form method="POST" action="<?php echo base_url('dosen/Pendidikan/simpanPendidikan')?>" class="form-vertical">
               <div class="form-group">
                  <label>Sub Kegiatan Pendidikan</label>
                  <select class="form-control" name="subPendidikan" id="subPendidikan">
                    <option>Pilih Sub Kategori Pendidikan</option>
                    <?php foreach ($subUnsur as $row): ?>
                      <option value="<?php echo $row['id_sub'] ?>"><?php echo $row['nama_sub'] ?></option>
                    <?php endforeach ?>
                  </select>
              </div>
              <div class="form-group">
                  <label>Uraian Pendidikan</label>
                  <select class="form-control" name="cb_uraian" id="cb_uraian">
                  </select>
              </div>
              <div class="form-group required">
                   <label>Tempat/Instansi</label>
                   <input type="text" name="txt_tempat" class="form-control" placeholder="lokasi pelaksanaan">
              </div>
              <div class="form-group required">
                   <label>Tanggal</label>
                   <input type="date" name="txt_tgl" class="form-control">
              </div>
              <div class="form-group required">
                   <label>Satuan Hasil</label>
                   <input type="text" name="txt_satuan" class="form-control" placeholder="satuan hasil">
              </div>
              <div class="form-group">
                   <label>Lampiran SK</label>
                     <input type="file" id="t" name="userfile">
              </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-flat"><i class="glyphicon glyphicon-refresh"></i> Update</button>
            </div>
          </form>
            </div>
            <!-- form start -->

        </div>
      </div>
    </div>
  </section>

</div>
<!-- /.box -->
<script type="text/javascript">
  $(document).ready(function(){
    $('#subPendidikan').change(function() {
      var pendidikan = $('#subPendidikan').val();
      $.ajax({
        url:'<?php echo base_url('dosen/Pendidikan/getUraian'); ?>',
        type: 'GET',
        data: 'pendidikan='+pendidikan,
        dataType: 'json',
        success: function(data){
          var uraian = `<select id="cb_uraian" name="cb_uraian">
          <option value="">Pilih uraian</option>`;
          for (var i = 0; i < data.length; i++) {
            uraian+='<option value="'+data[i].id_uraian+'">'+data[i].nama_uraian+'</option>';
          }
          uraian+='</select>';
          $('#cb_uraian').html(uraian);
        }
      });
    });
  });
</script>