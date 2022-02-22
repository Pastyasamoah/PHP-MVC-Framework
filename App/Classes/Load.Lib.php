<?php 

/**
*
* Loads all files in a directory
* @package Load
* @author asamoah Pasty <pastyasamoah13@gmail.com> +233 546116102
* @version 1.0
* @since 3rd July, 2021
*
*
*/


class Load

{


	/**
	*
	* @var path. Holds the file path or directory
	* 
	* @access private
	*
	*/

	private static $Path = null;



	/**
	*
	* @var path. Holds the file names
	* 
	* @access private
	*
	*/
	
	private static $Files = array();


	/**
	*
	* @var Path
	*
	* @access public
	*
	* @param path. eg. home/user/edit
	*
	* @return object
	*
	*/
	
	public static function Path($Path)

	{

		self::$Path = rtrim($Path,'/');

		return new self;

	}


	/**
	*
	* @var Query
	*
	* @access public
	*
	* @param query string. eg. home/user/edit
	*
	* @return object
	*
	*/

	public function All($Extention = '*.*')

	{

		$Paths = glob(self::$Path.'/'.$Extention); // fetch all files

		self::$Files = array(); // empty the file array

		foreach($Paths as $Path)

		{

			self::$Files[] = @end(explode("/", $Path));

		}

		return new self;

	}



	/**
	*
	* @var Get. Return unique files
	*
	* @access public
	*
	* @param null
	*
	* @return object
	*
	*/

	public function Get()

	{

		return array_unique(self::$Files);

	}



	/**
	*
	* 
	* @var Import. Import all files from the given directory
	*
	* @access public
	*
	* @param null
	*
	* @return null
	* 
	*
	*/


	public function Import()

	{

		foreach(self::Get() as $FileName)

		{
			require_once self::$Path.'/'.$FileName;

		}

	}





}


