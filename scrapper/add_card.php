<?php

include_once ("../classes/MySQL_singleton.php");

$deck = $_GET['deck'];
$title = $_GET['title'];
$range = $_GET['range_type'];
$value = $_GET['value'];
$ability = $_GET['ability'];
$type = $_GET['type'];
$price = $_GET['price'];
$location = $_GET['location'];
$territory = $_GET['territory'];
$quest = $_GET['quest'];
$character = $_GET['character_loc'];

$var = new Cards($db);
$var->add($deck, $title, $range, $value, $ability, $type, $location, $territory, $quest, $character);

echo '<a href="http://dev.3ammood.com/project01/scrapper/">Go Back</a>';