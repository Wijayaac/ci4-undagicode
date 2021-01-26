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
                        <a href="javascript:;" data="<?= site_url('book/add') ?>" class="btn btn-primary btn-add"><i class="fas fa-folder-plus"></i> add</a>
                    </li>
                    <li class="nav-item ml-sm-2  ">
                        <a href="<?php echo base_url('book/print')?>" id="btn-export-file" class="btn btn-success"><i class="fas fa-print"></i> print</a>
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
                            <th scope="col">Book Name</th>
                            <th scope="col">Category</th>
                            <th scope="col">Writer</th>
                            <th scope="col">Publisher</th>
                            <th scope="col">Year_Created</th>
                            <th scope="col">action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($books as $book) : ?>
                            <tr class="master-data">
                                <td><?= $book['book_name'] ?></td>
                                <td><?= $book['id_category'] ?></td>
                                <td><?= $book['writer'] ?></td>
                                <td><?= $book['publisher'] ?></td>
                                <td><?= $book['year_created'] ?></td>
                                <td>
                                    <a id="btn-edit" href="javascript:;" data="<?= site_url('book/edit/' . $book['id']) ?>" class="btn btn-outline-warning btn-sm"><i class="fas fa-magic fa-xs"></i>Edit</a>
                                    <a id="btn-trash" href="<?= site_url('book/delete/' . $book['id']) ?>" data="" class="btn btn-outline-danger btn-sm"><i class="fas fa-trash fa-xs"></i>Hapus</a>
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