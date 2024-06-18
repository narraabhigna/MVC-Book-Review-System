<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register</title>

    <!-- Custom fonts for this template-->
    <link href="BKS/../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="BKS/../../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <?php if (isset($error)) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $error; ?>
                </div>
            <?php } ?>

                            <form action="" method="post" class="user">
                                <div class="form-group row">
                                        <label for="User_id" class="form-label"></label>
                                        <input type="text" class="form-control form-control-user" id="User_id"
                                            placeholder="User id" name="User_id" maxlength="50" required>
                                </div>
                                <div class="form-group row">
                                    <label for="Name" class="form-label"></label>
                                    <input type="text" class="form-control form-control-user" id="Name"
                                        placeholder="Name" name="Name" maxlength="100" required>
                            </div>
                            <div class="form-group row">
                                <label for="Email" class="form-label"></label>
                                <input type="email" class="form-control form-control-user" id="Email"
                                    placeholder="Email" name="Email" maxlength="200" required>
                        </div>
                        <div class="form-group row">
                            <label for="Password" class="form-label"></label>
                            <input type="password" class="form-control form-control-user" id="Password"
                                placeholder="Password" name="Password" maxlength="100" required>
                    </div>
                    <div>
                    <button type="submit" class="btn btn-primary text-center">Register Account</button>
                </div>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="login.php">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="BKS/../../vendor/jquery/jquery.min.js"></script>
    <script src="BKS/../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="BKS/../../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="BKS/../../js/sb-admin-2.min.js"></script>

</body>

</html>