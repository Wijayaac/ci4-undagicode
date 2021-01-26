<!-- The Modal -->
<div class="modal" id="modalEdit">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title">Edit Data</h5>
                <button type="button" class="close close-modal" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <form action="<?= site_url(); ?>/product/update/" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <?php foreach ($product->getResult() as $item) : ?>
                        <input type="hidden" name="id" value="<?= $item->id ?>">
                        <div class="form-group">
                            <label for="">Text</label>
                            <input type="text" name="text" id="" class="form-control" value="<?= $item->text ?>" placeholder="" aria-describedby="helpId">
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="checkbox" id="" value="<?= $item->checkbox ?>" checked>Value Check
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="">Date</label>
                            <input type="date" name="date" id="" class="form-control" placeholder="" value="<?= $item->date ?>" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="email" id="" class="form-control" placeholder="" value="<?= $item->email ?>" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="">Image</label>
                            <input type="file" name="image" id="" class="form-control" files="<?= $item->image ?>" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="textbox">Text Area</label>
                            <textarea class="form-control" name="textbox" id="textbox" rows="3"><?= $item->textbox ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Price</label>
                            <input type="number" name="price" id="" class="form-control" placeholder="" value="<?= $item->price ?>" aria-describedby="helpId">
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="radio" id="" value="<?= $item->radio ?>" checked>
                                Value 1
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="">url</label>
                            <input type="url" name="url" id="" class="form-control" placeholder="" value="<?= $item->url ?>" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="">password</label>
                            <input type="password" name="password" id="" class="form-control" placeholder="" value="<?= $item->password ?>" aria-describedby="helpId">
                        </div>
                    <?php endforeach ?>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <input type="submit" value="Save" class="btn btn-success">
                    <button type="button" class="btn btn-danger close-modal" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $('.modal').on('click', '.close-modal', function() {
        window.location.href = '<?= site_url('/'); ?>';
    });
</script>";