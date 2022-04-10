<!DOCTYPE html>
<html>

<head>
    <title>Laporan Akhir Data KKN REGULER </title>
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
    header("Content-Disposition: attachment; filename=Data-Laporan Akhir.xls");
    ?>

    <p>Data Laporan Mahasiswa KKN Reguler </p>

    <table border="1">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Fakultas</th>
            <th>Jurusan / Prodi</th>
            <th>Lokasi KKN</th>
            <th>Nama DPL</th>

        </tr>
        <?php
        $no = 1;
        foreach ($laporan_akhir as $value) : ?>
            <tr>
                <td><?= $no; ?></td>
                <td><?= $value['nama'] ?></td>
                <td><?= $value['nim'] ?></td>
                <td><?= $value['fakultas'] ?></td>
                <td><?= $value['jurusan'] ?></td>
                <td><?= $value['lokasi_kkn'] ?></td>
                <td><?= $value['nama_dpl'] ?></td>


            </tr>
        <?php $no++;
        endforeach; ?>
    </table>
</body>

</html>