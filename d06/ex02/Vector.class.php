<?php

class Vector
{
	private $_x, $_y, $_z, $_w = 0;
	public static $verbose = False;
	public static function doc()
	{
		return file_get_contents("Vector.doc.txt");
	}
	public function __toString()
	{
		return sprintf("Vector( x: %.2f, y: %.2f, z:%.2f, w:%.2f )", $this->_x, $this->_y, $this->_z, $this->_w);
	}
	public function __construct($vectorArray)
	{
		$this->_x = $vectorArray['dest']->$this->_x;
		$this->_y = $vectorArray['dest']->$this->_y;
		$this->_z = $vectorArray['dest']->$this->_z;
		if (self::$verbose)
		{
			printf("Vector( x: %.2f, y: %.2f, z:%.2f, w:%.2f) constructed\n", $this->_x, $this->_y, $this->_z, $this->_w);
		}
	}
	public function __destruct()
	{
		if (self::$verbose)
		{
			printf("Vector( x: %.2f, y: %.2f, z:%.2f, w:%.2f) destructed\n", $this->_x, $this->_y, $this->_z, $this->_w);
		}
	}
	public function magnitude()
	{
		return (float)sqrt(($this->_x * $this->_x) + ($this->_y * $this->_y) + ($this->_z * $this->_z));
	}
	public function normalize()
	{
		$length = $this->magnitude();
		if ($length == 1) {
			return clone $this;
		}
		return new Vector(array('dest' => new Vertex(array('x' => $this->_x / $length, 'y' => $this->_y / $length, 'z' => $this->_z / $length))));
	}
	public function add(Vector $rhs)
	{
		return new Vector(array('dest' => new Vertex(array('x' => $this->_x + $rhs->_x, 'y' => $this->_y + $rhs->_y, 'z' => $this->_z + $rhs->_z))));
	}
	public function sub(Vector $rhs)
	{
		return new Vector(array('dest' => new Vertex(array('x' => $this->_x - $rhs->_x, 'y' => $this->_y - $rhs->_y, 'z' => $this->_z - $rhs->_z))));
	}
	public function opposite()
	{
		return new Vector(array('dest' => new Vertex(array('x' => $this->_x * -1, 'y' => $this->_y * -1, 'z' => $this->_z * -1))));
	}
	public function scalarProduct($k)
	{
		return new Vector(array('dest' => new Vertex(array('x' => $this->_x * $k, 'y' => $this->_y * $k, 'z' => $this->_z * $k))));
	}
	public function dotProduct(Vector $rhs)
	{
		return (float)(($this->_x * $rhs->_x) + ($this->_y * $rhs->_y) + ($this->_z * $rhs->_z));
	}
	public function crossProduct(Vector $rhs)
	{
		return new Vector(array('dest' => new Vertex(array(
			'x' => $this->_y * $rhs->getZ() - $this->_z * $rhs->getY(),
			'y' => $this->_z * $rhs->getX() - $this->_x * $rhs->getZ(),
			'z' => $this->_x * $rhs->getY() - $this->_y * $rhs->getX()
		))));
	}
	public function cos(Vector $rhs)
	{
		return ((($this->_x * $rhs->_x) + ($this->_y * $rhs->_y) + ($this->_z * $rhs->_z)) / sqrt((($this->_x * $this->_x) + ($this->_y * $this->_y) + ($this->_z * $this->_z)) * (($rhs->_x * $rhs->_x) + ($rhs->_y * $rhs->_y) + ($rhs->_z * $rhs->_z))));
	}
	public function getX()
	{
		return $this->_x;
	}
	public function getY()
	{
		return $this->_y;
	}
	public function getZ()
	{
		return $this->_z;
	}
	public function getW()
	{
		return $this->_w;
	}
}

?>
