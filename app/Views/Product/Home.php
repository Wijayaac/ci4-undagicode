<?= $this->extend('template/layout') ?>

<?= $this->section('content') ?>
<div class="text-center mt-5">
    <h3 class="text-center">Master Product</h3>
</div>

<?php if (session()->getFlashdata('message') == true) : ?>
    <div class='alert alert-primary alert-dismissible show mt-1' role='alert'>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true' class="text-black">'&times;'</span>
            <span class='sr-only'>Close</span>
        </button>
        <strong>Info</strong> <?= session()->getFlashdata('message'); ?>
    </div>
<?php else : ?>

<?php endif; ?>
<div class="row m-lg-2">
    <div class="container-fluid p-md-3 shadow p-3 mb-5 bg-white rounded">
        <div class=" table-responsive table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl" style="overflow-y: hidden;">
            <!-- Master menu area -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light nav-tabel" style="border-bottom: 0px solid #dee2e6; margin: 0; margin-left: 0 !important; ">
                <!-- Button action area-->
                <ul class="navbar-nav">
                    <li class="nav-item master-data">
                        <a href="javascript:;" data="<?= site_url('product/add') ?>" class="btn btn-outline-primary btn-add"><i class="fas fa-folder-plus"></i> add</a>
                    </li>
                    <li class="nav-item ml-sm-2  ">
                        <a href="<?php echo base_url('Product/print') ?>" id="btn-export-file" class="btn btn-outline-success"><i class="fas fa-print"></i> print</a>
                    </li>
                    <li class="nav-item ml-sm-2 excel">
                        <a href="<?php echo base_url('product/export') ?>" id="btn-export-file" class="btn btn-outline-info"><i class="fas fa-download"></i> Excel</a>
                    </li>
                </ul>
                <!-- End button menu area -->
                <!-- Search Bar -->
                <ul class="navbar-nav ml-auto pr-4">
                    <li class="nav-item">
                        <form class="form-inline ml-3" action="<?= base_url('/product/search') ?>">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar rounded" name="search" type="search" placeholder="name eg : t-shirt" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary rounded" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </li>
                </ul>
                <!-- End Search Bar -->
            </nav>
            <!-- End Master menu area -->
            <!-- Start Content Table -->
            <div class="container-fluid" style="overflow-y: scroll;height: 450px;">
                <table class="table table-hover" id="dataList">
                    <thead class="bg-dark text-light">
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Price(Rp.)</th>
                            <th scope="col">Weight(Gr.)</th>
                            <th scope="col">Category</th>
                            <th scope="col">Tag</th>
                            <th scope="col">Stock(Pcs.)</th>
                            <th scope="col">Caption</th>
                            <th scope="col">Picture</th>
                            <th scope="col">Seller</th>
                            <th scope="col">More...</th>
                        </tr>
                    </thead>
                    <tbody class="master-data">
                        <!-- Get data we pass from controller using forEach method -->
                        <?php foreach ($products as $item) : ?>
                            <tr>
                                <td class="text-capitalize"> <?= $item['product_name'] ?></td>
                                <td class="text-capitalize"> <?= $item['price'] ?></td>
                                <td class="text-capitalize"> <?= $item['weight'] ?></td>
                                <td class="text-capitalize"> <?= $item['category'] ?></td>
                                <td class="text-capitalize"> <?= $item['tag'] ?></td>
                                <td class="text-capitalize"> <?= $item['stock'] ?></td>
                                <td class="text-capitalize"> <?= $item['description'] ?></td>
                                <td> <img src="<?= base_url('uploads/' . $item['image']) ?>" class="img-fluid w-50" alt="" srcset="">
                                </td>
                                <td class="text-capitalize"> <?= $item['seller'] ?></td>
                                <td>
                                    <a id="btn-edit" href="javascript:;" data="<?= site_url('product/edit/' . $item['id']) ?>" class="btn btn-outline-warning btn-lg m-2"><i class="fas fa-magic fa-xs"></i></a>
                                    <a id="btn-trash" href="<?= site_url('product/delete/' . $item['id']) ?>" data="" class="btn btn-outline-danger btn-lg m-2"><i class="fas fa-trash fa-xs"></i></a>
                                </td>
                            </tr>
                        <?php endforeach
                        ?>
                        <!-- End looping data -->
                    </tbody>
                </table>
            </div>
            <!-- Pager data we pass from Controller Product method index, use for navigating into another data page -->
            <?= $pager->links('bootstrap', 'bootstrap') ?>
        </div>
    </div>
</div>
<!-- Modal item default style  hidden -->
<div id="modal-item">

</div>

<script type="text/javascript">
    // *Calling add method using jQuery ajax request
    // TODO : if success showing modal form add, else error vice versa
    $('.master-data').on('click', '.btn-add', function(e) {

        var addUrl = $(this).attr('data');
        $.ajax({
            type: "post",
            url: addUrl,
            success: function(response) {
                $('#modal-item').html(response);
                $('#modalAdd').modal('show');
            },
            error: function() {
                alert('Modal Error');
            }
        });
    });
    //  * Calling edit method using jQuery ajax request
    // TODO : if success showing modal form edit , else error vice versa
    $('.master-data').on('click', '#btn-edit', function() {
        var editUrl = $(this).attr('data');
        $.ajax({
            type: "post",
            url: editUrl,
            success: function(response) {
                $('#modal-item').html(response);
                $('#modalEdit').modal('show');
            },
            error: function() {
                alert('Modal Error');
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#dataList').DataTable();
    });
</script>
<link rel="stylesheet" type="text/css" src="<?= base_url() ?>assets/css/jquery.dataTables.min.css">
<script src="<?= base_url() ?>assets/js/jquery.dataTables.min.js"></script>
<?= $this->endSection() ?>