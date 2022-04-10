<div class="container-fluid">


    <div class="alert alert-success" role="alert">
        <i class="fas fa-tachometer-alt"></i>
        Dashboard
    </div>
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading"> Selamat Datang! </h4>
        </h4>
        <p>Selamat Datang <strong><?php echo $nama; ?></strong> di Sistem Informasi Kuliah Kerja Nyata(KKN) Universitas Negeri Manado, Anda login sebagai <strong><?php echo $level; ?></strong>
        </p>

    </div>

</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; SIKKN LPPM UNIMA 2021</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?php echo base_url('mahasiswa/auth/logout') ?>">Logout</a>
            </div>
        </div>
    </div>
</div>