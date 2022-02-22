<?php 
  
 /*								
								
								Input

**********************************************************************************************************
* Input class : user input manipulations																 *
*																										 *
* exist																			                         *
* hit 																							       	 *
* get 																									 *
*																										 *
* Input::exist('post') checks for post element availability                                              *
* Input::hit('save') checks if save button has been clicked, use if statement                            *									
* Input::get('username') gets what user entere in the username field         							 *
*																										 *
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


 class Input 
 {
 	

	/**
	*
	* @var exist
	*
	* @access public
	*
	* @param string type, post or get with default post
	*
	* @return string, post, get and file element
	*
	*/


 	public static function Exist($type = 'post')
 	{

 		switch($type)
 		{

 			case 'post':

 			    return (!empty($_POST))? true : false; // returns true if there is a value in the global post

 			break;


 			case 'get':

 			    return (!empty($_GET)) ? true : false; // returns true if there is a value in the global get 

 			break;


 			default:

 			    return false; // returns false by default

 			break;

 		}

 	}


	/**
	*
	* @var hit, if an element is clicked or available, both post and get
	*
	* @access public
	*
	* @param string item
	*
	* @return boolean
	*
	*/


 	public static function Hit($item)
 	{

 		if(isset($_POST[$item])) // return true if form has been submitted through post
 		{

 			return true;

 		}
 		elseif(isset($_GET[$item])) // return true if form has been submitted through get
 		{

 			return true;

 		}
 		else
 		{

 			return '';

 		}

 	}


   /**
	*
	* @var get, gets element available at the moment
	*
	* @access public
	*
	* @param string element
	*
	* @return string, post, get and file element
	*
	*/


 	public static function Get($element,$charcater_replace='') 
 	{

 		if( (isset($_POST[$element])) AND ($charcater_replace != ''))
 		{

			$result = $_POST[$element];
			$result = preg_replace("/'/",'`',$result);
			$result = preg_replace('/"/','``', $result);
			$result = preg_replace("/&/"," and ", $result);
			$result = preg_replace("/;/","~~", $result);

			return $result;
		
		 }

 		if(isset($_POST[$element])) // check if item exist post
 		{

 			return $_POST[$element]; // if exist return

 		}
 		elseif(isset($_GET[$element]))// check if item exist get
 		{

 			return $_GET[$element];// if exist return

 		}
 		elseif(isset($_FILES[$element]))
 		{

 			return $_FILES[$element]; 

 		}
 		else
 		{

 			return '';

 		}

 	}


 	/**
	*
	* @var destructor
	*
	* @param null
	*
	* @return boolean
	*
	*/

 	public function __destruct()
 	{
 		return true;
 	}


 }
?>