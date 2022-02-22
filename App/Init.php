<?php 

/*
*
* Begin a session for current user
*
*/

@session_start();

/*
*
* Load configuration file
*
*
*/

require "Config.php"; 

/*
*
* Load the loader
*
*/

require_once "{$ClassesDir}/Load.Lib.php";


/*
*
*
* Load Framework classes
*
*
*/


Load::Path($ClassesDir)->All()->Import();


/*
*
*
* Database connection
*
*
*/



/*
*  PHP Web Database connection. Find the argument variable names in the App/Config.php file
*  Unomment if desktop application
*
*/

$Database = new PDB($DatabaseHost, $DatabaseUserName, $DatabasePassword, $DatabaseName);


/*
*
*
* Routes and database schema
*
*
*/

require_once "Router.php"; 


/*
*
*
* Load application dependent classes
*
*
*/


Load::Path($ClassesDir.'/System')->All()->Import();


/*
*
*
* Database tables initialisations
* Add other tables here. Find the argument variable name in the App/Config.php file
*
*
*/


$UsersTable = $Database->Use($_UsersTable);

$PrivilegesTable = $Database->Use($_PrivilegesTable);

$AboutTable = $Database->Use($_AboutTable);

$NewsTable = $Database->Use($_NewsTable);

$CommentsTable = $Database->Use($_CommentsTable);


/*
*
* Models instantiations
*
*/

$User = new User($UsersTable);

$Privilege = new Privilege($PrivilegesTable);

$About = new About($AboutTable);

$News = new News($NewsTable);

$Comments = new Comment($CommentsTable);



/*
*
* URL Parameters
*
*/


$Query = Router::URLParameters();

/*
*
* Prevent unathenticated users from accessing the system 
* if the user tries to visit any page apart from the login page when he's not authenticated, take him back to the login page
*
*/

if( strtolower(@$Query[0]) != 'login') { if ( !User::IsLoggedIn() ) { Redirect::to($BaseURL.'/login'); } }


/*
*
* Get the loggedin user details
*
*
*/


@$Auth = $User->Get();


/*
* Load loggedin user permissions
*
*/

@$Privilege->Load($Auth);

