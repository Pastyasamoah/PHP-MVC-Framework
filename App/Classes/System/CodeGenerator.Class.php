<?php 

class CodeGenerator

{


	public static function Generate($length = 10) 
	{
	    $characters = '123456789ABCDEFGHIJKLMNPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return strtoupper($randomString);
	}


}