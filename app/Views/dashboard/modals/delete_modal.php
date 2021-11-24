<div class="modal fade" id="mdl-delete">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Are you sure?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="post" id="frm-delete" onsubmit="return false">
                <div class="modal-body mx-5">

                    <div class="inputvalues">
                        <input name="id" type="hidden" id="delete-id">
                        <h5>Are you sure, you want to delete it?</h5>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-dark" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>