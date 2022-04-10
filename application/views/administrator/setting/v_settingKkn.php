<div class="container-fluid">

    <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> Set Jadwal KKN
    </div>

    <?php if($this->session->flashdata('setting')) :?>
            <?php echo $this->session->flashdata('setting') ?>
            <?php echo $this->session->unset_userdata('setting'); ?>
    <?php endif; ?>

    <?php if(empty($jadwal)) :?>

    <?php echo anchor('administrator/C_setting/create', '<button class="btn btn-sm btn-primary mb-3 mr-3"><i class="fas fa-plus fa-sm">
        </i> Tambah</button>'); ?>

    <?php else: ?>
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <tr>
                    <th>Gelombang</th>
                    <th>Tahun</th>
                    <th>Tgl Mulai KKN</th>
                    <th>Tgl Akhir KKN</th>
                    <th>Tgl Mulai Input Laporan KKN</th>
                    <th>Tgl Akhir Input Laporan KKN</th>
                    <th >Edit</th>
                </tr>
                <tr>
                    <td>Gelombang <?php echo $jadwal->gelombang ?></td>
                    <td><?php echo $jadwal->tahun ?></td>
                    <td><?php echo $jadwal->tgl_mulai_kkn ?></td>
                    <td><?php echo $jadwal->tgl_akhir_kkn ?></td>
                    <td><?php echo $jadwal->tgl_mulai_laporan ?></td>
                    <td><?php echo $jadwal->tgl_akhir_laporan ?></td>

                    <td width="20px">
                        <?php echo anchor('administrator/C_setting/edit/' . $jadwal->id_set, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?>
                    </td>
                </tr>
            </table>
        </div>
    <?php endif; ?>

   
  
</div>