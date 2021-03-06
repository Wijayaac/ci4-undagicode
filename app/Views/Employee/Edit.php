    <!-- The Modal -->
    <div class="modal" id="modalAdd">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h5 class="modal-title">Edit Empployee</h5>
                    <button type="button" class="close close-modal" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <!-- Form for input data into database pass into Controller Product methode save -->
                <form method="post" id="formUpdate" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <div class="modal-body">
                        <div class="form-group">
                            <!-- Field id : hidden , Field Employee Name -->
                            <input type="hiden" name="id" value="<?= $employee['id'] ?>">
                            <label for="employeeName">Employee Name</label>
                            <input type="text" name="employeeName" class="form-control" id="inputName" value="<?= $employee['employee_name'] ?>" required>
                            <span id="errorName" class="text-danger small"></span>
                        </div>
                        <!-- Field Address type textarea (include tinyMCE) -->
                        <div class="form-group">
                            <label for="textbox">Address</label>
                            <textarea class="form-control" name="employeeAddress" id="inputAddress" rows="2"><?= $employee['address'] ?></textarea>
                            <span id="errorAddress" class="text-danger small"></span>
                        </div>

                        <!-- Field Phone type number -->
                        <div class="form-group">
                            <label for="">Phone</label>
                            <div class="input-group mb-3">

                                <div class="input-group-prepend">
                                    <span class="input-group-text">+62</span>
                                </div>
                                <input type="number" name="employeePhone" class="form-control" id="employeePhone" value="<?= $employee['phone_phone'] ?>" required>
                                <div class="input-group-append">
                                    <span class="input-group-text"></span>
                                </div>
                                <span id="errorPhone" class="text-danger small"></span>
                            </div>
                        </div>
                        <!-- Field Email  Type Email -->
                        <div class="form-group">
                            <label for="inputEmail">Email address</label>
                            <input type="email" name="employeeEmail" class="form-control" id="inputEmail" placeholder="name@example.com" required value="<?= $employee['email_address'] ?>">
                            <span id="errorGender" class="text-danger small"></span>
                        </div>
                        <!-- Field Gender Type Select -->
                        <div class="form-group">
                            <label for="">Gender</label>
                            <select class="form-control" name="employeeGender" id="inputGender" required>
                                <option value="men">Men</option>
                                <option value="women">Women</option>
                            </select>
                            <span id="errorGender" class="text-danger small"></span>
                        </div>
                        <!-- Field CV type file : document -->
                        <div class="form-group">
                            <label for="">CV</label><br>
                            <input type="file" class="form-control-file" id="inputCv" name="employeeCv" required>
                            <span id="errorCv" class="text-danger small"></span>
                            <p id="messageInfo" class="text-result text-info"></p>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button id="updateEmployee" class="btn btn-success">Save</button>
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
            toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
            toolbar_mode: 'floating',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
        });
    </script>
    <!-- Submit validation check -->
    <script>
        $(document).ready(function() {
            $('#formAdd').on('submit', function(e) {
                e.preventDefault();
                $('#addEmployee').html('Checking...');
                $('#addEmployee').prop('disabled');
                $.ajax({
                    method: "POST",
                    url: "<?= site_url('employee/save') ?>",
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
                                    window.location.href = '<?= site_url('/employee') ?>';
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
                                if (response.message.errorWeight !== '') {
                                    $('#errorAddress').html(response.message.errorAddress);
                                }
                                if (response.message.errorPrice !== '') {
                                    $('#errorPhone').html(response.message.errorPhone);
                                }
                                if (response.message.errorCategory !== '') {
                                    $('#errorEmail').html(response.message.errorEmail);
                                }
                                if (response.message.errorTag !== '') {
                                    $('#errorGender').html(response.message.errorGender);
                                }
                                if (response.message.errorStock !== '') {
                                    $('#errorCV').html(response.message.errorCV);
                                }
                                $(document).ready(function() {
                                    $("#inputName").val(response.data.employee_name);
                                    tinymce.get("inputAddress").setContent(response.data.description);
                                    $("#inputPhone").val(response.data.phone_number);
                                    $("#inputEmail").val(response.data.email_address);
                                    $("#inputGender").val(response.data.gender);
                                });
                                break;
                        }
                        $('#addEmployee').html('Save');
                        $('#addEmployee').prop('enabled');
                    }
                });
            });
        });
    </script>
    <!-- close button script -->
    <script>
        $('.modal').on('click', '.close-modal', function() {
            window.location.href = '<?= site_url('/employee') ?>';
        });
    </script>