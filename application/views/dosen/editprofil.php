  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Edit Profil Dosen <?php echo $profile->id_dosen ?>
      </h1>
      <ol class="breadcrumb">
      <!--   <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li> -->
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-xs-3">
          <!-- general form elements -->
          <div class="box box-primary">
            <!-- /.box-header -->
            <!-- form start -->
            <div class="box-body">
              <form method="POST" action="<?php echo base_url('dosen/InputDosen/updatedatadosen')  ?>" class="form-horizontal">
                <input type="hidden" name="id" value="<?php echo $profile->id_dosen ?>">
<div class="form-group required">
  <label class="col-sm-2 control-label" for="">Nama</label>
  <div class="col-md-6">
    <input type="text" name="txt_nama" class="form-control " value="<?php echo $profile->nama ?>" />
  </div>
</div>
<div class="form-group required">
  <label class="col-sm-2 control-label" for="">NIP</label>
  <div class="col-md-6">
    <input type="text" name="txt_nip" id="" class="form-control" value="<?php echo $profile->nip ?>"/>
  </div>
</div>
<div class="form-group required">
  <label class="col-sm-2 control-label" for="">Pangkat</label>
  <div class="col-md-6">
    <input type="text" name="txt_pangkat" id="" class="form-control" value="<?php echo $profile->pangkat ?>"/>
  </div>
</div>
<div class="form-group required">
  <label class="col-sm-2 control-label" for="">Golongan Ruang</label>
  <div class="col-md-6">
    <input type="text" name="txt_gol" id="" class="form-control" value="<?php echo $profile->golongan ?>"/>
  </div>
</div>
<div class="form-group required">
  <label class="col-sm-2 control-label" for="">Jabatan</label>
  <div class="col-md-6">
    <input type="text" name="txt_jabatan" id="" class="form-control " value="<?php echo $profile->jabatan ?>" />
  </div>
</div>
<div class="form-group required">
  <label class="col-sm-2 control-label" for="">Unit Kerja</label>
  <div class="col-md-6">
    <input type="text" name="txt_unit" id="" class="form-control " value="<?php echo $profile->unit ?> "/>   
  </div>
</div>

<div class="form-group">
  <label class="col-sm-2 control-label">&nbsp;</label>
  <div class="col-md-6">
    <button type="submit" class="btn btn-primary btn-flat" >SUBMIT</button>
  </div>
</div>
</form>
</div>
</div>
</div>
</section>
</div>

        
