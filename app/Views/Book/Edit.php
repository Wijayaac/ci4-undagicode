
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
            <form action="<?= site_url(); ?>/book/save" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <?php foreach ($books as $book) : ?>
                        <div class="form-group">
                            <input type="hidden" name="id" value="<?= $book['id'] ?>" id="" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="">Book Name</label>
                            <input type="text" name="book_name" value="<?= $book['book_name'] ?>" id="" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="">Category</label>
                            <div class="input-group">
                                <select class="custom-select" id="inputGroupSelect04" value="<?= $book['id_category'] ?>">
                                    <option selected>Choose...</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Writer</label>
                            <input type="text" name="writer" id="" value="<?= $book['writer'] ?>" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="">publisher</label>
                            <input type="text" name="publisher" value="<?= $book['publisher'] ?>" id="" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="">year Created</label>
                            <input type="text" name="year_created" value="<?= $book['year_created'] ?>" id="" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                    <?php endforeach ?>
                   
                    
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
        window.location.href = '<?= base_url('book/'); ?>';
    });
</script>