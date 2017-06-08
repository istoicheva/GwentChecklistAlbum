<?php

require_once('Images.class.php');

class Cards {

	private $db;

	# Create CARDS class - feed db
	public function __construct($db) {
		$this->db = $db;
	}

	# Get ALL Cards
	public function get_all() {

		$card_images = new Images('all'); # Get List of all images

		$all_cards = $this->db->query("SELECT * FROM cards"); # Get all cards
		
		foreach ($all_cards as $a_card) {
			$id = $a_card['id']; # Store Card ID
			$cards[$id]['image'] = $card_images->get_card_image($id); # Add image to the card
			foreach ($a_card as $key => $value) {
				$cards[$id][$key] = $value;
			}
		}

		return $cards;
	}

	# Add New Card
	public function add($deck, $title, $range, $value, $ability, $type, $location, $territory, $quest, $character) {

		## DECK
		if ($deck >= 0 && $deck <= 5) {
			# 0 - Undefined
			# 1 - Neutral
			# 2 - Northern
			# 3 - Nilfgaard
			# 4 - Scoia'tael
			# 5 - Monsters

			$deck_esc = $this->db->deck;
		}

		## TITLE
		$title_esc = $this->db->real_escape_string($title);

		## RANGE
		if ($range >= 0 && $range <= 3) {
			# 0 - Spell
			# 1 - Close
			# 2 - Range
			# 3 - Siege

			$range_esc = $this->db->range;
		} else {
			$range_esc = NULL;
		}

		## VALUE
		if (is_int($value)) {
			$value_esc = $this->db->value;
		} else {
			$value_esc = 0;
		}

		## ABILITIES
		$ability_esc = $this->db->real_escape_string($ability);

		## TYPE
		$type_esc = $this->db->real_escape_string($type);

		## LOCATION
		$location_esc = $this->db->real_escape_string($location);

		## TERRITORY
		$territory_esc = $this->db->real_escape_string($territory);

		## QUEST
		$quest_esc = $this->db->real_escape_string($quest);

		## CHARACTER
		$character_esc = $this->db->real_escape_string($character);

		return $this->db->query("
			INSERT INTO cards (
				deck, 
				title, 
				range_type, 
				value, 
				ability, 
				type, 
				location, 
				territory, 
				quest, 
				character_loc)
			VALUE (
				'$deck_esc',
				'$title_esc',
				'$range_esc',
				'$value_esc',
				'$ability_esc',
				'$type_esc',
				'$location_esc',
				'$territory_esc',
				'$quest_esc',
				'$character_esc')
		");
	}

	public function viewcard($id) {
		$all_cards = $this->get_all();
		
		foreach ($all_cards as $card) {
			if ($card['id'] == $id) {
				return $card;
			}
			return NULL;
		}
	}
}