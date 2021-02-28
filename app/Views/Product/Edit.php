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
            <form method="post" id="formUpdate" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="modal-body">
                    <div class="form-group">
                        <!-- Field id type : hidden, Field product name type :text -->
                        <input type="hidden" name="id" value="<?= $product['id'] ?>">
                        <label for="">Product Name</label>
                        <input type="text" name="productName" id="inputName" class="form-control" value="<?= $product['product_name'] ?>" required disabled>
                        <span class="text-danger small" id="errorName"></span>
                    </div>
                    <!-- Field Price type number -->
                    <div class="form-group">
                        <label for="">Price</label>
                        <div class="input-group mb-3">

                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp.</span>
                            </div>
                            <input type="number" name="productPrice" class="form-control" id="inputPrice" value="<?= $product['price'] ?>" required>
                            <div class="input-group-append">
                                <span class="input-group-text">,-</span>
                            </div>
                        </div>
                        <span class="text-danger small" id="errorPrice"></span>
                    </div>
                    <!-- Field Weight type number -->
                    <div class="form-group">
                        <label for="">Weight</label>
                        <div class="input-group mb-3">

                            <div class="input-group-prepend">
                                <span class="input-group-text">Gr.</span>
                            </div>
                            <input type="number" id="inputWeight" name="productWeight" class="form-control" value="<?= $product['weight'] ?>" required>
                            <div class="input-group-append">
                                <span class="input-group-text">,-</span>
                            </div>
                        </div>
                        <span class="text-danger small" id="errorWeight"></span>
                    </div>
                    <!-- Field Category Type Select -->
                    <div class="form-group">
                        <label for="">Category</label>
                        <select class="form-control" name="productCategory" id="inputCategory" required>
                            <option value="men">Men</option>
                            <option value="women">Women</option>
                            <option value="kid">Kid</option>
                        </select>
                        <span class="text-danger small" id="errorCategory"></span>
                    </div>
                    <!-- Field Tag type textarea (include tinyMCE) -->
                    <div class="form-group">
                        <label for="textbox">Tag</label>
                        <textarea class="form-control" name="productTag" id="inputTag" rows="2"><?= $product['tag'] ?></textarea>
                        <span class="text-danger small" id="errorTag"></span>
                    </div>
                    <!-- Field stock type number -->
                    <div class="form-group">
                        <label for="">Stock</label>
                        <input type="number" name="productStock" id="inputStock" class="form-control" value="<?= $product['stock'] ?>" required>
                        <span class="text-danger small" id="errorStock"></span>
                    </div>
                    <!-- Field description type textarea (include tinyMCE) -->
                    <div class="form-group">
                        <label for="textbox">Description</label>
                        <textarea class="form-control" id="inputDescription" name="productDescription" rows="3"><?= $product['description'] ?></textarea>
                        <span class="text-danger small" id="errorDescription"></span>
                    </div>
                    <!-- Field picture type file : image -->
                    <div class="form-group">
                        <label for="">Picture</label>
                        <img id="placeholder" src="<?= base_url('uploads/' . $product['image']) ?>" class="img-thumbnail" alt="your image" /></br></br>
                        <input type="file" class="form-control-file" accept="image/*" id="inputImage" name="productImage" onchange="readURL(this);">
                        <span class="text-danger small" id="errorImage"></span>
                    </div>
                    <!-- Field Seller type radio btn -->
                    <div class="form-group">
                        <label for="">Choose Seller :</label>
                        <div class="form-check">
                            <?php if ($product['seller'] == 'sumarecon store') : ?>
                                <label class="form-check-label mr-4">
                                    <input type="radio" class="form-check-input" name="productSeller" id="inputSellerTrue" value="sumarecon store" checked />
                                    Sumarecon </label>
                                <label class="form-check-label mr-4">
                                    <input type="radio" class="form-check-input" name="productSeller" id="inputSellerFalse" value="adamkis store" />
                                    AdamKis</label>
                            <?php else : ?>
                                <label class="form-check-label mr-4">
                                    <input type="radio" class="form-check-input" name="productSeller" id="inputSellerTrue" value="sumarecon store" />
                                    Sumarecon </label>
                                <label class="form-check-label mr-4">
                                    <input type="radio" class="form-check-input" name="productSeller" id="inputSellerFalse" value="adamkis store" checked />
                                    AdamKis</label>
                            <?php endif ?>
                        </div>
                        <span class="text-danger small" id="errorSeller"></span>
                    </div>

                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button class="btn btn-success" id="updateProduct">Update</button>
                    <button type="button" class="btn btn-danger close-modal" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- TinyMCE script use for adding plugin -->
