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
                    <h2>Article</h2>
                </div>
                <div class="col-sm-6 text-end">
                    <a class="btn btn-outline-dark" id="btn-edit-profile">Edit Profile</a>
                    <a class="btn btn-outline-dark" href="" id="btn-back" style="display:none">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                    <a class="btn btn-outline-dark " target="__blank" id="btn-change-pass">Change Password</a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row m-2 border rounded">

                <div class="col-md-12 p-0">
                    <div class="card">
                        <div class="card-body">
                            <div class="alert alert-danger" id="login-err" style="display: none;"></div>
                            <form method="post" autocomplete="off" id="frm-article">
                                <div class="form-outline mb-2 inputvalues" style="text-align:left">
                                    <h6>Article Title:</h6>
                                    <input type="text" name="title" class="form-control" />
                                </div>

                                <div class="form-outline mb-2 inputvalues" style="text-align:left">
                                    <h6>Tags:</h6>
                                    <input type="text" name="tags" class="form-control" />
                                </div>

                                <div class="form-outline mb-3 inputvalues" style="text-align:left">
                                    <h6>Category:</h6>
                                    <select name="category" id="category">
                                        <option value="Choose category">Choose Category</option>
                                    </select>
                                </div>
                                <div class="custom-select form-outline form-white mb-4 inputvalues"
                                    style="text-align:left">
                                    <h6>Textarea:</h6>
                                    <textarea id="textbox" name="textbox" rows="4" cols="70"></textarea>
                                </div>
                                <button class="btn btn-dark btn-lg px-5 form-control" type="submit">Login</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>
</div>


<script src="<?php echo base_url() ?>/js/add_articles.js"></script>
<?php
echo view('dashboard/footer/footer.php');
?>