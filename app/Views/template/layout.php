<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 3 | Dashboard</title>
    
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/style.css">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="<?= base_url() ?>/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?= base_url() ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?= base_url() ?>/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>/dist/css/adminlte.min.css">
    <!-- style -->
    <link rel="stylesheet" href="<?= base_url() ?>/dist/css/style.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url() ?>/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?= base_url() ?>/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="<?= base_url() ?>/plugins/summernote/summernote-bs4.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <script src="<?= base_url() ?>/plugins/jquery/jquery.min.js"></script>
            <!-- jQuery UI 1.11.4 -->
    <script src="<?= base_url() ?>/js/bootstrap.min.js"></script>
    
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="border-bottom: 0px solid #dee2e6;">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button" data-auto-collapse-size="768"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- SEARCH FORM -->


            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <!-- <form class="form-inline ml-3">
                        <div class="input-group input-group-sm">
                            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search" style="border-radius: 10px 0 0 10px;">
                            <div class="input-group-append">
                                <button class="btn btn-navbar" type="submit" style="border-radius: 0 10px 10px 0 ;">
                <i class="fas fa-search"></i>
              </button>
                            </div>
                        </div>
                    </form> -->
                </li>
                <li class="nav-item">

                </li>
                <li class="nav-item">

                </li>
                <li class="nav-item">
                    <a href="pages/layout/boxed.html" class="nav-link">
                        <i class="fas fa-power-off nav-icon"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link" style="border-bottom: 0px solid #dee2e6;">
                <img src="dist/img/AdminLTELogo.png" alt="" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Undagicode</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3" style="justify-content: center; border-bottom: 0px solid #4f5962;">
                    <!-- <div class="image d-flex" style="justify-content: center;">
                        <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image" style=" width: 3.1rem;">
                    </div>
                    <div class="info" style="text-align: center; width: 100%;">
                        <a href="#" class="d-block">Alexander Pierce</a>
                        <a href="#" class="d-block"><small>Alexander1</small></a>
                    </div> -->
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item has-treeview menu-open">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/widgets.html" class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Data Buku

                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-user-alt"></i>
                                <p>
                                    Data Pegawai
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="pages/layout/top-nav.html" class="nav-link">
                                        <i class="far fa-user nav-icon"></i>
                                        <p>Kepala Bagian</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                                        <i class="far fa-user nav-icon"></i>
                                        <p>Administrasi</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/layout/boxed.html" class="nav-link">
                                        <i class="far fa-user nav-icon"></i>
                                        <p>Keuangan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/layout/fixed-sidebar.html" class="nav-link">
                                        <i class="far fa-user nav-icon"></i>
                                        <p>lingkungan</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="pages/widgets.html" class="nav-link">
                                <i class="nav-icon fas fa-exchange-alt"></i>
                                <p>
                                    Transaksi

                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/widgets.html" class="nav-link">
                                <i class="nav-icon fas fa-file"></i>
                                <p>
                                    Laporan

                                </p>
                            </a>
                        </li>
                    </ul>

                </nav>

                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        <div class="content-wrapper" style="background: #ffffff;">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Dashboard</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard v1</li>
                            </ol>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <section class="content">
                <div class="container-fluid">
                    <?= $this->renderSection('content') ?>
                </div>
            </section>
        </div>
</div>

<<<<<<< HEAD
=======
    <!-- Bootstrap core JavaScript -->
    <!-- <script src="<//?= base_url() ?>/assets/js/jquery-3.5.1.min.js"></script> -->
    <script src="<?= base_url() ?>/assets/js/bootstrap.min.js"></script>
>>>>>>> 59d5dabee0a77d2473809065a35bc1a59d0acefe

             <!-- jQuery -->
            <script src="<?= base_url() ?>/plugins/jquery/jquery.min.js"></script>
            <!-- jQuery UI 1.11.4 -->
            <script src="<?= base_url() ?>/plugins/jquery-ui/jquery-ui.min.js"></script>
            <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
            <script>
                $.widget.bridge('uibutton', $.ui.button);
            </script>
            <!-- Bootstrap 4 -->
            <script src="<?= base_url() ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
            <!-- ChartJS -->
            <script src="<?= base_url() ?>/plugins/chart.js/Chart.min.js"></script>
            <!-- Sparkline -->
            <script src="<?= base_url() ?>/plugins/sparklines/sparkline.js"></script>
            <!-- JQVMap -->
            <script src="<?= base_url() ?>/plugins/jqvmap/jquery.vmap.min.js"></script>
            <script src="<?= base_url() ?>/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
            <!-- jQuery Knob Chart -->
            <script src="<?= base_url() ?>/plugins/jquery-knob/jquery.knob.min.js"></script>
            <!-- daterangepicker -->
            <script src="<?= base_url() ?>/plugins/moment/moment.min.js"></script>
            <script src="<?= base_url() ?>/plugins/daterangepicker/daterangepicker.js"></script>
            <!-- Tempusdominus Bootstrap 4 -->
            <script src="<?= base_url() ?>/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
            <!-- Summernote -->
            <script src="<?= base_url() ?>/plugins/summernote/summernote-bs4.min.js"></script>
            <!-- overlayScrollbars -->
            <script src="<?= base_url() ?>/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
            <!-- AdminLTE App -->
            <script src="<?= base_url() ?>/dist/js/adminlte.js"></script>
            <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
            <script src="<?= base_url() ?>/dist/js/pages/dashboard.js"></script>
            <!-- AdminLTE for demo purposes -->
            <script src="<?= base_url() ?>/dist/js/demo.js">
            </script>
    <!-- Menu Toggle Script -->
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>

</body>


</html>