<?php $this->load->view('atribut/headeradmin') ?>
<div class="content-wrapper">
	<section class="content-header">
		<h1>DETAIL <small>PENGAJUAN DATA KENAIKAN</small></h1>
		<ul class="breadcrumb">
			<li><a href="<?php echo site_url('admin/admin') ?>"><i class="fa fa-dashboard"></i>Beranda</a></li>
			<li><a href="<?php echo site_url('admin/dosen') ?>">Dosen</a></li>
			<li class="active">Detail pengajuan Data</li>
		</ul>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-3">
			          <!-- Profile Image -->
          <div class="box box-primary">
          	<div class="box-header with-border">
          		<h1 class="box-title"><i class="fa fa-user"></i> IDENTITAS DOSEN</h1>
          	</div>
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url('uploads/'.$detail->foto) ?>" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo $detail->nama ?></h3>

              <p class="text-muted text-center"><?php echo $detail->nip ?></p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Pangkat/Golongan</b> <a class="pull-right"><?php echo $detail->pangkat.' / '.$detail->golongan ?></a>
                </li>
                <li class="list-group-item">
                  <b>Jabatan</b> <a class="pull-right"><?php echo $detail->jabatan ?></a>
                </li>
                <li class="list-group-item">
                  <b>Unit kerja</b> <a class="pull-right"><?php echo $detail->unit ?></a>
                </li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
			</div>
			<div class="col-md-9">
				<legend>INSTRUMEN PENILAIAN KENAIKAN PANGKAT</legend>
				<div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#pendidikan" data-toggle="tab">Pendidikan</a></li>
              <li><a href="#pengajaran" data-toggle="tab">Pengajaran</a></li>
              <li><a href="#penelitian" data-toggle="tab">Penelitian</a></li>
              <li><a href="#pengabdian" data-toggle="tab">Pengabdian</a></li>
              <li><a href="#penunjang" data-toggle="tab">Penunjang</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="pendidikan">
                <!-- Post -->
                <div class="post">
                  <div class="user-block">
                  	<legend>UNSUR PENDIDIKAN</legend>
                        </span>
                  </div>
                  <!-- /.user-block -->
                </div>
                <!-- /.post -->
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="pengajaran">
                <!-- The timeline -->
                <div class="user-block">
                  	<legend>UNSUR PENGAJARAN</legend>
                </div>
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="penelitian">
              	<div class="user-block">
                  	<legend>UNSUR PENELITIAN</legend>
                </div>
              </div>

              <div class="tab-pane" id="pengabdian">
              	<div class="user-block">
                  	<legend>UNSUR PENGABDIAN</legend>
                </div>
              </div>

              <div class="tab-pane" id="penunjang">
              	<div class="user-block">
                  	<legend>UNSUR PENUNJANG</legend>
                </div>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
			</div>
		</div>
	</section>
</div>
<?php $this->load->view('atribut/template_script') ?>
<?php $this->load->view('atribut/footer') ?>