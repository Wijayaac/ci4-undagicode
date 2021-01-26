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

        </div>
    </div>
</div>
</div>
<script>
    $('.modal').on('click', '.close-modal', function() {
        window.location.href = '<?= base_url('book/'); ?>';
    });
</script>