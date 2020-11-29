<?php 
//intializing variables
$username = "";
$email = "";
$dob = "";
$eerrors = array();
$uerrors = array();
$perrors = array();
$cperrors = array();
$derrors = array();

//connect to server
require_once 'conn.php';
//verify the users' email
require_once 'emailcontroller.php';


if(isset($_POST['signup'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $password_1 = $_POST['password_1'];
    $password_2 = $_POST['password_2'];

    //form validation
    if(empty($email)){
        array_push($eerrors, "Email is required.");
    }
    if(empty($username)){
        array_push($uerrors, "Username is required.");
    }
    if(strlen($username) < 5 && strlen($username) >= 1){
        array_push($uerrors, "Username characters must have 5 - 13 characters.");
    }
    if(strlen($username) > 13){
        array_push($uerrors, "Username characters must have 5 - 13 characters.");
    }
    if(!preg_match( "/^[a-zA-Z]+[a-zA-Z0-9._]+$/" ,$username)){
        if(strlen($username) >= 5){
            array_push($uerrors, "Username must only contain alphanumeric characters.");
        }
    }
    if(empty($dob)){
        array_push($derrors, "Birthdate is required.");
    }
    if(empty($password_1)){
        array_push($perrors, "Password is required.");
    }
    if(strlen($password_1) < 8 && strlen($password_1) >= 1 ){
        array_push($perrors, "Password must at least have 8 characters.");
    }
    if($password_1 != $password_2 && strlen($password_1) > 7){
        array_push($cperrors, "Password does not match");
    }

    $user_check_query = "SELECT * FROM account_tbl WHERE username = '$username' or email = '$email' LIMIT 1";
    $results = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($results);

    if($user){
        if($user['username'] === $username){
            array_push($uerrors, "Username already taken");
        }

        if($user['email'] === $email){
            array_push($eerrors, "Email already taken");
        }
        /*
        if($user['verified'] == 1){
            if($user['email'] === $email){
                array_push($eerrors, "Email already taken");
            }
        }*/
    }


    //Store users' credential in database
    if(count($eerrors) === 0 && count($uerrors) === 0 && count($perrors) === 0 && count($cperrors) === 0 && count($derrors) === 0){
        $password = md5($password_1); //this will encypt the password
        $token =  bin2hex(random_bytes(50));
        $verified = false;
        $usertype = 'member';
        $query = "INSERT INTO account_tbl (user_type, email, verified, token, username, dob, password) VALUES ('$usertype', '$email', '$verified', '$token', '$username', '$dob', '$password')";
        mysqli_query($db, $query);
        session_start();
        $_SESSION['userId'] = $username;
        $_SESSION['usertype'] = $usertype;
        $_SESSION['email'] = $email;
        $_SESSION['token'] = $token;
        $_SESSION['verified'] = $verified;

        //functions call to send a verification email
        sendVerificationEmail($email, $token);

        header('location: verification-page.php');
    }     
}
    //for update_email
    if(isset($_POST['update_email'])){
        $new_email = $_POST['email_update'];
        $password = $_POST['password_update'];
        $password = md5($password);
        $currentemail = $_SESSION['email'];
    //check passsword before updating
        $query = "SELECT * FROM account_tbl WHERE email = '$currentemail' AND password = '$password'";
        $results = mysqli_query($db, $query);
       
    //Update user's email in database
        if(mysqli_num_rows($results) > 0 ){  
            $account = mysqli_fetch_assoc($results);
            $query = "UPDATE account_tbl SET email = $new_email WHERE email = '$currentemail' ";
            mysqli_query($db, $query); 
            $_SESSION['email'] = $new_email;
        }
       
        else{
            array_push($perrors, "Invalid credentials.");
        }
        
    //functions call to send a verification email
    // sendVerificationEmail($email, $token);

    // header('location: verification-page.php');
        
}
    ?>
