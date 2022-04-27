<div class="container-fluid">

    <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> Review Pelaporan DPL 
    </div>

    <?php if($this->session->flashdata('pelaporanMhs')) :?>
            <?php echo $this->session->flashdata('pelaporanMhs') ?>
            <?php echo $this->session->unset_userdata('pelaporanMhs'); ?>
    <?php endif; ?>

    <blockquote class="blockquote mb-4">
        <p class="mb-0">Petunjuk Pencarian</p>
        <footer class="blockquote-footer">Silakan Pilih Kategori yang akan dicari dengan cara mengisi form yang tersedia. Abaiakn form jika tidak diperlukan.</footer>
    </blockquote>
           

    <?php echo form_open_multipart('mahasiswa/C_laporan/pelaporanDpl');?>
        <div class="form-row">
            <div class="form-group col-md-2">
                <label for="lokasi">Search By Nama DPL</label>
                <select class="form-control" id="lokasi" name="id_dpl">
                    <option value="">---Pilih DPL---</option>
                    <?php foreach ($dpl as $value) : ?> 
                       <option value="<?php echo $value->id_dpl ?>"><?php echo $value->nama_dpl ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <div class="form-group col-md-2">
                <label for=""></label>
                <button type="submit" class="form-control btn btn-primary">Cari</button>
            </div>
           
        </div>
    <?php echo form_close() ?>

    <div class="alert alert-warning mt-4 mb-4" role="alert">
        <i class="fas fa-list"></i> Data Mahasiswa
    </div>

    <div class="row">
        <div class="col-md-6">
            <p>Keyword : 
                <?php 
                $dpl = $this->input->post('id_dpl');
            
                if($dpl != null) {
                    $query = $this->db->query('select nama_dpl from dpl where id_dpl = '.$dpl)->row() ;
                    echo  $query->nama_dpl .', ' ;
                }
        
                ?>
            </p>
        </div>

        <div class="col-md-6">
            <?php if($dpl != null) :
                $query = $this->M_laporan->reviewDpl($dpl)->result();
                $query1 = $this->M_laporan->reviewDpl($dpl)->row();
            ?>       
                
                
                <p>Info DPL!!</p>
               
                <p>Nama : <?= $query1 != null ? $query1->nama_dpl : ''  ?></p>
             
                <p>Lokasi yang Dibimbing :</p>
                <?php foreach($query as $q): ?>
                    <b><?= $q->name_village .','?></b>
                <?php endforeach ?>
            <?php endif; ?>
                    <br>
        </div>
    </div>

    


    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Jenis KKN</th>
                    <th>Lokasi KKN</th>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Email</th>
                    <th>TTL</th>
                    <th>Alamat</th>
                    <th>Fakultas</th>
                    <th>Jurusan</th>
                    <th>No HP</th>
                    <th>JK</th>
                </tr>
            </thead>
            <tbody>
                
            <?php if(empty($mahasiswa)) : ?>
                <tr>
                    <td colspan="12" style="text-align:center">Tidak Ada Data Ditemukan</td>
                </tr>

            <?php else: ?>
                <?php
                $no = 1;
                foreach ($mahasiswa as $value) : ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $value->jenis_kkn ?></td>
                        <td><?php echo $value->name_village ?></td>
                        <td><?php echo $value->nama_mhs ?></td>
                        <td><?php echo $value->nim ?></td>
                        <td><?php echo $value->email ?></td>
                        <td><?php echo $value->tempat_lahir ?>, <?php echo $value->tanggal_lahir ?></td>
                        <td><?php echo $value->alamat ?></td>
                        <td><?php echo $value->nama ?></td>
                        <td><?php echo $value->nama_jurusan ?></td>
                        <td><?php echo $value->no_hp ?></td>
                        <td><?php echo $value->jk ?></td>

                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>

               
            </tbody>
        </table>
    </div>

 

</div>