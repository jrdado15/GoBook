<?php 
    include('includes/server.php'); 

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
    <title >Change Password • GOBOOK</title>
    <link rel = "icon" href="images/icons8-ticket-100.png" type = "image"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">

    <script>
        $(window).load(function(){
        $('#success').modal('show');
        });
    </script>

</head>
<body>
<!--
<img class="logo" src="images/gobook_logo-01.png" alt="GOBOOK">

-->
    <div class="ver-page d-flex justify-content-center" >
        <div class="div4 col-lg-8 col-xs-12 d-flex flex-column justify-content-center m-0 p-0 ">
            <div class="p-lg-5">
                <div class="d-flex flex-column justify-content-center mx-auto">
                <a href="index.php" class="mx-auto d-flex flex-column justify-content-center col-lg-8 col-12 mx-auto p-0" >
                    <img src="images/gobook_logo-01.png" alt="GOBOOK" class="mx-auto col-8" > 
                </a>
                <h1>Reset your password</h1>
                <p>Please choose  new password to finish signing in.</p>
                </div>
               
                 <form action="change-password.php" method = "post" class="mx-auto mt-2  col-lg-8 col-12">
                    <label>Enter new Password</label>
                    <input name = "resetPassword" type="password" class="form-control field mt-1 " placeholder="new password">
                    <?php if (count($perrors) > 0) : ?>
                                <div >
                                    <?php foreach($perrors as $error): ?>
                                        <b class = "text-danger"><?php echo $error; ?> </b>
                                    <?php endforeach?> 
                                </div>
                    <?php endif ?>
                    <br>
                    <label>Re-enter new Password</label>
                    <input name = "confirmResetPassword" type="password" class="form-control field mt-1 " placeholder="re-enter password">
                    <?php if (count($cperrors) > 0) : ?>
                                <div >
                                    <?php foreach($cperrors as $error): ?>
                                        <b class = "text-danger"><?php echo $error; ?> </b>
                                    <?php endforeach?> 
                                </div>
                    <?php endif ?>
                    <br>
                    <div class="d-flex justify-content-center mt-2 mx-auto col-lg-8 col-12">
                        <button data-toggle="modal" data-target=".demo-popup" name = "resetSubmit" type = "submit" class="btn btn-default col-12">RESET MY PASSWORD</button>
                        <script>
                         $('#success').modal({
                            show: 'false'
                        }); 
                        </script>
                        
                        
                    </div>
                </form>
                       
            </div>
        </div>
    </div>

<!--
    NOTES
    BY: RHEMA MIRANDA
    SCOPE: MODAL/ ACCOUNT SETTINGS 1, LOG OUT
-->

<div id = "success" class="modal fade demo-popup"  data-backdrop="static" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered ">
        <div class="modal-content  d-flex justify-content-center div4 p-2">
            
            <div class="top d-flex flex-column justify-content-center col-lg-8 col-12 mx-auto p-0">
                <img src="images/gobook_logo-01.png" alt="GOBOOK" class="mx-auto col-6 mb-1" > 
                <h3 class="mb-0 mt-2 p-0">Successful password reset! </h3>

            </div>
            <p class="mx-auto col-12 ">You can now use your new password to log in to your account.</p>
        </div>

            
    </div>
    
</div>

<!-- END -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" ></script>
   
</body>
</html>