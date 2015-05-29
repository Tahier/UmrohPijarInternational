<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title ?></title>
</head>
	<body>
			<h1><?php echo $title; ?></h1>
			<br />

			<?php echo validation_errors(); ?>

			<?php echo form_open('admin_controller/update_agen/'.$agen['agen_id']);?>

			<input type="hidden" value="abc" />


			<label for="agen_nama">Nama Agen :</label>
			<input type="text" name="agen_nama" value="<?= $agen['agen_nama'] ?>" required/>
			<?php echo form_error('agen_nama'); ?>
			<br />
			

			<label for="agen_alamat">Alamat Agen :</label>
			<textarea name="agen_alamat"><?= $agen['agen_alamat'] ?></textarea>
			<?php echo form_error('agen_alamat'); ?>
			<br />


			<label for="agen_tlp">Telepon Agen :</label>
			<input type="text" name="agen_tlp" value="<?= $agen['agen_tlp']?>" required?>
			<?php echo form_error('agen_tlp'); ?>
			<br />


			<label for="agen_nomor">Nomor Agen :</label>
			<input type="text" name="agen_nomor" value="<?= $agen['agen_nomor']?>"required />
			<?php echo form_error('agen_nomor'); ?>
			<br />


			<label for="agen_contact_name">Nama Kontak Agen :</label>
			<input type="text" name="agen_contact_name" value="<?= $agen['agen_contact_name']?>" required?>
			<?php echo form_error('agen_contact_name'); ?>
			<br />


			<label for="agen_contact_phone">Telepon Kontak Agen (HP) :</label>
			<input type="text" name="agen_contact_phone" value="<?= $agen['agen_contact_phone']?>"required/>
			<?php echo form_error('agen_contact_phone'); ?>
			<br />


			<label for="agen_contact_email">Email Kontak Agen :</label>
			<input type="email" name="agen_contact_email" value="<?= $agen['agen_contact_email']?>" required />
			<?php echo form_error('agen_contact_email'); ?>
			<br />


			<label for="agen_contact_ttl">Tanggal Lahir Kontak Agen :</label>
			<input type="text" placeholder="yyyy/mm/dd" name="agen_contact_ttl" value="<?= $agen['agen_contact_ttl']?>" required />
			<?php echo form_error('agen_contact_ttl'); ?>
			<br />


			<label for="agen_contact_ktp">Nomor KTP Kontak Agen :</label>
			<input type="text" name="agen_contact_ktp" value="<?= $agen['agen_contact_ktp']?>" required />
			<?php echo form_error('agen_contact_ktp'); ?>
			<br />


			<label for="agen_contact_tempat_lahir">Tempat Lahir Kontak Agen :</label>
			<input type="text" name="agen_contact_tempat_lahir" value="<?= $agen['agen_contact_tempat_lahir']?>" required />
			<?php echo form_error('agen_contact_tempat_lahir'); ?>
			<br />


			<label for="agen_contact_nama_ayah">Nama Ayah Kontak Agen :</label>
			<input type="text" name="agen_contact_nama_ayah" value="<?= $agen['agen_contact_nama_ayah']?>" required />
			<?php echo form_error('agen_contact_nama_ayah'); ?>
			<br />
			

			<label for="agen_contact_tlp">No Telepon Kontak Agen :</label>
			<input type="text" name="agen_contact_tlp" value="<?= $agen['agen_contact_tlp']?>" required />
			<?php echo form_error('agen_contact_tlp'); ?>
			<br />
			
			<label for="agen_contact_tlp_kantor">No Telepon Kantor Kontak Agen :</label>
			<input type="text" name="agen_contact_tlp_kantor" value="<?= $agen['agen_contact_tlp_kantor']?>" required />
			<?php echo form_error('agen_contact_tlp_kantor'); ?>
			<br />
			

			<label for="agen_contact_no_paspor">No Paspor Kontak Agen :</label>
			<input type="text" name="agen_contact_no_paspor" value="<?= $agen['agen_contact_no_paspor']?>"required/>
			<?php echo form_error('agen_contact_no_paspor'); ?>
			<br />


			<label for="agen_contact_tgl_pembuatan">Tanggal Pembuatan Paspor Kontak Agen :</label>
			<input type="text" placeholder="yyyy/mm/dd" name="agen_contact_tgl_pembuatan" value="<?= $agen['agen_contact_tgl_pembuatan']?>" required />
			<?php echo form_error('agen_contact_tgl_pembuatan'); ?>
			<br />
			

			<label for="agen_contact_bank">Bank Kontak Agen</label>
			<input type="text" name="agen_contact_bank" value="<?= $agen['agen_contact_bank']?>" required/>
			<?php echo form_error('agen_contact_bank'); ?>
			<br />
			

			<label for="agen_contact_no_rek">No Rekening Bank Kontak Agen :</label>
			<input type="text" name="agen_contact_no_rek" required value="<?= $agen['agen_contact_no_rek']?>" />
			<?php echo form_error('agen_contact_no_rek'); ?>
			<br />

			<label for="agen_contact_bank_cabang">Kantor Cabang Bank Kontak Agen :</label>
			<input type="text" name="agen_contact_bank_cabang" required value="<?= $agen['agen_contact_bank_cabang']?>" />
			<?php echo form_error('agen_contact_ttl'); ?>
			<br />

			<label for="agen_username">Username Agen :</label>
			<input type="text" name="agen_username" value="<?= $agen['agen_username']?>" />
			<?php echo form_error('agen_username'); ?>
			<br />

			<label for="agen_password">Password Agen :</label>
			<input type="password" name="agen_password" value="<?= $agen['agen_password']?>"/>
			<?php echo form_error('agen_password'); ?>
			<br />


			<label for="agen_kode">Kode Agen :</label>
			<input type="text" name="agen_kode" required value="<?= $agen['agen_kode']?>"/>
			<?php echo form_error('agen_kode'); ?>
			<br />


			<input type="submit" value="submit"> || <button type="button" onclick=self.history.back()>Kembali</button>
			<?php form_close(); ?>
	</body>
</html>