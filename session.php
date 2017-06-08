<?php
if (strpos($_SERVER['SCRIPT_NAME'], 'logout.php')) {
	session_start();
	session_destroy();
	header('Location: login.php');
	exit;
} else if (session_status() == PHP_SESSION_NONE) {
    session_start();
}