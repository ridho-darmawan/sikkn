<div class="container-fluid">

    <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> Laporan Akhir KKN MERDEKA BELAJAR
    </div>

    <?php echo $this->session->flashdata('pesan_laporan_merdeka') ?>

    <?php

    if ($this->session->level == 'admin') {
    } else {
        if (empty($getDataLaporanByNim->nim)) {
            echo anchor('mahasiswa/Laporan_akhir_merdeka/laporan_akhir_merdeka_form', '<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm">
                </i> Upload </button>');
        }
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
        foreach ($laporan_merdeka as $value) : ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $value->nim ?></td>
                <td><?php echo $value->nama ?></td>
                <td><?php echo $value->fakultas ?></td>
                <td><?php echo $value->jurusan ?></td>
                <td><?php echo $value->lokasi_kkn ?></td>
                <td><?php echo $value->nama_dpl ?></td>

                <td width="20px">
                    <?php echo anchor('mahasiswa/Laporan_akhir_merdeka/downloadLaporan/' . $value->id, '<div class="btn btn-sm btn-info">
                    <i class="fa fa-download"></i></div>') ?>
                </td>

                <td width="20px">
                    <?php echo anchor('mahasiswa/Laporan_akhir_merdeka/update/' . $value->id, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?>
                </td>
                <td width="20px" onclick="javascript:return confirm('Anda yakin ingin menghapus?')">
                    <?php echo anchor('mahasiswa/Laporan_akhir_merdeka/hapus/' . $value->id, '<div class="btn btn-sm btn-danger">
                    <i class="fa fa-trash"></i></div>') ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>



</div>