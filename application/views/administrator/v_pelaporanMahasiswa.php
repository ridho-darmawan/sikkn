<div class="container-fluid">

    <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> Review Pelaporan Mahasiswa KKN
    </div>

    <?php if($this->session->flashdata('pelaporanMhs')) :?>
            <?php echo $this->session->flashdata('pelaporanMhs') ?>
            <?php echo $this->session->unset_userdata('pelaporanMhs'); ?>
    <?php endif; ?>

    <blockquote class="blockquote mb-4">
        <p class="mb-0">Petunjuk Pencarian</p>
        <footer class="blockquote-footer">Silakan Pilih Kategori yang akan dicari dengan cara mengisi form yang tersedia. Abaiakn form jika tidak diperlukan.</footer>
    </blockquote>
           

    <?php echo form_open_multipart('mahasiswa/C_laporan/pelaporanMahasiswa');?>
        <div class="form-row">
            <div class="form-group col-md-2">
                <label for="lokasi">Search By Lokasi</label>
                <select class="form-control" id="lokasi" name="lokasi">
                    <option value="">---Pilih Lokasi---</option>
                    <?php foreach ($lokasiKkn as $lokasi) : ?> 
                       <option value="<?php echo $lokasi->desa_id ?>"><?php echo $lokasi->name_village ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="fakultas">Search By Fakultas</label>
                <select class="form-control" id="fakultas" name="fakultas">
                    <option value="">---Pilih Fakultas---</option>
                    <?php foreach ($fakultas as $value) : ?> 
                       <option value="<?php echo $value->id ?>"><?php echo $value->nama ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="jurusan">Search By Jurusan</label>
                <select class="form-control" id="jurusan" name="jurusan">
                    <option value="">---Pilih Jurusan---</option>
                    <?php foreach ($jurusan as $value) : ?> 
                       <option value="<?php echo $value->id_jurusan ?>"><?php echo $value->nama_jurusan ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group col-md-2">
                <label for="jenis_kkn">Search By Jenis KKN</label>
                <select class="form-control" id="jenis_kkn" name="jenis_kkn">
                    <option value="">---Pilih Jenis KKN---</option>
                    <option value="kkn_reguler">KKN REGULER</option>
                    <option value="kkn_merdeka">KKN MERDEKA</option>
                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="jenis_kkn">Search By Jenis Kelamin</label>
                <select class="form-control" id="jk" name="jk">
                    <option value="">---Pilih Jenis Kelamin---</option>
                    <option value="pria">Pria</option>
                    <option value="wanita">Wanita</option>
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

    <p>Keyword : 
        <?php 
        $lokasi = $this->input->post('lokasi');
        $fakultas = $this->input->post('fakultas');
        $jurusan = $this->input->post('jurusan');
        $jenis_kkn = $this->input->post('jenis_kkn');
        $jk = $this->input->post('jk');

        if($lokasi != null) {
            $query = $this->db->query('select name_village from villages where id = '.$lokasi)->row() ;
            echo  $query->name_village .', ' ;
        }

        if($fakultas != null) {
            $query = $this->db->query('select nama from fakultas where id = '.$fakultas)->row() ;
            echo $query->nama .', ';
        }

        if($jurusan != null) {
            $query = $this->db->query('select nama_jurusan from jurusan where id_jurusan = '.$jurusan)->row() ;
            echo $query->nama_jurusan .', ';
        }

        if($jenis_kkn != null) {
            
            echo $jenis_kkn .', ';
        }

        if($jk != null) {
            
            echo $jk .', ';
        }

        
        ?>
    </p>


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