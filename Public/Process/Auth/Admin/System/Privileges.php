<?php 

$Title = "System | Privileges";

$Heading = "Privileges";

$Response = null;

require "App/Init.php";




/*
* Add new privilege
*
*/


if( Input::Hit("SavePrivilege") )

{

	$Response = $Privilege->Save($PrivilegesTable, $PrivilegesMenu );

}


/*
*
*  Updating privilege
*
*/

if( Input::Hit("EditPrivilege") )

{
	$Passport = md5(sha1(md5(Input::get('ID'))));

	if( $Passport == Input::get('Passport') )
	{
		$Response = $Privilege->SaveChanges( $PrivilegesTable, $PrivilegesMenu, Input::get('ID'), $_POST['Name'] );
	}
	else
	{
		$Response = ["System protected by Walls Security :)"];
	}
	
}


/*
*
* Deleting a privilege
*
*/

if( Input::Hit("DeletePrivilege") )

{
	$Passport = md5(sha1(md5(Input::get('ID'))));

	if( $Passport == Input::get('Passport') )
	{
		$Response = $Privilege->Remove( Input::get('ID') );
	}
	else
	{
		$Response = ["System protected by Walls Security :)"];
	}
	
}



$Data = $Privilege->All();

// echo "<pre>";
// print_r($Data); die();

require_once "{$IncludesDir}/UpperHeader.php"; // links

require_once "{$IncludesDir}/Header.php"; // Header links

require_once "{$AuthViewsDir}/Admin/System/Privileges.php"; // main page

require_once "{$IncludesDir}/Footer.php";

