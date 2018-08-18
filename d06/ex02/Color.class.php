<?php

class Color
{
	public $red, $green, $blue;
	public static $verbose = False;
	public static function doc()
	{
		return file_get_contents("Color.doc.txt");
	}
	public function __toString()
	{
		return sprintf("Color( red: %3d, green: %3d, blue: %3d )", $this->red, $this->green, $this->blue);
	}
	public function __construct($colorArray)
	{
		if (isset($colorArray['rgb']))
		{
			$this->red = intval($colorArray['rgb']) / (256 * 256) % 256;
			$this->green = intval($colorArray['rgb']) / 256 % 256;
			$this->blue = intval($colorArray['rgb']) % 256;
		}
		else if (isset($colorArray['red']) && isset($colorArray['green']) && isset($colorArray['blue']))
		{
			$this->red = intval($colorArray['red']);
			$this->green = intval($colorArray['green']);
			$this->blue = intval($colorArray['blue']);
		}
		if (self::$verbose)
			printf("Color( red: %3d, green: %3d, blue: %3d ) constructed.\n", $this->red, $this->green, $this->blue);
	}
	public function add($new)
	{
		return (new Color(array('red' => $this->red + $new->red, 'green' => $this->green + $new->green, 'blue' => $this->blue + $new->blue)));
	}
	public function sub($new)
	{
		return (new Color(array('red' => $this->red - $new->red, 'green' => $this->green - $new->green, 'blue' => $this->blue - $new->blue)));
	}
	public function mult($mult)
	{
		return (new Color(array('red' => $this->red * $mult, 'green' => $this->green * $mult, 'blue' => $this->blue * $mult)));
	}
	public function __destruct()
	{
		if (self::$verbose)
			printf("Color( red: %3d, green: %3d, blue: %3d ) desstructed.\n", $this->red, $this->green, $this->blue);
	}
}
?>
