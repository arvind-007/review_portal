<!--Include the JS & CSS-->
<link rel="stylesheet" href="<?php echo base_url('/richtexteditor/rte_theme_default.css'); ?>" />
<script type="module">
import Tags from "../js/select.tags.js";
Tags.init();
</script>
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
                    <h2>Write Your Article</h2>
                </div>
                <div class="col-sm-6 text-end">
                    <a href="<?php echo base_url('/article') ?>" class="btn btn-outline-dark"
                        id="btn-backtotable">Back</a>
                </div>
            </div>
        </div>
    </section>
    <section id="sec-add">
        <div class="container-fluid">
            <div class="row m-2 border-0 rounded">
                <div class="card border-0 p-3 h-100">
                    <div class="btn btn-primary w-25" id="insert-xml">insert xml file</div>
                    <form id="frm-add-article" method="post" class="needs-validation" novalidate>
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" name="title" class="form-control" id="title">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tags</label>
                            <select class="form-select" id="validationTagsClear" name="tags[]" multiple
                                data-allow-clear="true" data-show-all-suggestions="true">
                                <option value="" selected>tags</option>
                                <?php
for ($i = 0; $i < count($tags); $i++) {
    echo "<option value=" . $tags[$i]['tag'] . ">" . $tags[$i]['tag'] . "</option>";
}
?>
                            </select>
                            <div class="invalid-feedback">Please select a valid tag.</div>
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
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<script type="text/javascript" src="<?php echo base_url('/richtexteditor/rte.js'); ?>"></script>
<script type="text/javascript" src='<?php echo base_url('/richtexteditor/plugins/all_plugins.js'); ?> '></script>
<script>
editor1 = new RichTextEditor("#art-body");
</script>
<script src="<?php echo base_url() ?>/js/articles.js" type="module"></script>
<?php
echo view('dashboard/modals/attach_xml.php');
echo view('dashboard/footer/footer.php');
?>