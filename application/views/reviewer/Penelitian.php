  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        data Penelitian Dosen
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('reviewer/Reviewer') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Daftar Reviewer</li>
      </ol>
    </section>


    <!-- Main content -->

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              Data Jurnal Review
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="exampleb 2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Judul Penelitian</th>
                  <th>Link</th>
                  <th><i class="glyphicon glyphicon-edit"></i></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($penelitian as $row): ?>
                  <tr>
                    <td><?php echo $row['id_penelitian'] ?></td>
                    <td><?php echo $row['nama'] ?></td>
                    <td><?php echo $row['judul'] ?></td>
                    <td><?php echo $row['link'] ?></td>
                    
                    <td>
                      <a href="<?php echo base_url('reviewer/Penelitian/review/'.$row['id_penelitian']) ?>" class="btn btn-info btn-flat btn-xs"><i class="glyphicon glyphicon-check"></i> Review Jurnal</a>
                    </td>
                  </tr>
                <?php endforeach ?>               
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->