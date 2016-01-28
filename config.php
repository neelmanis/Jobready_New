<?php
session_start();
include_once("src/Google_Client.php");
include_once("src/contrib/Google_Oauth2Service.php");
######### edit details ##########
/*
$clientId = '514307204466-mhjsvfgqu8aq1hsbnakc58q2b22ndmnr.apps.googleusercontent.com'; //Google CLIENT ID
$clientSecret = 'AddMwZbrxKOyXGuo9uIJTUWd'; //Google CLIENT SECRET
$redirectUrl = 'http://localhost:8080/jobready/select_actor.php';  //return url (url to script)
$homeUrl = 'http://localhost:8080/jobready';  //return to home
*/
$clientId = '758503365902-4cklr59tcdf66fglokq2k9bckpg1se03.apps.googleusercontent.com'; //Google CLIENT ID
$clientSecret = '5WTrSO8nI3074MpbGnHGatIW'; //Google CLIENT SECRET
$redirectUrl = 'http://digitalagencymumbai.com/jobready/select_actor.php';  //return url (url to script)
$homeUrl = 'http://digitalagencymumbai.com/jobready';  //return to home

##################################

$gClient = new Google_Client();
$gClient->setApplicationName('Login to Google.com');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectUrl);

$google_oauthV2 = new Google_Oauth2Service($gClient);
?>