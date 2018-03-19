<div class="modal fade" tabindex="-1" id="modal_logout">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-red">
                <button class="close" data-dismiss="modal"><i class="fa fa-times"></i></button>
                <p class="modal-title">Konfirmasi Keluar Aplikasi</p>
            </div>
            <div class="modal-body">
                <b>Apakah anda yakin akan keluar dari aplikasi Samade ?</b>
            </div>
            <div class="modal-footer">
                <button class="btn btn-warning btn-flat" data-dismiss="modal"><i class="fa fa-remove"></i> Batal</button>
                <a href="<?php echo base_url('Login/cekLogout') ?>" class="btn btn-success btn-flat">Keluar <i class="fa fa-sign-out"></i></a>
            </div>
        </div>
    </div>
</div>

<footer class="main-footer">
    <strong>Copyright &copy; 2018 <a href="javascript:;">Dispenda Malang</a>.</strong> All rights
    reserved.
</footer>

<script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- <script type="text/javascript" src="<?php echo base_url() . "assets/js/masking/jquery.maskedinput.js"; ?>"></script> -->
<script type="text/javascript" src="<?php echo base_url() . "assets/js/jquery.mask.js"; ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/js/app.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/plugins/')."datatables/datatables.min.js"; ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/plugins/')."datatables/plugins/bootstrap/datatables.bootstrap.js"; ?>"></script>
<script src="<?php echo base_url() ?>/assets/plugins/sweetalert2/dist/sweetalert2.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url(); ?>assets/js/jquery.slimscroll.js"></script>
<script src="<?php echo base_url('assets/plugins/ckeditor/ckeditor.js') ?>"></script>
<script src="<?php echo base_url(); ?>assets/js/adminlte.min.js"></script>
<script type="text/javascript">
    var site_url = '<?php echo site_url(); ?>';
    $(function() {
        $('a#btn_logout').click(function() {
            $('div#modal_logout').modal('show');
        })
    })
</script>