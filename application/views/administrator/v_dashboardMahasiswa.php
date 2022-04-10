<div class="container-fluid">


    <div class="alert alert-success" role="alert">
        <i class="fas fa-tachometer-alt"></i>
        Dashboard
    </div>
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading"> Selamat Datang! </h4>
        </h4>
        <p>Selamat Datang <strong><?php echo $mahasiswa->nama_mhs; ?></strong> di Sistem Informasi Kuliah Kerja Nyata(KKN) Universitas Negeri Manado, Anda login sebagai <strong><?php echo $level; ?></strong>
        </p>

        <!-- <h3 style="color:red;" class="p-4 mt-4 text-center">Data Anda Belum </h3> -->
        

    </div>
    <?php if($mahasiswa->tempat_lahir == null || $mahasiswa->tanggal_lahir == null || $mahasiswa->fakultas_id == null || $mahasiswa->alamat == null || $mahasiswa->jurusan_id == null) : ?>
        <h3 style="color:red;" class="p-4 mt-4 text-center"><strong>Anda Belum Melengkapi Data Umum</strong></h3>
        <h3 style="color:red;" class="p-4 mt-4 text-center"><strong>Silakan Lengkapi semua Data Anda Pada Menu Profil untuk dapat mendaftar KKN!</strong></h3>
    <?php else: ?>
    <?php endif; ?>



</div>
