<?php 

$Title = "System | Users";

$Heading = "System Users";

$Response = null;

require "App/Init.php";




/*
* Add new user
*
*/


if( Input::Hit("SaveUser") )

{
	$Passport = md5(sha1(md5(Input::get('ID'))));

	if( $Passport == Input::get('Passport') )
	{
		$Response = $User->Save($UsersTable);
	}
	else
	{
		$Response = ["System protected by Walls Security :)"];
	}

}


/*
*
*  Updating User
*
*/

if( Input::Hit("EditUser") )

{
	$Passport = md5(sha1(md5(Input::get('ID'))));
	$User_ = md5(sha1(md5(Input::get('User'))));

	if( $Passport == Input::get('Passport') && $User_ == Input::get('_User') )
	{
		$Response = $User->SaveChanges( $UsersTable, Input::get('User') );
	}
	else
	{
		$Response = ["System protected by Walls Security :)"];
	}
	
}



$PrivilegesResult = $Privilege->All();

$Data = $User->All();


require_once "{$IncludesDir}/UpperHeader.php"; // links

require_once "{$IncludesDir}/Header.php"; // Header links

require_once "{$AuthViewsDir}/Admin/System/Users.php"; // main page

require_once "{$IncludesDir}/Footer.php";

