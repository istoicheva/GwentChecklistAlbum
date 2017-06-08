<?php
include_once('../session.php');

# CLASSES
require_once '../classes/MySQL_singleton.php';

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Project 01</title>

	<!-- Bootstrap -->
    <link href="<?php echo DOMAIN; ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo DOMAIN; ?>css/style.css" rel="stylesheet">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="signin dashboard notlogged">
<div class="container">

	<form class="form-signin" action="<?php echo DOMAIN; ?>login.php" method="post">
		<h2 class="form-signin-heading">Please sign in</h2>
		<label for="inputEmail" class="sr-only">Username</label>
		<input id="name" name="username" placeholder="Username" type="text" class="form-control" required autofocus>
		<label for="inputPassword" class="sr-only">Password</label>
		<input id="password" name="password" placeholder="Password" type="password" class="form-control" required>
		<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
	</form>

</div>

<?php
# FOOTER
include_once('../footer.php');

