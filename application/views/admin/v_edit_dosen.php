<?php $this->load->view('atribut/headeradmin') ?>
<div class="content-wrapper">
	<section class="content-header">
		<h1>FORM EDIT <small>DATA DOSEN</small></h1>
	</section>
	<section class="content">
		<div class="box box-success">
			<div class="box-header with-border">
				<h1 class="box-title">EDIT DATA DOSEN <?php echo $dosen->nama ?></h1>
			</div>
			<div class="box-body">
				<?= form_open_multipart('admin/Dosen/TambahDosen',['class'=>'form-vertical'])?>
					<div class="form-group">
						<label>NIP :</label>
						<input class="form-control" type="text" name="nip" value="<?php echo $dosen->nip ?>">
					</div>
					<div class="form-group">
						<label>NAMA LENGKAP :</label>
						<input class="form-control"  type="text" name="namaLengkap" value="<?php echo $dosen->nama ?>">
					</div>
					<div class="form-group">
						<label>PANGKAT :</label>
						<select class="form-control" name="pangkat">
							<option value="0">Pilih Pangkat</option>
							<option value="Tingkat I">Penata Tingkat I</option>
							<option value="Tingkat II">Penata Tingkat II</option>
							<option value="Tingkat III">Penata Tingkat III</option>
							<option value="Tingkat IV">Penata Tingkat IV</option>
						</select>
					</div>
					<div class="form-group">
						<label>GOLONGAN</label>
						<select class="form-control" name="golongan">
							<option value="">Pilih Golongan</option>
							<option value="Golongan I">I</option>
							<option value="Golongan II">II</option>
							<option value="Golongan III">III</option>
						</select>
					</div>
					<div class="form-group">
						<label>JABATAN :</label>
						<select class="form-control" name="jabatan">
							<option value="NULL">Pilih Jabatan</option>
							<option value="Asisten Ahli">Asisten Ahli</option>
							<option value="Lektor">Lektor</option>
							<option value="Lektor Kepala">Lektor Kepala</option>
							<option value="Profesor">Profesor</option>
						</select>
					</div>
					<div class="form-group">
						<label>UNIT KERJA :</label>
						<input class="form-control" type="text" name="unitKerja" value="<?php echo $dosen->unit ?>">
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
<?php $this->load->view('atribut/template_script') ?>
<?php $this->load->view('atribut/footer') ?>