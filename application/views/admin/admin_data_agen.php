<!DOCTYPE html>
<html>
<head>
	<title>Data Agen</title>
</head>
<body>
	<?php echo $pagination; ?>
	<br />
	<?php echo $table; ?>
	<br />
	<?php echo $pagination; ?>
	<br/>
	<?php echo anchor('admin_controller/add_agen', 'Tambah data agen', array('class'=>'add_agen')); ?>
	<br />
	<?php echo anchor('admin_controller/admin_home', 'Kembali ke Home'); ?>
</body>
</html>