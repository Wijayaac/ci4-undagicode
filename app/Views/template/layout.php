<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello World</title>
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/custom.css">

    <link rel="stylesheet" href="<?= base_url() ?>/assets/icon/css/all.css">
    <!-- jQuery bootstrap -->
    <script src="<?= base_url() ?>/assets/js/jquery-3.5.1.min.js"></script>
    <!-- end jQuery bootstrap -->
</head>

<body>

    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <div class="bg-dark" id="sidebar-wrapper">
            <div class="sidebar-heading text-light text-lg"><i class="fas fa-drafting-compass fa-lg ml-1  "></i> UndagiCode</div>
            <div class="text-light border-top border-bottom m-3 py-2">Version 0.1 <i class="fas fa-stopwatch"></i> </div>
            <div class="list-group list-group-flush bg-dark mt-5">
                <a href="#" class="list-group-item list-group-item-action bg-dark text-light">Products</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="nav bg-dark py-2">
                <button href="javascript:;" class="btn btn-dark" id="menu-toggle"><i class="fas fa-align-justify fa-lg text-light "></i> </button>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </nav>
            <!-- content section -->
            <div class="container-fluid">
                <?= $this->renderSection('content') ?>
            </div>
            <!-- end content section -->
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript -->
    <script src="<?= base_url() ?>/assets/js/jquery-3.5.1.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>

</body>


</html>