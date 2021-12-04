<div class="modal fade" id="mdl-edit-category">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add row here</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="post" id="frm-edit-category">
                <div class="alert alert-danger" id="pass-err" style="display:none;"></div>
                <div class="modal-body mx-5">
                    <div class="my-2">
                        <input name="name" class="form-control" type="text" placeholder="Name of Category"
                            id="category-name">
                    </div>
                    <div class="my-2 text-center position-relative ">
                        <div>
                            <img src="<?php echo base_url('img/avatar2.jpg'); ?>" width="250px" id="category-img"
                                class="category circle" alt="no_image">
                            <input name='image' accept="image/*" type="file" id="choose-img" style="display:none">
                            <span class="category position-absolute"
                                style="top:30%; left:34%; display:none; cursor:pointer;" id="edit-icon">
                                <i class="fas fa-edit fa-3x" id="change-img"></i>
                                <div>
                                    <h3> Edit Image</h3>
                                </div>
                            </span>
                        </div>
                        <input type="hidden" name="uid" id="category-id">
                    </div>
                </div>
                <div class="modal-footer ">
                    <button class="btn btn-dark">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>