<div class="container-fluid">

    <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> Laporan Akhir KKN REGULER
    </div>

    <?php echo $this->session->flashdata('pesan_laporan_reguler_admin') ?>

    <?php

    if ($this->session->level == 'admin') {
    } else {
        if (empty($getDataLaporanByNim->nim)) {
            echo anchor('administrator/Laporan_akhir/laporan_akhir_form', '<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm">
                </i> Upload Laporan</button>');
        }
    }

    ?>

    <?php echo form_open('administrator/Laporan_akhir/search') ?>

    <div class="row float-right mb-4 p-4">

        <div class="col-md-10">
            <input class="form-control" type="text" placeholder="Cari Kata Kunci.." name="keyword">
        </div>
        <div class="col-md-2">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
                Cari
            </button>
        </div>
    </div>


    <?php echo form_close() ?>


    <?php
    if (isset($_POST['keyword'])) {
        $cari = $_POST['keyword'];
        echo "<b>Hasil pencarian : " . $cari . "</b>";
    }
    ?>



    <table class="table table-striped table-hover table-bordered mt-4">
        <tr>
            <th>NO</th>
            <th>NIM</th>
            <th>NAMA</th>
            <th>FAKULTAS</th>
            <th>JURUSAN/PRODI</th>
            <th>LOKASI KKN</th>
            <th>NAMA DPL</th>
            <th colspan="7">AKSI</th>
        </tr>
        <?php
        $no = 1;
        foreach ($laporan as $value) : ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $value->nim ?></td>
                <td><?php echo $value->nama ?></td>
                <td><?php echo $value->fakultas ?></td>
                <td><?php echo $value->jurusan ?></td>
                <td><?php echo $value->lokasi_kkn ?></td>
                <td><?php echo $value->nama_dpl ?></td>

                <td width="20px">
                    <?php echo anchor('administrator/Laporan_akhir/downloadLaporan/' . $value->id, '<div class="btn btn-sm btn-info">
                    <i class="fa fa-download"></i></div>') ?>
                </td>

                <td width="20px">
                    <?php echo anchor('administrator/Laporan_akhir/update/' . $value->id, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?>
                </td>
                <td width="20px" onclick="javascript:return confirm('Anda yakin ingin menghapus?')">
                    <?php echo anchor('administrator/Laporan_akhir/hapus/' . $value->id, '<div class="btn btn-sm btn-danger">
                    <i class="fa fa-trash"></i></div>') ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>



</div>