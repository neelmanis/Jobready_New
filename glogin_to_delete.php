<?php
include_once("config.php");
include_once("google_functions.php");

//print_r($_GET);die;

if(isset($_REQUEST['code'])){
	$gClient->authenticate();
	$_SESSION['token'] = $gClient->getAccessToken();
	header('Location: ' . filter_var($redirect_url, FILTER_SANITIZE_URL));
}

if (isset($_SESSION['token'])) {
	$gClient->setAccessToken($_SESSION['token']);
}

if ($gClient->getAccessToken()) {
	$userProfile = $google_oauthV2->userinfo->get();
	//DB Insert
	$gUser = new Users();
	$gUser->checkUser($userProfile['id'],$userProfile['given_name'],$userProfile['email'],$userProfile['link']);
	$_SESSION['google_data'] = $userProfile; // Storing Google User Data in Session
	//header("location: account.php");
	$_SESSION['token'] = $gClient->getAccessToken();
} else {
	$authUrl = $gClient->createAuthUrl();
	echo '<a href="'.$authUrl.'"></a>';
}



?>