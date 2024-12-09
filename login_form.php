<?php
    @include 'config.php';

    session_start();

    if(isset($_POST['submit'])){

        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = $_POST['password'];
        $cpass = $_POST['cpassword'];
        $user_type = $_POST['user_type'];

        $select = "SELECT * FROM user_form WHERE email = '$email' && password = '$password' ";

        $result = mysqli_query($conn, $select);

        if(mysqli_num_rows($result) > 0){
           
            $row = mysqli_fetch_array($result);
            
            if($row['user_type'] == 'admin'){
                $_SESSION['admin_name'] = $row['name'];
                header('location:admin_page.php');

            }elseif($row['user_type'] == 'user'){

                $_SESSION['user_name'] = $row['name'];
                header('location:user_page.php');
            }

        }else{
            $error[] = 'incorrect email or password!';
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

    <title>Login Form</title>

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/components/logins/login-10/assets/css/login-10.css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
         
    </head>

<body>

<!-- Login 10 - Bootstrap Brain Component -->
<section class="bg-light py-3 py-md-5 py-xl-8">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
        <div class="mb-5">
          <div class="text-center mb-4">
            <a href="index.html">
              <img src="images/file.png" alt="BusBookingSystem Logo" width="175" height="57">
            </a>
          </div>
          <h4 class="text-center mb-4">Smart University Bus Booking System</h4>
        </div>
        <div class="card border border-light-subtle rounded-4">
          <div class="card-body p-3 p-md-4 p-xl-5">
          <form class="user" action="" method="post">
                                    <?php
                                        if(isset($error)){
                                            foreach($error as $error){
                                                echo '<span class="error-msg">'.$error.'</span>';
                                            };
                                        }; 
                                    ?>
              <p class="text-center mb-4">Sign In</p>
              <div class="row gy-3 overflow-hidden">
                <div class="col-12">
                <div class="form-group">
                                        <input type="email" name="email" class="form-control form-control-user"
                                            id="exampleInputEmail" aria-describedby="emailHelp"
                                            required placeholder="Enter Email Address...">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control form-control-user"
                                            id="exampleInputPassword" required placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input type="checkbox" class="custom-control-input" id="customCheck">
                                            <label class="custom-control-label" for="customCheck">Remember
                                                Me</label>
                                        </div>
                                    </div>
                </div>
                <div class="col-12">
                  <div class="d-grid">
                    <button class="btn btn-primary btn-lg" type="submit" name="submit">Login</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-md-center mt-4">
          <a href="register_form.php" class="link-secondary text-decoration-none">Create New Account!</a>
        </div>
      </div>
    </div>
  </div>
</section>


</body>

</html>