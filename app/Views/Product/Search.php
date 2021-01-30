<?= $this->extend('template/layout') ?>

<?= $this->section('content') ?>
<div class="row m-lg-2">
    <div class="container-fluid p-md-3" style="border-radius: 20px; box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.6);">
        <div class=" table-responsive table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl" style="overflow-y: hidden;">
            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light nav-tabel" style="border-bottom: 0px solid #dee2e6; margin: 0; margin-left: 0 !important; ">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item master-data">
                        <a href="javascript:;" data="<?= site_url('product/add') ?>" class="btn btn-primary btn-add"><i class="fas fa-folder-plus"></i> add</a>
                    </li>
                    <li class="nav-item ml-sm-2  ">
                        <a href="<?php echo base_url('Product/print') ?>" id="btn-export-file" class="btn btn-success"><i class="fas fa-print"></i> print</a>
                    </li>
                    <li class="nav-item ml-sm-2 excel">
                        <a href="<?php echo base_url('product/export') ?>" id="btn-export-file" class="btn btn-info"><i class="fas fa-download"></i> Excel</a>
                        <!-- <a href="javascript:;" id="btn-export-excel" class="btn btn-info"><i class="fas fa-download"></i> Excel</a> -->
                    </li>
                </ul>
                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto pr-4">
                    <li class="nav-item">
                        <form class="form-inline ml-3" action="<?= base_url('/product/search') ?>">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" name="search" type="search" placeholder="Search" aria-label="Search" style="border-radius: 10px 0 0 10px;">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit" style="border-radius: 0 10px 10px 0 ;">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </li>

                </ul>
            </nav>
            <!-- /.navbar -->
            <div class="container-fluid" id="table">
                <table class="table table-hover tabel">
                    <thead class="bg-info">
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
                        <?php foreach ($product as $item) : ?>
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
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div id="modal-item">

</div>
<script type="text/javascript">
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
<?= $this->endSection() ?>