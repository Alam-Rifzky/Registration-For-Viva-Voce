<?php
session_start();
if ($page=='admin') {
	if (!isset($_SESSION['admin'])) {
	header('location: ../index.php');	
	}
}else{
	if (!isset($_SESSION['login'])) {
		header('location: ../index.php');
	}
}





?>