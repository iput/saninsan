<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SISPENDUKAS | Daftarkan reviewer</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
    <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/font-awesome/css/font-awesome.css') ?>">
  <!-- Ionicons -->
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/css/AdminLTE.min.css">
  <!-- iCheck -->

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="<?php echo base_url('login')?>"><b>SPK</b>DOSEN</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Daftarkan diri sebagai reviewer</p>
    <div class="alert alert-success" style="display: none;"></div>

    <form action="<?php echo base_url('login/daftarReviewer')?>" method="post">
      <?= validation_errors()?>
      <div class="form-group has-feedback">
          <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
          <input type="text" class="form-control" placeholder="Username" name="username">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
          <input type="password" class="form-control" placeholder="Password" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
          <input type="password" class="form-control" placeholder="Retype password" name="password">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <select name="levelPengguna" class="form-control">
          <option value="0">Pilih level Pengguna</option>
          <option value="1">Dosen</option>
          <option value="2">Reviewer</option>
        </select>
      </div>
      <div class="row">
        <div class="col-xs-8">
              <a href="<?php echo base_url('login') ?>" class="btn btn-info btn-flat">Login</a>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url()?>assets/plugins/jquery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript">
  <?php if ($this->session->flashdata('sukses')): ?>
  $('.alert-success').html('<?php echo $this->session->flashdata('sukses'); ?>').fadeIn();
  <?php endif; ?>
</script>
</body>
</html>
