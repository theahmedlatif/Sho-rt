<?php

session_start();
if(!isset($_SESSION['userName'])){
	header('Location: login.php');
	Exit;
}
session_destroy();
header('Location: login.php');

?>
