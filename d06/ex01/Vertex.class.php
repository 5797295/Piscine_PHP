<?php

class Vertex
{
	private $_x, $_y, $_z, $_w;
	private $_color;
	public static $verbose = False;
	public static function doc()
	{
		return file_get_contents("Vertex.doc.txt");
	}
	public function __toString()
	{
		if (self::$verbose)
			return sprintf("Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f, %s )", $this->_x, $this->_y, $this->_z, $this->_w, $this->_color);
		else
			return sprintf("Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f )", $this->_x, $this->_y, $this->_z, $this->_w);
	}
	public function __construct($vertexArray)
	{
		$this->_w = 1;
		if (isset($vertexArray['x']) && isset($vertexArray['y']) && isset($vertexArray['z']))
		{
			if (array_key_exists('w', $vertexArray))
				$this->_w = intval($vertexArray['w']);
			$this->_x = intval($vertexArray['x']);
			$this->_y = intval($vertexArray['y']);
			$this->_z = intval($vertexArray['z']);
			if (isset($vertexArray['color']) && array_key_exists('color', $vertexArray) && $vertexArray['color'] instanceof Color)
				$this->_color = $vertexArray['color'];
			else
				$this->_color = new Color(array('rgb' => 0xFFFFFF));
		}
		if (self::$verbose)
		{
			printf("Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f, ", $this->_x, $this->_y, $this->_z, $this->_w);
			print ($this->_color." ) constructed".PHP_EOL);
		}
	}
	public function __destruct()
	{
		if (self::$verbose)
		{
			printf("Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f, ", $this->_x, $this->_y, $this->_z, $this->_w);
			if (isset($vertexArray['color']))
			{
				print ($vertexArray['color']."destructed".PHP_EOL);
			}
			else if (!isset($vertexArray['color']))
			{
				print ($this->_color." ) destructed".PHP_EOL);
			}
		}
	}
}

?>
