<?php 

    include('includes/server.php'); 
    session_start();
    
    //restricts user from going back to login page after logging in
    if(isset($_SESSION['userId'])){
        header('location: index.php');
        exit();
    }

    //verifies user email address to reset password
    if(isset($_GET['password-token'])){
        $passwordToken = $_GET['password-token'];
        resetPassword($passwordToken);
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login • GoBook</title>
    <link rel = "icon" href="images/icons8-ticket-100.png" type = "image"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
    <div class="log-in d-flex justify-content-center">
        <div class="floating-cont d-flex flex-row flex-wrap flex-row-reverse col-md-8 col-12  m-0 p-0 ">
            <div class="div2 col-xl-8 col-md-8 col-sm-12 col-xs-12 overflow-auto ">
                <form action = "log-in.php" method = "post" class=" p-5 ">
                    <div class="container p-xl-8">
                        
                        <!-- CHANGES -->
                                <a href="index.php" class="mx-auto d-flex flex-column justify-content-center col-lg-8 col-12 mx-auto p-0" >
                                    <img src="images/gobook_logo-02.png" alt="GOBOOK" class="mx-auto col-8" > 
                                </a>
                                <h2 class=" mb-1 text-center">Log into your account! </h2>
                        <!-- CHANGES -->
        
                    
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
                            <a  href="forgot-password.php"> Forgot password?</a>
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
    </div>


    
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
