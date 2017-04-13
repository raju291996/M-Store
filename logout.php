<?php
session_start();
if (!$_SESSION['email']) { 
    header('location: index.php');
	exit();
}
session_destroy();
header("Location:index.php");
?>