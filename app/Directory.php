<?php

namespace app;

class Directory {
	
	protected $directory;
	protected $tree = [];

	public function __construct($directory)
	{
		$this->directory = $directory;
	}
	
	public function get_folders()
	{
		return glob($this->directory.'/*', GLOB_ONLYDIR);
	}
	
	public function get_all_folders($dir = null)
	{
		$dir = $dir ?? $this->directory;
		$this->tree = array_merge($this->tree, $folders = glob($dir.'/*', GLOB_ONLYDIR));
		
		foreach($folders as $folder)
		{
			if(is_dir($folder))
			{
				$this->get_all_folders($folder);
			}
		}
		
		return $this->tree;
	}
}