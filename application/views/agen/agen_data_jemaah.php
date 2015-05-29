<!DOCTYPE html>
<html>
<head>
	<title>Data Jemaah</title>
</head>
<body>
	<h1>Data Jemaah</h1>
	<?php echo $pagination; ?>
	<br / >
	<?php echo $table ?>
	<br />
	<?php echo $pagination; ?>
	<br />
	<?= anchor('agen_controller/add_jemaah', 'Tambah Data Jemaah'); ?>
	<br />
	<?= anchor('agen_controller/', 'Kembali ke Home'); ?> 
</body>
</html>