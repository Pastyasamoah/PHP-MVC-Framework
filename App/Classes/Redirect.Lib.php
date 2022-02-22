<?php 

ob_start();
 /*								
								
								Redirect

**********************************************************************************************************
* Redirect class : redirections		                 													 *
* to args url 																							 *
**********************************************************************************************************


*/


/**
*
*
* @package pasty_classes
* @author asamoah Pasty <pastyasamoah13@gmail.com>
* @version 0.1
* @since 18th May, 2017
*
*
*/



class Redirect
{


	/**
	*
	*@var string 
	*@param string url
	*@return null
	*
	*/

	public static function to($url)
	{
		ob_start();
		header("location:{$url}"); // redirection

	}

	public function __destruct()
	{
		return null;
	}


}





?>