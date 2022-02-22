<?php 

/**
*
* Performing routing
* @package Router
* @author asamoah Pasty <pastyasamoah13@gmail.com> +233 546116102
* @version 1.1
* @since 3rd July, 2021
*
*
*/



class Router

{

	/**
	*
	* @var query. Holds the query string
	* 
	* @access private
	*
	*/


	private static $Query = null;

	/**
	*
	* @var directory. Holds the current directory (folder paths)
	* 
	* @access private
	*
	*/


	private static $Directory = null;

	/**
	*
	* @var file. Holds the current file name
	* 
	* @access private
	*
	*/


	private static $File = null;

	/**
	*
	* @var default. holds the default path
	* 
	* @access private
	*
	*/


	private static $Default = 'home';

	/**
	*
	* @var query string file match. matches query strings to files
	* 
	* @access private
	*
	*/


	private static $QueryStringFileMatch = array();


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

	public static function Query($QueryString)

	{

		self::$Query = rtrim( ltrim($QueryString,"/"), '/');

		return new self;

	}


	/**
	*
	* @var Use
	*
	* @access public
	*
	* @param directory. folder within which file reside. eg. folder1/folder2/folder3
	*
	* @return object
	*
	*/

	public function Use($Directory="")

	{

		self::$Directory = rtrim( ltrim($Directory,"/"), '/');

		return new self;

	}


	/**
	*
	* @var As default. Sets the default path. eg. home
	*
	* @access public
	*
	* @param null
	*
	* @return object
	*
	*/


	public function AsDefault()

	{

		self::$Default = self::$Query;
		return new self;

	}

	/**
	*
	* @var Call
	*
	* @access public
	*
	* @param file name. eg. index.php
	*
	* @return null
	*
	*/

	public function Call($FileName)

	{

		self::$File = $FileName;
		self::CreateFileMatch();

	}


	/**
	*
	* @var create file match. Matches each query string to a specific file name
	*
	* @access public
	*
	* @param null
	*
	* @return null
	*
	*/

	private static function CreateFileMatch()

	{

		self::$QueryStringFileMatch[self::$Query] = self::$Directory==""? self::$File : self::$Directory.'/'.self::$File;

	}


	/**
	*
	* @var Boot. Runs the script
	*
	* @access public
	*
	* @param null
	*
	* @return null
	*
	*/

	public static function Boot()

	{
		
		return self::View();

	}


	/**
	*
	* @var string
	*
	* @access public
	*
	* @param null
	*
	* @return string : url
	*
	*/

	public static function GetURL()
	{
		// request: http://localhost/router/Router.php?username=pasty
		// returns: /router/Router.php?username=pasty

		return $_SERVER['REQUEST_URI']; // gets the url

	}


	/**
	*
	* @var string
	*
	* @access public
	*
	* @param null
	*
	* @return string : url
	*
	*/

	public static function PrepareURL()
	{	

		// url contains ?
		// perhaps it has been cleaned by user
		// request uri: http://localhost/router/Router.php?username=pasty
		// returns: Array ( [0] => /router/Router.php [1] => username=pasty )

		if(preg_match('/[?]/',self::GetURL()))
		{
			return explode('?',self::GetURL());
		}

		return array(); // landing Page
		

	}


	/**
	*
	* @var string
	*
	* @access public
	*
	* @param null
	*
	* @return int : number of args in the url
	*
	*/

	public static function CountURL()
	{
		// request: http://localhost/router/Router.php?username=pasty
		// return: 2

		return count(self::PrepareURL()); // gets the number of parameters

	}



	/**
	*
	* @var string
	*
	* @access public
	*
	* @param null
	*
	* @return array : array of keywords
	*
	*/

	public static function URLParameters()
	{

		// eg somePage.com?/Page-parameter1-parameter2-parameter3/
		// eg somPage.com?/teachers-kwame-agric || teachers Page, find kwame who teaches at agric
		// request: http://localhost/router/Router.php?/user/info
		// return: Array ( [0] => user [1] => info )

		// check if its the landing Page and user has not cleaned / or ?

		if(self::CountURL() > 0)
		{

			$Page_and_keywords = ltrim(self::PrepareURL()[self::CountURL()-1] , '/'); //remove the beginning /

			if(preg_match('/[-]/', $Page_and_keywords)) // parameters seperated by dash -
			{

				return explode('-',$Page_and_keywords); 

			}

			return explode('/',$Page_and_keywords); // parameters separated by forward slash /

		}

		return null; // landing Page
		
		// eg ['teachers','agric','head']
	}




	/**
	*
	* @var string
	*
	* @access public
	*
	* @param null
	*
	* @return string : Path to display
	*
	*/



	public static function Path()

	{
		// request: http://localhost/router/Router.php?/user/info
		// return: user/info

		if(self::CountURL() > 0)
		{

			for($i = count(self::URLParameters()); $i >= 0; $i--)

			{
				$Parameters = array_slice(self::URLParameters(), 0, $i);

				$URI = trim(implode("/", $Parameters),"/");

				if(array_key_exists($URI, self::$QueryStringFileMatch))
				{
					return $URI;
				}
				
			}

		}

		if (is_array(self::URLParameters()))
		{
			return implode("/", self::URLParameters());
		}
		
		return @rtrim(self::URLParameters(),'/');

	}




	/**
	*
	* @var string
	*
	* @access public
	*
	* @param string : Page we want to require
	*
	* @return null
	*
	*/

	public static function Render($Page)
	{

		require_once $Page;

	}



	/**
	*
	* @var string
	*
	* @access public
	*
	* @param null
	*
	* @return boolean
	*
	*/

	public static function IsNewPath()
	{
		// if is array, then its empty.
		// if Page is empty, the View landing Page

		if(is_array(self::Path()) || (self::Path()=='') )
		{
			return 0;
		}

		return 1;
		
	}


	/**
	*
	* @var string
	*
	* @access public
	*
	* @param null
	*
	* @return null
	*
	*/

	public static function View()
	{	

		if(self::IsNewPath()==1)
		{
			
			if( array_key_exists(self::Path(),self::$QueryStringFileMatch) )
			{

				self::Render(self::$QueryStringFileMatch[self::Path()]);

			}
		
			else
			{

				self::Render(self::$QueryStringFileMatch['unknown']);

			}

		}
		else
		{

			self::Render(self::$QueryStringFileMatch[self::$Default]);

		}
		
	}



}


