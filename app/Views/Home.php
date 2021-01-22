<?= $this->extend('template/layout') ?>

<?= $this->section('content') ?>
<div class="wrapper">
    <div class="container mt-3 master-data">
        <a href="javascript:;" data="<?= site_url('product/add') ?>" class="btn btn-outline-primary btn-sm btn-add">Add <i class="fas fa-folder-plus fa-sm"></i></a>
    </div>
    <table class="table table-bordered table-inverse table-responsive">
        <thead class="thead-inverse">
            <tr>
                <th>text</th>
                <th>checkbox</th>
                <th>date</th>
                <th>email</th>
                <th>image</th>
                <th>textbox</th>
                <th>price</th>
                <th>password</th>
                <th>radio</th>
                <th>url</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($product->getResult() as $item) : ?>
                <tr id="master-data">
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
                        <a id="btn-edit" href="javascript:;" data="<?= site_url('product/edit/' . $item->id) ?>" class="btn btn-outline-warning btn-sm"><i class="fas fa-magic fa-xs"></i> </a>
                        <a id="btn-delete" href="javascript:;" data="<?= site_url('product/delete/' . $item->id) ?>" class="btn btn-outline-danger btn-sm"><i class="fas fa-trash fa-xs"></i></a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
<div id="modal-item">

</div>
<script>
    $('.master-data').on('click', '.btn-add', function() {
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
    $('#master-data').on('click', '#btn-edit', function() {
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
    $('#master-data').on('click', '#btn-delete', function() {
        var addUrl = $(this).attr('data');
        $.ajax({
            type: "post",
            url: addUrl,
            success: function(response) {},
            error: function(response) {
                alert(response);
            }
        });

    });
</script>
<?= $this->endSection() ?>