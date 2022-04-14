<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon ">
                    <i class="fas fa-university"></i>
                </div>
                <div class="sidebar-brand-text mx-1">SIKKN </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <?php if($this->session->userdata('level') == 'mahasiswa') : ?>
                <li class="nav-item active">
                    <a class="nav-link" href="<?= site_url('C_dashboard/mahasiswa') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>

                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="<?= site_url('mahasiswa/C_kkn') ?>">
                    <i class="fas fa-fw fa-list"></i>
                    <span>Daftar KKN</span></a>

                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="<?= site_url('mahasiswa/C_laporan') ?>">
                    <i class="fas fa-fw fa-list"></i>
                    <span>Laporan KKN</span></a>

                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="<?= site_url('mahasiswa/C_profil') ?>">
                    <i class="fas fa-fw fa-list"></i>
                    <span>Profil</span></a>

                </li>

            <?php elseif($this->session->userdata('level') == 'dpl') : ?>

                <li class="nav-item active">
                    <a class="nav-link" href="<?= site_url('C_dashboard') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('mahasiswa/C_kkn/mahasiswaDpl') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Mahasiswa KKN</span></a>

                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('administrator/C_dpl/profil') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Profil</span></a>

                </li>

                <?php elseif($this->session->userdata('level') == 'desa') : ?>

                    <li class="nav-item active">
                        <a class="nav-link" href="<?= site_url('C_dashboard') ?>">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('mahasiswa/C_kkn/mahasiswaDesa') ?>">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Mahasiswa KKN</span></a>

                    </li>

                   
            <?php elseif($this->session->userdata('level') == 'lppm') : ?>
                 <!-- Heading -->
                <div class="sidebar-heading">
                    Administrator
                </div>

                <hr class="sidebar-divider">

                
                <div class="sidebar-heading">
                    Admin
                </div>

                <!-- Nav Item - Dashboard -->
                <li class="nav-item active">
                    <a class="nav-link" href="<?= site_url('C_dashboard/admin') ?>">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>

                </li>
                
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-user-graduate"></i>
                        <span>Data Master</span>
                    </a>
                    <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Master</h6>
                            <a class="collapse-item" href="<?php echo base_url('administrator/C_Mahasiswa') ?>">Data Mahasiswa</a>
                            <a class="collapse-item" href="<?php echo base_url('administrator/C_fakultas') ?>">Fakultas</a>
                            <a class="collapse-item" href="<?php echo base_url('administrator/C_jurusan') ?>">Jurusan</a>
                            <a class="collapse-item" href="<?php echo base_url('administrator/C_dpl') ?>">DPL</a>
                            <a class="collapse-item" href="<?php echo base_url('administrator/C_lokasiKkn') ?>">Lokasi KKN</a>
                        </div>
                    </div>
                </li>

                <!-- <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url('administrator/C_mahasiswa/kkn') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Data Mahasiswa KKN</span></a>
                </li> -->


                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-user-graduate"></i>
                        <span>Data Mahasiswa KKN</span>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Pendaftaran:</h6>
                            <a class="collapse-item" href="<?php echo base_url('administrator/C_mahasiswa/kknReguler') ?>">KKN Reguler</a>
                            <a class="collapse-item" href="<?php echo base_url('administrator/C_mahasiswa/kknMerdeka') ?>">KKN Merdeka Belajar</a>
                        </div>
                    </div>
                </li>

                <!-- <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                        <i class="fas fa-fw fa-fw fa-folder"></i>
                        <span>Laporan Akhir</span>
                    </a>
                    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Sub-Menu Laporan Akhir:</h6>
                            <a class="collapse-item" href="<?php echo base_url('administrator/C_mahasiswa/laporanKknReguler') ?>">KKN REGULER</a>
                            <a class="collapse-item" href="<?php echo base_url('administrator/C_mahasiswa/laporanKknMerdeka') ?>">KKN MERDEKA BELAJAR</a>
                        </div>

                    </div>


                </li> -->

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                        <i class="fas fa-fw fa-fw fa-wrench"></i>
                        <span>Pengaturan</span>
                    </a>
                    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Sub-Menu Pengaturan:</h6>
                            <a class="collapse-item" href="<?php echo base_url('administrator/C_setting') ?>">Jadwal KKN</a>
                            <a class="collapse-item" href="<?php echo base_url('administrator/C_pimpinan') ?>">Pimpinan</a>


                        </div>
                    </div>
                </li>
                
            <?php endif ?>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('C_login/logout') ?>">
                    <i class=" fas fa-fw fa-sign-out-alt"></i>
                    <span>Logout</span></a>
            </li>
            
                       <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>



        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                  

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $nama ?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                               
                                <a class="dropdown-item" href="<?= base_url('mahasiswa/C_profil/changePassword') ?>">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Change Password
                                </a>
                               
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item"  href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>

                              
                            </div>
                        </li>

                    </ul>

                </nav>

                <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <a class="btn btn-primary" href="<?php echo base_url('C_login/logout') ?>" >Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Topbar -->