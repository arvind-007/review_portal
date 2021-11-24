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
                        <th scope="col">Created On</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
            </table>
        </div>
    </section>
</div>