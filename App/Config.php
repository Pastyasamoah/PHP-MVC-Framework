<?php

/*
*
* Default time zone
*
*
*/

date_default_timezone_set("Africa/Accra");



/*
*
* Application Details
*
*/

$AppName = "App Name";

$Copyright = "&copy year | app name";

$BaseURL = "?";

//$FetchLimit = 1;


/*
*
* Database Connection Details
*
*/

$DatabaseHost = "127.0.0.1";

$DatabaseUserName = "root";

$DatabaseName = "test";

$DatabasePassword = "";



/*
*
* Database Table Names
*
*/

$_UsersTable = "users";

$_PrivilegesTable = "privileges";

$_AboutTable = "about_us";

$_NewsTable = "news";

$_CommentsTable = "comments";



/*
*
* Folder Directories. Kindly register new directories here
* Classes Directories
*
*/


$ClassesDir = "App/Classes";



/*
*
* Assets Folder Directories
*
*/


$LibrariesDir = "Assets/Dependencies/Libraries";

$CSSDir = "Assets/Dependencies/SystemCSS";

$JSDir = "Assets/Dependencies/SystemJS";

$DocumentsDir = "Assets/Media/Documents";

$ImagesDir = "Assets/Media/Images";

$VideosDir = "Assets/Media/Videos";



/*
*
* Processors Folder Directories
*
*/

$AuthProcessDir = "Public/Process/Auth/";

$VisitorsProcessDir = "Public/Process/Visitors/";


/*
*
* Views Folder Directories
*
*/

$VisitorsViewsDir = "Public/Views/Visitors";

$AuthViewsDir = "Public/Views/Auth";



/*
*
* Includes Folder Directories
*
*/


$IncludesDir = "Public/Views/Includes";





/*
*
* Permission tab names
*
*/

$Mentors = "Mentors";
$Mentees = "Mentees";
$Members = "Members";
$Visitors = "Visitors";
$_News = "News";
$Scholarships = "Scholarships";
$Galleries = "Galleries";
$Events = "Events";
$AboutUs = "About Us";
$System = "System";

/*
*
* Commons Menu Arrays
*
*/


$PrivilegesMenu = [

	$Mentors,
	$Mentees,
	$Members,
	$Visitors,
	$_News,
	$Scholarships,
	$Galleries,
	$Events,
	$AboutUs,
	$System

];


$PrivilegesCode = [

"V"=>"View",
"VA"=>"View & Add",
"VAE"=>"View & Add & Edit",
"VAED"=>"View & Add & Edit & Delete",
"Block"=>"Block"

];



$WebMenu = [

"auth/web/news"=>$_News,
"auth/web/scholarships"=>$Scholarships,
"auth/web/galleries"=>$Galleries,
"auth/web/events"=>$Events,
"auth/web/about_us"=>$AboutUs

];




			   
