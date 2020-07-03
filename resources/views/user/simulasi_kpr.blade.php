<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<label>Harga Properti</label>
<input type="text" name="properti">
<br>
<label>Uang Muka 20%</label>
<p>Rp. <span id="uang_muka">0</span></p>
<br>
<label>Jumlah Pinjaman</label>
<p>Rp. <span id="pokok_pinjaman">0</span></p>
<br>
<label>Jangka Waktu dalam tahun</label>
<input type="text" name="tendor">
<br>
<label>estimasi Bunga %</label>
<input type="text" name="bunga">
<br>
<label>angsuran per bulan</label>
<p>Rp. <span id="angsuran">0</span></p>

<script type="text/javascript">
	$(document).ready(function(){
		$('input[name=properti]').keyup(function(){
			var harga = $('input[name=properti]').val();
			var dp = harga*20/100;
			var pinjaman = harga-dp;
			$('#uang_muka').html(dp);
			$('#pokok_pinjaman').html(pinjaman);
		});
	});
</script>
</body>
</html>