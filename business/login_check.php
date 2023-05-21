<?php
require_once('../configurazione/database.php');
require_once('../functions/functions.php');
try
{
ini_session_start();
}
catch(\error $ex)
{
	var_dump($ex);
	die();
}

//ini_session_start();
if (isset($_POST['login'])) {
    $username = $_POST['user_name'];
    $password = $_POST['password'];
	if (login($username, $password, $mysqli))
	{
		$_SESSION["utente"]=$username;
		header('Location:../index.php');	
	}
	else {
		header('Location:../login.php');
	die();
	}
	}
else {
	header('Location:../login.php');
	die();
	}


   ?>