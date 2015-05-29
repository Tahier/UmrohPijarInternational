<!DOCTYPE html>
<html>
<head>
	<title>Detail Agen</title>
</head>
		<body>
				<table>
					<tr>
						<td>Nama Agen</td>
						<td>:</td>
						<td><?= $agen['agen_nama']; ?></td>
					</tr>

					<tr>
						<td>Alamat Agen</td>
						<td>:</td>
						<td><?= $agen['agen_alamat']; ?></td>
					</tr>

					<tr>
						<td>Telepon Agen</td>
						<td>:</td>
						<td><?= $agen['agen_tlp']; ?></td>
						</tr>

					<tr>
						<td>Nomor Agen</td>
						<td>:</td>
						<td><?= $agen['agen_nomor']; ?></td>
					</tr>

					<tr>
						<td>Nama Kontak Agen</td>
						<td>:</td>
						<td><?= $agen['agen_contact_name']; ?></td>
					</tr>

					<tr>
						<td>Telepon (HP) Kontak Agen</td>
						<td>:</td>
						<td><?= $agen['agen_contact_phone']; ?></td>
					</tr>

					<tr>
						<td>Email Kontak Agen</td>
						<td>:</td>
						<td><?= $agen['agen_contact_email']; ?></td>
					</tr>


					<tr>
						<td>Tanggal Lahir Contact Agen</td>
						<td>:</td>
						<td><?= $agen['agen_contact_ttl']; ?></td>
					</tr>

					<tr>
						<td>No KTP Kontak Agen</td>
						<td>:</td>
						<td><?= $agen['agen_contact_ktp']; ?></td>
					</tr>

					<tr>
						<td>Tempat Lahir Kontak Agen</td>
						<td>:</td>
						<td><?= $agen['agen_contact_tempat_lahir']; ?></td>
					</tr>

					<tr>
						<td>Nama Ayah Kontak Agen</td>
						<td>:</td>
						<td><?= $agen['agen_contact_nama_ayah']; ?></td>
					</tr>

					<tr>
						<td>Telepon Kontak Agen</td>
							<td>:</td>
						<td><?= $agen['agen_contact_tlp']; ?></td>
					</tr>

					<tr>
						<td>Telepon Kantor Kontak Agen</td>
						<td>:</td>
						<td><?= $agen['agen_contact_tlp_kantor']; ?></td>
					</tr>

					<tr>
						<td>No Paspor Kontak Agen</td>
						<td>:</td>
						<td><?= $agen['agen_contact_no_paspor']; ?></td>
					</tr>

					<tr>
						<td>Tanggal Pembuatan Paspor Kontak Agen</td>
						<td>:</td>
						<td><?= $agen['agen_contact_tgl_pembuatan']; ?></td>
					</tr>

					<tr>
						<td>Nama Bank Kontak Agen</td>
						<td>:</td>
						<td><?= $agen['agen_contact_bank']; ?></td>
					</tr>

					<tr>
						<td>No Rekening Kontak Agen</td>
						<td>:</td>
						<td><?= $agen['agen_contact_no_rek']; ?></td>
					</tr>

					<tr>
						<td>Cabang Bank Kontak Agen</td>
						<td>:</td>
						<td><?= $agen['agen_contact_bank_cabang']; ?></td>
					</tr>

					<tr>
						<td>Username Agen</td>
						<td>:</td>
						<td><?= $agen['agen_username']; ?></td>
					</tr>

					<tr>
						<td>Kode Agen</td>
						<td>:</td>
						<td><?= $agen['agen_kode']; ?></td>
					</tr>
				</table>
				<br />
				<br />

				<?php echo anchor('admin_controller/show_data_agen', '<< Kembali'); ?>

			</body>
			</html>


























				</table>
		</body>
</html>