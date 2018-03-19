<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Data Pendidikan | SPKDOSEN</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url()?>/assets/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url()?>/assets/dist/css/AdminLTE.min.css">
</head>
<!-- onload="window.print();" -->
<body onload="window.print();" >
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <i class="fa fa-leaf"></i> UIN MALIKI Malang
          <small class="pull-right">Tanggal: <?php echo date('Y-M-d') ?></small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <hr>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="col-xs-12">
        <center><H4>SURAT PERNYATAAN <br>MELAKSANAKAN PENDIDIKAN</H4></center>
      </div>
      <div class="col-xs-12">
        <strong>Yang bertanda tangan dibawah ini :</strong>
        <div class="row">
          <div class="col-xs-2">
            <strong>&nbsp;&nbsp;&nbsp;Nama</strong><br>
            <strong>&nbsp;&nbsp;&nbsp;NIP</strong><br>
            <strong>&nbsp;&nbsp;&nbsp;Pangkat/Golongan</strong><br>
            <strong>&nbsp;&nbsp;&nbsp;Ruang/TMT</strong><br>
            <strong>&nbsp;&nbsp;&nbsp;Jabatan</strong><br>
            <strong>&nbsp;&nbsp;&nbsp;Unit Kerja</strong><br>
          </div>
          <div class="col-xs-6">
            <strong>&nbsp;&nbsp;&nbsp;: ...................</strong><br>
            <strong>&nbsp;&nbsp;&nbsp;: ...................</strong><br>
            <strong>&nbsp;&nbsp;&nbsp;: ...................</strong><br>
            <strong>&nbsp;&nbsp;&nbsp;: ...................</strong><br>
            <strong>&nbsp;&nbsp;&nbsp;: ...................</strong><br>
            <strong>&nbsp;&nbsp;&nbsp;: ...................</strong><br>
          </div>
        </div>
        <strong>Menyatakan bahwa</strong>
        <div class="row">
          <div class="col-xs-2">
            <strong>&nbsp;&nbsp;&nbsp;Nama</strong><br>
            <strong>&nbsp;&nbsp;&nbsp;NIP</strong><br>
            <strong>&nbsp;&nbsp;&nbsp;Pangkat/Golongan</strong><br>
            <strong>&nbsp;&nbsp;&nbsp;Ruang/TMT</strong><br>
            <strong>&nbsp;&nbsp;&nbsp;Jabatan</strong><br>
            <strong>&nbsp;&nbsp;&nbsp;Unit Kerja</strong><br>
          </div>
          <div class="col-xs-6">
            <strong>&nbsp;&nbsp;&nbsp;: <?php echo $identitas->nama ?></strong><br>
            <strong>&nbsp;&nbsp;&nbsp;: <?php echo $identitas->nip ?></strong><br>
            <strong>&nbsp;&nbsp;&nbsp;: <?php echo $identitas->pangkat ?>/<?php echo $identitas->golongan ?></strong><br>
            <strong>&nbsp;&nbsp;&nbsp;: <?php echo $identitas->golongan ?></strong><br>
            <strong>&nbsp;&nbsp;&nbsp;: <?php echo $identitas->jabatan ?></strong><br>
            <strong>&nbsp;&nbsp;&nbsp;: <?php echo $identitas->unit ?></strong><br>
          </div>
        </div>
        <strong>Telah Melaksanakan Pendidikan sebagai Berikut</strong>
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <td>No</td>
              <td>Uraian kegiatan</td>
              <td>Tanggal</td>
              <td>Jumlah Angka Kredit</td>
              <td>Bukti Fisik</td>
            </tr>
          </thead>
          <tbody>
            <?php $jumlahAk=0; ?>
            <?php foreach ($pendidikan as $row): ?>
              <?php $jumlahAk+=$row['jumlah_ak']; ?>
              <tr>
                <td><?php echo $row['id_pendidikan'] ?></td>
                <td><?php echo $row['nama_uraian'] ?></td>
                <td><?php echo $row['tanggal'] ?></td>
                <td><?php echo $row['jumlah_ak'] ?></td>
                <td><?php echo $row['satuan_hasil'] ?></td>
              </tr>
            <?php endforeach ?>
          </tbody>
          <tfoot>
            <tr>
              <td colspan="3"><strong>Jumlah Total</strong></td>
              <td colspan="2"><?php echo $jumlahAk ?></td>
            </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>
