<?php
// if (session_status() == PHP_SESSION_NONE) {
//     session_start();
// }
include_once('session.php');

if (!isset($_SESSION['user'])) {
	
	require_once 'classes/MySQL_singleton.php';
	$user = new Users($db);
	if(!empty($_POST['username']) && !empty($_POST['password'])) {
		$user->login($_POST['username'], $_POST['password']);
	}
	if ($user->is_admin) {
		header('Location: http://dev.3ammood.com/project01/admin/');
	}
	header('Location: http://dev.3ammood.com/project01/');

} else {
	header('Location: http://dev.3ammood.com/project01/');
}
