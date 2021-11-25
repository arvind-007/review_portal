<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <style>
    .inputvalues input {
        border: 2px solid;
    }

    .error {
        color: red;
    }
    </style>
    <script>
    const BASE_URL = "<?php echo base_url(); ?>";
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>

<body class="bg-light">
    <section style="display: block;" id="sec-register">
        <div class="mask d-flex align-items-center h-100 ">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5 my4">
                        <div class="card bg-light text-dark shadow" style="border-radius: 15px;">
                            <div class="card-body p-5">
                                <h2 class="text-uppercase text-center mb-5">Create an account</h2>

                                <form method="post" autocomplete="off" id="frm-register">

                                    <div class="row">
                                        <div class="col form-outline mb-2 inputvalues">
                                            <label class="form-label">First name</label>
                                            <input name="fname" type="text" class="form-control" />
                                        </div>

                                        <div class="col form-outline mb-2 inputvalues">
                                            <label class="form-label">Last name</label>
                                            <input name="lname" type="text" class="form-control" />
                                        </div>
                                    </div>

                                    <div class="form-outline mb-2 inputvalues">
                                        <label class="form-label">Phone no.</label>
                                        <input name="mobile" type="number" class="form-control" />
                                    </div>

                                    <div class="form-outline mb-2 inputvalues">
                                        <label class="form-label">Your Email </label>
                                        <input name="email" type="text" class="form-control" />
                                    </div>

                                    <div class="form-outline mb-2 inputvalues">
                                        <label class=" form-label">Password</label>
                                        <input name="password" type="password" class="form-control" id="password" />
                                    </div>

                                    <div class="form-outline mb-3 inputvalues">
                                        <label class="form-label">Confirm password</label>
                                        <input name="cpassword" type="password" class="form-control" />
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn-lg btn-dark form-control">Register</button>
                                    </div>
                                    <p class="text-center text-dark mt-5 mb-0">Have already an account? <a
                                            href=<?php echo base_url(); ?> class="fw-bold"><u>Login here</u></a></p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <script src="../js/validation_functions.js"></script>
    <script src="../js/auth.js"></script>

</body>

</html>