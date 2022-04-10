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
	header("Content-Disposition: attachment; filename=Data-KKN.xls");
	?>

	<p>Data Mahasiswa KKN Reguler </p>

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
				<td><?= $value['nama_lengkap'] ?></td>
				<td><?= $value['fakultas'] ?></td>
				<td><?= $value['jurusan_prodi'] ?></td>
				<td><?= $value['tempat_lahir'] ?></td>
				<td><?= $value['tanggal_lahir'] ?></td>
				<td><?= $value['semester'] ?></td>
				<td><?= $value['agama'] ?></td>
				<td><?= $value['no_hp'] ?></td>
				<td><?= $value['alamat_sekarang'] ?></td>
				<td><?= $value['asal_daerah'] ?></td>

			</tr>
		<?php $no++;
		endforeach; ?>
	</table>
</body>

</html>