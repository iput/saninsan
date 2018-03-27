<?php $this->load->view("atribut/headeradmin") ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Data Dosen</h1>
        <ol class="breadcrumb">
        	<li><a href="<?php echo base_url('admin/Admin') ?>"></a><i class="glyphicon glyphicon-home"></i> Beranda</li>
        	<li class="active">Data Dosen</li>
        </ol>
    </section>
    <section class="content">
    	<div class="box withborder">
    		<div class="box-header">
    			<h2 class="box-title">Data Dosen</h2>
    			<a class="btn btn-primary btn-flat pull-right" href="<?php echo base_url('admin/Dosen/Tambah') ?>"><i class="glyphicon glyphicon-plus-sign"></i> Tambah</a>
    		</div>
    		<div class="box-body">
    			<table id="tabeldosen" class="table table-bordered table-striped table-hover table-responsive">
    				<thead>
    					<tr>
    						<td>NIP</td>
    						<td>Nama</td>
    						<td>Pangkat/Golongan</td>
    						<td>Jabatan</td>
    						<td>Unit Kerja</td>
    						<td><i class="glyphicon glyphicon-cog"></i></td>
    					</tr>
    				</thead>
                    <tbody>
                        <?php foreach ($dosen as $row): ?>
                            <tr>
                                <td><?php echo $row['nip'] ?></td>
                                <td><?php echo $row['nama'] ?></td>
                                <td><?php echo $row['pangkat'] .' / ' .$row['golongan'] ?></td>
                                <td><?php echo $row['jabatan'] ?></td>
                                <td><?php echo $row['unit'] ?></td>
                                <td>
                                    <a href="#" data="<?php echo $row['id_dosen'] ?>" class="btn btn-default btn-sm" id="btn-edit"><i class="fa fa-pencil"></i> Edit</a>
                                    <button class="btn btn-warning btn-sm" data="<?php echo $row['id_dosen'] ?>" id="btn-hapus"> Hapus</button>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
    			</table>
    		</div>
    	</div>
    </section>
</div>
<div class="modal fade" tabindex="-1" id="modal-edit">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" data-dismiss="modal"><span>&times;</span></button>
                <b class="modal-title">EDIT DATA DOSEN</b>
            </div>
            <div class="modal-body">
                <form class="form-vertical" method="" action="" id="form-edit" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>NIP :</label>
                        <input type="hidden" name="id_dosen">
                        <input class="form-control" type="text" name="nip" placeholder="NIP">
                    </div>
                    <div class="form-group">
                        <label>NAMA LENGKAP :</label>
                        <input class="form-control"  type="text" name="namaLengkap" placeholder="Nama Lengkap">
                    </div>
                    <div class="form-group">
                        <label>PANGKAT :</label>
                        <select class="form-control" name="pangkat">
                            <option value="">Pilih Pangkat</option>
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
                            <option value="">Pilih Jabatan</option>
                            <option value="Asisten Ahli">Asisten Ahli</option>
                            <option value="Lektor">Lektor</option>
                            <option value="Lektor Kepala">Lektor Kepala</option>
                            <option value="Profesor">Profesor</option>
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
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-warning" data-dismiss="modal"><i class="fa fa-remove"></i> Batal</button>
                <button class="btn btn-success" id="btn-simpan"><i class="fa fa-save"></i> Simpan</button>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view("atribut/template_script") ?>
<script type="text/javascript">
  $(function(){
    var site_url = '<?php echo site_url() ?>';
    $('#tabeldosen').DataTable();
    $("tbody").on('click','#btn-edit', function() {
        var kode = $(this).attr('data');
        $('div#modal-edit').modal('show');
        $('form#form-edit').attr('action', site_url+'admin/dosen/update_dosen');
        $.ajax({
            type : 'ajax',
            method : 'post',
            url : site_url+'admin/dosen/edit_dosen',
            data : {kode : kode},
            async : false,
            dataType : 'json',
            success : function(response) {
                $('input[name=id_dosen]').val(response.id_dosen);
                $('input[name=nip]').val(response.nip);
                $('input[name=namaLengkap]').val(response.nama);
                $('input[name=unitKerja]').val(response.unit);
                $('select[name=pangkat]').val(response.pangkat);
                $('select[name=golongan]').val(response.golongan);
                $('select[name=jabatan]').val(response.jabatan);
                $('select[name=jurusan]').val(response.id_jur);
            }
        })
    })

    $('button#btn-simpan').click(function() {
        $.ajax({
            type : 'ajax',
            method : 'post',
            url : $('form#form-edit').attr('action'),
            data : new FormData($('#form-edit')[0]),
            contentType : false,
            processData : false,
            dataType : 'json',
            success: function(response) {
                if (response.success) {
                    swal("SUKSES","DATA DOSEN BERHASIL DI UPDATE","success").then(function() {
                        window.location.reload();
                    })
                }
            }
        })
    })
    $('tbody').on('click','button#btn-hapus', function() {
        var kode = $(this).attr('data');
        swal({
            title : "APAKAH ANDA YAKIN AKAN MENGHAPUS DATA DOSEN INI ?",
            type : 'warning',
            showCancelButton : true,
            confirmButtonColor : "#007AFF",
            confirmButtonText : "Ya",
            cancelButtonText : 'Tidak',
            closeOnConfirm : false
        }).then(function(isConfirmed) {
            if (typeof isConfirmed.value!= "undefined" && isConfirmed.value) {
                $.ajax({
                    type : 'ajax',
                    method : 'post',
                    url : site_url+'admin/dosen/hapus_dosen',
                    data : {kode : kode},
                    dataType : 'json',
                    async : false,
                    success : function(response) {
                        if (response.success) {
                            swal("BERHASIL", "DATA DOSEN BERHASIL DIHAPUS", "success").then(function() {
                                window.location.reload();
                            })
                        }
                    },
                    error : function(XHTMLResponse) {
                        console.log(XHTMLResponse);
                    }
                })
            }
        })
    })
  });
</script>
<?php $this->load->view("atribut/footer") ?>