<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>DE PERKASA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="<?= base_url(); ?>images/logo3.png">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css">
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />

     <!-- datatable -->
     <link rel="stylesheet" href="<?= base_url(); ?>assets/css/lib/datatable/dataTables.bootstrap.min.css">
     
   <style>
    #weatherWidget .currentDesc {
        color: #ffffff!important;
    }
        .traffic-chart {
            min-height: 335px;
        }
        #flotPie1  {
            height: 150px;
        }
        #flotPie1 td {
            padding:3px;
        }
        #flotPie1 table {
            top: 20px!important;
            right: -10px!important;
        }
        .chart-container {
            display: table;
            min-width: 270px ;
            text-align: left;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        #flotLine5  {
             height: 105px;
        }

        #flotBarChart {
            height: 150px;
        }
        #cellPaiChart{
            height: 160px;
        }

    </style>
</head>

<body>
    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="<?= base_url(); ?>user/index"><i class="menu-icon fa fa-home"></i>Dashboard </a>
                    </li>
                    <li class="">
                        <a href="<?= base_url(); ?>user/registrasi"><i class="menu-icon fa fa-user"></i>Registrasi Member </a>
                    </li>
                    <li class="">
                        <a href="<?= base_url(); ?>user/member"><i class="menu-icon fa fa-file"></i>Kunjungan Member </a>
                    </li>
                    <li class="">
                        <a href="<?= base_url(); ?>user/harian"><i class="menu-icon fa fa-file"></i>Kelas harian </a>
                    </li>
                    <li class="">
                        <a href="<?= base_url(); ?>user/minuman"><i class="menu-icon fa fa-glass"></i>Data Minuman </a>
                    </li>
                    <li class="">
                        <a href="<?= base_url(); ?>user/rekap"><i class="menu-icon fa fa-paste"></i>Rekap Data </a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
    <div id="right-panel" class="right-panel">
    <!-- Header-->
    <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href="./"><img src="<?= base_url(); ?>images/logo3.png" width="80px"></a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
                    </div>
                     <div class="top-right">
                     <div class="header-menu">
                     <div class="header-left">
                         <div class="user-area dropdown float-right">
                            <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                             <img class="user-avatar rounded-circle" src="<?= base_url(); ?>images/admin.jpeg" alt="User Avatar">
                             </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="<?= base_url(); ?>user/profil"><i class="fa fa- user"></i>My Profile</a>
                            <a class="nav-link" href="<?= route_to('logout'); ?>"><i class="fa fa-power -off"></i>Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- /#header -->
        <!-- Content -->
        <?= $this->renderSection('content'); ?>

        <div class="clearfix"></div>
        <!-- Footer -->
        <footer class="site-footer">
            <div class="footer-inner bg-white">
                <div class="row">
                    <div class="col-sm-6">
                        Copyright &copy; 2023 DE PERKASA
                    </div>
                  
                </div>
            </div>
        </footer>
        <!-- /.site-footer -->
    </div>
    <!-- /#right-panel -->

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/main.js"></script>

    <!--  Chart js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>

    <!--Chartist Chart-->
    <script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/simpleweather@3.1.0/jquery.simpleWeather.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/init/weather-init.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/init/fullcalendar-init.js"></script>

       <!-- datatable -->
   <script src="<?= base_url(); ?>assets/js/lib/data-table/datatables.min.js"></script>
   <script src="<?= base_url(); ?>assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
   <script src="<?= base_url(); ?>assets/js/lib/data-table/dataTables.buttons.min.js"></script>
   <script src="<?= base_url(); ?>assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
   <script src="<?= base_url(); ?>assets/js/lib/data-table/jszip.min.js"></script>
   <script src="<?= base_url(); ?>assets/js/lib/data-table/vfs_fonts.js"></script>
   <script src="<?= base_url(); ?>assets/js/lib/data-table/buttons.html5.min.js"></script>
   <script src="<?= base_url(); ?>assets/js/lib/data-table/buttons.print.min.js"></script>
   <script src="<?= base_url(); ?>assets/js/lib/data-table/buttons.colVis.min.js"></script>
   <script src="<?= base_url(); ?>assets/js/init/datatables-init.js"></script>

   <script 
   type="text/javascript">
       $(document).ready(function() {
         $('#data-table').DataTable();
     } );
 </script>
    <!--Local Stuff-->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>

    <script>
        var wtf = $.ajax({
            url: "<?= base_url() . 'home/statistic'; ?>",
            async: false,
            dataType: 'json'
        }).responseJSON;

         //bar chart
     var ctx = document.getElementById( "barChart" );
     //    ctx.height = 200;
     var myChart = new Chart( ctx, {
         type: 'bar',
         data: {
             labels: [ "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec", ],
             datasets: [
                 {
                     label: "Grafik data registrasi",
                     data: wtf,
                     borderColor: "rgba(0, 194, 146, 0.9)",
                     borderWidth: "0",
                     backgroundColor: "rgba(0, 194, 146, 0.5)"
                             }
                         ]
         },
         options: {
             scales: {
                 yAxes: [ {
                     ticks: {
                         beginAtZero: true
                     }
                                 } ]
             }
         }
     } );
</script>
<script>
// Fungsi untuk menampilkan alert dengan angka
function showAlert(number) {
  alert("Anda mengetikkan angka: " + number + " dan menekan tombol panah bawah!");
}

let inputNumber = ""; // Untuk menyimpan angka yang dimasukkan oleh pengguna

// Menambahkan event listener untuk mendeteksi input di seluruh dokumen
document.addEventListener("keydown", function(event) {
  const keyPressed = event.key;
  const keyCode = event.keyCode || event.which; // Mendapatkan kode tombol

  // Memeriksa apakah yang ditekan adalah angka
  if (!isNaN(keyPressed)) {
    inputNumber += keyPressed; // Menyimpan angka yang dimasukkan
  } else if (keyCode === 13 && inputNumber !== "") {
    showAlert(inputNumber); // Menampilkan alert dengan angka yang dimasukkan
    inputNumber = ""; // Mengosongkan inputNumber setelah ditampilkan dalam alert
  } else {
    inputNumber = ""; // Mengosongkan inputNumber jika tidak ada angka yang dimasukkan
  }
});
</script>
</body>
</html>
