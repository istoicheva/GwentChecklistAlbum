<?php include_once('session.php');

# CLASSES
require_once ('classes/MySQL_singleton.php');
$db_cards_connection = new Cards($db);
$all_cards = $db_cards_connection->get_all();

$all_users = new Users($db);
if (isset($_SESSION['user'])) {
    $collection = new Collection($db);
    $user_collection = $collection->get_collection($_SESSION['user']);

}

$id = $_GET["id"];

foreach ($user_collection as $item) {
	if ($item == $id) {
		$have_card = TRUE;
		break;
	} else {
		$have_card = FALSE;
	}
}

if ($have_card) {
	$collection->add($id);
	echo 'I added the card.';
} else {
	$collection->remove($id);
	echo 'I removed the card.';
}