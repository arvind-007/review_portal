<!--Include the JS & CSS-->
<link rel="stylesheet" href="<?php echo base_url('/richtexteditor/rte_theme_default.css'); ?>" />
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
                    <a class="btn btn-outline-dark" id="btn-backtotable" style="display:none">Back</a>
                </div>
            </div>
        </div>
    </section>
    <div class="alert alert-success" style="display:none" id="success-msg"></div>
    <section style="display:block" id="sec-table">
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
    <section style="display:none" id="sec-view">
        <div class="container-fluid">
            <div class="row m-2 rounded">
                <div class="card border-0  h-100">

                    <div class="row my-1">
                        <div class="col-sm-2">
                            <h6 class="mb-0">Title</h6>
                        </div>
                        <div class="col-sm-10 text-secondary" id="view-title">
                            N/A
                        </div>
                    </div>
                    <div class="row my-1">
                        <div class="col-sm-2">
                            <h6 class="mb-0">Tags</h6>
                        </div>
                        <div class="col-sm-10 text-secondary" id='view-tags'>
                            N/A
                        </div>
                    </div>
                    <div class="row my-1">
                        <div class="col-sm-2">
                            <h6 class="mb-0">Category</h6>
                        </div>
                        <div class="col-sm-10 text-secondary" id='view-category'>
                            N/A
                        </div>
                    </div>
                    <div class="row my-1">
                        <div class="col-sm-2">
                            <h6 class="mb-0">Body</h6>
                        </div>
                        <div class="col-sm-10 text-secondary" id='view-body'>
                            N/A
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>
<script src="<?php echo base_url('js/articles.js') ?>"></script>
<?php
echo view('dashboard/modals/delete_modal');
echo view('dashboard/footer/footer');
?>
<script type="text/javascript" src="<?php echo base_url('/richtexteditor/rte.js'); ?>">
</script>
<script type="text/javascript" src='<?php echo base_url('/richtexteditor/plugins/all_plugins.js');?> '></script>


<script>
editor1 = new RichTextEditor("#art-body");
</script>