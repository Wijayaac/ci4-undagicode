<?= $this->extend('template/layout') ?>

<?= $this->section('content') ?>
<div class="wrapper">
    <div class="container mt-3 master-data">
        <a href="javascript:;" data="<?= site_url('product/add') ?>" class="btn btn-outline-primary btn-sm btn-add">Add <i class="fas fa-folder-plus fa-sm"></i></a>
        <a href="javascript:;" id="btn-export" onclick="createPDF()" class="btn btn-outline-info btn-sm">Print <i class="fas fa-print fa-sm "></i> </a>
    </div>
    <div class="container" id="table">
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
                    <tr class="master-data">
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
<div id="modal-item">

</div>
<script type="text/javascript">
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

    function createPDF() {
        var sTable = document.getElementById('table').innerHTML;

        var style = "<style>";
        style = style + "table {width: 50%;font: 17px Calibri;}";
        style = style + "table, th, td {border: solid 1px #DDD; border-collapse: collapse;";
        style = style + "padding: 2px 3px;text-align: center;}";
        style = style + "</style>";

        // CREATE A WINDOW OBJECT.
        var win = window.open('', '', 'height=700,width=700');

        win.document.write('\x3Chtml>\x3Chead>');
        win.document.write('\x3Ctitle>Profile\x3C/title>');
        win.document.write(style);
        win.document.write('\x3C/head>');
        win.document.write('\x3Cbody>');
        win.document.write(sTable);
        win.document.write('\x3C/body>\x3C/html>');

        win.document.close();

        window.print();
    }
</script>
<?= $this->endSection() ?>