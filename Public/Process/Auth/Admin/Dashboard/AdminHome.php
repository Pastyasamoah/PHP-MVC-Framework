<?php 

$Title = "Admin | Home";

$Heading = "Dashboard";

require "App/Init.php";










require_once "{$IncludesDir}/UpperHeader.php"; // links

require_once "{$IncludesDir}/Header.php"; // Header links

require_once "{$AuthViewsDir}/Admin/Dashboard/AdminHome.php"; // main page

require_once "{$IncludesDir}/Footer.php";

