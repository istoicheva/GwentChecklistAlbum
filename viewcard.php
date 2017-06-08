<?php

# HEADER
require_once('header.php');

# CLASSES
require_once 'classes/MySQL_singleton.php';
$id = $_GET["id"];

$card = $db_cards_connection->viewcard($id);
?>
	<div class="container-fluid">
      <div class="feature_img"><img src="<?php echo DOMAIN . $card['image']?>"></div>
      <p><strong>ID:</strong> <?php echo $card['id']; ?></p>
      <p><strong>Deck:</strong> <?php echo $card['deck']; ?></p>
      <p><strong>Title:</strong> <?php echo $card['title']; ?></p>
      <p><strong>Range:</strong> <?php echo $card['range_type']; ?></p>
      <p><strong>Value:</strong> <?php echo $card['value']; ?></p>
      <p><strong>Ability:</strong> <?php echo $card['ability']; ?></p>
      <p><strong>Type:</strong> <?php echo $card['type']; ?></p>
      <p><strong>Location:</strong> <?php echo $card['location']; ?></p>
      <p><strong>Territory:</strong> <?php echo $card['territory']; ?></p>
      <p><strong>Quest:</strong> <?php echo $card['quest']; ?></p>
      <p><strong>Character:</strong> <?php echo $card['character_loc']; ?></p>
  </div>
<?php
# FOOTER
require_once('footer.php');
?>