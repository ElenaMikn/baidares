
<!DOCTYPE html>
<?php

   header('Content-Type: text/html; charset=utf-8');
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <meta name="google-signin-client_id" content="796352531135-2qdobau0mekg56599mpt1aj3q8cu3rvj.apps.googleusercontent.com">


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
    <nav class="navbar navbar-inverse navbar-fixed-top em_FixedNavbar ">
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
          <ul class="nav navbar-nav" style="width: 650px; ">
            <li><a href="marsrutai.php" class ="em_text_white"><strong>Maršrutai / Užsakyti plaukimą </strong></a></li>
            <li><a href="kontaktai.php"><strong>Kontaktai</strong></a></li>
			      <li class="em_floate"><a href="uzsakymai.php"><strong>Užsakymų peržiūra </strong></a></li>
            <li id="LogIn" class="em_floate"><div class="g-signin2" data-onsuccess="onSignIn" onclick="signIn();"></div></li>
            <li id="LogOut"> <a href="#" onclick="signOut();">Sign out</a>
<script>
function signIn() {
  const googleUser = gapi.auth2.getAuthInstance().currentUser.get();
  const profile = googleUser.getBasicProfile();
  console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
  console.log('Name: ' + profile.getName());
  console.log('Image URL: ' + profile.getImageUrl());
  console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.

}
var onSuccess = function(user) {
    console.log('ssigned in as ' + user.getBasicProfile().getName());
 };
  function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
      console.log('User signed out.');
    });
  }
</script></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>