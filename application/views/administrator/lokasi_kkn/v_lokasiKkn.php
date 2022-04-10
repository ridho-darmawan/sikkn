<div class="container-fluid">

    <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> Master Lokasi KKN
    </div>

    <?php if($this->session->flashdata('lokasi')) :?>
            <?php echo $this->session->flashdata('lokasi') ?>
            <?php echo $this->session->unset_userdata('lokasi'); ?>
    <?php endif; ?>

        

    <?php echo anchor('administrator/C_lokasiKkn/create', '<button class="btn btn-sm btn-primary mb-3 mr-3"><i class="fas fa-plus fa-sm">
        </i> Tambah</button>'); ?>

   
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Provinsi</th>
                    <th>Kabupaten</th>
                    <th>Kecamatan</th>
                    <th>Desa/Kelurahan</th>
                    <th>Kuota (Mahasiswa)</th>
                    <th>Sisa Kuota (Mahasiswa)</th>
                    <th>DPL</th>
                    <th >Edit</th>
                    <th>Hapus</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $no = 1;
                foreach ($wilayah as $value) : ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $value->name_province ?></td>
                        <td><?php echo $value->name_regencie ?></td>
                        <td><?php echo $value->name_district ?></td>
                        <td><?php echo $value->name_village ?></td>
                        <td><?php echo $value->kuota_kkn ?></td>
                        <td><?php echo $value->kuota_kkn - $value->sisa_kuota?></td>
                        <td><?php echo $value->nama_dpl ?></td>

                        <td width="20px">
                            <?php echo anchor('administrator/C_lokasiKkn/edit/' . $value->id_lokasi, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?>
                        </td>
                        <td width="20px" onclick="javascript:return confirm('Anda yakin ingin menghapus?')">
                            <?php echo anchor('administrator/C_lokasiKkn/destroy/' . $value->id_lokasi, '<div class="btn btn-sm btn-danger">
                            <i class="fa fa-trash"></i></div>') ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        
        </table>
    </div>
</div>