<script>
    tinymce.init({
        selector: 'textarea',
        // plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
        toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
        toolbar_mode: 'floating',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
    });
</script>
<!-- submit validation check -->
<script>
    function readURL(input, id) {
        id = id || '#placeholder';
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $(id)
                    .attr('src', e.target.result)
                    .width(100)
                    .height(75)
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    $(document).ready(function() {
        $('#formUpdate').on('submit', function(e) {
            e.preventDefault();
            $('#updateProduct').html('Checking....');
            $('#updateProduct').prop('disabled');
            if ($('#inputImage').val() == '') {
                $.ajax({
                    type: "POST",
                    url: "<?= site_url('product/update') ?>",
                    dataType: "json",
                    data: new FormData(this),
                    success: function(response) {
                        result(response);
                    }
                })
            } else {
                $.ajax({
                    type: "POST",
                    url: "<?= site_url('product/update') ?>",
                    data: new FormData(this),
                    dataType: "json",
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(response) {
                        result(response);
                    }
                });
            }
        });
    });

    function result(response) {
        switch (response.result) {
            case 1:
                let close = confirm(response.message);
                if (close) {
                    window.location.href = '<?= site_url(' / product ') ?>';
                }
                break;
            case 2:
                $('#messageInfo').html(response.message);
                break;
            default:
                var inputError = response.data;
                console.log(response.data);
                if (response.message.errorName !== '') {
                    $('#errorName').html(response.message.errorName);
                }
                if (response.message.errorPrice !== '') {
                    $('#errorPrice').html(response.message.errorPrice);
                }
                if (response.message.errorWeight !== '') {
                    $('#errorWeight').html(response.message.errorWeight);
                }
                if (response.message.errorCategory !== '') {
                    $('#errorCategory').html(response.message.errorCategory);
                }
                if (response.message.errorTag !== '') {
                    $('#errorTag').html(response.message.errorTag);
                }
                if (response.message.errorStock !== '') {
                    $('#errorStock').html(response.message.errorStock);
                }
                if (response.message.errorDescription !== '') {
                    $('#errorDescription').html(response.message.errorDescription);
                }
                if (response.message.errorImage !== '') {
                    $('#errorImage').html(response.message.errorImage);
                }
                if (response.message.errorSeller !== '') {
                    $('#errorSeller').html(response.message.errorSeller);
                }
                $(document).ready(function() {
                    $('#inputName').val(response.data.product_name);
                    $('#inputPrice').val(response.data.price);
                    $('#inputWeight').val(response.data.weight);
                    $('#inputCategory').val(response.data.category);
                    $('#inputStock').val(response.data.stock);
                    if (response.data.seller == 'sumarecon store') {
                        $('#inputSellerTrue').prop('checked', true);
                    } else {
                        $('#inputSellerFalse').prop('checked', true);
                    }
                    tinymce.get("inputTag").setContent(response.data.tag);
                    tinymce.get("inputDescription").setContent(response.data.description);
                });
                break;
        }
        $('#updateProduct').html('Save');
        $('#updateProduct').prop('enabled');

        document.getElementById("formUpdate").reset();
    }
</script>
<!-- close button script -->
<script>
    $('.modal').on('click', '.close-modal', function() {
        window.location.href = '<?= site_url('/product'); ?>';
    });
</script>