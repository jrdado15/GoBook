<?php 
    include "includes/server.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password • GoBook</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    
</head>
<body>

    <div class="log-in d-flex justify-content-center" >
    <div class="floating-cont d-flex flex-row flex-wrap flex-row-reverse col-md-8 col-12  m-0 p-0 ">
        <div class="div2 col-xl-8 col-md-8 col-sm-12 col-xs-12 overflow-auto ">
            <div class="p-5 ">
                <div class="container p-xl-8">
                    

                    <a href="index.php" class="mx-auto d-flex flex-column justify-content-center col-lg-8 col-12 mx-auto p-0" >
                        <img src="images/gobook_logo-02.png" alt="GOBOOK" class="mx-auto col-8" > 
                    </a>
                     <h2 class=" mb-1 text-center">FORGOT PASSWORD </h2>
                    <!--<p class="mx-auto mt-0 mb-2">Please enter the email you used to sign up and we'll send you a link to reset it.</p>-->
                    <form method = "post" action="forgot-password.php">
                        <div class="form-group ">
                            <label>Your Email:</label>
                            <input name = "fpEmail" class="form-control" type="text" placeholder="Enter email" value = "<?php echo $email;?>">
                            <?php if (count($eerrors) > 0) : ?>
                                <div >
                                    <?php foreach($eerrors as $error): ?>
                                        <small class = "text-danger"><?php echo $error; ?> </small>
                                    <?php endforeach?> 
                                </div>
                            <?php endif ?>
                        </div>
                        <button data-toggle='modal' data-target='.demo-popup2'name = "fSubmit"  type="submit" class="col-12 mt-3 btn btn-primary">RESEND RECOVERY EMAIL</button> 
                        <div class="d-flex flex-column justify-content-center m-auto">
                            <p class="m-auto ">Just remembered?</p>
                            <a class="m-auto" href="#">LOG IN</a>
                        </div>
                    </form>

                    
                </div>
            
            </div>
        </div>
        <div class="div1 col-xl-4 col-md-4 col-sm-12 col-xs-12">
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
            <p class="m-auto col-lg-10 col-12" id="notice"><?php echo $email;?></p> 
        </div>
    </div>
</div>   
<!-- END -->

<!-- END -->
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/js/bootstrap-datepicker.min.js"></script>
   
</body>
</html>