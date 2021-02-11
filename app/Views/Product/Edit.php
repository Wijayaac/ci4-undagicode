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
            <!-- Form for update data on database, pass data to Controller Product method update -->
            <form action="<?= site_url(); ?>product/update" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <!-- Field id type : hidden, Field product name type :text -->
                        <input type="hidden" name="id" value="<?= $product['id'] ?>">
                        <label for="">Product Name</label>
                        <input type="text" name="productName" class="form-control" value="<?= $product['product_name'] ?>" required>
                    </div>
                    <!-- Field Price type number -->
                    <div class="form-group">
                        <label for="">Price</label>
                        <div class="input-group mb-3">

                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp.</span>
                            </div>
                            <input type="number" name="productPrice" class="form-control" value="<?= $product['price'] ?>" required>
                            <div class="input-group-append">
                                <span class="input-group-text">,-</span>
                            </div>
                        </div>
                    </div>
                    <!-- Field Weight type number -->
                    <div class="form-group">
                        <label for="">Weight</label>
                        <div class="input-group mb-3">

                            <div class="input-group-prepend">
                                <span class="input-group-text">Gr.</span>
                            </div>
                            <input type="number" name="productWeight" class="form-control" value="<?= $product['weight'] ?>" required>
                            <div class="input-group-append">
                                <span class="input-group-text">,-</span>
                            </div>
                        </div>
                    </div>
                    <!-- Field Category Type Select -->
                    <div class="form-group">
                        <label for="">Category</label>
                        <select class="form-control" name="productCategory" id="" required>
                            <option value="men">Men</option>
                            <option value="women">Women</option>
                            <option value="kid">Kid</option>
                        </select>
                    </div>
                    <!-- Field Tag type textarea (include tinyMCE) -->
                    <div class="form-group">
                        <label for="textbox">Tag</label>
                        <textarea class="form-control" name="productTag" id="textbox" rows="2"><?= $product['tag'] ?></textarea>
                    </div>
                    <!-- Field stock type number -->
                    <div class="form-group">
                        <label for="">Stock</label>
                        <input type="number" name="productStock" class="form-control" value="<?= $product['stock'] ?>" required>
                    </div>
                    <!-- Field description type textarea (include tinyMCE) -->
                    <div class="form-group">
                        <label for="textbox">Description</label>
                        <textarea class="form-control" name="productDescription" rows="3"><?= $product['description'] ?></textarea>
                    </div>
                    <!-- Field picture type file : image -->
                    <div class="form-group">
                        <label for="">Picture</label>
                        <input type="file" class="form-control-file" name="productImage">
                    </div>
                    <!-- Field Seller type radio btn -->
                    <div class="form-group">
                        <label for="">Choose Seller :</label>
                        <div class="form-check">
                            <label class="form-check-label mr-4">
                                <input type="radio" class="form-check-input" name="productSeller" id="" value="sumarecon store">
                                Sumarecon </label>
                            <label class="form-check-label mr-4">
                                <input type="radio" class="form-check-input" name="productSeller" id="" value="adamkis store">
                                AdamKis</label>
                        </div>
                    </div>

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
<!-- close button script -->
<script>
    $('.modal').on('click', '.close-modal', function() {
        window.location.href = '<?= site_url('/product'); ?>';
    });
</script>
<!-- TinyMCE script use for adding plugin -->
<script>
    tinymce.init({
        selector: 'textarea',
        plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
        toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
        toolbar_mode: 'floating',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
    });
</script>