<?php include_once('session.php');

# CLASSES
require_once ('classes/MySQL_singleton.php');

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
<?php

$db_cards_connection = new Cards($db);
$all_cards = $db_cards_connection->get_all();

    function body_classes() {
        // $classes = "page";
        // if (is_logged()) {$classes .= ' logged';}
        // if (is_viewcard()) {$classes .= ' viewcard';}
        // if (is_viewcard() && isset($id)) {$classes .= ' id'; $classes .= $id;}
        // return $classes;
        return 'page';
    }
$all_users = new Users($db);
if (isset($_SESSION['user'])) {
    $collection = new Collection($db);
    $user_collection = $collection->get_collection($_SESSION['user']);
    $is_logged = TRUE;
} else {
    $is_logged = FALSE;
}

?>
<body class="<?php echo body_classes(); ?>">
    <nav class="navbar navbar-inverse navbar-fixed-top"><?php include_once('navigation.php') ?></nav>