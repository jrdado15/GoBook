<?php
require_once 'conn.php';

if(isset($_POST['save-user'])){
   // declaring variables
    $currentusername = $_SESSION['userId'];
    $profileImageName = $_FILES['profileImage']['name'];
   
    // nilalagay sa folder ng images yung picture
    $target ='images/'.$profileImageName;
    // hinahanap sa db based sa username
    $query = "SELECT * FROM account_tbl WHERE username = '$currentusername' LIMIT 1";
    $results = mysqli_query($db, $query);  
    // updating picture
    if(move_uploaded_file($_FILES['profileImage']['tmp_name'],$target))
    {
        $query_update = "UPDATE account_tbl SET profile_image = '$profileImageName' WHERE username = '$currentusername' ";
        if(mysqli_query($db, $query_update))
        {
                $_SESSION['profile_image'] = $profileImageName;
        }  
    }
   
}
?>