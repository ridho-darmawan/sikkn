<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script type="text/javascript">
    var dynamicColors = function() {
        var r = Math.floor(Math.random() * 255);
        var g = Math.floor(Math.random() * 255);
        var b = Math.floor(Math.random() * 255);
        return "rgb(" + r + "," + g + "," + b + ")";
    };


    // fakultas
    var ctx = document.getElementById('chartFakultas').getContext('2d');

    var chart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: [
            <?php
                if (count($fakultasGraph)>0) {
                foreach ($fakultasGraph as $data) {
                    echo "'" .strtoupper($data->nama) ."',";
                }
                }
            ?>
            ],
            datasets: [{
                label: 'Jumlah Fakultas',
                backgroundColor:[dynamicColors],
                // borderColor: '#D4EDDA',
                data: [
                <?php
                    if (count($fakultasGraph)>0) {
                        // $count = 0;
                        foreach ($fakultasGraph as $data) 
                        {
                            echo "'" .$data->total ."',";
                        }

                    }
                ?>
                ]
            }]
        },
    });

    // jurusan
    var chartJurusan = document.getElementById('chartJurusan').getContext('2d');
    var chart = new Chart(chartJurusan, {
    type: 'pie',
    data: {
        labels: [
          <?php
            if (count($jurusanGraph)>0) {
              foreach ($jurusanGraph as $data) {
                echo "'" .strtoupper($data->nama_jurusan) ."',";
              }
            }
          ?>
        ],
        datasets: [{
            label: 'Jumlah Jurusan',
            
            backgroundColor:[dynamicColors],
            // borderColor: '#D4EDDA',
            data: [
              <?php
                if (count($jurusanGraph)>0) {
                    // $count = 0;
                    foreach ($jurusanGraph as $data) 
                    {
                        echo "'" .$data->total ."',";
                    }

                }
              ?>
            ]
        }]
    },

    
});

   // gender
    var chartGender = document.getElementById('chartGender').getContext('2d');
    var chart = new Chart(chartGender, {
    type: 'pie',
    data: {
        labels: [
          <?php
            if (count($genderGraph)>0) {
              foreach ($genderGraph as $data) {
                echo "'" .strtoupper($data->jk) ."',";
              }
            }
          ?>
        ],
        datasets: [{
            label: 'Jumlah gender',
            
            backgroundColor:[dynamicColors],
            // borderColor: '#D4EDDA',
            data: [
              <?php
                if (count($genderGraph)>0) {
                    // $count = 0;
                    foreach ($genderGraph as $data) 
                    {
                        echo "'" .$data->total ."',";
                    }

                }
              ?>
            ]
        }]
    },

    
    });

     // lokasi
    var chartLokasi = document.getElementById('chartLokasi').getContext('2d');
    var chart = new Chart(chartLokasi, {
    type: 'doughnut',
    data: {
        labels: [
          <?php
            if (count($lokasiGraph)>0) {
              foreach ($lokasiGraph as $data) {
                echo "'" .strtoupper($data->name_village) ."',";
              }
            }
          ?>
          
        ],
        datasets: [{
            label: 'Jumlah Lokasi Yg Dipilih',
            
            backgroundColor:[dynamicColors],
            // borderColor: '#D4EDDA',
            data: [
              <?php
                if (count($lokasiGraph)>0) {
                    // $count = 0;
                    foreach ($lokasiGraph as $data) 
                    {
                        echo "'" .$data->total."',";
                    }

                }
              ?>
            ]
        }]
    },

    
    });
 
</script>