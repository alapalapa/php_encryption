<?php

class Crypt_string
{
	protected $replace = array('.', '$~', '¡~%', '#', '?', '@!', '9*', '´}', '|<', '_', '[', '¸','+', '"', '(', '(', 'x*', ',', ':', ';');
	protected $search = array(' ', 'a', 'e', 'i', 'o', 'u', 's', 'r', 'n', 'd', 'p', 'l', 'A', 'E', 'I', 'O', 'U', 'S', 'R', 'N', 'D', 'P', 'L');

	public function encrypting($cadena)
	{
		$result = $this->replace($cadena);
		
		$string = $this->invert($result);

		return $result.$string;
	}

	public function replace($cadena)
	{
		return str_replace($this->search, $this->replace, $cadena);
	}

	public function invert($cadena)
	{
		$newCad = '';

		for($i=strlen($cadena); $i>0; $i--) {
        	$newCad .= substr($cadena,$i-1,1);
		}

    	return $newCad;
	}

}


?>