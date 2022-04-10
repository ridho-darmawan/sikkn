<div class="container-fluid">

    <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> Master Jurusan
    </div>

    <?php if($this->session->flashdata('message_kkn')) :?>
            <?php echo $this->session->flashdata('message_kkn') ?>
            <?php echo $this->session->unset_userdata('message_kkn'); ?>
    <?php endif; ?>
       

    <?php echo anchor('administrator/C_jurusan/create', '<button class="btn btn-sm btn-primary mb-3 mr-3"><i class="fas fa-plus fa-sm">
        </i> Tambah</button>'); ?>

    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                <th>NO</th>
                <th>fakultas</th>
                <th>Jurusan</th>
                <th>EDIT</th>
                <th>HAPUS</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $no = 1;
                foreach ($jurusan as $value) : ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $value->nama ?></td>
                        <td><?php echo $value->nama_jurusan ?></td>

                        <td width="20px">
                            <?php echo anchor('administrator/C_jurusan/edit/' . $value->id_jurusan, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?>
                        </td>
                        <td width="20px" onclick="javascript:return confirm('Anda yakin ingin menghapus?')">
                            <?php echo anchor('administrator/C_jurusan/destroy/' . $value->id_jurusan, '<div class="btn btn-sm btn-danger">
                            <i class="fa fa-trash"></i></div>') ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>       
        </table>
    </div>

</div>