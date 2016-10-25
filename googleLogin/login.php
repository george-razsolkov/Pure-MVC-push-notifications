<?php
require_once '../autoload.php';
use Model\Admin;

/*
 * @author Puneet Mehta
 * @website: http://www.PHPHive.info
 * @facebook: https://www.facebook.com/pages/PHPHive/1548210492057258
 */
 
require('http.php');
require('oauth_client.php');
require('config.php');


$client = new oauth_client_class;

// set the offline access only if you need to call an API
// when the user is not present and the token may expire
$client->offline = FALSE;

$client->debug = false;
$client->debug_http = true;
$client->redirect_uri = REDIRECT_URL;

$client->client_id = CLIENT_ID;
$application_line = __LINE__;
$client->client_secret = CLIENT_SECRET;

if (strlen($client->client_id) == 0 || strlen($client->client_secret) == 0)
  die('Please go to Google APIs console page ' .
          'http://code.google.com/apis/console in the API access tab, ' .
          'create a new client ID, and in the line ' . $application_line .
          ' set the client_id to Client ID and client_secret with Client Secret. ' .
          'The callback URL must be ' . $client->redirect_uri . ' but make sure ' .
          'the domain is valid and can be resolved by a public DNS.');

/* API permissions
 */
$client->scope = SCOPE;
if (($success = $client->Initialize())) {
  if (($success = $client->Process())) {
    if (strlen($client->authorization_error)) {
      $client->error = $client->authorization_error;
      $success = false;
    } elseif (strlen($client->access_token)) {
      $success = $client->CallAPI(
              'https://www.googleapis.com/oauth2/v1/userinfo', 'GET', array(), array('FailOnAccessError' => true), $user);
    }
  }
  $success = $client->Finalize($success);
}
if ($client->exit)
  exit;
if ($success) {
	$_SESSION["user_id"] = $user->id;
  // Now check if user exist with same email ID 
  try {
  	$sql = "SELECT first_name, last_name, telephone, email, username, password, COUNT(*) AS count FROM admins WHERE email = (?)";
    $stmt = $DB->prepare($sql);
   // $stmt->bindValue(":email_id", $user->email);
    $stmt->execute(array($user->email));
    $result = $stmt->fetchAll();
    
    if ($result[0]["count"] > 0) {
      	//get info from db

    	$admin = new Admin($result[0]['username']);
    	
    	$_SESSION["email"] = $user->email;
    	$_SESSION['admin'] = $admin;   	
   
    header("location:". HOST_URL. "?controller=base&action=showBaseView");
    	
    } else {  
    	echo '
    		<div id="popup">
				<span style="font-size: 16px;">Sorry, you do not have access to this site and you will be redirect.</span>
    			<button id="myBtn" style="background-color: transparent; border-radius: 5px;">Ok</button>
			</div>
    		<script>
    			var btn = document.getElementById("myBtn");
				btn.addEventListener("click", function() {
  				document.location.href = "http://avtovoz.hopto.org/index.php?controller=login&action=logOut";
				});
    		</script>';
    	
    	//header("location:". HOST_URL. "?controller=login&action=logOut");
    }
  } catch (Exception $ex) {
    $_SESSION["e_msg"] = $ex->getMessage();
  }

  
} else {
  echo '<p>There is problem with your Google Authentication.</p>';}

exit;
?>