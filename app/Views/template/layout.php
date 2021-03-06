<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 3 | Dashboard</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/icons/css/all.min.css') ?>" />
    <!-- DataTales CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/datatables.min.css') ?>" />
    <!-- Bootstrap V.4.3.1 CDN -->
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <!-- Custom style css for simple sidebar -->
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <!-- TinyMCE textarea editor APIKey  -->
    <script src="https://cdn.tiny.cloud/1/bmq852wo3zyrki97cj1ke2rjji5q65rayhgfv3bfk75fjgyv/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <!-- jQuery Scripts -->
    <script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
    <!-- jQuery DataTables Scripts -->
    <script src="<?= base_url('assets/js/datatables.min.js') ?>"></script>

</head>

<body>
    <div class="d-flex" id="wrapper">
        <?php

        $db = \Config\Database::connect();
        $builder = $db->table('main_menu');

        $menu = $builder->get()->getResult();

        ?>
        <!-- Sidebar -->
        <div class="bg-dark border-right" id="sidebar-wrapper">
            <div class="sidebar-heading text-center text-white py-5"><i class="fab fa-ubuntu"></i> Undagi Code</div>
            <!-- Default dropright button -->
            <div class="btn-group dropright">
                <button type="button" class="btn btn-block rounded btn-dark mx-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dashboard <i class="fas fa-chevron-circle-right ml-3"></i>
                </button>
                <div class="dropdown-menu">
                    <!-- Dropdown menu links -->
                    <div class="list-group list-group-flush">
                        <!-- Get menu from @menu params ^^^ -->
                        <?php foreach ($menu as $item) : ?>
                            <a href="<?= site_url($item->menu_link) ?>" class="list-group-item list-group-item-action text-capitalize"><?= $item->menu_name ?></a>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <div id="page-content-wrapper">
            <!-- Begin Header -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <button class="btn btn-outline-primary ml-5" id="menu-toggle"><i class="fas fa-align-left fa-lg"></i></button>
            </nav>
            <!-- End Header Wrapper -->
            <!-- Begin Cointent Wrapper -->
            <div class="container-fluid">
                <?= $this->renderSection('content') ?>
            </div>
            <!-- End Content Wrapper -->
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript -->
    <script src="<?= base_url('assets/js/popper.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>

    <!-- Menu Toggle Script -->
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>

</body>


</html>