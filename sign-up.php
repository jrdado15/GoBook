<?php include('includes/server.php'); 
    session_start();

    //
    include 'includes/verify_otp.php';
    
    //verifies user email address
    if(isset($_GET['token'])){
        $token = $_GET['token'];
        verifyUser($token);
    }
    //redirects user to homepage if email is verified
    if(isset($_SESSION['userId'])){
        if($_SESSION['verified'] == 1){
            header('location: index.php');
            exit();
        }
    }
    //restricts user to go back to sign up page after signing up
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
    <title>Signup • GoBook</title>
     <link rel = "icon" href="images/icons8-ticket-100.png" type = "image"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <link  rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/css/bootstrap-datepicker.min.css"/>
</head>
<body>

    <div class="sign-up d-flex justify-content-center" >
    <!-- CHANGES -->
    <div class="floating-cont d-flex flex-row flex-wrap flex-row-reverse col-lg-8 col-sm-10 col-12 m-0 p-0 ">
         <!-- CHANGES -->
        <div class="div2 col-md-8 col-xs-12 overflow-auto ">
            <form action = "sign-up.php" method = "post" class=" p-5 ">
               <!-- CHANGES -->
                <div class="container px-md-2 p-1">
                <!-- CHANGES -->
                    <a href="index.php" class="mx-auto d-flex flex-column justify-content-center col-md-8 col-8 mx-auto mt-0 p-0" >
                        <img src="images/gobook_logo-02.png" alt="GOBOOK" class="mx-auto col-8" > 
                    </a>
                    <p class="mt-0 mb-3 text-center">Register your account</p>
                <!-- CHANGES -->
                    
                    <div class="form-group">
                        <label>Email:</label>
                        <input name = "email" class="form-control" type="email" placeholder="Enter email" value = "<?php echo $email; ?>">
                        <?php if (count($eerrors) > 0) : ?>
                            <div >
                                <?php foreach($eerrors as $error): ?>
                                    <small style = "font-size:12px;" class = "text-danger"><?php echo $error; ?> </small>
                                <?php endforeach?> 
                            </div>
                        <?php endif ?>
                    </div>
                    <div class="form-group ">
                        <label>Username:</label>
                        <input name = "username" class="form-control" type="text" placeholder="Enter username" value = "<?php echo $username; ?>" >
                        <?php if (count($uerrors) > 0) : ?>
                            <div >
                                <?php foreach($uerrors as $error): ?>
                                    <small style = "font-size:12px;" class = "text-danger"><?php echo $error; ?> </small>
                                <?php endforeach?> 
                            </div>
                        <?php endif ?>
                    </div>

                    <div class="form-group p-0 m-0">
                        <label>Birthdate:</label>
                        <input name = "dob" type="date" id = "dt" class="form-control" placeholder="DD/MM/YY" value = "<?php echo $dob; ?>">
                        <?php if (count($derrors) > 0) : ?>
                            <div >
                                <?php foreach($derrors as $error): ?>
                                        <small style = "font-size:12px;" class = "text-danger"><?php echo $error; ?> </small>
                                <?php endforeach?> 
                            </div>
                      <?php endif ?>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Password:</label>
                        <input name = "password_1" type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter password" >
                        <?php if (count($perrors) > 0) : ?>
                            <div >
                                <?php foreach($perrors as $error): ?>
                                        <small style = "font-size:12px;" class = "text-danger"><?php echo $error; ?> </small>
                                <?php endforeach?> 
                            </div>
                      <?php endif ?>
                    </div>

                    <div class="form-group ">
                       <label for="exampleInputPassword2">Confirm Password:</label>
                        <input name = "password_2" type="password" class="form-control" id="exampleInputPassword2" placeholder="Confirm password" >
                        <?php if (count($cperrors) > 0) : ?>
                            <div >
                                <?php foreach($cperrors as $error): ?>
                                    <small style = "font-size:12px;" class = "text-danger"><?php echo $error; ?> </small>
                                <?php endforeach?> 
                            </div>
                        <?php endif ?>
                    </div>
                   
                    <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                    <!-- CHANGES - ID -->
                    <label class="form-check-label text-left"  id="label_1" for="exampleCheck1">Agree to our Terms, Data Policy and Cookies Policy</label>
                    </div>
                    
                     <!-- CHANGES - CLASS -->
                        <button data-toggle="modal" data-target=".demo-popup" name = "signup" type="submit" class="btn btn-primary col-12 mt-2">Register</button>
                    </div>
            </form>

            
        </div>
        <div class="div1 col-xl-4 col-md-4 col-sm-12 col-xs-12">
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
      document.getElementById('dt').max = new Date(new Date().getTime() - new Date().getTimezoneOffset() * 60000).toISOString().split("T")[0];
    </script>
</body>
</html>
