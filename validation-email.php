<?php
    session_start();
    include 'includes/verify_otp.php';
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>email verification</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="css/home-stylesheet.css">
    <link  rel="stylesheet" href="css/lightslider.css">
  

</head>

<body>

<div class = "container">
    <div>
        <p>Verify your email <?php echo $_SESSION['email'];?></p>

        <form action = "validation-email.php" method = "post">
            <div>
                <input name = "otp" type="number" >
                <button name = "verify" type = "sumbit">Submit</button>
            </div>
        </form>
    
    </div>
</div>

</body>
</html>