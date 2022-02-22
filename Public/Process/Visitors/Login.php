<?php 

$Title = "Visitors | Login";

$Heading = "Account Login";

$Response = null;

require "App/Init.php";


/*
*
* Prevent user from coming back to this page if he's already logged in
*
*/

if ( User::IsLoggedIn() ) { Redirect::to($BaseURL.'/'); } // forward slash is the default pagee. Set in the App/Router


/*
*
* Process user login
*
*/

if( Input::Hit( "Login" ) )

{
	$Result = $User->Login();

	if( empty($Result) ) 
	{ 
		$Response = ["Wrong credentials"]; 
	}
	else
	{
		if( is_array($Result) ) { $Response = $Result;} else{ Session::keep('Auth', $Result);Redirect::to($BaseURL.'/');}

	}

}


require_once "{$IncludesDir}/UpperHeader.php"; // links

require_once "{$IncludesDir}/AccountHeader.php"; // Header links

require_once "{$VisitorsViewsDir}/Login.php"; // main page

require_once "{$IncludesDir}/Footer.php";

