<?php

error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE);
ob_start();
if(!isset($_SESSION)){
    session_start();
}

define('PROJECT_NAME', 'AvtovozBG');

define('DB_DRIVER', 'mysql');
define('DB_SERVER', 'localhost');
define('DB_SERVER_USERNAME', 'root');
define('DB_SERVER_PASSWORD', '2224');
define('DB_DATABASE', 'prevozvach');

$dboptions = array(
    PDO::ATTR_PERSISTENT => FALSE,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
);
try {
  $DB = new PDO(DB_DRIVER . ':host=' . DB_SERVER . ';dbname=' . DB_DATABASE, DB_SERVER_USERNAME, DB_SERVER_PASSWORD, $dboptions);
} catch (Exception $ex) {
  echo $ex->getMessage();
  die;
}
define("HOST_URL", "http://avtovoz.hopto.org/");

/* make sure the url end with a trailing slash */
define("SITE_URL", "http://avtovoz.hopto.org/googleLogin/");
/* the page where you will be redirected for authorzation */
define("REDIRECT_URL", SITE_URL."login.php");

/* * ***** Google related activities start ** */
define("CLIENT_ID", "27443114197-otsfs6ra179qehq0mn2jf0ocbfpjihrs.apps.googleusercontent.com"); 
define("CLIENT_SECRET", "TWpvH_0nRlXi7Q8Y3ePD9e2h");

/* permission */
define("SCOPE", 'https://www.googleapis.com/auth/userinfo.email '.
		'https://www.googleapis.com/auth/userinfo.profile' );



/* logout both from google and your site **/
define("LOGOUT_URL", "https://www.google.com/accounts/Logout?continue=https://appengine.google.com/_ah/logout?continue=". urlencode(SITE_URL."logout.php"));
/* * ***** Google related activities end ** */
?>