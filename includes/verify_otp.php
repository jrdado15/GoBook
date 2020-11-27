<?php

require_once 'conn.php';

function verifyUser($token){
    global $db;

    $sql = "SELECT * FROM account_tbl WHERE token = '$token' LIMIT 1";
    $result = mysqli_query($db, $sql);

    if(mysqli_num_rows($result) > 0){
        $user = mysqli_fetch_assoc($result);
        $update_query = " UPDATE account_tbl SET verified= 1 WHERE token = '$token' ";

        if(mysqli_query($db, $update_query)){
            session_start();
            $_SESSION['verified'] = 1;
            header('location: index.php');
        }
    }
}
                  
?>