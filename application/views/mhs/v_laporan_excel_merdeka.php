<!DOCTYPE html>
<html>

<head>
	<title>Laporan Data KKN REGULER </title>
</head>

<body>
	<style type="text/css">
		body {
			font-family: sans-serif;
		}

		table {
			margin: 20px auto;
			border-collapse: collapse;
		}

		table th,
		table td {
			border: 1px solid #3c3c3c;
			padding: 3px 8px;

		}

		a {
			background: blue;
			color: #fff;
			padding: 8px 10px;
			text-decoration: none;
			border-radius: 2px;
		}
	</style>

	<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Data-KKN-Merdeka.xls");
	?>

	<p>Data Mahasiswa KKN Merdeka </p>

	<table border="1">
		<tr>
			<th>No</th>
			<th>NIM</th>
			<th>Nama Lengkap</th>
			<th>Fakultas</th>
			<th>Jurusan / Prodi</th>
			<th>Tempat Lahir</th>
			<th>Tanggal Lahir</th>
			<th>Semester</th>
			<th>Agama</th>
			<th>No HP</th>
			<th>Alamat Sekarang</th>
			<th>Asal Daerah</th>
		</tr>
		<?php
		$no = 1;
		foreach ($kkn as $value) : ?>
			<tr>
				<td><?= $no; ?></td>
				<td><?= $value['nim'] ?></td>
				<td><?= $value['nama_mhs'] ?></td>
				<td><?= $value['nama'] ?></td>
				<td><?= $value['nama_jurusan'] ?></td>
				<td><?= $value['tempat_lahir'] ?></td>
				<td><?= $value['tanggal_lahir'] ?></td>
				<td><?= $value['semester'] ?></td>
				<td><?= $value['agama'] ?></td>
				<td><?= $value['no_hp'] ?></td>
				<td><?= $value['alamat'] ?></td>
				<td><?= $value['asal_daerah'] ?></td>

			</tr>
		<?php $no++;
		endforeach; ?>
	</table>
</body>

</html>