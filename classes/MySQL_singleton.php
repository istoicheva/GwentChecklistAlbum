<?php

include_once ('Cards.class.php');
include_once ('config.php');
include_once ('Users.class.php');
include_once ('Collection.class.php');

class MySQL_Singleton extends mysqli {

	private static $instance;

	public static function getInstance($server, $user, $pass) {
		if (null === static::$instance) {
			static::$instance = new static($server, $user, $pass);
		}

		return static::$instance;
	}

}

$db = MySQL_Singleton::getInstance('localhost', 'USER', 'PASSWORD');
$db->select_db('DATABASE');
$db->query("SET NAMES utf8");

$db_cards_connection = new Cards($db);