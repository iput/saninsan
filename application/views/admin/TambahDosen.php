<div class="content-wrapper">
	<section class="content-header">
		<h2>Tambah Dosen</h2>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url('admin/Admin') ?>"><i class="glyphicon glyphicon-home"></i> Beranda</a></li>
			<li><a href="<?php echo base_url('admin/Dosen') ?>">Dosen</a></li>
			<li class="active">Tambah Dosen</li>
		</ol>
	</section>
	<section class="content">
		<div class="box">
			<div class="box-header">
				<h2 class="box-title">Tambah Data Dosen</h2>
			</div>
			<div class="box-body">

				<?= form_open_multipart('admin/Dosen/TambahDosen',['class'=>'form-vertical'])?>
					<div class="form-group">
						<label>NIP :</label>
						<input class="form-control" type="text" name="nip" placeholder="NIP">
					</div>
					<div class="form-group">
						<label>NAMA LENGKAP :</label>
						<input class="form-control"  type="text" name="namaLengkap" placeholder="Nama Lengkap">
					</div>
					<div class="form-group">
						<label>PANGKAT :</label>
						<select class="form-control" name="pangkat">
							<option value="0">Pilih Pangkat</option>
							<option value="1">Penata Tingkat I</option>
							<option value="2">Penata Tingkat II</option>
							<option value="3">Penata Tingkat III</option>
							<option value="4">Penata Tingkat IV</option>
						</select>
					</div>
					<div class="form-group">
						<label>GOLONGAN</label>
						<select class="form-control" name="golongan">
							<option value="">Pilih Golongan</option>
							<option value="1">I</option>
							<option value="2">II</option>
							<option value="3">III</option>
						</select>
					</div>
					<div class="form-group">
						<label>JABATAN :</label>
						<select class="form-control" name="jabatan">
							<option value="">Pilih Jabatan</option>
							<option value="1">Asisten Ahli</option>
							<option value="2">Lektor</option>
							<option value="3">Lektor Kepala</option>
							<option value="4">Profesor</option>
						</select>
					</div>
					<div class="form-group">
						<label>UNIT KERJA :</label>
						<input class="form-control" type="text" name="unitKerja" placeholder="unit kerja">
					</div>
					<div class="form-group">
						<label>JURUSAN</label>
						<select class="form-control" name="jurusan">
							<option>Pilih jurusan</option>
							<?php foreach ($jurusan as $row): ?>
								<option value="<?php echo $row['id_jur'] ?>"><?php echo $row['nama_jur'] ?></option>
							<?php endforeach ?>
						</select>
					</div>
					<div class="form-group">
						<label>FOTO PROFIL</label>
						<input class="form-control" type="file" name="userfile"></input>
					</div>
					<div class="form-group">
						<a href="<?php echo base_url('admin/Dosen') ?>" class="btn btn-warning btn-flat" ><i class="glyphicon glyphicon-remove"></i> Batal</a>
						<button class="btn btn-info btn-flat" type="submit"><i class="glyphicon glyphicon-save"></i> Tambahkan</button>
					</div>
				<?=form_close();?>
			</div>
		</div>
	</section>
</div>