<?php

class Images
{
	private $img_dir = 'classes/cards/';
	private $extension = 'jpg'; # Default jpg. WARNING: Case sensitive. Works only with lower case.
	private $error; # Error storage
	public $imagearr; # Image Array
	private $enable_uppercase_ext = FALSE; # Accept also Uppercased Extensions?

	function __construct($ext='jpg') {

		# Set lowercase
		$ext = strtolower($ext);

		# If ext set to 'all' - take all image extensions
		if ($ext='all') {
			$this->get_all('gif');
			$this->get_all('png');
			$this->get_all('jpg');
		} else {
			# If not 'all' take all from one extension
			$this->get_all($ext);
		}

		# Sort array by key/id
		if ($this->imagearr != NULL) {
			ksort($this->imagearr);
		}

		# Return ARRAY
		return $this->imagearr;
	}

	# GET_ALL ()
	# Number of Arguments	: 1
	# Posible Arguments		: png, jpg, gif
	# Default Argument		: jpg
	# Returns 				: Array
	private function get_all($ext) {
		# If new extension is set;
		if ($ext != $extension) {
			$this->set_extension($ext);
			
			# If it returns error make sure to set the default
			if ($this->error['parse_ext']) {
				$this->extension = 'jpg';
			}
		}

		# Get the image files (lowercase)
		$glob_var = $this->img_dir . '*.' . $this->extension;
		foreach (glob($glob_var) as $image) {
			$key = basename($image, '.' . $this->extension); # Set key to be the image id
			$this->imagearr[$key] = $image;
		}

		# Get the image (uppercase) if enabled
		if ($this->enable_uppercase_ext == TRUE) {
			$uppercase_ext = strtoupper($this->extension);
			$glob_var = $this->img_dir . '*.' . $uppercase_ext;
			foreach (glob($glob_var) as $image) {
				$key = basename($image, '.' . $uppercase_ext); # Set key to be the image id
				$this->imagearr[$key] = $image;
			}
		}
	}

	# SET_EXTENSION ()
	# Number of Arguments	: 1
	# Posible Arguments		: png, jpg, gif
	# Default Argument		: jpg
	# Returns 				: Void
	private function set_extension($ext) {
		$ext = strtolower($ext);
		if ($ext === 'jpg' || $ext === 'png' || $ext === 'gif') {
			$this->extension = $ext;
		} else {
			$error['parse_ext'] = 'Invalid extension. Extension set to : ' . $this->extension;
		}
	}

	private function make_array() {
		foreach ($this->imagearr as $key => $value) {
			if ($images[$key] != $value) {
				$images[$key] = $value;
			}
		}

		// echo $images;
	}

	public function get_card_image($id) {
		# $image = $this->make_array();
		if (is_array($this->imagearr)) {
			foreach ($this->imagearr as $key => $value) {
				if ($key == $id) {
					return $value;
				}
			}
		}
	}

}