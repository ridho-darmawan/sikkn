<div class="container-fluid">

    <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> Pimpinan
    </div>

    <?php if($this->session->flashdata('pimpinan')) :?>
            <?php echo $this->session->flashdata('pimpinan') ?>
            <?php echo $this->session->unset_userdata('pimpinan'); ?>
    <?php endif; ?>

    <?php if(empty($pimpinan)) :?>

    <?php echo anchor('administrator/C_pimpinan/create', '<button class="btn btn-sm btn-primary mb-3 mr-3"><i class="fas fa-plus fa-sm">
        </i> Tambah</button>'); ?>

    <?php else: ?>
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
                <tr>
                    <th>Ketua</th>
                    <th>Ttd Elektronik Ketua</th>
                    <th>Koordinator KKN</th>
                    <th>Ttd Elektronik Koord. KKN</th>
                    <th >Edit</th>
                </tr>
                <tr>
                    <td><?php echo $pimpinan->ketua ?> <br> NIP. <?= $pimpinan->nip_ketua ?></td>
                    <td><img src="<?= base_url('assets/uploads/'.$pimpinan->ttd_ketua)?>" alt="e-signature" width="100px"></td>
                    <td><?php echo $pimpinan->koordinator_kkn ?> <br> NIP. <?= $pimpinan->nip_koordinator ?></td>
                    <td><img src="<?= base_url('assets/uploads/'.$pimpinan->ttd_koordinator)?>" alt="e-signature" width="100px"></td>

                    <td width="20px">
                        <?php echo anchor('administrator/C_pimpinan/edit/' . $pimpinan->id_set, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?>
                    </td>
                    
                </tr>
            </table>
        </div>
    <?php endif; ?>

</div>