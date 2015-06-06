<!DOCTYPE html>
<html>
<head>
	<title>Detail Jemaah</title>

	<?= link_tag('css/datetimepicker/bootstrap/css/bootstrap.css'); ?>
	<?= link_tag('css/datetimepicker/css/bootstrap-datetimepicker.css') ?>


</head>
		<body>
			<div class="container">
				<h1>Detail Jemaah</h1>
				<label for="jemaah_token">Kode Jemaah : </label>
				<input type="text" name="jemaah_token" value="<?= $jemaah['jemaah_token'] ?>" readonly/>

				<br/ >

				<label for="jemaah_nama">Nama Jemaah : </label>
				<input type="text" name="jemaah_nama"  value="<?= $jemaah['jemaah_nama'] ?>"  readonly/>

				<br/ >				

				<label for="jemaah_tempat_lahir">Tempat Lahir Jemaah : </label>
				<input type="text" name="jemaah_tempat_lahir" value="<?= $jemaah['jemaah_tempat_lahir'] ?>"  readonly />

				<br/ >

				<label for="jemaah_ttl">Tanggal Lahir Jemaah : </label>
				 <div class="input-group date form_datetime col-md-5" data-date="<?= $jemaah['jemaah_ttl'] ?>" data-date-format="yyyy-mm-dd" data-link-field="dtp_input1" data-link-format="yyy-mm-dd">
                    <input class="form-control" size="16" type="text" value="<?= $jemaah['jemaah_ttl'] ?>" readonly name="jemaah_ttl" readonly>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
					<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                </div>


				<br/ >

				<label for="jemaah_nama_ayah">Nama Ayah Jemaah : </label>
				<input type="text" name="jemaah_nama_ayah" value="<?= $jemaah['jemaah_nama_ayah'] ?>" readonly/>

				<br/ >

				<label for="jemaah_no_ktp">No KTP Jemaah : </label>
				<input type="text" name="jemaah_no_ktp"value="<?= $jemaah['jemaah_no_ktp'] ?>"readonly/>

				<br/ >

				<label for="jemaah_alamat">Alamat Jemaah : </label>
				<input type="text" name="jemaah_alamat" value="<?= $jemaah['jemaah_alamat'] ?>" readonly/>

				<label for="jemaah_kelurahan"> Kelurahan  </label>
				<input type="text" name="jemaah_kelurahan" value="<?= $jemaah['jemaah_kelurahan'] ?>" readonly/>

				<label for="jemaah_kecamatan"> Kecamatan : </label>
				<input type="text" name="jemaah_kecamatan" value="<?= $jemaah['jemaah_kecamatan'] ?>"readonly/>

				<br />

				<label for="jemaah_kota_kab">Kota/Kabupaten : </label>
				<input type="text" name="jemaah_kota_kab" value="<?= $jemaah['jemaah_kota_kab'] ?>" readonly/>

				<br/ >

				<label for="jemaah_kodepos"> Kode Pos : </label>
				<input type="text" name="jemaah_kodepos" value="<?= $jemaah['jemaah_kodepos'] ?>" readonly/>

				<br/ >

				<label for="jemaah_tlp_rumah">No Telepon Rumah Jemaah : </label>
				<input type="text" name="jemaah_tlp_rumah" value="<?= $jemaah['jemaah_tlp_rmh'] ?>" readonly/>

				<br/ >

				<label for="jemaah_kantor">Kantor Jemaah : </label>
				<input type="text" name="jemaah_kantor" value="<?= $jemaah['jemaah_kantor'] ?>" readonly/>

				<br/ >

				<label for="jemaah_phone">No HP Jemaah : </label>
				<input type="text" name="jemaah_phone" value="<?= $jemaah['jemaah_phone'] ?>" readonly />

				<br/ >

				<label for="jemaah_email">E-Mail Jemaah : </label>
				<input type="email" name="jemaah_email" value="<?= $jemaah['jemaah_email'] ?>" readonly/>

				<br/ >

				<label for="jemaah_no_pasport">No Paspor Jemaah : </label>
				<input type="text" name="jemaah_no_pasport" value="<?= $jemaah['jemah_no_passport'] ?>" readonly/>

				<br/ >

				<label for="jemaah_tgl_buat">Tanggal Buat Paspor : </label>
				 <div class="input-group date form_datetime col-md-5" data-date="<?= $jemaah['jemaah_tgl_buat'] ?>" data-date-format="yyyy-mm-dd" data-link-field="dtp_input1" data-link-format="yyy-mm-dd">
                    <input class="form-control" size="16" type="text" value="<?= $jemaah['jemaah_tgl_buat'] ?>"  readonly name="jemaah_tgl_buat" readonly>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
					<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                </div>

                <label for="jemaah_tgl_berakhir">Tanggal Berakhir Paspor : </label>
				 <div class="input-group date form_datetime col-md-5" data-date="<?= $jemaah['jemah_tgl_berakhir'] ?>" data-date-format="yyyy-mm-dd" data-link-field="dtp_input1" data-link-format="yyy-mm-dd">
                    <input class="form-control" size="16" type="text" readonly value="<?= $jemaah['jemah_tgl_berakhir'] ?>"  name="jemaah_tgl_berakhir" readonly>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
					<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                </div>

				<label for="jemaah_tmp_pembuatan">Tempat Pembuatan Paspor Jemaah : </label>
				<input type="text" name="jemaah_tmp_pembuatan" value="<?= $jemaah['jemaah_tmp_pembuatan'] ?>"  readonly/>

				<br/ >

				<label for="jemaah_foto">Foto Jemaah : </label>
				<img src="<?= base_url('asset/image_jamaah').'/'.$jemaah['jemaah_foto'] ?>" style="width:100px; height:150px;" class="" />

				<br/ >

				<label for="jemaah_username">Username Jemaah : </label>
				<input type="text" name="jemaah_username" value="<?= $jemaah['username'] ?>"  readonly />

				<br/ >



				<button type="button" onclick=self.history.back()>Kembali</button>
		

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