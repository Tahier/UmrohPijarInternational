<!DOCTYPE html>
<html>
<head>
	<title>Data Paket</title>
</head>
<body>
	<h1>Data Paket</h1>
	<?php echo $pagination; ?>
	<br / >
	<?php echo $table ?>
	<br />
	<?php echo $pagination; ?>
	<br />
	<?= anchor('agen_controller/add_paket', 'Tambah Data Paket'); ?>
	<br />
	<?= anchor('agen_controller/', 'Kembali ke Home'); ?> 
</body>
</html>