<!-- <!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $title_pdf;?></title>
        <style>
            #table {
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            #table td, #table th {
                border: 1px solid #ddd;
                padding: 8px;
            }

            #table tr:nth-child(even){background-color: #f2f2f2;}

            #table tr:hover {background-color: #ddd;}

            #table th {
                padding-top: 10px;
                padding-bottom: 10px;
                text-align: left;
                background-color: #4CAF50;
                color: white;
            }
        </style>
    </head>
    <body>
        <div style="text-align:center">
            <table >
                <tr width="20%">
                    <td style="text-align:center">
                        KEMENTRIAN PENDIDIKAN, KEBUDAYAAN, RISET DAN TEKNOLOGI
                    </td>
                </tr>
                <tr width="80%">
                    <td>
                        UNIVERSITAS NEGERI MANADO
                    </td>
                </tr>
                <tr>
                    <td>
                        LEMBAGA PENELITIAN DAN PENGABDIAN KEPADA MASYARAKAT
                    </td>
                </tr>

                <tr>
                    <td>
                        Alamat : Kampus Unema - Tandano
                    </td>
                </tr>
            </table>
        </div>
        <table id="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Produk</th>
                    <th>Harga Jual</th>
                    <th>Terjual</th>
                    <th>Tanggal Transaksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td scope="row">1</td>
                    <td>Kacang Goreng</td>
                    <td>Rp5.000,-</td>
                    <td>1</td>
                    <td>25 Oktober 2020, 17:01:03</td>
                </tr>
                <tr>
                    <td scope="row">2</td>
                    <td>Kopi Hitam</td>
                    <td>Rp5.000,-</td>
                    <td>1</td>
                    <td>25 Oktober 2020, 16:01:03</td>
                </tr>
                <tr>
                    <td scope="row">3</td>
                    <td>Gorengan Bakwan</td>
                    <td>Rp3.000,-</td>
                    <td>3</td>
                    <td>25 Oktober 2020, 15:01:02</td>
                </tr>
                <tr>
                    <td scope="row">4</td>
                    <td>Nasi uduk</td>
                    <td>Rp14.000,-</td>
                    <td>2</td>
                    <td>25 Oktober 2020, 14:04:03</td>
                </tr>
            </tbody>
        </table>
    </body>
</html> -->

<!DOCTYPE html>
<html>

<head>
    <title><?=$title_pdf?></title>
    <style>
        table {
            margin-top: 10px;
        }

        td {
            vertical-align: top;
        }

        ol {
            margin-top: 0px;
            margin-bottom: 0px;
            padding-left: 14px;
        }

        li {
            margin-left: 30px;
            font-size: 12px;
        }

        .break {
            page-break-after: always;
        }

        #table {
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            #table td, #table th {
                border: 1px solid #ddd;
                padding: 8px;
            }

            /* #table tr:nth-child(even){background-color: #f2f2f2;}

            #table tr:hover {background-color: #ddd;} */

            #table th {
                padding-top: 10px;
                padding-bottom: 10px;
                text-align: left;
                /* background-color: #4CAF50; */
                color: black;
            }
    </style>
</head>

