<!DOCTYPE html>
<html>
<head>
	<title>Edit Paket</title>

	<?= link_tag('css/datetimepicker/bootstrap/css/bootstrap.css'); ?>
	<?= link_tag('css/datetimepicker/css/bootstrap-datetimepicker.css') ?>


</head>
		<body>
			<div class="container">
				<h1>Tambah Paket</h1>
				<?php echo validation_errors(); ?>
				<?php echo form_open('agen_controller/edit_paket/'.$paket['paket_nomor']); ?>

				<label for="paket_nomor">Nomor Paket : </label>
				<input type="text" name="paket_nomor" readonly value="<?=$paket['paket_nomor']?>"/>

				<br/ >

				<label for="paket_nama">Nama Paket : </label>
				<input type="text" name="paket_nama" required value="<?=$paket['paket_nama'] ?>" />

				<br/ >				

				<label for="paket_harga">Harga Paket : </label>
				Rp. <input type="text" name="paket_harga" required value="<?= $paket['paket_harga'] ?>" />

				<br/ >

				<label for="paket_deskripsi"> Paket Deskripsi : </label>
				<textarea name="paket_deskripsi"><?= $paket['paket_deskripsi'] ?></textarea>

				<br/ >

				<label for="paket_mekah">Paket Mekah : </label>
				<textarea name="paket_mekah"><?= $paket['paket_mekah'] ?></textarea>

				<br/ >

				<label for="paket_madinah">Paket Madinah : </label>
				<textarea name="paket_madinah"><?= $paket['paket_madinah'] ?></textarea>

				<br/ >

				<label for="paket_tipe">Tipe Paket : </label>
				<select name="paket_tipe">
					<option value="double" >Double (2 orang)</option>
					<option value="triple" >Triple (3 Orang)</option>
					<option value="quad"   >Quad (4 Orang)</option>
				</select>


				<br/ >

				<label for="paket_bulan_berangkat">Bulan Berangkat : </label>
				<select name="paket_bulan_berangkat">
					<option value="Januari">Januari</option>
					<option value="Februari">Februari</option>
					<option value="Maret">Maret</option>
					<option value="April">April</option>
					<option value="Mei">Mei</option>
					<option value="Juni">Juni</option>
					<option value="Agustus">Agustus</option>
					<option value="September">September</option>
					<option value="Oktober">Oktober</option>
					<option value="November">November</option>
					<option value="Desember">Desember</option>
				</select>

				<br />


				<label for="paket_tanggal_berangkat">Tanggal Berangkat : </label>
					
				 <div class="input-group date form_datetime col-md-5" data-date="<?= $paket['paket_tgl_berangkat'] ?>" data-date-format="yyyy-mm-dd HH:ii:ss" data-link-field="dtp_input1">
                    <input class="form-control" size="16" type="text" value="<?= $paket['paket_tgl_berangkat'] ?>" name="paket_tgl_berangkat" readonly>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
					<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                </div>
				<label for="paket_tanggal_pulang">Tanggal Pulang : </label>
				 <div class="input-group date form_datetime col-md-5" data-date="<?= $paket['paket_tgl_berangkat'] ?>" data-date-format="yyyy-mm-dd HH:ii:ss" data-link-field="dtp_input1">
                    <input class="form-control" size="16" type="text" value="<?= $paket['paket_tgl_berangkat'] ?>" name="paket_tgl_pulang" readonly>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
					<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                </div>

				<label for="paket_level">Level Paket : </label>
				<select name="paket_level">
					<option value="economy">Economy</option>
					<option value="bussiness">Bussiness</option>
					<option value="executive">Executive</option>
				</select>

				<br />

				<input type="submit" value="submit"> | <button type="button" onclick=location.href="<?= site_url() ?>/agen_controller/view_all_paket">Kembali</button>
				<?php form_close();?>
		

<script type="text/javascript" src="<?= base_url(); ?>css/datetimepicker/jquery/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>css/datetimepicker/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>css/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>css/datetimepicker/js/locales/bootstrap-datetimepicker.id.js"></script>
<script type="text/javascript">
	$('.form_datetime').datetimepicker({
		language : 'id',
		weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		forceParse: 0,
        showMeridian: 1
	});

</script>
</body>


</html>