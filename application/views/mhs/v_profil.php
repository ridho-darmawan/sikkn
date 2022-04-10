<div class="container-fluid">

    <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> Master Data Mahasiswa
    </div>

    <?php if($this->session->flashdata('mhs_profil')) :?>
            <?php echo $this->session->flashdata('mhs_profil') ?>
            <?php echo $this->session->unset_userdata('mhs_profil'); ?>
    <?php endif; ?>

        

   
    <table class="table table-striped table-hover table-bordered">
        <tr>
            <th>Nama</th>
            <th>NIM</th>
            <th>Email</th>
            <th>TTL</th>
            <th>Alamat</th>
            <th>Fakultas</th>
            <th>Jurusan</th>
            <th>No HP</th>
            <th>AKSI</th>
        </tr>
        
            <tr>
                <td><?php echo $mahasiswa->nama_mhs ?></td>
                <td><?php echo $mahasiswa->nim ?></td>
                <td><?php echo $mahasiswa->email ?></td>
                <td><?php echo $mahasiswa->tempat_lahir ?>, <?php echo $mahasiswa->tanggal_lahir ?></td>
                <td><?php echo $mahasiswa->alamat ?></td>
                <td><?php echo $mahasiswa->nama ?></td>
                <td><?php echo $mahasiswa->nama_jurusan ?></td>
                <td><?php echo $mahasiswa->no_hp ?></td>

                <td width="20px">
                    <?php echo anchor('mahasiswa/C_profil/edit/' . $mahasiswa->id_mhs, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?>
                </td>
               
            </tr>
    </table>
</div>