<?php 

$Title = "Logout";

require "App/Init.php";


/*
*
* Remove the authentication session variable
*
*/

Session::delete('Auth');


/*
* Refresh the page
*
*/

Redirect::to($BaseURL.'/');