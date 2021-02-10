<?= $this->extend('template/layout') ?>
<?= $this->section('content') ?>
<div class="text-center mt-5">
    <h3 class="text-center">Welcome to Undagi Code Dashboard</h3>
</div>
<div class="row m-5 pt-5">
    <?php foreach ($menu as $item) : ?>
        <div class="col-sm-3">
            <div class="card bg-white rounded shadow">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-folder-open fa-4x text-warning "></i></h5>
                    <p class="card-text">Manage your data on <?= $item['menu_name'] ?></p>
                    <a href="<?= site_url($item['menu_link']) ?>" class="btn btn-outline-success text-capitalize"><?= $item['menu_name'] ?></a>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>

<?= $this->endSection() ?>