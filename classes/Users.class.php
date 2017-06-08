<?php

class Users {
	
	private $db;
	public $user_collection;
	public $user_id;
	public $user_name;
	public $is_admin = FALSE;
	public $error;

	public function __construct($db) {
		$this->db = $db;
	}

	public function all_users() {
		return $this->db->query("SELECT * FROM users");
	}


	public function login($username, $password) {
		$check_user = $this->all_users();
		//$check_user = $this->db->query("SELECT  FROM users WHERE username='$username' AND password='$password'");
		foreach ($check_user as $user) {
			if ($user['username'] == $username) {
				if ($user['password'] == $password) {
					$this->user_id = $user['id'];
					$this->user_name = $user['username'];
					$this->user_collection = $user['card_collection'];

					if ($user['username'] == 'Admin') {
						$this->is_admin = TRUE;
					}

					$this->session($user['id']);
				} else {
					$error = 'Wrong Password';
				}
			} else {
				$error='User doesn\'t exist.';
			}
		}
	}

	public function logout() {
		session_destroy();
	}

	public function session($user_id) {
		if (!isset($_SESSION['user'])) {
		   $_SESSION['user'] = $user_id;
		}
	}

	// public function get_collection($user_id) {
	// 	$userlist = $this->all_users();
	// 	foreach ($userlist as $user) {
	// 		if ($user_id == $user['id']) {
	// 			$collection = explode(",", $user['card_collection']);
	// 			continue;
	// 		}
	// 	}
	// 	return $collection;
	// }

}