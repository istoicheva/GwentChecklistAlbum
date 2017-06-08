<?php

# HEADER
require_once('header.php');

$card = $db_cards_connection->viewcard($id);

?>

<?php

$row_count = 0;
?>

<div class="content-fluid">
<?php foreach ($all_cards as $card) : ?>

	<?php
	if ($is_logged) {
		foreach ($user_collection as $item) {
			if ($item == $card['id']) {
				$have_card = TRUE;
				$image_class = 'yes_card';
				$button_text = 'Remove';
				break;
			} else {
				$have_card = FALSE;
				$image_class = 'no_card';
				$button_text = 'Add';
			}
		}
	}
	?>

	<?php if ($row_count == 0) : ?>
	<div class="row-fluid main">
	<?php endif; ?>
	<?php # if ($have_card) : ?>

	<div class="col-lg-2 col-md-4 col-sm-6 col-xs-12 <?php echo $card['id'] ?>">
		<div class="thumbnail thumb-size">
			<?php if (!is_null($card['image'])) : ?>
			<img src="<?php echo $card['image'] ?>" class="<?php echo $image_class; ?>">
			<?php else: ?>
				<img src="classes/cards/0.jpg" class="<?php echo $image_class; ?>">
			<?php endif; ?>
			<div class="caption">
				<h3><?php echo $card['title']?></h3>
				<p>
				<a href="viewcard.php?id=<?php echo $card['id'] ?>" class="btn btn-default" role="button">Details</a>
				<?php if ($is_logged) : ?><a href="collection.php?id=<?php echo $card['id'] ?>" class="btn btn-default" role="button"><?php echo $button_text ?></a><?php endif; ?>
				</p>
			</div>
		</div>
	</div>
	
	<?php # endif; ?>

	<?php if ($row_count == 5) {
		echo '</div> <!-- END ROW -->';
		echo '<div class="clearfix"></div>';
		$row_count = 0;
	} else {
		$row_count++;
	}
	?>
<?php endforeach; ?>
</div>

<?php
# FOOTER
require_once('footer.php');
?>