<!DOCTYPE html>
<html>
<head>
	<title>Agen Home</title>
</head>
	<body>
			<h1>Agen Home</h1>
			<h5>Selamat Datang <?php echo $username; ?></h6>


			<ul>
				<li><?php echo anchor('agen_controller/view_all_paket', 'Data Paket'); ?></li>
				<li><?php echo anchor('agen_controller/view_all_jemaah', 'Data Jemaah'); ?></li>
				<li><?php echo anchor('c_index/logout', 'logout'); ?></li>
			</ul>


	</body>
</html>