<!-- <body style="background-image: url('<?= base_url('/assets/image/logo-univ.png'); ?>'); background-position: center;
background-repeat: no-repeat;
background-size: cover;
position: relative;"> -->
<body>
    <table style="width: 100%;">
        <tbody>
            <tr>
                
                <td style="width: 20%;"><span style="
                                line-height: 1;
                                font-family: 'Times New Roman', 'Times', 'serif';">
                                <img src="<?php echo base_url('assets/image/logo-kemendikbud.png');?>" width="150px">
                                <td style="width: 60%;">
                    <div data-empty="true" style="text-align: center; line-height: 1;"><span style="font-family: 'Times New Roman', Times, serif;"><span style="font-size: 18px; line-height: 1;"><strong>KEMENTRIAN PENDIDIKAN, KEBUDAYAAN, RISET DAN TEKNOLOGI&nbsp;</strong></span></span></div>
                    <p style="text-align: center; line-height: 1;"><span style="font-family: 'Times New Roman', Times, serif;"><strong><span style="line-height: 1;"><span style="font-size: 25px;">UNIVERSITAS NEGERI MANADO</span></span></strong></span></p>
                    <p style="text-align: center; line-height: 1;"><span style="font-family: 'Times New Roman', Times, serif;"><strong><span style="line-height: 1; font-size: 18px;">LEMBAGA PENELITIAN DAN PENGABDIAN KEPADA MASYARAKAT</span></strong></span></p>
                    <p style="text-align: center; line-height: 1;"><span style="font-family: 'Times New Roman', Times, serif;"><span style="font-size: 16px; line-height: 1;">Kampus Unema - Tandano</span><span style="font-size: 20px;"><span style="line-height: 1;">&nbsp;</span></span></span></p>
                </td>

                <td style="width: 20%; text-align:right"><span style="
                                line-height: 1;
                                font-family: 'Times New Roman', 'Times', 'serif';">
                               <img src="<?php echo base_url('assets/image/logo-univ.png');?>" width="150px">
            </tr>
        </tbody>
    </table>
    <hr style="border: 4px solid black; border-radius: 5px;">
    <p style="text-align: center;"><span style="font-family: 'Times New Roman', Times, serif;"><span style="line-height: 80%;"><strong><u><span style="font-size: 18px;">S E R T I F I K A T</span></u></strong></span><br><span style="line-height: 80%;"><span style="font-size: 12px;">&nbsp;</span></span></span></p>
   
   <table style="width:100%">
        <tbody>
          
            <tr>
                <td style="width:50.502%"></td>
                <td style="width: 24.2679%;"><span style="font-family: 'Times New Roman', Times, serif;"><span style="font-size: 12px;"><span style="line-height: 2;">NAMA</span></span></span></td>
                <td style="width: 5.2301%;"><span style="font-family: 'Times New Roman', Times, serif;"><span style="font-size: 12px;"><span style="line-height: 2;">:</span></span></span></td>
                <td style="width: 30.502%;"><span style="font-family: 'Times New Roman', Times, serif;"><span style="font-size: 12px;"><strong><?= strtoupper($mahasiswa->nama_mhs) ?></strong><br></span></span></td>
            </tr>
            <tr>
                <td style="width:50.502%"></td>
                <td style="width: 24.2679%;"><span style="font-family: 'Times New Roman', Times, serif;"><span style="font-size: 12px;"><span style="line-height: 2;">NIM</span></span></span></td>
                <td style="width: 5.2301%;"><span style="font-family: 'Times New Roman', Times, serif;"><span style="font-size: 12px;"><span style="line-height: 2;">:</span></span></span></td>
                <td style="width: 70.502%;"><span style="font-family: 'Times New Roman', Times, serif;"><span style="font-size: 12px;"><strong><?= strtoupper($mahasiswa->nim) ?></strong><br></span></span></td>
            </tr>
            <tr>
                <td style="width:50.502%"></td>
                <td style="width: 24.2679%;"><span style="font-family: 'Times New Roman', Times, serif;"><span style="font-size: 12px;"><span style="line-height: 2;">TEMPAT, TANGGAL LAHIR<br></span></span></span></td>
                <td style="width: 5.2301%;"><span style="font-family: 'Times New Roman', Times, serif;"><span style="font-size: 12px;"><span style="line-height: 2;">:</span></span></span></td>
                <td style="width: 70.502%;"><span style="font-family: 'Times New Roman', Times, serif;"><span style="font-size: 12px;"><?= strtoupper($mahasiswa->tempat_lahir) ?>, <?= strtoupper($mahasiswa->tanggal_lahir) ?><br></span></span></td>
            </tr>
            <tr>
                <td style="width:50.502%"></td>
                <td style="width: 24.2679%;"><span style="font-family: 'Times New Roman', Times, serif;"><span style="font-size: 12px;"><span style="line-height: 2;">FAKULTAS</span></span></span></td>
                <td style="width: 5.2301%;"><span style="font-family: 'Times New Roman', Times, serif;"><span style="font-size: 12px;"><span style="line-height: 2;">:</span></span></span></td>
                <td style="width: 70.502%;"><span style="font-family: 'Times New Roman', Times, serif;"><span style="font-size: 12px;"><?= strtoupper($mahasiswa->nama) ?><br></span></span></td>
            </tr>
            <tr>
            <td style="width:50.502%"></td>
                <td style="width: 24.2679%;"><span style="font-family: 'Times New Roman', Times, serif;"><span style="font-size: 12px;">JURUSAN/PROG.STUDI</span></span></td>
                <td style="width: 5.2301%;"><span style="font-family: 'Times New Roman', Times, serif;"><span style="font-size: 12px;">:</span></span></td>
                <td style="width: 70.502%;"><span style="font-family: 'Times New Roman', Times, serif;"><span style="font-size: 12px;"><?= strtoupper($mahasiswa->nama_jurusan) ?><br></span></span></td>
            </tr>
            <tr>
            <td style="width:50.502%"></td>
                <td style="width: 24.2679%;"><span style="font-family: 'Times New Roman', Times, serif;"><span style="font-size: 12px;">LOKASI KKN</span></span></td>
                <td style="width: 5.2301%;"><span style="font-family: 'Times New Roman', Times, serif;"><span style="font-size: 12px;">:</span></span></td>
                <td style="width: 70.502%;"><span style="font-family: 'Times New Roman', Times, serif;"><span style="font-size: 12px;"><?= strtoupper($mahasiswa->name_village) ?><br></span></span></td>
            </tr>
            <tr>
            <td style="width:50.502%"></td>
                <td style="width: 24.2679%;"><span style="font-family: 'Times New Roman', Times, serif;"><span style="font-size: 12px;">WAKTU PELAKSANAAN</span></span></td>
                <td style="width: 5.2301%;"><span style="font-family: 'Times New Roman', Times, serif;"><span style="font-size: 12px;">:</span></span></td>
                <td style="width: 70.502%;"><span style="font-family: 'Times New Roman', Times, serif;"><span style="font-size: 12px;"><?= date('d M Y', strtotime($dataSetKkn->tgl_mulai_kkn)) ?> - <?= date('d M Y', strtotime($dataSetKkn->tgl_akhir_kkn)) ?></span></span></td>
            </tr>
           
          
        </tbody>
    </table>
    <p style='margin:0cm;margin-bottom:.0001pt;text-align:center;margin-top:20px; font-size:16px;font-family:"Times New Roman",serif;'>
            SEBAGAI BUKTI TELAH MENGIKUTI KEGIATAN KULIAH KERJA NYATA (KKN) GELOMBANG <?= $dataSetKkn->gelombang ?> TAHUN <?= $dataSetKkn->tahun ?><br>YANG DISELENGGARAKAN OLEH LEMBAGA PENELITIAN DAN PENGABDIAN KEPADA MASYARAKAT
        
    </p>
   
   
    <p style="
                margin: 0cm 0cm 0.0001pt;
                font-size: 16px;
                font-family: 'Times New Roman', serif;
                text-align: justify;
                text-indent: 36pt;
                line-height: 1;"><span style="font-family: 'Times New Roman', Times, serif;"><span style="font-size: 12px;"><span style="line-height: 2;"><br></span></span></span></p>
    <table style="width: 100%;" class="break">
        <tbody>
            <tr>
                <td style="width: 70%;">
                    <p style="
                                margin: 0cm 0cm 0.0001pt;
                                font-size: 16px;
                                font-family: 'Times New Roman', serif;
                                text-align: right;
                                line-height: 1;"><br></p>
                    <p style="
                                margin: 0cm 0cm 0.0001pt;
                                font-size: 16px;
                                font-family: 'Times New Roman', serif;
                                text-align: right;
                                margin-right:50px;
                                line-height: 1;"><br><img src="<?= base_url('assets/uploads/'.$mahasiswa->foto) ?>" alt="" width="100px" height="150px"></p>
                </td>
                <td style="width: 30%;">
                    <p style="
                                margin: 0cm 0cm 0.0001pt;
                                font-size: 16px;
                                font-family: 'Times New Roman', serif;
                                text-align: center;
                                line-height: 1;"><span style="font-family: 'Times New Roman', Times, serif;"><span style="font-size: 12px;"><br></span></span></p>
                    <p style="
                                margin: 0cm 0cm 0.0001pt;
                                font-size: 16px;
                                font-family: 'Times New Roman', serif;
                                /* text-align: center; */
                                line-height: 1;"><span style="font-family: 'Times New Roman', Times, serif;"><span style="font-size: 12px;">TONDANO, <?= date('d M Y') ?><br><span style="line-height: 2;"><strong>KETUA,</strong><strong>&nbsp;&nbsp;</strong></span></span></span></p>
                    <p style="
                                margin: 0cm 0cm 0.0001pt;
                                font-size: 16px;
                                font-family: 'Times New Roman', serif;
                                text-align: left;
                                line-height: 1;"><span style="font-family: 'Times New Roman', Times, serif;"><span style="font-size: 12px;text-align:left"><img src="<?= base_url('assets/uploads/'.$dataSetKkn->ttd_ketua) ?>" alt="" width="100px"><br></span></span></p>
                    <p style="
                                margin: 0cm 0cm 0.0001pt;
                                font-size: 16px;
                                font-family: 'Times New Roman', serif;
                                text-align: center;
                                line-height: 1;"><span style="font-family: 'Times New Roman', Times, serif;"><span style="font-size: 12px;"><span style="line-height: 2;"><br></span></span></span></p>
                    <p style="
                                margin: 0cm 0cm 0.0001pt;
                                font-size: 16px;
                                font-family: 'Times New Roman', serif;
                                /* text-align: center; */
                                line-height: 1;"><span style="font-family: 'Times New Roman', Times, serif;"><span style="font-size: 12px;"><strong><u><?= strtoupper($dataSetKkn->ketua) ?></u></strong></span><br>NIP. <?= $dataSetKkn->nip_ketua ?><span style="line-height: 80%;"><span style='font-size: 12px; font-family: "Times New Roman", Times, serif;'><strong><u>&nbsp;</u></strong></span></span></span></p>
                </td>
            </tr>
        </tbody>
    </table>

    <!-- page 2 -->
        <div >
        <table id="table" style="margin-top:100px;" width="85%">
            <thead>
                <tr >
                    <th width="10%" style="border:none"></th>
                    <th width="5%">No.</th>
                    <th style="text-align:center" width="30%">ASPEK PENILAIAN</th>
                    <th style="text-align:center" width="10%">BOBOT</th>
                    <th style="text-align:center" width="10%">NILAI</th>
                    <th style="text-align:center" width="10%">B X N</th>
                    <th width="10%" style="border:none"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="border:none"></td>
                    <td scope="row">1</td>
                    <td>DISIPLIN</td>
                    <td>2</td>
                    <td>
                        <?= $disiplin ?>
                    </td>
                    <td><?= $disiplin * 2 ?></td>
                    <td style="border:none"></td>
                </tr>
                <tr>
                    <td style="border:none"></td>
                    <td scope="row">2</td>
                    <td>KREATIVITAS</td>
                    <td>2</td>
                    
                    <td><?= $kreatifitas ?></td>
                    <td><?= $kreatifitas * 2 ?></td>
                    <td style="border:none"></td>
                </tr>
                <tr>
                    <td style="border:none"></td>
                    <td scope="row">3</td>
                    <td>KERJASAMA</td>
                    <td>2</td>
                   
                    <td> <?= $kerjasama ?></td>
                    <td><?= $kerjasama * 2 ?></td>
                    <td style="border:none"></td>
                </tr>
                <tr>
                    <td style="border:none"></td>
                    <td scope="row">4</td>
                    <td>KOMUNIKASI</td>
                    <td>1</td>
                    
                    <td><?= $komunikasi ?></td>
                    <td><?= $komunikasi *1 ?></td>
                    <td style="border:none"></td>
                </tr>
                <tr>
                    <td style="border:none"></td>
                    <td scope="row">5</td>
                    <td>KESESUAIAN HASIL DENGAN RENCANA KERJA</td>
                    <td>3</td>
                    
                    <td><?= $kesesuaianhasil ?></td>
                    <td><?= $kesesuaianhasil *3 ?></td>
                    <td style="border:none"></td>
                </tr>
                <tr>
                    <td style="border:none"></td>
                    <td colspan="2" style="text-align:center">JUMLAH</td>
                    <td>10</td>
                    <td></td>
                    <td><?= ($disiplin * 2) + ($kreatifitas * 2) + ($kerjasama * 2) + ($komunikasi * 1) + ($kesesuaianhasil * 3) ?></td>
                    <td style="border:none"></td>
                </tr>
                <tr style="padding:20px; border:none">
                    <td style="border:none"></td>
                    <td colspan="5" style="text-align:center; border:none">
                        &sum; ( B X N ) / 10 = <?= ($disiplin * 2) + ($kreatifitas * 2) + ($kerjasama * 2) + ($komunikasi * 1) + ($kesesuaianhasil * 3) ?> / 10 = <strong><?=round((($disiplin * 2) + ($kreatifitas * 2) + ($kerjasama * 2) + ($komunikasi * 1) + ($kesesuaianhasil * 3)) /10,2) ?> 
                        <?php if (round((($disiplin * 2) + ($kreatifitas * 2) + ($kerjasama * 2) + ($komunikasi * 1) + ($kesesuaianhasil * 3)) /10,2) >= 3.80 && round((($disiplin * 2) + ($kreatifitas * 2) + ($kerjasama * 2) + ($komunikasi * 1) + ($kesesuaianhasil * 3)) /10,2) <=4.00 ) :?>
                            (A)
                       
                        <?php elseif(round((($disiplin * 2) + ($kreatifitas * 2) + ($kerjasama * 2) + ($komunikasi * 1) + ($kesesuaianhasil * 3)) /10,2) >= 3.00 && round((($disiplin * 2) + ($kreatifitas * 2) + ($kerjasama * 2) + ($komunikasi * 1) + ($kesesuaianhasil * 3)) /10,2) <=3.79) : ?>
                            (B)
                     
                        <?php elseif(round((($disiplin * 2) + ($kreatifitas * 2) + ($kerjasama * 2) + ($komunikasi * 1) + ($kesesuaianhasil * 3)) /10,2) >= 2.60 && round((($disiplin * 2) + ($kreatifitas * 2) + ($kerjasama * 2) + ($komunikasi * 1) + ($kesesuaianhasil * 3)) /10,2) <=2.90) : ?>
                            (C)

                        <?php else : ?>
                            (D)
                        <?php endif; ?>
                        
                        </strong>
                    </td>
                    <td style="border:none"></td>
                </tr>
               <tr> <td style="border:none"></td></tr>
               <tr><td style="border:none"></td></tr>
               <tr><td style="border:none"></td></tr>
               <tr><td style="border:none"></td></tr>
               
               <tr>
                   <td colspan="4" style="border:none; text-align:right"></td>
                   <td colspan="2" style="border:none;">Koordinator KKN,<br>
                   <img src="<?= base_url('assets/uploads/'.$dataSetKkn->ttd_koordinator) ?>" alt="" width="100px">
                </td>
               </tr>
               <!-- <tr> <td style="border:none"></td></tr> -->
               <!-- <tr><td style="border:none"></td></tr> -->
               <!-- <tr><td style="border:none"></td></tr> -->
               <tr rowspan="3"> 
                   <td colspan="4" style="border:none; text-align:right; margin-top:30px"></td>
                   <td colspan="2" style="border:none; "><?= strtoupper($dataSetKkn->koordinator_kkn) ?></td>
               </tr>
               <tr>
                   <td colspan="4" style="border:none; text-align:right"></td>
                   <td colspan="2" style="border:none;">NIP. <?= strtoupper($dataSetKkn->nip_koordinator) ?></td>
               </tr>
            </tbody>
    </table>
        </div>
    
</body>

</html>