</div>
	<div class="em_footer container theme-showcase">
	   	<p>Baidarių nuoma Aukštaitijoje. Tel. +370 685 71268  </p>
	</div>
<script type="text/javascript">

if(document.getElementsByName ("user_id").length!=0)
{
gapi.load('auth2', function() {

gapi.auth2.init({
		client_id: '796352531135-2qdobau0mekg56599mpt1aj3q8cu3rvj.apps.googleusercontent.com',
	}).then(function(){

	auth2 = gapi.auth2.getAuthInstance();
	if(auth2.isSignedIn.get() ){
	const googleUser = auth2.currentUser.get();
	const profile = googleUser.getBasicProfile();
	
	document.getElementsByName ("user_id")[0].value= profile.getId();
	setCookie("user_id", profile.getId(), 365);
 
	}
		});
	}); 
}

function setCookie(cname, cvalue, exdays) {
  var d = new Date();
  d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
  var expires = "expires="+d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}
	</script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="dist/js/bootstrap.min.js"></script>
  </body>
</html>
