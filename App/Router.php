<?php

/*
*
* Register all routes here
*
*
* Query - query string
* Use - file folder or location. Make changes to it in the App/Config.php file
* AsDefault - sets the default page. eg. login/home
* Call - invoke the fil
* Boot - runs the script
*
*
* 
*/

/*
*
* route to the dashboard folder
*
*/

Router::Query('auth/dashboard/home')->Use($AuthProcessDir)->AsDefault()->Call('Admin/Dashboard/AdminHome.php');
Router::Query('auth/dashboard/profile')->Use($AuthProcessDir)->Call('Admin/Dashboard/Profile.php');

/*
*
* routes to authentications
*
*/

Router::Query('login')->Use($VisitorsProcessDir)->Call('Login.php');
Router::Query('logout')->Use($AuthProcessDir)->Call('Logout.php');


/*
*
* routes to the web folder
*
*/

Router::Query('auth/web/about_us')->Use($AuthProcessDir)->Call('Admin/Web/AboutUs.php');
Router::Query('auth/web/news')->Use($AuthProcessDir)->Call('Admin/Web/News.php');

/*
*
* routes to the system folder
*
*/

Router::Query('auth/system/privileges')->Use($AuthProcessDir)->Call('Admin/System/Privileges.php');
Router::Query('auth/system/users')->Use($AuthProcessDir)->Call('Admin/System/Users.php');

/*
*
*
* Boot the route. Comment if not want to view
*
*
*/

Router::Boot();



		   
