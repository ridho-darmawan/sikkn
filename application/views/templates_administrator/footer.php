
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

<script src="<?=base_url('assets/')?>vendor/jquery/jquery.min.js"></script>
    <script src="<?=base_url('assets/')?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?=base_url('assets/')?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?=base_url('assets/')?>js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?=base_url('assets/')?>vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?=base_url('assets/')?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?=base_url('assets/')?>js/demo/datatables-demo.js"></script>


<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/smartwizard@5/dist/js/jquery.smartWizard.min.js" type="text/javascript"></script>

<script type="text/javascript">
    $(document).ready(function(){
 
        $('#smartwizard').smartWizard();

        });
        $('#smartwizard').smartWizard({
            
            selected: 0, // Initial selected step, 0 = first step
            theme: 'default', // theme for the wizard, related css need to include for other than default theme
            justified: true, // Nav menu justification. true/false
            darkMode:false, // Enable/disable Dark Mode if the theme supports. true/false
            autoAdjustHeight: true, // Automatically adjust content height
            cycleSteps: false, // Allows to cycle the navigation of steps
            backButtonSupport: true, // Enable the back button support
            enableFinishButton: true,
            enableURLhash: true, // Enable selection of the step based on url hash
            transition: {
                animation: 'none', // Effect on navigation, none/fade/slide-horizontal/slide-vertical/slide-swing
                speed: '400', // Transion animation speed
                easing:'' // Transition animation easing. Not supported without a jQuery easing plugin
            },
            toolbarSettings: {
                toolbarPosition: 'bottom', // none, top, bottom, both
                toolbarButtonPosition: 'right', // left, right, center
                showNextButton: true, // show/hide a Next button
                showPreviousButton: true, // show/hide a Previous button
                toolbarExtraButtons: [] // Extra buttons to show on toolbar, array of jQuery input/buttons elements
            },
            anchorSettings: {
                anchorClickable: true, // Enable/Disable anchor navigation
                enableAllAnchors: false, // Activates all anchors clickable all times
                markDoneStep: true, // Add done state on navigation
                markAllPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
                removeDoneStepOnNavigateBack: false, // While navigate back done step after active step will be cleared
                enableAnchorOnDoneStep: true // Enable/Disable the done steps navigation
            },
            keyboardSettings: {
                keyNavigation: true, // Enable/Disable keyboard navigation(left and right keys are used if enabled)
                keyLeft: [37], // Left key code
                keyRight: [39] // Right key code
            },
            lang: { // Language variables for button
                next: 'Selanjutnya',
                previous: 'Sebelumnya'
            },
            disabledSteps: [], // Array Steps disabled
            errorSteps: [], // Highlight step with errors
            hiddenSteps: [] // Hidden steps
            
        });

        var baseURL= "<?php echo base_url();?>";
        $(document).ready(function(){

            $('#sel_prov').change(function(){ 
                var id=$(this).val();
                console.log("========",id);
                $.ajax({
                    url:'<?=base_url()?>administrator/C_lokasiKkn/get_kabupaten',
                    method : "POST",
                    data : {id: id},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                        console.log("========",data);
                        $('#sel_kab').find('option').not(':first').remove();
                        $('#sel_kec').find('option').not(':first').remove();
                        $('#sel_desa').find('option').not(':first').remove();
                        
                        var html = '';
                        html += '<option>Pilih Kabupaten</option>';
                        var i;
                        for(i=0; i<data.length; i++){
                            
                            html += '<option value='+data[i].id+'>'+data[i].name_regencie+'</option>';
                        }
                        $('#sel_kab').html(html);

                    }
                });
                return false;
            }); 

            $('#sel_kab').change(function(){ 
                var id=$(this).val();
                console.log("========",id);
                $.ajax({
                    url:'<?=base_url()?>administrator/C_lokasiKkn/get_kecamatan',
                    method : "POST",
                    data : {id: id},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                        console.log("========",data);
                        $('#sel_kec').find('option').not(':first').remove();
                        $('#sel_desa').find('option').not(':first').remove();
                        var html = '';
                        var i;
                        
                        html += '<option>Pilih Kecamatan</option>';
                        for(i=0; i<data.length; i++){
                            html += '<option value='+data[i].id+'>'+data[i].name_district+'</option>';
                        }
                        $('#sel_kec').html(html);

                    }
                });
                return false;
            }); 

            $('#sel_kec').change(function(){ 
                var id=$(this).val();
                console.log("========",id);
                $.ajax({
                    url:'<?=base_url()?>administrator/C_lokasiKkn/get_desa',
                    method : "POST",
                    data : {id: id},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                        console.log("========",data);
                        $('#sel_desa').find('option').not(':first').remove();
                        var html = '';
                        var i;
                        
                        html += '<option>Pilih Desa/Kelurahan</option>';
                        for(i=0; i<data.length; i++){
                            html += '<option value='+data[i].id+'>'+data[i].name_village+'</option>';
                        }
                        $('#sel_desa').html(html);

                    }
                });
                return false;
            }); 

            $('#sel_fakultas').change(function(){ 
                var id=$(this).val();
                console.log("========",id);
                $.ajax({
                    url:'<?=base_url()?>administrator/C_mahasiswa/get_jurusan',
                    method : "POST",
                    data : {id: id},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                        console.log("========",data);
                        $('#sel_jurusan').find('option').not(':first').remove();
                        var html = '';
                        var i;
                        
                        html += '<option>Pilih Jurusan</option>';
                        for(i=0; i<data.length; i++){
                            html += '<option value='+data[i].id_jurusan+'>'+data[i].nama_jurusan+'</option>';
                        }
                        $('#sel_jurusan').html(html);

                    }
                });
                return false;
            }); 

            $('#sel_provinsi').change(function(){ 
                var id=$(this).val();
                console.log("========",id);
                $.ajax({
                    url:'<?=base_url()?>mahasiswa/C_kkn/get_kabupaten',
                    method : "POST",
                    data : {id: id},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                        console.log("========",data);
                        $('#sel_kabupaten').find('option').not(':first').remove();
                        $('#sel_kecamatan').find('option').not(':first').remove();
                        $('#sel_desa_kkn').find('option').not(':first').remove();
                        
                        var html = '';
                        html += '<option>Pilih Kabupaten</option>';
                        var i;
                        for(i=0; i<data.length; i++){
                            
                            html += '<option value='+data[i].kabupaten_id+'>'+data[i].name_regencie+'</option>';
                        }
                        $('#sel_kabupaten').html(html);

                    }
                });
                return false;
            }); 

            $('#sel_kabupaten').change(function(){ 
                var id=$(this).val();
                console.log("========",id);
                $.ajax({
                    url:'<?=base_url()?>mahasiswa/C_kkn/get_kecamatan',
                    method : "POST",
                    data : {id: id},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                        console.log("========",data);
                        $('#sel_kecamatan').find('option').not(':first').remove();
                        $('#sel_desa_kkn').find('option').not(':first').remove();
                        var html = '';
                        var i;
                        
                        html += '<option>Pilih Kecamatan</option>';
                        for(i=0; i<data.length; i++){
                            html += '<option value='+data[i].kecamatan_id+'>'+data[i].name_district+'</option>';
                        }
                        $('#sel_kecamatan').html(html);

                    }
                });
                return false;
            }); 

            $('#sel_kecamatan').change(function(){ 
                var id=$(this).val();
                console.log("========",id);
                $.ajax({
                    url:'<?=base_url()?>mahasiswa/C_kkn/get_desa',
                    method : "POST",
                    data : {id: id},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                        console.log("========",data);
                        $('#sel_desa_kkn').find('option').not(':first').remove();
                        var html = '';
                        var i;
                        
                        html += '<option>Pilih Desa/Kelurahan</option>';
                        for(i=0; i<data.length; i++){
                            html += '<option value='+data[i].desa_id+'>'+data[i].name_village+'</option>';
                        }
                        $('#sel_desa_kkn').html(html);

                    }
                });
                return false;
            }); 

            
        });
</script>

    
  </body>

  </html>