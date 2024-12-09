<?php
    @include 'config.php';

    if(isset($_POST['submit'])){

        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        // Removed md5() to store plain text password
        $password = $_POST['password'];
        $cpass = $_POST['cpassword'];
        $user_type = $_POST['user_type'];

        $select = "SELECT * FROM user_form WHERE email = '$email' && password = '$password' ";

        $result = mysqli_query($conn, $select);

        if(mysqli_num_rows($result) > 0){
            
            $error[] = 'user already exists!';

        }else{

            if($password != $cpass){
                $error[] = 'passwords do not match!'; 
            }else{
                // Store plain text password
                $insert = "INSERT INTO user_form(name,email,password,user_type) VALUES ('$name','$email','$password','$user_type')";
                mysqli_query($conn, $insert);
                header('location:login_form.php');
            }
        }
    };
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Register Form</title>

        <!-- Custom fonts for this template-->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="css/sb-admin-2.min.css" rel="stylesheet">

    </head>

    <body>

    <section class="h-100 h-custom" style="background-color: #8fc4b7;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-8 col-xl-6">
            <div class="card rounded-3">   
            <div class="card-body p-4 p-md-5">
            <div class="text-center mb-4">
            <img src="images/file.png" alt="BusBookingSystem Logo" width="175" height="57">
                <h3 class="text-center mb-4">Create an Account!</h3>
                <hr>
                <form class="user" action="" method="post">
                    <?php
                        if(isset($error)){
                            foreach($error as $error){
                            echo '<span class="error-msg">'.$error.'</span>';
                            };
                        }; 
                    ?>

                <div class="form-group">
                        <input type="text" name="name" class="form-control form-control-user" id="exampleFirstName"
                            required placeholder="Enter Your Name">
                </div>

                <div class="form-group">
                    <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail"
                        required placeholder="Email Address">
                </div>

                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="password" name="password" class="form-control form-control-user"
                            id="exampleInputPassword" required placeholder="Password">
                    </div>

                    <div class="col-sm-6">
                        <input type="password" name="cpassword" class="form-control form-control-user"
                            id="exampleRepeatPassword" required placeholder="Confirm Password">
                    </div>
                </div>

                <div class="form-group row">
                <h6 class="col-sm-6 mb-3 mb-sm-0">User Type: </h6>

                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="user_type" id="admin"
                      value="admin" checked />
                    <label class="form-check-label" for="femaleGender">Admin</label>
                  </div>

                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="user_type" id="user"
                      value="user" />
                    <label class="form-check-label" for="maleGender">User</label>
                  </div>
                    </div>
                
                <input type="submit" name="submit" value="Register Account" class="btn btn-primary btn-user btn-block">
                
                <hr>
                <div class="text-center">
                    <a class="small" href="login_form.php">Already have an account? Login!</a>
                </div>

                </form>
            </div>
            </div>
        </div>
        </div>
                    </div>
    </div>
    </section>


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    </body>
</html>