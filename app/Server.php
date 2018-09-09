<?php

namespace app;

class Server {
	
	protected $protocol;
	protected $host;
	protected $directory;
	
	public function __construct()
	{
		$this->set_all_address_parts();
	}
	
	public function script_address()
	{
		return $this->protocol . '://' . $this->host . $this->directory;
	}
	
	protected function set_all_address_parts()
	{
		$this->set_protocol();
		$this->set_host();
		$this->set_current_script_dir();
	}
	
	protected function set_protocol()
	{
		$this->is_https() ? $this->protocol = 'https' : $this->protocol = 'http';
	}
	
	protected function set_host()
	{
		$this->host = $_SERVER['HTTP_HOST'];
	}
	
	protected function set_current_script_dir()
	{
		$this->directory = pathinfo( $_SERVER['PHP_SELF'] )['dirname'];
	}
	
	protected function is_https()
	{
		return strpos( $_SERVER['SERVER_PROTOCOL'], 'HTTPS' );
	}
}