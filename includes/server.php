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

//sign up
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
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        array_push($eerrors, "Email is invalid.");
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


    //Store users' credential in database after signing up
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
//sign up

    //for update_email

    
//user credential validation
if(isset($_POST['login'])){


    $username = $_POST['username'];
    $password = $_POST['password_1'];

    if(empty($username)){
        array_push($uerrors, "Please enter your username.");
    }
    if(empty($password)){
        array_push($perrors, "Please enter your password.");
    }


    if(count($uerrors) == 0 && count($perrors) == 0  ){
        $password = md5($password);

        $query = "SELECT * FROM account_tbl WHERE (username = '$username' OR email = '$username') AND password = '$password'";
        $results = mysqli_query($db, $query);
       

        if(mysqli_num_rows($results)){  
            session_start();
            $account = mysqli_fetch_assoc($results);
            $_SESSION['id'] = $account['id'];
            $_SESSION['userId'] = $account['username'];
            $_SESSION['usertype'] = $account['user_type'];
            $_SESSION['verified'] = $account['verified'];
            $_SESSION['email'] = $account['email'];
            $_SESSION['token'] = $account['token'];
            $_SESSION['password'] = $account['password'];
            header('location: index.php');    
        }
        else{
            array_push($perrors, "Invalid credentials.");
        }
    }
}
//END

// if user clicks on forgot password button
if(isset($_POST['fSubmit'])){

    $email = $_POST['fpEmail'];
    
    if(empty($email)){
        array_push($eerrors, "Email is required.");
    }
    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        array_push($eerrors, "Email is invalid.");
    }

    if(count($eerrors) == 0){
        session_start();
        $_SESSION['email'] = $email;
        $sql = "SELECT * FROM account_tbl WHERE email = '$email' LIMIT 1";
        $result = mysqli_query($db, $sql);
        $user = mysqli_fetch_assoc($result);
        $token = $user['token'];
        sendPasswordResetLink($email, $token);
    }
}

function resetPassword($token){
    global $db;

    $sql = "SELECT * FROM account_tbl WHERE token = '$token' LIMIT 1";
    $result = mysqli_query($db, $sql);
    $user = mysqli_fetch_assoc($result);

    $_SESSION['email'] = $user['email'];
    
    header('location: change-password.php');
    exit(0);
}


//reset user password
if(isset($_POST['resetSubmit'])){

    session_start();

    $password = $_POST['resetPassword'];
    $password_confirm = $_POST['confirmResetPassword'];

    if(empty($password)){
        array_push($perrors, "Password is required.");
    }
    if(strlen($password) < 8 && strlen($password_confirm) >= 1 ){
        array_push($perrors, "Password must at least have 8 characters.");
    }
    if($password != $password_confirm && strlen($password) > 7){
        array_push($cperrors, "Password did not match");
    }

    $password = md5($password);
    $email = $_SESSION['email'];

    if(count($perrors) == 0 && count($cperrors) == 0){

        $sql = "UPDATE account_tbl SET password = '$password' WHERE email = '$email' ";
        $result = mysqli_query($db, $sql);

        if($result){
            header('location: log-in.php');
            exit(0);
        }
    }

}

?>