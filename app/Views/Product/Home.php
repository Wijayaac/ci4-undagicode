<?= $this->extend('template/layout') ?>

<?= $this->section('content') ?>
<div class="text-center mt-5">
    <h3 class="text-center">Master Product</h3>
</div>

<div class="row m-lg-2">
    <div class="container-fluid p-md-3 shadow p-3 mb-5 bg-white rounded">
        <!-- Master menu area -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light nav-tabel" style="border-bottom: 0px solid #dee2e6; margin: 0; margin-left: 0 !important; ">
            <!-- Button action area-->
            <ul class="navbar-nav">
                <li class="nav-item master-data">
                    <a href="javascript:;" data="<?= site_url('product/add') ?>" class="btn btn-outline-primary btn-add"><i class="fas fa-folder-plus"></i> add</a>
                </li>
                <li class="nav-item ml-sm-2  ">
                    <a href="<?= site_url('Product/print') ?>" id="btn-export-file" class="btn btn-outline-success"><i class="fas fa-print"></i> print</a>
                </li>
                <li class="nav-item ml-sm-2 excel">
                    <a href="<?= site_url('product/export') ?>" id="btn-export-file" class="btn btn-outline-info"><i class="fas fa-download"></i> Excel</a>
                </li>
            </ul>
            <!-- End button menu area -->
        </nav>
        <!-- End Master menu area -->
        <!-- Start Content Table -->
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
                    <th scope="col">Seller</th>
                    <th scope="col">Picture</th>
                    <th scope="col">More...</th>
                </tr>
            </thead>
            <tbody class="master-data" id="master-data">
                <!-- Get data we pass from controller using forEach method -->
                <?php foreach ($products as $item) : ?>
                    <tr class="hidden">
                        <td> <?= $item['product_name'] ?></td>
                        <td> <?= $item['price'] ?></td>
                        <td> <?= $item['weight'] ?></td>
                        <td> <?= $item['category'] ?></td>
                        <td> <?= $item['tag'] ?></td>
                        <td> <?= $item['stock'] ?></td>
                        <td> <?= $item['description'] ?></td>
                        <td> <?= $item['seller'] ?></td>
                        <td> <img src="<?= base_url('uploads/' . $item['image']) ?>" class="img-fluid w-50" alt="" srcset=""></td>
                        <td>
                            <a id="btn-edit" href="javascript:;" data="<?= site_url('product/edit/' . $item['id']) ?>" class="btn btn-outline-warning btn-lg m-2"><i class="fas fa-magic fa-xs"></i></a>
                            <a id="btn-trash" href="javascript:;" data="<?= site_url('product/delete/' . $item['id']) ?>" class="btn btn-outline-danger btn-lg m-2"><i class="fas fa-trash fa-xs"></i></a>
                        </td>
                    </tr>
                <?php endforeach
                ?>
                <!-- End looping data -->
            </tbody>
        </table>
    </div>
</div>
<!-- Modal item default style  hidden -->
<div id="modal-item">

</div>

<script type="text/javascript">
    $(document).ready(function() {
        var oTable = $('#dataList').dataTable({
            "bPaginate": true,
            "bLengthChange": true,
            "bFilter": true,
            "bSort": true,
            "bInfo": true,
            "bAutoWidth": true
        });
        $('#dataList_filter input').unbind();
        $('#dataList_filter input').bind('keyup', function(e) {
            if (e.keyCode == 13) {
                oTable.fnFilter(this.value);
            }
        });
        $('#dataList_filter input').attr("placeholder", "Type : criteria and enter...  ");
    });
    // *Calling add method using jQuery ajax request
    // TODO : if success showing modal form add, else error vice versa
    $('.master-data').on('click', '.btn-add', function(e) {

        var addURL = $(this).attr('data');
        $.ajax({
            type: "post",
            url: addURL,
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
        var editURL = $(this).attr('data');
        $.ajax({
            type: "post",
            url: editURL,
            success: function(response) {
                $('#modal-item').html(response);
                $('#modalEdit').modal('show');
            },
            error: function() {
                alert('Modal Error');
            }
        });
    });
    $('.master-data').on('click', '#btn-trash', function() {
        var deleteURL = $(this).attr('data');
        $.ajax({
            type: "post",
            url: deleteURL,
            success: function(response) {
                $('#master-data').load(' #master-data > *');
            },
            error: function() {
                alert('Error Deleted');
            }
        });
    });
</script>
<?= $this->endSection() ?>