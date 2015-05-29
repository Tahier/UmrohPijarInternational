<!DOCTYPE html>
<html>
<head>
	<title>Detail Paket</title>
</head>
			<body>
					<table>
						<tr>
							<td>Nomor Paket</td>
							<td>:</td>
							<td><?= $paket['paket_nomor']; ?></td>
						</tr>

						<tr>
							<td>Nama Paket</td>
							<td>:</td>
							<td><?= $paket['paket_nama']; ?></td>
						</tr>


						<tr>
							<td>Nama Harga</td>
							<td>:</td>
							<td><?= $paket['paket_harga']; ?></td>
						</tr>

						<tr>
							<td>Desktripsi</td>
							<td>:</td>
							<td><?= $paket['paket_deskripsi']; ?></td>
						</tr>

						<tr>
							<td>Paket Mekah</td>
							<td>:</td>
							<td><?= $paket['paket_mekah']; ?></td>
						</tr>
						<tr>
							<td>Paket Madinah</td>
							<td>:</td>
							<td><?= $paket['paket_madinah']; ?></td>
						</tr>

						<tr>
							<td>Tipe Paket</td>
							<td>:</td>
							<td><?= $paket['paket_tipe']; ?></td>
						</tr>


						<tr>
							<td>Bulan Berangkat Paket</td>
							<td>:</td>
							<td><?= $paket['paket_bulan_berangkat']; ?></td>
						</tr>

						<tr>
							<td>Tanggal Berangkat Paket</td>
							<td>:</td>
							<td><?= $paket['paket_tgl_berangkat']; ?></td>
						</tr>

						<tr>
							<td>Tanggal Pulang Paket</td>
							<td>:</td>
							<td><?= $paket['paket_tgl_pulang']; ?></td>
						</tr>

						<tr>
							<td>Nama Agen</td>
							<td>:</td>
							<td><?= $paket['agen_nama']; ?></td>
						</tr>

						<tr>
							<td>Kontak Agen</td>
							<td>:</td>
							<td><?= $paket['agen_contact_name']; ?> (<?= $paket['agen_contact_phone']; ?>)</td>
						</tr>
					</table>

					<a href="<?= site_url() ?>/agen_controller/view_all_paket">Kembali</a>
			</body>
</html>