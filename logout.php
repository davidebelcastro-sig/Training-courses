<?php 
session_start();
if(isset($_SESSION['user_id'])) {
    session_destroy();
    $_SESSION = array();
    header('Location:  login.php');
    exit();
} else {
    session_destroy();
	header('Location:  login.php');
    exit();
}


?>