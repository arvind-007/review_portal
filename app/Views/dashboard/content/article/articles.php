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
                    <h2 class="fw-light">Articles</h2>
                </div>
                <div class="col-sm-6 text-end">
                    <a href="<?php echo base_url('/article/addArticleView') ?>" class="btn btn-outline-dark"
                        id="btn-add-article">Add</a>
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
                    <nav class="nav justify-content-end">
                        <?=$pager->links();?>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <?php echo view('dashboard/content/article/edit_article') ?>
    <?php echo view('dashboard/content/article/view_article') ?>
</div>
<script src="<?php echo base_url('js/articles.js') ?>"></script>
<?php
echo view('dashboard/modals/delete_modal');
echo view('dashboard/footer/footer');
?>