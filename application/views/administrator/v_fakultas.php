<div class="container-fluid">

    <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> Master Fakultas
    </div>

    <?php if($this->session->flashdata('fakultas')) :?>
            <?php echo $this->session->flashdata('fakultas') ?>
            <?php echo $this->session->unset_userdata('fakultas'); ?>
    <?php endif; ?>

        

    <?php echo anchor('administrator/C_fakultas/create', '<button class="btn btn-sm btn-primary mb-3 mr-3"><i class="fas fa-plus fa-sm">
        </i> Tambah</button>'); ?>

   
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>NAMA</th>
                    <th>EDIT</th>
                    <th>HAPUS</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($fakultas as $value) : ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $value->nama ?></td>

                        <td width="20px">
                            <?php echo anchor('administrator/C_fakultas/edit/' . $value->id, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?>
                        </td>
                        <td width="20px" onclick="javascript:return confirm('Anda yakin ingin menghapus?')">
                            <?php echo anchor('administrator/C_fakultas/destroy/' . $value->id, '<div class="btn btn-sm btn-danger">
                            <i class="fa fa-trash"></i></div>') ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>