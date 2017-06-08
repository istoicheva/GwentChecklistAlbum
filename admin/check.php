<?php
include_once('../session.php');
if (isset($_SESSION['user'])) {
	header('Location: dashboard.php');
} else {
	header('Location: login.php');
}