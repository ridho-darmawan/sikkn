<div class="container-fluid">

    <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> KKN REGULER
    </div>

    <?php echo $this->session->flashdata('pesan_kkn_reguler') ?>

    <?php
    if (empty($cek_nim)) {
        echo anchor('mahasiswa/Kkn_reguler/tambah_Kkn_reguler', '<button class="btn btn-sm btn-primary mb-3 mr-3"><i class="fas fa-plus fa-sm">
            </i> Tambah</button>');
    }

    if ($this->session->level == 'admin') {
        echo anchor('mahasiswa/Kkn_reguler/downloadExcel', '<button class="btn btn-sm btn-success mb-3"><i class="fas fa-download fa-sm"></i> export data</button>');
    }

    ?>
  

    <!-- <?php echo form_open('mahasiswa/Kkn_reguler/search') ?>
        
        <div class="row">
            <div class="col-md-10">
                <input class="form-control" type="text" placeholder="Cari Kata Kunci.." name="cari_data">
            </div>
            <div class="col-md-2">  
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
                    Cari
                </button>
            </div>
        </div>
        
    <?php echo form_close() ?>

    <?php 
            if(isset($_POST['cari_data'])){
                $cari = $_POST['cari_data'];
                echo "<b>Hasil pencarian : ".$cari."</b>";
            }
        ?> -->


    <table class="table table-striped table-hover table-bordered mt-4">
        <tr>
            <th>NO</th>
            <th>NIM</th>
            <th>NAMA LENGKAP</th>
            <th>FAKULTAS</th>
            <th colspan="4">AKSI</th>
        </tr>
        <?php
        $no = 1;
        foreach ($Kkn_reguler as $kknr) : ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $kknr->nim ?></td>
                <td><?php echo $kknr->nama_lengkap ?></td>
                <td><?php echo $kknr->fakultas ?></td>

                <td width="20px">
                    <?php echo anchor('mahasiswa/Kkn_reguler/downloadZip/' . $kknr->id, '<div class="btn btn-sm btn-info">
                    <i class="fa fa-download"></i></div>') ?>
                </td>


                <td width="20px">
                    <?php echo anchor('mahasiswa/Kkn_reguler/detail/' . $kknr->id, '<div class="btn btn-sm btn-info">
                    <i class="fa fa-eye"></i></div>') ?>
                </td>
                <td width="20px">
                    <?php echo anchor('mahasiswa/Kkn_reguler/update/' . $kknr->id, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?>
                </td>
                <td width="20px" onclick="javascript:return confirm('Anda yakin ingin menghapus?')">
                    <?php echo anchor('mahasiswa/Kkn_reguler/hapus/' . $kknr->id, '<div class="btn btn-sm btn-danger">
                    <i class="fa fa-trash"></i></div>') ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

   

</div>