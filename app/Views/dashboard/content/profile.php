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
                    <h2>Profile</h2>
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
                <div class="col-md-4 p-0">
                    <div class="card border-0  h-100">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="<?php echo $session->get('user_details')['photo']; ?>"
                                    onerror="load_default_img(this)" alt="Admin" class="circle" id="profile-photo">
                                <a class="h3 fa fa-camera cursor-pointer text-dark" id="change-photo"
                                    style="display:none"></a>
                                <div class=" mt-3">
                                    <h4 class="mb-3">
                                        <?php echo $session->get('user_details')['name']; ?>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 p-0" id="card-profile">
                    <div class="card border-0">
                        <div class="card-body">
                            <div class="row ">
                                <div class="col-sm-2">
                                    <h6 class="mb-0">First Name </h6>
                                </div>
                                <div class="col-10 text-secondary" id="fname">
                                    N/A
                                </div>
                            </div>
                            <div class="row my-3">
                                <div class="col-2">
                                    <h6 class="mb-0">Last Name</h6>
                                </div>
                                <div class="col-sm-10 text-secondary" id=lname>
                                    N/A
                                </div>
                            </div>
                            <div class="row my-3">
                                <div class="col-2">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-10 text-secondary" id="email">
                                    N/A
                                </div>
                            </div>
                            <div class="row my-3">
                                <div class="col-2">
                                    <h6 class="mb-0">DOB</h6>
                                </div>
                                <div class="col-sm-10 text-secondary " id="dob">
                                    N/A
                                </div>
                            </div>
                            <div class="row my-3">
                                <div class="col-2">
                                    <h6 class="mb-0">Gender</h6>
                                </div>
                                <div class="col-sm-10 text-secondary " id="gender">
                                    N/A
                                </div>
                            </div>
                            <div class="row my-3">
                                <div class="col-2">
                                    <h6 class="mb-0">Mobile</h6>
                                </div>
                                <div class="col-sm-10 text-secondary " id="mobile">
                                    N/A
                                </div>
                            </div>
                            <div class="row my-3">
                                <div class="col-2">
                                    <h6 class="mb-0">Address</h6>
                                </div>
                                <div class="col-sm-10 text-secondary " id="address">
                                    N/A
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-8 p-0" id="card-edit-profile" style="display:none">
                    <div class="card border-0">
                        <div class="card-body">
                            <form method="post" autocomplete="off" id="frm-update" enctype="multipart/form_data">
                                <div class="row my-3">
                                    <div class="col-2 m-auto">
                                        <h6 class="mb-0">First Name</h6>
                                    </div>
                                    <div class="col-10 text-secondary">
                                        <input type="text" name="fname" class="form-control" id="i-fname">
                                    </div>
                                </div>
                                <div class="row my-3">
                                    <div class="col-2 m-auto">
                                        <h6 class="mb-0">Last Name</h6>
                                    </div>
                                    <div class="col-sm-10 text-secondary">
                                        <input type="text" name="lname" class="form-control" id="i-lname">
                                    </div>
                                </div>
                                <div class="row my-3">
                                    <div class="col-2 m-auto">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-10 text-secondary">
                                        <input type="text" name="email" class="form-control" disabled id="i-email">
                                    </div>
                                </div>
                                <div class="row my-3">
                                    <div class="col-2 m-auto">
                                        <h6 class="mb-0">DOB</h6>
                                    </div>
                                    <div class="col-sm-10 text-secondary">
                                        <input name="dob" type="date" id="i-dob">
                                    </div>
                                </div>
                                <div class="row my-3">
                                    <div class="col-2 m-auto">
                                        <h6 class="mb-0">Gender</h6>
                                    </div>
                                    <div class="col-sm-10 text-secondary">
                                        <label class="radio-inline me-5"><input type="radio" name="gender"
                                                value="Male">Male</label>
                                        <label class="radio-inline me-5"><input type="radio" name="gender"
                                                value="Female">Female</label>
                                        <label class="radio-inline "> <input type="radio" name="gender"
                                                value="Other">Other</label>
                                    </div>
                                </div>
                                <div class="row my-3">
                                    <div class="col-2 m-auto">
                                        <h6 class="mb-0">Mobile</h6>
                                    </div>
                                    <div class="col-sm-10 text-secondary">
                                        <input type="number" name="mobile" class="form-control mobile" disabled
                                            id="i-mobile">
                                    </div>
                                </div>
                                <div class="row my-3">
                                    <div class="col-2 m-auto">
                                        <h6 class="mb-0">Address</h6>
                                    </div>
                                    <div class="col-sm-10 text-secondary">
                                        <textarea type="text" name="address" class="form-control"
                                            id="i-address"></textarea>
                                    </div>
                                </div>
                                <input type="file" name="profile" id="choose-photo" accept="image/*" class="d-none">
                                <button type="submit" class="btn btn-dark float-end">Save
                                    changes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
</div>
<script src="<?php echo base_url('js/profile.js') ?>"></script>
<?php
echo view('dashboard/modals/change_pass_modal');
echo view('dashboard/footer/footer.php');
?>