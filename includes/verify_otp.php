<?php

require_once 'conn.php';

if(isset($_POST['verify'])){
        $otp = $_POST['otp'];
        $username = $_SESSION["userId"];

        $query = "SELECT * FROM account_tbl WHERE username = '$username' LIMIT 1";
        $results = mysqli_query($db, $query);
        $user = mysqli_fetch_assoc($results);

        if($user['token'] === $otp){
            header('location: index.php');
        }
        else
            echo 'Invalid PIN';
    }
?>