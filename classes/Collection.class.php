<?php

/**
* Name 			: Collection
* Definition	: Deals with the input of the user collection
*/

include_once('Users.class.php');

class Collection
{
	private $db;
	
	function __construct($db)
	{
		$this->db = $db;
	}

	# Add Card (ID) to User (ID) Collection
	public function add_to_collection ($user_id, $card_id) {
		$user_collection = $this->get_collection($user_id);
		
	}

	# Get User (ID) Collection
	public function get_collection($user_id) {
		$user_class = new Users($this->db);
		$users = $user_class->all_users();
		foreach ($users as $user) {
			if ($user_id == $user['id']) {
				$collection = explode(",", $user['card_collection']);
				continue;
			}
		}
		return $collection;
	}

}