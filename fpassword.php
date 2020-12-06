<?php
    include 'includes/server.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
                <form action = "log-in.php" method = "post" class="mx-auto mt-2 col-lg-10 col-12">
                    <label>Your Email</label>
                    <input name = "fpEmail" type = "text" class="form-control field mt-1" placeholder = "Enter email">
                    <?php if (count($eerrors) > 0) : ?>
                        <div >
                            <?php foreach($eerrors as $error): ?>
                                <small class = "text-danger"><?php echo $error; ?> </small>
                            <?php endforeach?> 
                        </div>
                    <?php endif ?>
                    
                    <div class="mx-auto mt-3 mb-3 col-lg-10 col-12">
                        <button name = "fSubmit" data-dismiss="modal" data-toggle="modal" data-target=".demo-popup2" class="btn btn-default m-0 col-12">SEND RECOVERY EMAIL</button>
                    </div>
                </form>
</body>
</html>