<?php
include ("init.php");
require_once __DIR__ . '/include/facebook-php-sdk-v4/src/Facebook/autoload.php';

$fb = new Facebook\Facebook([
	'app_id' => '1553769901591573', // Replace {app-id} with your app id
	'app_secret' => '5e9b6d3409eb0b76c7f208b32cfd264c',
	'default_graph_version' => 'v2.2',
]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl('http://victorassis.com.br/olimpiadas/login-fb-callback.php', $permissions);

header("Location:" . $loginUrl);
?>