<?php
require_once 'conn.php';

if(isset($_POST['save-user'])){
   
    $currentusername = $_SESSION['userId'];
    $profileImageName = $_FILES['profileImage']['name'];
   
    // nilalagay sa folder ng images yung picture
    $target ='images/'.$profileImageName;

    move_uploaded_file($_FILES['profileImage']['tmp_name'],$target);
    // kinukuha lahat ng info at hinahanap sa db yung username ng nakalogin
    $query = "SELECT * FROM account_tbl WHERE username = '$currentusername' LIMIT 1";
    $results = mysqli_query($db, $query);
   
    // nilalagyan ng image yung profile_image field sa database    
    if(mysqli_num_rows($results) > 0){  
                $query_update = "UPDATE account_tbl SET profile_image = '$profileImageName' WHERE username = '$currentusername' ";
                mysqli_query($db, $query_update);  
                
                $_SESSION['profile_image'] = $profileImageName;
        }

}
?>