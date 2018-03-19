<footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.6
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>
</div>
<!-- ./wrapper -->
<script type="text/javascript">
	$(document).ready(function() {
    $('#anggaran_proyek').maskMoney({prefix: 'Rp. ', thousands: '.', decimal: ',', precision: 0});
    $('#edit_anggaran_proyek').maskMoney({prefix: 'Rp. ', thousands: '.', decimal: ',', precision: 0});
    $('#jumlah_anggaran').maskMoney({prefix: 'Rp. ', thousands: '.', decimal: ',', precision: 0});
    $('#edit_jumlah_anggaran').maskMoney({prefix: 'Rp. ', thousands: '.', decimal: ',', precision: 0});
    $('#jumlah_pemasukkan').maskMoney({prefix: 'Rp. ', thousands: '.', decimal: ',', precision: 0});
    $('#jumlah_pengeluaran').maskMoney({prefix: 'Rp. ', thousands: '.', decimal: ',', precision: 0});
    $('#edit_jumlah_ppemasukkan').maskMoney({prefix: 'Rp. ', thousands: '.', decimal: ',', precision: 0});
    $('#edit_jumlah_ppengeluaran').maskMoney({prefix: 'Rp. ', thousands: '.', decimal: ',', precision: 0});
    $('#jumlah_pengeluaranP').maskMoney({prefix: 'Rp. ', thousands: '.', decimal: ',', precision: 0});
    $('#edit_jumlah_pengeluaranP').maskMoney({prefix: 'Rp. ', thousands: '.', decimal: ',', precision: 0});
    $('#datepicker').datepicker({
      autoclose: true
    });
    });

	function isNumberKey(evt){
		var charCode = (evt.which)? evt.which: event.keyCode
		if (charCode > 31 && (charCode < 48 || charCode > 57))
			return false;
			return true;
    }
</script>
</body>
</html>
