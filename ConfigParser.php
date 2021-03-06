<?php

class ConfigParser
{
	var $config = array();

	function __construct($file)
	{
		$fs = fopen($file, 'r');

		if($fs)
		{
			while(($line = fgets($fs)))
			{
				$lineSplit = explode("=", $line, 2);
				$this->config[$lineSplit[0]] = trim($lineSplit[1]);
			}
		}

		fclose($fs);
	}

	function Get($key)
	{
		return $this->config[$key];
	}

	function GetArray($key)
	{
		return explode(",", $this->Get($key));
	}
}

?>
