<div class="container-fluid">

    <div class="alert alert-success" role="alert">
        <i class="fa fa-eye"></i> Detail KKN MERDEKA BELAJAR
    </div>
    <table class="table table hover table-bordered table-striped">
        <?php foreach ($detail as $dt) : ?>
            <img class="mb-4" src="<?php echo base_url('assets/uploads/') . $dt->photo ?>" style="width: 20%">
            <tr>
                <td>NIM</td>
                <td><?php echo $dt->nim; ?></td>
            </tr>

            <tr>
                <td>Nama Lengkap</td>
                <td><?php echo $dt->nama_lengkap; ?></td>
            </tr>

            <tr>
                <td>Fakultas</td>
                <td><?php echo $dt->fakultas; ?></td>
            </tr>

            <tr>
                <td>Jurusan/Prodi</td>
                <td><?php echo $dt->jurusan_prodi; ?></td>
            </tr>

            <tr>
                <td>Tempat Lahir</td>
                <td><?php echo $dt->tempat_lahir; ?></td>
            </tr>

            <tr>
                <td>Tanggal Lahir</td>
                <td><?php echo $dt->tanggal_lahir; ?></td>
            </tr>

            <tr>
                <td>Semester</td>
                <td><?php echo $dt->semester; ?></td>
            </tr>

            <tr>
                <td>Agama</td>
                <td><?php echo $dt->agama; ?></td>
            </tr>

            <tr>
                <td>No Telepon</td>
                <td><?php echo $dt->no_hp; ?></td>
            </tr>

            <tr>
                <td>Alamat Tempat Tinggal (sekarang)</td>
                <td><?php echo $dt->alamat_sekarang; ?></td>
            </tr>

            <tr>
                <td>Rekomendasi Dari Jurusan/Prodi</td>
                <td>
                    <a href="<?php echo base_url('assets/uploads/' . $dt->rekom_jurusanprodi); ?>" target="blank">
                        <?= $dt->rekom_jurusanprodi ?>
                    </a>
                </td>

            </tr>

            <tr>
                <td>KRS Semester Ganjil/Genap</td>
                <td>
                    <a href="<?php echo base_url('assets/uploads/' . $dt->krs); ?>" target="blank">
                        <?= $dt->krs ?>
                    </a>
                </td>
            </tr>

            <tr>
                <td>Slip asli UKT semester Ganjil/Genap</td>
                <td>
                    <a href="<?php echo base_url('assets/uploads/' . $dt->slip); ?>" target="blank">
                        <?= $dt->slip ?>
                    </a>
                </td>
            </tr>

            <tr>
                <td>Surat Keputusan Penerima Bidik Misi/KIPK</td>
                <td>
                    <a href="<?php echo base_url('assets/uploads/' . $dt->sk_bm); ?>" target="blank">
                        <?= $dt->sk_bm ?>
                    </a>
                </td>
            </tr>

            <tr>
                <td>Surat Keterangan Pengurangan UKT /Bantuan Lainnya </td>
                <td>
                    <a href="<?php echo base_url('assets/uploads/' . $dt->sk_ukt); ?>" target="blank">
                        <?= $dt->sk_ukt ?>
                    </a>
                </td>
            </tr>

            <tr>
                <td>Pasfoto Menggunakan Jas Almamater Ukuran 3x4 Berlatar Merah</td>
                <td>
                    <a href="<?php echo base_url('assets/uploads/' . $dt->foto_almamater); ?>" target="blank">
                        <?= $dt->foto_almamater ?>
                    </a>
                </td>
            </tr>

            <tr>
                <td>Surat Keterangan Berbadan Sehat dari Puskesmas / Klinik Unima</td>
                <td>
                    <a href="<?php echo base_url('assets/uploads/' . $dt->sk_sehat); ?>" target="blank">
                        <?= $dt->sk_sehat ?>
                    </a>
                </td>
            </tr>

            <tr>
                <td>Rekomendasi Lokasi KKN dari Desa/Kelurahan</td>
                <td>
                    <a href="<?php echo base_url('assets/uploads/' . $dt->rekom_kkn); ?>" target="blank">
                        <?= $dt->rekom_kkn ?>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <?php echo anchor('administrator/Kkn_merdeka', '<div class="btn btn-sm btn-primary">Kembali</div>') ?><br><br><br><br>
</div>
</div>