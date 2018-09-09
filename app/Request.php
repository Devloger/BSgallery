<?php

namespace app;

class Request {
	
	protected $return;
	protected $disallowed_strings = [];
	
	public function get( $arg )
	{
		if( $this->is_set_and_is_not_empty( $arg ) )
		{
			$this->return = $_GET[ $arg ];
			$this->filter();
			
			return $this->return;
		}
		return null;
	}
	
	public function disallow( $string )
	{
		$this->disallowed_strings[] = $string;
		return $this;
	}
	
	protected function filter()
	{
		array_map( function($disallowed_strings)
		{
			if( strpos($this->return, $disallowed_strings) !== false )
			{
				throw new \Exception('Disallowed input supplied.');
			}
		}, $this->disallowed_strings );
	}
	
	protected function is_set_and_is_not_empty( $arg )
	{
		return isset( $_GET[ $arg ] ) AND ! empty( $_GET['dir'] );
	}
}