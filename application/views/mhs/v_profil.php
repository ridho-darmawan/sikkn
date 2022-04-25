<div class="container-fluid">

    <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> Profil Mahasiswa
    </div>

    <?php if($this->session->flashdata('mhs_profil')) :?>
            <?php echo $this->session->flashdata('mhs_profil') ?>
            <?php echo $this->session->unset_userdata('mhs_profil'); ?>
    <?php endif; ?>

        

   
    <table class="table table-striped table-hover table-bordered">
        <tr>
            <th>Nama</th>
            <td><?php echo $mahasiswa->nama_mhs ?></td>
        </tr>
        <tr> 
            <th width="30%">NIM </th>
            <td width="30%"><?php echo $mahasiswa->nim ?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?php echo $mahasiswa->email ?></td>
        </tr>
        <tr> 
            <th>TTL</th>
            <td><?php echo $mahasiswa->tempat_lahir ?>, <?php echo $mahasiswa->tanggal_lahir ?></td>
        </tr>
        <tr> 
            <th>JK</th>
            <td><?php echo $mahasiswa->jk ?></td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td><?php echo $mahasiswa->alamat ?></td>
        </tr>
        <tr> 
            <th>Fakultas</th>
            <td><?php echo $mahasiswa->nama ?></td>
        </tr>
        <tr>
            <th>Jurusan</th>
            <td><?php echo $mahasiswa->nama_jurusan ?></td>
        </tr>
        <tr>
            <th>No HP</th>
            <td><?php echo $mahasiswa->no_hp ?></td>
        </tr>
        <tr>
            <th>Edit</th>
            <td width="20px">
                <?php echo anchor('mahasiswa/C_profil/edit/' . $mahasiswa->id_mhs, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?>
            </td>
        </tr>
          
           
    </table>
</div>