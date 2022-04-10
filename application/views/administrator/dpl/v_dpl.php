<div class="container-fluid">

    <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> Master Dosen Pembimbing Lapangan
    </div>

    <?php if($this->session->flashdata('dpl')) :?>
            <?php echo $this->session->flashdata('dpl') ?>
            <?php echo $this->session->unset_userdata('dpl'); ?>
    <?php endif; ?>

        

    <?php echo anchor('administrator/C_dpl/create', '<button class="btn btn-sm btn-primary mb-3 mr-3"><i class="fas fa-plus fa-sm">
        </i> Tambah</button>'); ?>

   
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>NAMA</th>
                    <th>NIP</th>
                    <th>TTL</th>
                    <th>NO HP</th>
                    <th>ALAMAT</th>
                    <th>E-doc SK</th>
                    <th>Edit</th>
                    <th>Hapus</th>
                </tr>
            </thead>

            <tbody>
                <?php
                    $no = 1;
                    foreach ($dpl as $value) : ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $value->nama_dpl ?></td>
                            <td><?php echo $value->nip ?></td>
                            <td><?php echo $value->tempat_lahir ?> , <?php echo $value->tanggal_lahir ?></td>
                            <td><?php echo $value->no_hp ?></td>
                            <td><?php echo $value->alamat ?></td>
                            <td><a href="<?php echo base_url('assets/uploads/'.$value->sk); ?>" target="blank"><?= $value->sk ?></a> </td>

                            <td width="20px">
                                <?php echo anchor('administrator/C_dpl/edit/' . $value->id_dpl, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?>
                            </td>
                            <td width="20px" onclick="javascript:return confirm('Anda yakin ingin menghapus?')">
                                <?php echo anchor('administrator/C_dpl/destroy/' . $value->id_dpl, '<div class="btn btn-sm btn-danger">
                                <i class="fa fa-trash"></i></div>') ?>
                            </td>
                        </tr>
                <?php endforeach; ?>
            </tbody>
        
        </table>
    </div>
</div>