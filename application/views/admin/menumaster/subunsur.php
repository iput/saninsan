<div class="content-wrapper">
	<section class="content-header">
		<h1>Tambah Sub unsur kegiatan</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url('admin/Kegiatan') ?>"><i class="glyphicon glyphicon-home"></i> Beranda</a></li>
			<li class="active">Tambah Sub Unsur</li>
		</ol>
	</section>
	<section class="content">
		<div class="box">
			<div class="box-header withborder">
				<h2 class="box-title">Tambah Sub unsur kegiatan</h2>
				<button class="btn btn-primary pull-right" data-toggle="modal" data-target="#tambahSub"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Sub unsur</button>
			</div>
			<div class="box-body">
				<h4><i class="glyphicon glyphicon-th-large"></i> <?php echo $unsur->nama_unsur ?></h4>
				<table class="table table-bordered table-striped table-hover">
					<thead>
						<tr>
							<td>ID</td>
							<td>Nama Unsur</td>
							<td>Nama Sub unsur</td>
							<td><i class="glyphicon glyphicon-cog"></i></td>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($subunsur as $row): ?>
							<tr>
								<td><?php echo $row['id_sub'] ?></td>
								<td><?php echo $row['nama_unsur'] ?></td>
								<td><?php echo $row['nama_sub'] ?></td>
								<td>
									
								</td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</section>
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="tambahSub">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header bg-info">
				<button class="close" data-dismiss="modal"><i>&times;</i></button>
				<h2 class="modal-title">Tambah sub kegiatan</h2>
			</div>
		</div>
	</div>
</div>