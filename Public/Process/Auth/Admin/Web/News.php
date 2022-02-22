<?php 

$Title = "Web | News";

$Heading = "News";

$Response = null;

require "App/Init.php";



/*
* Add and edit about us information
*
*/


if( Input::Hit("SaveNews") )

{
	if( !empty($_FILES['Attachment']['name']) )
	{
		$AllowedFormats = ['jpg','png'];
		$File = File::Use('Attachment')->Allow($AllowedFormats)->Get();
		$FileName = CodeGenerator::Generate(6).'_'.implode("_", explode(" ", $File['name']) ) ;
		$File = File::Use('Attachment')->Allow($AllowedFormats)->Rename($FileName)->Get();

		$Response = $News->SaveNews($FileName);

		if(!is_array($Response) )
		{
			$d = File::Use('Attachment')->Allow($AllowedFormats)->Rename($FileName)->Move($ImagesDir.'/WebImages/');
		}

	}
	else
	{

		$Response = $News->SaveNews();

	}
	
	

}



/*
* update news
*/

if( Input::Hit("EditNews") )

{

	if( Input::get('Passport') == md5(sha1(md5(Input::get('ID')))) )
	{
		if( !empty($_FILES['Attachment']['name']) )
		{

			$AllowedFormats = ['jpg','png'];
			$File = File::Use('Attachment')->Allow($AllowedFormats)->Get();
			$FileName = CodeGenerator::Generate(6).'_'.implode("_", explode(" ", $File['name']) ) ;
			$File = File::Use('Attachment')->Allow($AllowedFormats)->Rename($FileName)->Get();
			$Response = $News->SaveNewsChanges( Input::get('ID') , $FileName);

			if(!is_array($Response) )
			{
				$d = File::Use('Attachment')->Allow($AllowedFormats)->Rename($FileName)->Move($ImagesDir.'/WebImages/');
			}

		}
		else
		{
			$Response = $News->SaveNewsChanges( Input::get('ID') );
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


if(Input::hit('DeleteNews'))

{

	$Passport = md5(sha1(md5(Input::get('ID'))));

	if( $Passport == Input::get('Passport') )
	{
		$Response = $News->Remove( Input::get('ID') );
	}
	else
	{
		$Response = ["System protected by Walls Security :)"];
	}


}




$Data = $News->All();


require_once "{$IncludesDir}/UpperHeader.php"; // links

require_once "{$IncludesDir}/Header.php"; // Header links

require_once "{$AuthViewsDir}/Admin/Web/News.php"; // main page

require_once "{$IncludesDir}/Footer.php";

