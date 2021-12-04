<div class="modal fade" id="mdl-add-category">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add row here</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="post" id="frm-add-category">
                <div class="alert alert-danger" id="pass-err" style="display:none;"></div>
                <div class="modal-body mx-5">
                    <div class="my-2">
                        <input name="name" class="form-control" type="text" placeholder="Name of Category">
                    </div>
                    <div class="my-2">
                        <input class="form-control" name='image' accept="image/*" type="file">
                    </div>
                </div>
                <div class="modal-footer ">
                    <button class="btn btn-dark">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>