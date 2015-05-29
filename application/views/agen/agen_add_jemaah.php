<!DOCTYPE html>
<html>
<head>
	<title>Add Paket</title>

	<?= link_tag('css/datetimepicker/bootstrap/css/bootstrap.css'); ?>
	<?= link_tag('css/datetimepicker/css/bootstrap-datetimepicker.css') ?>


</head>
		<body>
			<div class="container">
				<h1>Tambah Paket</h1>
				<?php echo validation_errors(); ?>
				<?php echo form_open_multipart('agen_controller/add_jemaah/insert'); ?>

				<input type="hidden" value="1" name="trigger" />
				<label for="jemaah_token">Kode Jemaah : </label>
				<input type="text" name="jemaah_token" value="<?= $nomor; ?>" readonly required/>

				<br/ >

				<label for="jemaah_nama">Nama Jemaah : </label>
				<input type="text" name="jemaah_nama" required/>

				<br/ >				

				<label for="jemaah_tempat_lahir">Tempat Lahir Jemaah : </label>
				<input type="text" name="jemaah_tempat_lahir" required/>

				<br/ >

				<label for="jemaah_ttl">Tanggal Lahir Jemaah : </label>
				 <div class="input-group date form_datetime col-md-5" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input1" data-link-format="yyy-mm-dd">
                    <input class="form-control" size="16" type="text" required value="" required name="jemaah_ttl" readonly>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
					<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                </div>


				<br/ >

				<label for="jemaah_nama_ayah">Nama Ayah Jemaah : </label>
				<input type="text" name="jemaah_nama_ayah" required/>

				<br/ >

				<label for="jemaah_no_ktp">No KTP Jemaah : </label>
				<input type="text" name="jemaah_no_ktp" required/>

				<br/ >

				<label for="jemaah_alamat">Alamat Jemaah : </label>
				<input type="text" name="jemaah_alamat" required/>

				<label for="jemaah_kelurahan"> Kelurahan  </label>
				<input type="text" name="jemaah_kelurahan" required/>

				<label for="jemaah_kecamatan"> Kecamatan : </label>
				<input type="text" name="jemaah_kecamatan" required/>

				<br />

				<label for="jemaah_kota_kab">Kota/Kabupaten : </label>
				<input type="text" name="jemaah_kota_kab" required/>

				<br/ >

				<label for="jemaah_kodepos"> Kode Pos : </label>
				<input type="text" name="jemaah_kodepos" required/>

				<br/ >

				<label for="jemaah_tlp_rumah">No Telepon Rumah Jemaah : </label>
				<input type="text" name="jemaah_tlp_rumah" required/>

				<br/ >

				<label for="jemaah_kantor">Kantor Jemaah : </label>
				<input type="text" name="jemaah_kantor" required/>

				<br/ >

				<label for="jemaah_phone">No HP Jemaah : </label>
				<input type="text" name="jemaah_phone" />

				<br/ >

				<label for="jemaah_email">E-Mail Jemaah : </label>
				<input type="email" name="jemaah_email" />

				<br/ >

				<label for="jemaah_no_pasport">No Paspor Jemaah : </label>
				<input type="text" name="jemaah_no_pasport" required/>

				<br/ >

				<label for="jemaah_tgl_buat">Tanggal Buat Paspor : </label>
				 <div class="input-group date form_datetime col-md-5" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input1" data-link-format="yyy-mm-dd">
                    <input class="form-control" size="16" type="text" required value="" required name="jemaah_tgl_buat" readonly>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
					<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                </div>

                <label for="jemaah_tgl_berakhir">Tanggal Berakhir Paspor : </label>
				 <div class="input-group date form_datetime col-md-5" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input1" data-link-format="yyy-mm-dd">
                    <input class="form-control" size="16" type="text" required value="" required name="jemaah_tgl_berakhir" readonly>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
					<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                </div>

				<label for="jemaah_tmp_pembuatan">Tempat Pembuatan Paspor Jemaah : </label>
				<input type="text" name="jemaah_tmp_pembuatan" required/>

				<br/ >

				<label for="jemaah_foto">Foto Jemaah : </label>
				<input type="file" name="jemaah_foto" required/>

				<br/ >

				<label for="jemaah_username">Username Jemaah : </label>
				<input type="text" name="jemaah_username" value="<?= $username; ?>" />

				<br/ >

				<label for="jemaah_password">Password Jemaah : </label>
				<input type="password" name="jemaah_password" value="<?= $password ?>" required/> Default : 12345678

				<br/ >




				<input type="submit" value="submit"> | <button type="button" onclick=location.href="view_all_paket">Kembali</button>
				<?php form_close();?>
		

<script type="text/javascript" src="<?= base_url(); ?>css/datetimepicker/jquery/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>css/datetimepicker/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>css/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>css/datetimepicker/js/locales/bootstrap-datetimepicker.id.js"></script>
<script type="text/javascript">
	$('.form_datetime').datetimepicker({
		language : 'id',
		// weekStart: 1,
  //       todayBtn:  1,
		// autoclose: 1,
		// todayHighlight: 1,
		// startView: 2,
		// forceParse: 0,
  //       showMeridian: 1
  		weekStart: 1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		maxView: 4,
		forceParse: 0
	});

</script>
</body>


</html>