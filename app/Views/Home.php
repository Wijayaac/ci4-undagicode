<?= $this->extend('template/layout') ?>

<?= $this->section('content') ?>
<div class="wrapper">
    <a href="<?= site_url('product/add') ?>" class="btn btn-outline-primary btn-sm">Add <i class="fas fa-folder-plus fa-sm"></i></a>
    <table class="table table-bordered table-inverse table-responsive">
        <thead class="thead-inverse">
            <tr>
                <th>id</th>
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
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php foreach ($product->getResult() as $item) : ?>
                    <td><?= $item->id ?></td>
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
                <?php endforeach ?>
            </tr>
            <tr>
                <td scope="row"></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>