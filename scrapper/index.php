<!DOCTYPE html>
<html>
<head>
	<title>Scrapper</title>
</head>
<body>
<?php
	include_once ("../classes/MySQL_singleton.php");
	include_once ("scrapper.php");
?>
<?php
	$content = file_get_contents('content.html');
	
	$scrap = new Scrapper($content);
	$all_cards = new Cards($db);
	$cards_list = $all_cards->get_all();

	$matches = $scrap->getStuff();
	$i = 0;
	$id = 0;
	if (is_array($matches)) {
		foreach ($matches as $line) {
			if ($i > 0 && $i % 2 == 0) {
				$key = $line[0];
				for ($j = 1; $j < count($line); $j++ ) {
					switch ($key) {
						case 'Card':
							$key = 'title';
							break;
						case 'Card Range':
							$key = 'range_type';
							break;
						case 'Card Value':
							$key = 'value';
							break;
						case 'Card Abilities':
							$key = 'ability';
							break;
						case 'Type':
							$key = 'type';
							break;
						case 'Price':
							$key = 'price';
							break;
						case 'Location':
							$key = 'location';
							break;
						case 'Territory':
							$key = 'territory';
							break;
						case 'Quest':
							$key = 'quest';
							break;
						case 'Location, Character':
							$key = 'character_loc';
							break;
						default:
							# code
							break;
					}
					$compilation[$id]['deck'] = 3;
					$compilation[$id][$key] = $line[$j];
					$id++;
				}
				$id = 0;
			}
			$i++;
		}
	}

	$index = 0;

	function gotcard ($title, $list) {
		$cards_list = $list;
		foreach ($cards_list as $item) {
			for ($k = 0; $k <= count($item); $k++) {
				if ($title == $item['title']) {
					return TRUE;
				}
			}
		}
		return FALSE;
	}

	if (is_array($compilation)) {
		foreach ($compilation as $item) {
			if (!(gotcard($item['title'], $cards_list))) {
				echo '<div id="id_'.$index.'" style="border:1px solid #444;background:#ccc;padding:5px;">';
				echo '<form method="get" name=id_"'.$index.'" action="add_card.php">';
				foreach ($item as $key => $value) {
					if ($value == '----') {
						$value = 'NULL';
					}
					echo $key . ' : <input name= "'.$key.'" value="' . $value . '""><br>';

				}
				echo '<input type="submit">';
				echo '</form>';
				echo '</div>';
				$index++;
				echo '<hr>';
			}
		}
	}
echo 'end';
?>
</body>
</html>