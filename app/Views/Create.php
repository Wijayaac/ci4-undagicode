<?= $this->extend('template/layout') ?>

<?= $this->section('content') ?>
<div class="wrapper">
    <div class="container">
        <div class="w-80 jumbotron-fluid mx-5 my-5">
            <form action="<?= base_url('product/save') ?>" method="post">
                <div class="form-group">
                    <input type="hidden" name="id" value="<?= rand() ?>" id="" class="form-control" placeholder="" aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <label for="">Text</label>
                    <input type="text" name="text" id="" class="form-control" placeholder="" aria-describedby="helpId">
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="checkbox" id="" value="Value 2" checked>Value Check
                    </label>
                </div>
                <div class="form-group">
                    <label for="">Date</label>
                    <input type="date" name="date" id="" class="form-control" placeholder="" aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" id="" class="form-control" placeholder="" aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <label for="">Image</label>
                    <input type="file" name="image" id="" class="form-control" placeholder="" aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <label for="textbox">Text Area</label>
                    <textarea class="form-control" name="textbox" id="textbox" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="">Price</label>
                    <input type="number" name="price" id="" class="form-control" placeholder="" aria-describedby="helpId">
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="radio" id="" value="Value1" checked>
                        Value 1
                    </label>
                </div>
                <div class="form-group">
                    <label for="">url</label>
                    <input type="url" name="url" id="" class="form-control" placeholder="" aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <label for="">password</label>
                    <input type="password" name="password" id="" class="form-control" placeholder="" aria-describedby="helpId">
                </div>
                <button type="submit" class="btn btn-outline-success">Input Data</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>