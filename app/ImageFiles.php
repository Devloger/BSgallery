<?php

namespace app;

class ImageFiles {
	
	protected $directory = '';
	protected $images_in_directory_as_array = [];
	
	public function __construct( $directory )
	{
		$this->directory = $directory;
		$this->get_images_in_given_directory_to_array();
	}
	
	public function get()
	{
		return $this->images_in_directory_as_array;
	}
	
	protected function get_images_in_given_directory_to_array()
	{
		$this->images_in_directory_as_array = glob( $this->directory . '/*.{png,jpg,jpeg,bmp,PNG,JPG,JPEG,BMP}',
			GLOB_BRACE );
	}
}