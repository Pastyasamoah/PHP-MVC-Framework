<?php 

$Title = "Dashboard | Profile";

$Heading = "My Profile";

$Response = null;

require "App/Init.php";




/*
*
*  Updating profile
*
*/

if( Input::Hit("EditProfile") )

{

	if( !empty($_FILES['ProfilePicture']['name']) )
	{
		$File = File::Use('ProfilePicture')->Allow(['jpg','png'])->Get();
		$FileName = CodeGenerator::Generate(6).'_'.implode("_", explode(" ", $File['name']) ) ;
		$File = File::Use('ProfilePicture')->Allow(['jpg','png'])->Rename($FileName)->Get();
		$Response = $User->SaveProfileChanges( $UsersTable, $FileName );
		if(!is_array($Response) )
		{
			$d = File::Use('ProfilePicture')->Allow(['jpg','png'])->Rename($FileName)->Move($ImagesDir.'/UsersImages/');
		}

	}
	else
	{

		$Response = $User->SaveProfileChanges( $UsersTable );
	}
	
		
}




$Data = $User->GetById(Session::get('Auth')->UserID);



require_once "{$IncludesDir}/UpperHeader.php"; // links

require_once "{$IncludesDir}/Header.php"; // Header links

require_once "{$AuthViewsDir}/Admin/Dashboard/Profile.php"; // main page

require_once "{$IncludesDir}/Footer.php";

