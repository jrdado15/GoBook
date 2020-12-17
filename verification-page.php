<?php
    session_start();
    include 'includes/verify_otp.php';
    include 'includes/emailcontroller.php';
    
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

    //restricts user from going to verification page if not logged in
    if(!isset($_SESSION['userId'])){
        header('location: index.php');
        exit();
    }
    
    //resends email after pressing resend button
    if(isset($_POST['ver_resend'])){
        $email = $_SESSION['email'];
        $token = $_SESSION['token'];
        sendVerificationEmail($email, $token);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify:GOBOOK</title>
     <link rel = "icon" href="images/icons8-ticket-100.png" type = "image"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <div class="ver-page d-flex justify-content-center" >
    <div class="div3 col-lg-8 col-xs-12 d-flex flex-column justify-content-center m-0 p-0 ">
        <div class="p-lg-5">
            <!-- CHANGES -->
                    <a href="index.php" class="mx-auto d-flex flex-column justify-content-center col-md-4 col-8 mx-auto p-0" >
                        <img src="images/gobook_logo-01.png" alt="GOBOOK" class="mx-auto col-8" > 
                    </a>
            <!-- CHANGES -->
            <h1 class="mb-4">Verify your email address</h1>
            <p>You're almost there! We sent a verification code to</p>
            <form class="d-flex flex-row  mx-auto col-md-10 col-xs-12">
                <input type="email" class="form-control" id="exampleInputEmail1"  value = "<?php echo $_SESSION['email'];?>">
            </form>
            
            <p class="mt-3 mx-md-4">Just click on the link in that email.</p>
            
            <p class="mt-3 mx-md-4">If the email doesn't arrive soon, check your spam folder or have us resend it again.</p>
            <form method="post">
                <div class="d-flex justify-content-center mt-2">
                    <button data-toggle="modal" data-target=".demo-popup" class="btn btn-secondary col-6" name ="ver_resend">RESEND</button>
                </div>
            </form>
            <!-- CHANGES -->
            <form action="logout.php">
                <div class="d-flex justify-content-center mt-3">
                    <button class="btn btn-secondary col-6" >LOG OUT</button>
                </div>
            </form>
        </div>
    </div>
    </div>
    
<!--
    NOTES
    BY: RHEMA MIRANDA
    SCOPE: MODAL/ EMAIL SENT
-->
<div class="modal fade demo-popup " tabindex="-1" role="dialog" data-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered ">
        <div class="modal-content  d-flex justify-content-center div4 p-2">
           
  
            <div class="top d-flex flex-column justify-content-center col-lg-8 col-12 mx-auto p-0">

                <h1 class="mb-0 mt-2 p-0">EMAIL SENT</h1>

            </div>
            <p class="m-auto col-lg-10 col-12">A verification link was resent to:</p>
            <p class="m-auto col-lg-10 col-12" id="notice"><?php echo $_SESSION['email']; ?></p> 
            <b class="mx-auto mt-3  col-lg-10 col-12">If the email doesn't arrive soon, check your spam folder.</b>
        
        </div>
    </div>
</div>   
<!-- END -->
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" ></script>
   
</body>
</html>
