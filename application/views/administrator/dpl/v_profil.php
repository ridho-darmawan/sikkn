<div class="container-fluid">

    <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> Profil
    </div>

    <?php if($this->session->flashdata('profil')) :?>
            <?php echo $this->session->flashdata('profil') ?>
            <?php echo $this->session->unset_userdata('profil'); ?>
    <?php endif; ?>
   
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
                                <?php echo anchor('administrator/C_dpl/editProfil/' . $value->id_dpl, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?>
                            </td>
                           
                        </tr>
                <?php endforeach; ?>
            </tbody>
        
        </table>
    </div>
</div>