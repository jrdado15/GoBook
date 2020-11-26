<?php 

    include('includes/validation-login.php'); 
    session_start();
    
    //restricts user from going back to login page after logging in
    if(isset($_SESSION['userId'])){
        header('location: index.php');
        exit();
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login • GoBook</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    
</head>
<body>

    <div class="log-in d-flex justify-content-center" >
    <div class="floating-cont d-flex flex-row flex-wrap flex-row-reverse  m-0 p-0 ">
        <div class="div2 col-xl-8 col-md-8 col-sm-12 col-xs-12 overflow-auto ">
            <form action = "log-in.php" method = "post" class=" p-5 ">
                <div class="container p-xl-8">
                    <div class="back row mt-3">
                        <i class="fa fa-arrow-left fa-1x"></i>
                        <a href="index.php"> Go back to homepage</a>
                    </div>
                    <h1 class=" my-1">LOGIN</h1>
                  
                    <div class="form-group ">
                        <label>Account:</label>
                        <input name = "username" class="form-control" type="text" placeholder="Enter email or username" value = "<?php echo $username; ?>">
                        <?php if (count($uerrors) > 0) : ?>
                            <div >
                                <?php foreach($uerrors as $error): ?>
                                    <small class = "text-danger"><?php echo $error; ?> </small>
                                <?php endforeach?> 
                            </div>
                        <?php endif ?>
                    </div>

                
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password:</label>
                        <input name = "password_1" type ="password" class="form-control" id="exampleInputPassword1" placeholder="Enter password">
                        <?php if (count($perrors) > 0) : ?>
                            <div >
                                <?php foreach($perrors as $error): ?>
                                    <small class = "text-danger"><?php echo $error; ?> </small>
                                <?php endforeach?> 
                            </div>
                        <?php endif ?>
                    </div>
                   
                    <div class="forgot row justify-content-center mt-1 pt-3">
                        <a data-toggle="modal" data-target=".demo-popup" href="#"> Forgot password?</a>
                    </div>
                    <div class="sign row justify-content-center mt-1">
                        <a  href="sign-up.php"> Not on GOBOOK yet? Sign up</a>
                    </div>
                 

                    <button name = "login" type="submit" class="col-12 mt-3 btn btn-primary">Login</button>
                </div>
            
            </form>
        </div>
        <div class="div1 col-xl-4 col-md-4 col-sm-12 col-xs-12">
        </div>
        
    </div>
    </div>
    
    <!--
    NOTES
    BY: RHEMA MIRANDA
    SCOPE: MODAL/ FORGOT PASSWORD
-->
<div class="modal demo-popup " tabindex="-1"  role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered ">
        <div class="modal-content  d-flex justify-content-center div4 p-2">
           
            <div class="d-flex justify-content-end col-12 mt-2">
                <i class="fa fa-close pr-3" data-dismiss="modal" aria-hidden="true"></i>
            </div>
            <div class="top d-flex flex-column justify-content-center col-lg-8 col-12 mx-auto p-0">
                <h1 class="mb-0 mt-2 p-0">FORGOT PASSWORD?</h1>
            </div>
            <p class="m-auto col-lg-10 col-12">Please enter the email you used to sign up and we'll send you a link to reset it.</p>
            <form class="mx-auto mt-2 col-lg-10 col-12">
                <label>Your Email</label>
                <input type="text" class="form-control field mt-1" value="username123@gmail.com">
                <b>You've entered an invalid email</b>
            </form>

                <div class="mx-auto mt-3 mb-3 col-lg-10 col-12">
                    <button data-dismiss="modal" data-toggle="modal" data-target=".demo-popup2" class="btn btn-default m-0 col-12">SEND RECOVERY EMAIL</button>
                </div>
            
                <p class="m-auto col-lg-10 col-12">Just remembered?</p>
                <a class="mb-4" href="#">LOG IN</a>

        </div>
    </div>
</div>   

<!--
    NOTES
    BY: RHEMA MIRANDA
    SCOPE: MODAL/ FORGOT PASSWORD > MESSAGE SENT
-->
<div class="modal fade demo-popup2 " tabindex="-1" role="dialog" data-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered ">
        <div class="modal-content  d-flex justify-content-center div4 p-2">
           
  
            <div class="top d-flex flex-column justify-content-center col-lg-8 col-12 mx-auto p-0">

                <h1 class="mb-0 mt-2 p-0">EMAIL SENT</h1>

            </div>
            <p class="m-auto col-lg-10 col-12">A reset password link was sent to your rescue email:</p>
            <p class="m-auto col-lg-10 col-12" id="notice">newemail.user12345@gmail.com</p> 
                <div class="mx-auto mt-3 mb-3 col-lg-10 col-12">
                    <button class="btn btn-default m-0 col-12">GO BACK TO HOME PAGE</button>
                </div>

        </div>
    </div>
</div>   
<!-- END -->
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/js/bootstrap-datepicker.min.js"></script>
    <script> 
       $('.input-group.date').datepicker({format: "dd.mm.yyyy"}); 
    </script>
</body>
</html>
