<?php 

//intializing variables
$username = "";
$email = "";
$uerrors = array();
$perrors = array();

//connect to server
require_once 'conn.php';


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
            $_SESSION['userId'] = $account['username'];
            $_SESSION['usertype'] = $account['user_type'];
            $_SESSION['verified'] = $account['verified'];
            $_SESSION['email'] = $account['email'];
            header('location: index.php');    
        }
        else{
            array_push($perrors, "Invalid credentials.");
        }
    }
}