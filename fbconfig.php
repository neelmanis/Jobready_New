<?php
//http://www.krizna.com/general/login-with-facebook-using-php/
session_start();
// added in v4.0.0
require_once 'autoload.php';
use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\Entities\AccessToken;
use Facebook\HttpClients\FacebookCurlHttpClient;
use Facebook\HttpClients\FacebookHttpable;
require('FB_functions.php');
include_once('login_registration_inc.php');

// init app with app id and secret
// Enter your app id and secret key
FacebookSession::setDefaultApplication( '1634435253472984','c5c3dca1fd02aa57817d3efecc63d9f6' );
// login helper with redirect_uri
    $helper = new FacebookRedirectLoginHelper('http://digitalagencymumbai.com/jobready/fbconfig.php' );
try {
  $session = $helper->getSessionFromRedirect();
} catch( FacebookRequestException $ex ) {
  // When Facebook returns an error
} catch( Exception $ex ) {
  // When validation fails or other local issues
}
// see if we have a session
if ( isset( $session ) ) {
  // graph api request for user data
  $request = new FacebookRequest( $session, 'GET', '/me?locale=en_US&fields=id,name,email' );
  $response = $request->execute();
  // get response
  $graphObject = $response->getGraphObject();
     	$fbid = $graphObject->getProperty('id');              // To Get Facebook ID
 	    $fbfullname = $graphObject->getProperty('name'); // To Get Facebook full name
	    $femail = $graphObject->getProperty('email');    // To Get Facebook email ID
		
	/* ---- Session Variables -----*/
	    //$registration_id=$_SESSION['registration_id'];
	    $_SESSION['FBID'] = $fbid;           
        $_SESSION['FULLNAME'] = $fbfullname;
	    $_SESSION['EMAIL'] =  $femail;
		
    /* ---- header location after session ----*/	
	$fUser = new Users();
	$fUser->checkuser($fbid,$femail,$fbfullname); 
	
	$registration_id=$_SESSION['registration_id']; 
	$actor_type=actor_type($conn,$registration_id); 
	
			if($actor_type=='S')
				$redirect_url="personal_dashboard.php";
			elseif($actor_type=='T')
				$redirect_url="trainer_dashboard.php";
			elseif($actor_type=='F')
				$redirect_url="employer_dashboard.php";
			else 
				$redirect_url="select_actor.php";
    header("Location: ".$redirect_url);  
} else {
	$loginUrl = $helper->getLoginUrl();
	$loginUrl = $helper->getLoginUrl( array('scope' => 'email'));
 header("Location: ".$loginUrl);
} 
?>
