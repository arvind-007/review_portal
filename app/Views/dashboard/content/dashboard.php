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
                    <h2 class="fw-lighter">Dashboard</h2>
                </div>
                <div class="col-sm-6 text-end">
                    <!--  -->
                </div>
            </div>
        </div>
    </section>
    <section style="display:block" id="sec-table">
        <div class="container-fluid">
            <div class=" m-2 rounded">
                <div class="card border-0   h-100">
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning  p-3">
                                <div class="inner position-relative ">
                                    <h3>44</h3>

                                    <p>User Registrations</p>
                                    <i class="fas fa-user fa-4x opacity-0 position-absolute end-0 top-0"></i>

                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger text-light p-3">
                                <div class="inner position-relative">
                                    <h3>65</h3>

                                    <p> Articles</p>
                                    <i class="fas fa-newspaper fa-4x opacity-0 position-absolute end-0 top-0"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->

        </div>
    </section>
</div>
<!-- <script src="<?php echo base_url() ?>"></script> -->
<?php
echo view('dashboard/modals/change_pass_modal');
echo view('dashboard/footer/footer.php');
?>