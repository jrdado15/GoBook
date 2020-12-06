<?php

require_once 'conn.php';


if(isset($_POST['update_password'])){

        session_start();
      
        $password = $_POST['password_update'];
        $password1 = $_POST['password1_update'];
        $password2 = $_POST['password2_update'];
        $currentemail = $_SESSION['email'];

        $errorEmpty = false;
        $errorPassword = false;
        $errorPassword1 = false;
        $errorPassword2 = false;

        if(empty($password)){
            echo "<b class = 'cpassword-message'> Fill in all fields</b>";
            $errorEmpty = true;
        }
        
        elseif(empty($password1)){
            echo "<b class = 'cpassword-message'> Fill in all fields</b>";
            $errorEmpty = true;
        }
        
        elseif(empty($password2)){
            echo "<b class = 'cpassword-message'> Fill in all fields</b>";
            $errorEmpty = true;
        }
      
       
        elseif(strlen($password1) < 8 && strlen($password2) >= 1 ){
            echo "<b class = 'cpassword-message'>Password must at least have 8 characters.</b>";
        }
        
        elseif($password1 != $password2 && strlen($password1) > 7){
            array_push($cperrors, "Password does not match");
        }

    

        
        //check passsword before updating
        $password = md5($password);
        $query = "SELECT * FROM account_tbl WHERE email = '$currentemail' AND password = '$password' LIMIT 1";
        $results = mysqli_query($db, $query);
        $password1 = md5($password1);
    
        //Update user's password in database
        if(mysqli_num_rows($results) > 0){  
            if(mysqli_query($db, $query)){
                $query_update = "UPDATE account_tbl SET password='$password1' WHERE email = '$currentemail' ";
                mysqli_query($db, $query_update); 
                $_SESSION['password'] = $password1;
               
                echo "<script> location.reload(true); </script>";
            }
        }
        else{

                $errorPassword = true;
                echo "<b class = 'cemail_message'> Invalid credentials</b>";
            }      
    
}
?>