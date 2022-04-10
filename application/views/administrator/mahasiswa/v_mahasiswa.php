<div class="container-fluid">

    <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> Master Data Mahasiswa
    </div>

    <?php if($this->session->flashdata('mahasiswa')) :?>
            <?php echo $this->session->flashdata('mahasiswa') ?>
            <?php echo $this->session->unset_userdata('mahasiswa'); ?>
    <?php endif; ?>

        

    <?php echo anchor('administrator/C_mahasiswa/create', '<button class="btn btn-sm btn-primary mb-3 mr-3"><i class="fas fa-plus fa-sm">
        </i> Tambah</button>'); ?>

    <?php echo anchor('administrator/C_mahasiswa/form_importMahasiswa', '<button class="btn btn-sm btn-warning mb-3 mr-3"><i class="fas fa-upload fa-sm">
        </i> Import Data Mahasiswa</button>'); ?>

    <a href="<?php echo base_url('assets/uploads/format/format-data-mahasiswa.xlsx'); ?>" class="btn btn-sm btn-success mb-3 mr-3" ><i class="fas fa-download fa-sm"> </i> Download Format Import Mahasiswa</a>


    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Email</th>
                    <th>TTL</th>
                    <th>Alamat</th>
                    <th>Fakultas</th>
                    <th>Jurusan</th>
                    <th>No HP</th>
                    <th>Edit</th>
                    <th>Hapus</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($mahasiswa as $value) : ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $value->nama_mhs ?></td>
                        <td><?php echo $value->nim ?></td>
                        <td><?php echo $value->email ?></td>
                        <td><?php echo $value->tempat_lahir ?>, <?php echo $value->tanggal_lahir ?></td>
                        <td><?php echo $value->alamat ?></td>
                        <td><?php echo $value->nama ?></td>
                        <td><?php echo $value->nama_jurusan ?></td>
                        <td><?php echo $value->no_hp ?></td>

                        <td width="20px">
                            <?php echo anchor('administrator/C_mahasiswa/edit/' . $value->id_mhs, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?>
                        </td>
                        <td width="20px" onclick="javascript:return confirm('Anda yakin ingin menghapus?')">
                            <?php echo anchor('administrator/C_mahasiswa/destroy/' . $value->id_mhs. '/' .$value->nim, '<div class="btn btn-sm btn-danger">
                            <i class="fa fa-trash"></i></div>') ?>

                            <!-- <?php echo anchor('administrator/C_mahasiswa/destroy/' . $value->id_mhs, '<div class="btn btn-sm btn-danger">
                            <i class="fa fa-trash"></i></div>') ?> -->
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>