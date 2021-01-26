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
                </ul>
                <!-- SEARCH FORM -->
                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto pr-4">
                    <li class="nav-item">
                        <form class="form-inline ml-3">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search" style="border-radius: 10px 0 0 10px;">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit" style="border-radius: 0 10px 10px 0 ;">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </li>
                    <li class="nav-item">

                    </li>
                    <li class="nav-item">

                    </li>

                </ul>
            </nav>
            <!-- /.navbar -->
            <div class="container-fluid" id="table">
                <table class="table table-hover tabel">
                    <thead class="bg-info">
                        <tr>
                            <th scope="col">text</th>
                            <th scope="col">checkbox</th>
                            <th scope="col">date</th>
                            <th scope="col">email</th>
                            <th scope="col">image</th>
                            <th scope="col">textbox</th>
                            <th scope="col">price</th>
                            <th scope="col">password</th>
                            <th scope="col">radio</th>
                            <th scope="col">url</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody class="master-data">
                        <?php foreach ($products->getResult() as $item) : ?>
                            <tr>
                                <td><?= $item->text ?></td>
                                <td><?= $item->checkbox ?></td>
                                <td><?= $item->date ?></td>
                                <td><?= $item->email ?></td>
                                <td><?= $item->image ?></td>
                                <td><?= $item->textbox ?></td>
                                <td><?= $item->price ?></td>
                                <td><?= $item->password ?></td>
                                <td><?= $item->radio ?></td>
                                <td><?= $item->url ?></td>
                                <td>
                                    <a id="btn-edit" href="javascript:;" data="<?= site_url('product/edit/' . $item->id) ?>" class="btn btn-outline-warning btn-sm"><i class="fas fa-magic fa-xs"></i>Edit</a>
                                    <a id="btn-trash" href="<?= site_url('product/delete/' . $item->id) ?>" data="" class="btn btn-outline-danger btn-sm"><i class="fas fa-trash fa-xs"></i>Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                    </a>
                </li>
            </ul>
        </nav>
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