<?php
session_start();
include_once("src/Google_Client.php");
include_once("src/contrib/Google_Oauth2Service.php");
######### edit details ##########
$clientId = '590552045672-p0j7e896aablbuo8cfupvo346asja85f.apps.googleusercontent.com'; //Google CLIENT ID
$clientSecret = 'YRJKkSEEZPFEag-jwuo0xrD1'; //Google CLIENT SECRET
$redirectUrl = 'http://localhost/CSAC';  //return url (url to script)
$homeUrl = 'http://localhost/CSAC/dashboard.php';  //return to home


##################################

$gClient = new Google_Client();
$gClient->setApplicationName('API key 1 for login test');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectUrl);

$google_oauthV2 = new Google_Oauth2Service($gClient);
?>