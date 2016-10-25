<?php
require_once 'push_notification.php';

//when admin adds new car -> new push notification to all users

function makePush(){
	$tokens = getDevices();
	
	$msg = [
			'message' => 'There is a new ad added.'
	];
	
	$message_status = send_notification($tokens, $msg);
	
	//echo $message_status;
	
}
