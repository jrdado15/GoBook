<?php

require_once 'conn.php';


if(isset($_POST['update_email'])){

        session_start();
        
        $new_email = $_POST['email_update'];
        $password = $_POST['password_default'];
        $password = md5($password);
        $currentemail = $_SESSION['email'];

        $errorEmpty = false;
        $errorEmail = false;
        $errorPassword = false;

        if(empty($new_email)){
            echo "<b class = 'cemail_message'> Fill in all fields</b>";
            $errorEmpty = true;
        }
        
        elseif(empty($password)){
            echo "<b class = 'cemail_message'> Fill in all fields</b>";
            $errorEmpty = true;
        }

        elseif(!filter_var($new_email, FILTER_VALIDATE_EMAIL)){
            echo "<b class = 'cemail_message'> Invalid Email</b>";
        }

        $user_check_query = "SELECT * FROM account_tbl WHERE email = '$new_email' LIMIT 1";
        $results = mysqli_query($db, $user_check_query);
        $user = mysqli_fetch_assoc($results);

        if($user){
            if($user['email'] === $new_email){
                echo "<b class = 'cemail_message'>Email is already taken</b>";
            }
        }

        //$current_password = $_SESSION['password'];
        //check passsword before updating
        $query = "SELECT * FROM account_tbl WHERE email = '$currentemail' AND password = '$password' LIMIT 1";
        $results = mysqli_query($db, $query);
    
        //Update user's email in database
        if(mysqli_num_rows($results) > 0){  
            if(mysqli_query($db, $query)){
                $query_update = "UPDATE account_tbl SET verified = 0, email = '$new_email' WHERE email = '$currentemail' ";
                mysqli_query($db, $query_update); 
                $_SESSION['email'] = $new_email;
                $_SESSION['verified'] = 0;
                echo "<script> location.reload(true); </script>";
            }
        }
        else{
            if($password != '' && $new_email != ''){
                $errorPassword = true;
                echo "<b class = 'cemail_message'> Invalid password</b>";
            }
        }

}
?>