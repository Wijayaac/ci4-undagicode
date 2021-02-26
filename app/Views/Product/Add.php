    <!-- The Modal -->
    <div class="modal" id="modalAdd">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h5 class="modal-title">Add Product</h5>
                    <button type="button" class="close close-modal" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <!-- Form for input data into database pass into Controller Product methode save -->
                <form method="post" id="formAdd" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <div class="modal-body">
                        <div class="form-group">
                            <!-- Field id : hidden , Field Product Name -->
                            <input type="hidden" name="id" value="<?= rand() ?>">
                            <label for="productName">Product Name</label>
                            <input type="text" name="productName" class="form-control" id="inputName" required>
                            <span id="errorName" class="text-danger small"></span>
                        </div>
                        <!-- Field Price type number -->
                        <div class="form-group">
                            <label for="">Price</label>
                            <div class="input-group mb-3">

                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp.</span>
                                </div>
                                <input type="number" name="productPrice" class="form-control" id="inputPrice" required>
                                <div class="input-group-append">
                                    <span class="input-group-text">,-</span>
                                </div>
                                <span id="errorPrice" class="text-danger small"></span>
                            </div>
                        </div>
                        <!-- Field Weight type number -->
                        <div class="form-group">
                            <label for="">Weight</label>
                            <div class="input-group mb-3">

                                <div class="input-group-prepend">
                                    <span class="input-group-text">Gr.</span>
                                </div>
                                <input type="number" name="productWeight" id="inputWeight" class="form-control" required>
                                <div class="input-group-append">
                                    <span class="input-group-text">,-</span>
                                </div>
                                <span id="errorWeight" class="text-danger small"></span>
                            </div>
                        </div>
                        <!-- Field Category Type Select -->
                        <div class="form-group">
                            <label for="">Category</label>
                            <select class="form-control" name="productCategory" id="inputCategory" required>
                                <option value="men">Men</option>
                                <option value="women">Women</option>
                                <option value="kid">Kid</option>
                            </select>
                            <span id="errorCategory" class="text-danger small"></span>
                        </div>
                        <!-- Field Tag type textarea (include tinyMCE) -->
                        <div class="form-group">
                            <label for="textbox">Tag</label>
                            <textarea class="form-control" name="productTag" id="inputTag" rows="2"></textarea>
                            <span id="errorTag" class="text-danger small"></span>
                        </div>
                        <!-- Field stock type number -->
                        <div class="form-group">
                            <label for="">Stock</label>
                            <input type="number" name="productStock" id="inputStock" class="form-control" required>
                            <span id="errorStock" class="text-danger small"></span>
                        </div>
                        <!-- Field description type textarea (include tinyMCE) -->
                        <div class="form-group">
                            <label for="textbox">Description</label>
                            <textarea class="form-control" name="productDescription" id="inputDescription" rows="3"></textarea>
                            <span id="errorDescription" class="text-danger small"></span>
                        </div>
                        <!-- Field picture type file : image -->
                        <div class="form-group">
                            <label for="">Picture</label>
                            <img id="placeholder" src="<?= base_url('uploads/untitled.png') ?>" alt="your image" /></br></br>
                            <input type="file" class="form-control-file" accept="image/*" id="inputImage" name="productImage" onchange="readURL(this);">
                            <span id="errorImage" class="text-danger small"></span>
                        </div>
                        <!-- Field Seller type radio btn -->
                        <div class="form-group">
                            <label for="">Choose Seller :</label>
                            <div class="form-check">
                                <label class="form-check-label mr-4">
                                    <input type="radio" class="form-check-input" name="productSeller" id="inputSellerTrue" value="sumarecon store">
                                    Sumarecon </label>
                                <label class="form-check-label mr-4">
                                    <input type="radio" class="form-check-input" name="productSeller" id="inputSellerFalse" value="adamkis store">
                                    AdamKis</label>
                                <p id="errorSeller" class="text-danger small"></p>
                                <p id="messageInfo" class="text-result"></p>
                            </div>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button id="addProduct" class="btn btn-success">Save</button>
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
            plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
            toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
            toolbar_mode: 'floating',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
        });
    </script>
    <!-- Submit validation check -->
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
            $(document).ready(function() {
                $('#formAdd').on('submit', function(e) {
                    e.preventDefault();
                    $('#addProduct').html('Checking...');
                    $('#addProduct').prop('disabled');

                    if ($('#inputImage').val() == '') {
                        alert('please select one image');
                        $('#addProduct').html('Save');
                        $('#addProduct').prop('enabled');

                        document.getElementById("formAdd").reset();
                    } else {
                        $.ajax({
                            method: "POST",
                            url: "<?= site_url('product/validation') ?>",
                            data: new FormData(this),
                            dataType: "json",
                            contentType: false,
                            cache: false,
                            processData: false,
                            success: function(response) {
                                switch (response.result) {
                                    case 1:
                                        let close = confirm(response.message);
                                        if (close) {
                                            window.location.href = '<?= site_url('/product') ?>';
                                        }
                                        break;
                                    case 2:
                                        $('#messageInfo').html(response.message);
                                        break;
                                    default:
                                        var inputError = response.data;
                                        if (response.message.errorName !== '') {
                                            $("#errorName").html(response.message.errorName);
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
                                        console.log(response.data);
                                        $(document).ready(function() {
                                            $("#inputName").val(response.data.product_name);
                                            $("#inputPrice").val(response.data.price);
                                            $("#inputWeight").val(response.data.weight);
                                            $("#inputCategory").val(response.data.category);
                                            $("#inputStock").val(response.data.stock);
                                            if (response.data.seller == 'sumarecon store') {
                                                $('#inputSellerTrue').prop('checked', true);
                                            } else {
                                                $('#inputSellerFalse').prop('checked', true);

                                            }
                                            tinymce.get("inputDescription").setContent(response.data.description);
                                            tinymce.get("inputTag").setContent(response.data.tag)
                                        });
                                        break;
                                }
                                $('#addProduct').html('Save');
                                $('#addProduct').prop('enabled');

                                document.getElementById("formAdd").reset();
                            }
                        });
                    }
                });
            });
        }
    </script>
    <!-- close button script -->
    <script>
        $('.modal').on('click', '.close-modal', function() {
            window.location.href = '<?= site_url('/product') ?>';
        });
    </script>