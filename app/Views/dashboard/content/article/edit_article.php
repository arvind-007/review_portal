<!--Include the JS & CSS-->
<link rel="stylesheet" href="<?php echo base_url('/richtexteditor/rte_theme_default.css'); ?>" />
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
                        <select class="selectpicker form-select" id="tags" name="tags[]" multiple
                            data-allow-clear="true" data-show-all-suggestions="true">
                            <option value="" selected>tags</option>
                            <?php
for ($i = 0; $i < count($tags); $i++) {
    echo "<option value=" . $tags[$i]['tag'] . ">" . $tags[$i]['tag'] . "</option>";
}
?>
                        </select>
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

<script type="text/javascript" src="<?php echo base_url('/richtexteditor/rte.js'); ?>"></script>
<script type="text/javascript" src='<?php echo base_url('/richtexteditor/plugins/all_plugins.js'); ?> '></script>
<script>
editor1 = new RichTextEditor("#art-body");
</script>