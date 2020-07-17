<html>
    <head>
        <title><?= $title ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <style>
            @page { margin: 0mm; }
            @media print{@page {size: landscape}}
        </style>
    </head>
    <body onload="window.print()"> 
        <!-- <div class="container">
            <div class="row">
                <div class="col align-self-center">
                    <img src="<?= base_url('storage/uploads/site/certif.png') ?>" height="150px" width="250px">
                    <?=  $div['title'] ?>
                </div>
                
            </div>
            
        </div> -->
    <div class="container">
        <div style="width:auto; height:100%; padding:20px; text-align:center; border: 10px solid #787878">
            <div style="width:auto; height:100%; padding:20px; text-align:center; border: 5px solid #787878">
                <span style="font-size:50px; font-weight:bold">Sertifikat Kelulusan</span>
                <br><br>
                <span style="font-size:25px">diberikan Kepada</span>
                <br><br>
                <span style="font-size:30px"><b><?= $this->session->userdata('nama_lengkap') ?></b></span><br/><br/>
                <span style="font-size:25px">atas kelulusannya pada kelas</span> <br/><br/>
                <span style="font-size:30px"><?= $div['title'] ?></span> <br/><br/>
                <span style="font-size:20px"><?= $div['id_payment'] ?></b></span> <br/><br/><br/>
                <div class="row">
                    <div class="col">
                        Tanggal berlaku Sertifikat
                        <?php
                            function tgl_indo($tanggal){
                                $bulan = array (
                                    1 =>   'Januari',
                                    'Februari',
                                    'Maret',
                                    'April',
                                    'Mei',
                                    'Juni',
                                    'Juli',
                                    'Agustus',
                                    'September',
                                    'Oktober',
                                    'November',
                                    'Desember'
                                );
                                $pecahkan = explode('-', $tanggal);
                                return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
                            }
                            
                        ?>
                        <div>
                            <?= tgl_indo(date("Y-m-d", strtotime($div['waktu']))) ?>
                        </div>
                        <div class="mt-5">
                            Dalih Rusmana
                        </div>                        
                        <div>
                            Chief Executive Officer
                        </div>
                        <div>
                            UX Orbit Design
                        </div>
                        
                        
                    </div>
                    <div class="col">
                        Berlaku sampai tanggal
                        <div class="mb-5">
                            <?php
                                echo $tanggal = date("d", strtotime($div['waktu']));
                                echo tgl_indo(date("-m-", strtotime($div['waktu'])));
                                $tahun = date("Y", strtotime($div['waktu']));
                                echo $tahun= $tahun+4;
                            ?>
                        </div>
                        <div class="mt-5">
                            <?= $div['nama_lengkap'] ?>
                        </div>
                    </div>
                </div>
                
                
                    <!-- #set ($dt = $DateFormatter.getFormattedDate($grade.getAwardDate(), "MMMM dd, yyyy")) -->
                
            </div>
        </div>
    </div>
    </body>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>



