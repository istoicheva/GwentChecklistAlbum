<?php

/**
* Scrapper
*/
class Scrapper
{

	# $url = "http://gatherer.wizards.com/Pages/Card/Details.aspx?multiverseid=227227";

	private $content;

	public $card_id;
	public $card_name;
	public $card_img;
	public $card_type;

	public function __construct ($content) {
		$this->content = $content;

		# Take the content of the page
		$this->content = preg_replace('/\s(1,)/', ' ', $this->content);
	}

	public function getStuff() {
		$content = $this->content;

		$regexp = "(\<tr\>\s*(\<td\>(.*)<\/td\>\s*)(\<td\>(.*)<\/td\>\s*)(\<td\>(.*)<\/td\>\s*)(\<td\>(.*)<\/td\>\s*)(\<td\>(.*)<\/td\>\s*)(\<td\>(.*)<\/td\>\s*)(\<td\>(.*)<\/td\>\s*)(\<td\>(.*)<\/td\>\s*)(\<td\>(.*)<\/td\>\s*)(\<td\>(.*)<\/td\>\s*)\<\/tr\>)";

		preg_match_all($regexp, $content, $matches);

		return $matches;
		# Every 2nd
	}

	public function get_image2() {

		$content = $this->content;

		# $regexp = "<a\s[^>]*href=(\"??([^\">]*?\\1[^>]*>(.*)<\/a>";
		
		# Regular expresion - <img src=" ... ">
		$regexp = "<img\s(.+)?src=['\"].+['\"](\s+)?\/?>";

		# Apply regular expression to filter results
		preg_match_all($regexp, $content, $matches);
		# Leave only the url
		preg_match_all('@src="([^"]+)"@', $content, $matches);

		# Replace short sequences with domain
		$image = str_replace('../../', 'http://gatherer.wizards.com/', $matches[1][9]);

		# Returns the url of the image
		return $image;
	}

	public function get_image() {

		$content = $this->content;
		$regex_img = '<img\ssrc="(.+)"\sid=".+"\salt="(.+)"\sstyle=".+">';
		$regex_id = '/multiverseid=(\d{1,})/';

		# [0] img src=" ... " id=" ... " alt=" ... "
		# [1] .../.../Handlers/Image.ashx?multiverseid= 123456 &type=card
		# [2] Card Name

		## Get Card Name
		preg_match($regex_img, $content, $divImage);
		$this->card_name = $divImage[2];
		
		## Get URL (replaced to work)
		$imgURL = str_replace('../../', 'http://gatherer.wizards.com/', $divImage[1]);
		$this->card_img = $imgURL;

		## Get ID
		preg_match($regex_id, $imgURL, $cardIDstring);
		$this->card_id = $cardIDstring[1];
	}

	public function get_type() {

		$content = $this->content;
		$regex_line = '/\<div\s*class\=\"label\".*>\s*(.+)\<\/div\>\s*\<div\s*class\=\"value"\>\s*(.+)\<\/div\>/';

		preg_match_all($regex_line, $content, $detailsList);

		for ($index; $index <= (count($detailsList[1])) ; $index++) {
			$key = $detailsList[1][$index];
			$value = $detailsList[2][$index];
			$details[$key] = $value;
		}
		echo '<pre>';
		var_dump($details);
		echo '</pre>';
	}

	public function __call ($method, $args) {
		echo $method . ' -> ' . $args;
	}

}