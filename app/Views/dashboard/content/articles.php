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
                    <a class="btn btn-outline-dark" id="btn-edit-profile">Add</a>
                </div>
            </div>
        </div>
    </section>
    <section class="px-2">
        <div class="container-fluid">

            <table class="table" id="table-articles">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Category</th>
                        <th scope="col">Created On</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 0; $i < count($articles); $i++) {
    echo "<tr>
    <th>" . ($i + 1) . "</th>
    <td>" . $articles[$i]['title'] . "</td>
    <td>" . $articles[$i]['category_id'] . "</td>
    <td>" . $articles[$i]['created_at'] . "</td>
    <td><a href='#' class='fas fa-edit me-1' id='btn-edit' uid='" . $articles[$i]['id'] . "'>
    <a href='#' class='fas fa-trash text-danger me-1' id='btn-dlt' uid='" . $articles[$i]['id'] . "'>
    <a href='#' class='fas fa-eye text-dark' id='btn-view' uid='" . $articles[$i]['id'] . "'></td>
    </tr>";
}?>
                </tbody>
            </table>
        </div>
    </section>
</div>
<script src="<?php echo base_url() ?>/js/articles.js"></script>
<?php
echo view('dashboard/footer/footer.php');
?>