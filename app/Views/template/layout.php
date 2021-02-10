<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 3 | Dashboard</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <!-- Bootstrap V.4.3.1 CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Custom style css for simple sidebar -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/style.css">
    <!-- TinyMCE textarea editor APIKey  -->
    <script src="https://cdn.tiny.cloud/1/bmq852wo3zyrki97cj1ke2rjji5q65rayhgfv3bfk75fjgyv/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <!-- jQuery Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha512-+NqPlbbtM1QqiK8ZAo4Yrj2c4lNQoGv8P79DPtKzj++l5jnN39rHA/xsqn8zE9l0uSoxaCdrOgFs6yjyfbBxSg==" crossorigin="anonymous"></script>

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
                <button class="btn btn-outline-primary ml-5" id="menu-toggle"><i class="fas fa-align-left fa-lg  "></i></button>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!-- Menu Toggle Script -->
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>

</body>


</html>