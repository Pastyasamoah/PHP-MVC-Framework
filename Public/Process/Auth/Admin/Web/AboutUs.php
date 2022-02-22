<?php 

$Title = "Web | About us";

$Heading = "About Us";

$Response = null;

require "App/Init.php";



/*
*
* Set the interaction form
*
*/


if( Input::Hit('Interact') )

{
	Session::Keep('Interact', Input::get('Interact'));
}


/*
* Add and edit about us information
*
*/


if( Input::Hit("SaveAbout") )

{

	if( !empty($_FILES['AttachedDocument']['name']) )
	{

		$AllowedFormats = ['jpg','png','pdf','docx','doc'];
		$File = File::Use('AttachedDocument')->Allow($AllowedFormats)->Get();
		$FileName = CodeGenerator::Generate(6).'_'.implode("_", explode(" ", $File['name']) ) ;
		$File = File::Use('AttachedDocument')->Allow($AllowedFormats)->Rename($FileName)->Get();
		$Response = $About->SaveAbout($FileName);

		if(!is_array($Response) )
		{
			$d = File::Use('AttachedDocument')->Allow($AllowedFormats)->Rename($FileName)->Move($ImagesDir.'/WebImages/');
		}

	}
	else
	{

		$Response = $About->SaveAbout();

	}
	
	

}



/*
*
*  Save board member
*
*/

if( Input::Hit("SaveBoardMember") )

{

	if( !empty($_FILES['BoardMemberProfilePicture']['name']) )
	{

		$AllowedFormats = ['jpg','png'];
		$File = File::Use('BoardMemberProfilePicture')->Allow($AllowedFormats)->Get();
		$FileName = CodeGenerator::Generate(6).'_'.implode("_", explode(" ", $File['name']) ) ;
		$File = File::Use('BoardMemberProfilePicture')->Allow($AllowedFormats)->Rename($FileName)->Get();
		$Response = $About->SaveBoard($AboutTable, $FileName);

		if(!is_array($Response) )
		{
			$d = File::Use('BoardMemberProfilePicture')->Allow($AllowedFormats)->Rename($FileName)->Move($ImagesDir.'/WebImages/');
		}

	}
	else
	{
		$Response = $About->SaveBoard($AboutTable);
	}
	
}


/*
* update board member
*/

if( Input::Hit("EditBoardMember") )

{

	if( Input::get('Passport') == md5(sha1(md5(Input::get('ID')))) )
	{
		if( !empty($_FILES['BoardMemberProfilePicture']['name']) )
		{

			$AllowedFormats = ['jpg','png'];
			$File = File::Use('BoardMemberProfilePicture')->Allow($AllowedFormats)->Get();
			$FileName = CodeGenerator::Generate(6).'_'.implode("_", explode(" ", $File['name']) ) ;
			$File = File::Use('BoardMemberProfilePicture')->Allow($AllowedFormats)->Rename($FileName)->Get();
			$Response = $About->SaveBoardChanges( $AboutTable, Input::get('ID') , $FileName);

			if(!is_array($Response) )
			{
				$d = File::Use('BoardMemberProfilePicture')->Allow($AllowedFormats)->Rename($FileName)->Move($ImagesDir.'/WebImages/');
			}

		}
		else
		{
			$Response = $About->SaveBoardChanges( $AboutTable, Input::get('ID') );
		}
		

	}
	else
	{
		$Response = ["System protected by Walls Security :)"];
	}
	
}


/*
* Delete board member
*
*/


if(Input::hit('DeleteBoardMember'))

{

	$Passport = md5(sha1(md5(Input::get('ID'))));

	if( $Passport == Input::get('Passport') )
	{
		$Response = $About->Remove( Input::get('ID') );
	}
	else
	{
		$Response = ["System protected by Walls Security :)"];
	}


}





$Data = $About->All();

$AboutData = [];

$BoardData = [];

foreach($Data as $Index => $Output)
{
	if($Output->Category == 'A'){ $AboutData = $Output; unset($Data[$Index]); $BoardData = $Data;}else{
		$BoardData = $Data;
	} 
}

// echo "<pre>";

// print_r($BoardData);die();
require_once "{$IncludesDir}/UpperHeader.php"; // links

require_once "{$IncludesDir}/Header.php"; // Header links

require_once "{$AuthViewsDir}/Admin/Web/AboutUs.php"; // main page

require_once "{$IncludesDir}/Footer.php";

