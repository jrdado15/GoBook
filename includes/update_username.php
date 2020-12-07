<?php

require_once 'conn.php';


if(isset($_POST['update_username'])){

        session_start();
      
        $new_username= $_POST['username_update'];
        $password = $_POST['password_forusername'];
        $currentusername = $_SESSION['userId'];


        $errorEmpty = false;
        $errorUsername = false;
        $errorPassword = false;

        if(empty($new_username)){
            echo "<b class = 'cusername-message'> Fill in all fields</b>";
            $errorEmpty = true;
        }
        
        elseif(empty($password)){
            echo "<b class = 'cusername-message'> Fill in all fields</b>";
            $errorEmpty = true;
        }  
        
        elseif(strlen($new_username) < 5 && strlen($new_username) >= 1){
            echo "<b class = 'cusername-message'> Username characters must have 5 - 13 characters.</b>"; 
        }
        
        elseif(strlen($new_username) > 13){
            echo "<b class = 'cusername-message'> Username characters must have 5 - 13 characters.</b>"; 
        }
        
        elseif(!preg_match( "/^[a-zA-Z]+[a-zA-Z0-9._]+$/" ,$new_username)){
            if(strlen($new_username) >= 5){
                echo "<b class = 'cusername-message'> Username must only contain alphanumeric characters.</b>";
            }
        }
        elseif($new_username === $currentusername)
        {
            echo "<b class = 'cusername_message'>Put different username, </b>";
        }
        //check username before updating
        $password = md5($password);
        $user_check_query = "SELECT * FROM account_tbl WHERE username = '$currentusername' LIMIT 1";
        $results = mysqli_query($db, $user_check_query);
        $user = mysqli_fetch_assoc($results);

        if($user){
            if($user['username'] === $new_username){
                echo "<b class = 'cusername_message'>Username is already taken</b>";
            }
        }
          
        
       //check passsword before updating
       $query = "SELECT * FROM account_tbl WHERE username = '$currentusername' AND password = '$password' LIMIT 1";
       $results = mysqli_query($db, $query);
    
        //Update user's username in database
        if(mysqli_num_rows($results) > 0){  
            if(mysqli_query($db, $query)){
                $query_update = "UPDATE account_tbl SET username = '$new_username' WHERE username = '$currentusername' ";
                mysqli_query($db, $query_update); 
                $_SESSION['userId'] = $new_username;
                echo "<script> location.reload(true); </script>";
            }
        }
        else{
            if($password != '' && $new_username != ''){
                $errorPassword = true;
                echo "<b class = 'cemail_message'> Invalid password</b>";
            }
        }

    
}
?>