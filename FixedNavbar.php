
<!DOCTYPE html>
<?php

   header('Content-Type: text/html; charset=utf-8');
   session_start() ;
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <script                         src="https://apis.google.com/js/platform.js?onload=onLoadCallback" async defer></script>
    <script type="text/javascript"  src="https://apis.google.com/js/api:client.js?onLoad=onGoogleScriptLoaded"></script>
    <meta name="google-signin-client_id" content="796352531135-2qdobau0mekg56599mpt1aj3q8cu3rvj.apps.googleusercontent.com">
    <!--https://developers.google.com/identity/sign-in/web/sign-in-->
    <meta name="google-signin-cookiepolicy" content="single_host_origin" />
    <meta name="google-signin-requestvisibleactions" content="https://schema.org/AddAction" />
    <meta name="google-signin-scope" content="https://www.googleapis.com/auth/plus.login" />

    <link rel="icon" href="../../favicon.ico">

    <title>Baidares</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link href="elenosStilius.css" rel="stylesheet" type="text/css">
		 
  </head>

  <body class="em_body" > 
 <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse em_FixedNavbar container ">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Baidares</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/baidares"> <img src="images/logotipas.png" alt="logotipas"  ></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav" style="width: 777px; ">
            <li><a href="marsrutai.php" class ="em_text_white"><strong>Maršrutai / Užsakyti plaukimą </strong></a></li>
            <li><a href="kontaktai.php"><strong>Kontaktai</strong></a></li>
            <?php
            include  'db_functions.php';// ikrauname reikalingas DB funkcijas

            //$usreIinfo=get_klientas_info($userId);
            if($_COOKIE['user_id'] !="")
            {
              $usreIinfo=get_klientas_info($_COOKIE['user_id'] );
            }
            if($usreIinfo[0]==null)
            {
             //   return "Nerado kiento"; 
            }
            $usreIinfo[0]["isAdmin"]=$usreIinfo[0]["isAdmin"]!=1?0:1;
            if($usreIinfo[0]["isAdmin"]==1)
            {
            ?>
			      <li class="em_floate"><a href="uzsakymai_admin.php"><strong>Užsakymų peržiūra </strong></a></li>
            <?php
            }
            else
            {
            ?>
            <li class="em_floate"><a href="uzsakymai.php"><strong>Užsakymų peržiūra </strong></a></li>
            <?php
            }
            ?>
            <li class="em_floate"  id="LogIn" ><div class="g-signin2" data-onsuccess="onSignIn" onclick="signIn();"></div></li>
            <li class="em_floate"><a id="LogOut" href="#" onclick="signOut();" data-prompt="select_account">Sign out</a> </li>
            <li class="em_floate"><img id="user_img"  style="margin: 11px; size: 20px; height: 60px;" src="" alt="Italian Trulli"></li>
            
<script>
window.onGoogleScriptLoad = () => {
  console.log('The google script has really loaded, cool!');

}
function tryIt(is){
gapi.load('auth2', function() {

gapi.auth2.init({

  client_id: '796352531135-2qdobau0mekg56599mpt1aj3q8cu3rvj.apps.googleusercontent.com'
  //,    prompt: 'select_account'

}).then(function(){

  auth2 = gapi.auth2.getAuthInstance();

  if(auth2.isSignedIn.get()||is==1)
  {
  
    document.getElementById("LogIn").style.visibility = "hidden";
    document.getElementById("LogIn").style.width="0px";
    document.getElementById("LogOut").style.visibility = "";
    document.getElementById("user_img").style.visibility = "";
    if(auth2.isSignedIn.get() )
    {
      const googleUser = auth2.currentUser.get();
      const profile = googleUser.getBasicProfile();
      setCookie("user_id", profile.getId(), 365);
      document.getElementById("user_img").alt=profile.getName();
      document.getElementById("user_img").src=profile.getImageUrl();
    }
  }
  else
  {
    document.getElementById("LogIn").style.visibility = "";
    document.getElementById("LogOut").style.visibility = "hidden";
    document.getElementById("user_img").style.visibility = "hidden";
  }
});
});

}

tryIt(0);

function signIn() {
  console.log('ID:');
  const googleUser = gapi.auth2.getAuthInstance().currentUser.get();
  const profile = googleUser.getBasicProfile();
 // tryIt(1);
  
}
function onSignIn(googleUser) {
  var profile = googleUser.getBasicProfile();
  setCookie("user_id", profile.getId(), 365);
  //console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead. 
  document.getElementById("user_img").alt=profile.getName();
  document.getElementById("user_img").src=profile.getImageUrl();
  //location.reload();
}

function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
    setCookie("user_id", "", 365);
    tryIt(0);
    location.reload();
    });
  }
</script>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>