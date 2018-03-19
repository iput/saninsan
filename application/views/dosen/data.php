  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Diri <?php echo $this->session->userdata('username'); ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Daftar Dosen</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-3">
          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url('img/logo.jpg') ?>" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo $identitas->nama ?></h3>

              <p><?php echo $identitas->nip ?></p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Unit</b> <a class="pull-right"><?php echo $identitas->unit ?></a>
                </li>
                <li class="list-group-item">
                  <b>Jabatan</b> <a class="pull-right"><?php echo $identitas->jabatan ?></a>
                </li>
                <li class="list-group-item">
                  <b>Golongan</b> <a class="pull-right"><?php echo $identitas->golongan ?></a>
                </li>
                <li class="list-group-item">
                  <b>Status Akun</b><a class="pull-right"><p class="text-muted text-center"><?php if ($identitas->isActive=='0'){ ?>
                <?php echo 'Belum dikonfirmasi' ?>
              <?php } else if ($identitas->isActive=='1'){ ?>
                <?php echo 'Telah dikonfirmasi'; }?>
              </p></a>
                </li>
              </ul>

              <a href="<?php echo base_url('dosen/inputDosen/edit') ?>" class="btn btn-primary btn-block"><b>Lengkapi Data Diri</b></a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
          <!-- /.box -->