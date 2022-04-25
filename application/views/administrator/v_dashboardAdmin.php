<div class="container-fluid">

    <div class="alert alert-success" role="alert">
        <i class="fas fa-tachometer-alt"></i>
        Dashboard
    </div>

    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading"> Selamat Datang! </h4>
        </h4>
        <p>Selamat Datang <strong><?php echo $username; ?></strong> di Sistem Informasi Kuliah Kerja Nyata(KKN) Universitas Negeri Manado, Anda login sebagai <strong><?php echo $level; ?></strong>
        </p>
    </div>

    <div class="row">

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Pendaftar KKN</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalPendaftar ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total KKN Merdeka</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalPendaftarMerdeka ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total KKN Reguler
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $totalPendaftarReguler ?></div>
                                </div>
                               
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Jumlah DPL</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalDPL ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row mb-4">
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Daftar Fakultas</h5>
                    <canvas id="chartFakultas"></canvas>
                        
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Daftar Jurusan</h5>
                    <canvas id="chartJurusan"></canvas>
                </div>
            </div>
        </div>

       
    </div>

    <div class="row mb-4">
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Daftar Gender</h5>
                    <canvas id="chartGender"></canvas>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Lokasi KKN</h5>
                    <canvas id="chartLokasi"></canvas>
                        
                </div>
            </div>
        </div>
       
    </div>
    
</div>


