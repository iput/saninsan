<div class="content-wrapper">
	<section class="content-header">
		<h1>Review Penelitian Dosen</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url('reviewer/Reviewer') ?>"><i class="fa fa-dashboard"></i> Beranda</a></li>
			<li class="active">Review Jurnal</li>
		</ol>
	</section>
	<section class="content">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h2 class="box-title">Form Review Jurnal</h2>
				<a href="<?php echo base_url('reviewer/Penelitian') ?>" class="btn btn-success btn-flat pull-right"><i class="glyphicon glyphicon-backward"></i> Kembali</a>
			</div>

			<div class="box-body">
				<legend class="text-center">LEMBAR<br>HASIL PENILAIAN SEBIDANG ATAU PEER REVIEW<br>KARYA ILMIAH/JURNAL ILMIAH</legend>
				<div class="row">
					<div class="col-md-4">
						<h4>Judul Jurnal Ilmiah</h4>
					</div>
					<div class="col-md-8">
						<h4>: <?php echo $reviewjurnal->judul ?></h4>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<h4>Penulis Jurnal Ilmiah</h4>
					</div>
					<div class="col-md-8">
						<h4>: <?php echo $reviewjurnal->nama ?></h4>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-md-4">
						<h4>Identitas Jurnal Ilmiah</h4>
					</div>
					<div class="col-md-8">
						<div class="row">
							<div class="col-sm-6">
								<h4>A. Nama Jurnal</h4>
							</div>
							<div class="col-sm-6">
								<h4>: <?php echo $reviewjurnal->judul ?></h4>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<h4>B. Nomor/Volume</h4>
							</div>
							<div class="col-sm-6">
								<h4>: <?php echo $reviewjurnal->id_penelitian ?></h4>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<h4>C. Edisi</h4>
							</div>
							<!-- <div class="col-sm-6">
								<h4>: <?php echo $reviewjurnal->jumlah_volume ?></h4>
							</div> -->
						</div>
						<div class="row">
							<div class="col-sm-6">
								<h4>D. Penerbit</h4>
							</div>
							<div class="col-sm-6">
								<h4>: <?php echo $reviewjurnal->pangkat ?></h4>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<h4>E. Jumlah Halaman</h4>
							</div>
							<div class="col-sm-6">
								<h4>: <?php echo $reviewjurnal->id_penelitian ?></h4>
							</div>
						</div>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-md-4">
						<h4>kategori Jurnal Ilmiah</h4>
					</div>
					<div class="col-md-8">
						<h4>: Internasional</h4>
					</div>
				</div>
				<hr>
				<form method="POST" action="<?php echo base_url('reviewer/Penelitian/tambahReview') ?>">
					<table class="table table-hover table-bordered table-striped">
					<thead>
						<tr>
							<th rowspan="2" class="text-center">Komponen Penilaian</th>
							<th colspan="3" class="text-center">Nilai Maksimal Jurnal Ilmiah</th>
							<th rowspan="2" class="text-center">Nilai akhir perolehan</th>
						</tr>
						<tr>
							<th>Internasional</th>
							<th>Nasional terakreditasi</th>
							<th>Nasional belum terakreditasi</th>
							
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Kelengkapan unsur isi Jurnal (10%)</td>
							<td></td>
							<td></td>
							<td></td>
							<td>
								<input class="form-control" type="number" name="kelengkapan" placeholder="Masukan nilai">
							</td>
						</tr>
						<tr>
							<td>Ruang Lingkup dan Kedalaman Pembahasan (30%)</td>
							<td></td>
							<td></td>
							<td></td>
							<td>
								<input class="form-control" type="number" name="kelengkapan" placeholder="Masukan nilai">
							</td>
						</tr>
						<tr>
							<td>Kecukupan dan kemutahiran data informasi dan metodologi (30%)</td>
							<td></td>
							<td></td>
							<td></td>
							<td>
								<input class="form-control" type="number" name="kelengkapan" placeholder="Masukan nilai">
							</td>
						</tr>
						<tr>
							<td>Kelengkapan unsur dan kualitas penerbit (30%)</td>
							<td></td>
							<td></td>
							<td></td>
							<td>
								<input class="form-control" type="number" name="kelengkapan" placeholder="Masukan nilai">
							</td>
						</tr>
					</tbody>
					<tfoot>
						<tr>
							<td colspan="4"></td>
							<td>
								<button class="btn btn-info btn-flat" type="submit"><i class="glyphicon glyphicon-send"></i> Review Jurnal</button>
							</td>
						</tr>
					</tfoot>
				</table>
				</form>
			</div>
		</div>
	</section>
</div>