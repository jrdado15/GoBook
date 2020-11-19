<?php
//Stops the user from going back to register or login page after logging in
session_start();
session_unset();
session_destroy();
header('location: index.php');
?>