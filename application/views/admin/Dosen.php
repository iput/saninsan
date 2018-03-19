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
    			<table id="tabeldosen" class="table table-bordered table-hover table-responsive">
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
                                    <a href="<?php echo base_url('admin/Dosen/Detail/'.$row['id_dosen']) ?>" class="btn btn-info btn-flat btn-sm"><i class="glyphicon glyphicon-eye-open"></i></a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
    			</table>
    		</div>
    	</div>
    </section>
</div>
<?php $this->load->view("atribut/template_script") ?>
<script type="text/javascript">
  $(function(){
    $('#tabeldosen').DataTable();
  });
</script>
<?php $this->load->view("atribut/footer") ?>