<?php 


 /*								
								
								Session

**********************************************************************************************************
* Session class : major session manipulations															 *
* start																										 *
* exist	args name of session																		     *
* keep args string name and string value 																 *
* delete args string name 																				 *
* get args string name 																					 *
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


class Session
{

   /**
	*
	*@var string 
	*@param null
	*@return object
	*
	*/


	public static function start()
	{

		return @session_start();
		
	}

	/**
	*
	*@var string 
	*@param string
	*@return boolean
	*
	*/


	public static function exist($name)
	{

		if(isset($_SESSION[$name])) // check if session name exist
		{

			return true;

		}
		else
		{

			return false;

		}

	}



	/**
	*
	*@var string 
	*@param string session_name and value
	*@return string
	* stores values in session
	*
	*/


	public static function keep($session_name,$session_value)
	{

		return $_SESSION[$session_name]=$session_value;

	}



	/**
	*
	*@var string 
	*@param string, name of the session to unset
	*@return null
	*
	*/


	public static function delete($session_name)
	{

		if(self::exist($session_name)) // checks for session name existence
		{

			unset($_SESSION[$session_name]); // if exist delete

		}

	}



	/**
	*
	*@var string 
	*@param string session name
	*@return boolean, string
	*gets session values
	*/


	public static function get($session_name)
	{

		if(isset($_SESSION[$session_name])) // existence of session check
		{

			return $_SESSION[$session_name]; // return session if exist
		
		}
		else
		{

			return false; 

		}

	}


}





?>