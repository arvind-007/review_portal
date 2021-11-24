<?php
echo view('dashboard/header/header_top');
echo view('dashboard/sidebar/sidebar');
?>
<div id="content" class="bg-light">
    <?php echo view("dashboard/header/header"); ?>
    <section class="content-header px-2 ">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h2>Articles</h2>
                </div>
                <div class="col-sm-6 text-end">
                    <a class="btn btn-outline-dark" id="btn-add-article">Add</a>
                    <a class="btn btn-outline-dark" id="btn-backtotable" style="display:none">back</a>
                </div>
            </div>
        </div>
    </section>
    <div class="alert alert-success" style="display:none" id="success-msg"></div>
    <section style="display:one" id="sec-table">
        <div class="container-fluid">
            <div class="row m-2 rounded">
                <div class="card border-0  h-100">
                    <table class="table" id="table-articles">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col" style="width:400px">Title</th>
                                <th scope="col">Category</th>
                                <th scope="col">Created On</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <section style="display:none" id="sec-edit">
        <div class="container-fluid">
            <div class="row m-2 border-0 rounded">
                <div class="card border-0 p-3 h-100">
                    <form id="frm-edit-article" method="post">
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" name="title" class="form-control" id="title">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tags</label>
                            <input type="text" name="tags" class="form-control" id="tags">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Category</label>
                            <select class="form-select" name='category' id="category">
                                <option value="" selected>select categories</option>
                                <?php
for ($i = 0; $i < count($categories); $i++) {
    echo "<option value=" . $categories[$i]['id'] . ">" . $categories[$i]['category'] . "</option>";
}
?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Body</label>
                            <textarea type="text" name="body" id="art-body" class="form-control" rows="10"></textarea>
                        </div>
                        <input type="hidden" name="id" id="uid">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<script src="<?php echo base_url() ?>/js/articles.js"></script>
<?php
echo view('dashboard/modals/delete_modal');
echo view('dashboard/footer/footer');
?>