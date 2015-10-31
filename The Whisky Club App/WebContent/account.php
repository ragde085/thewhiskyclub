<?php
/*
UserCake Version: 2.0.2
http://usercake.com
*/

require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}
require_once("models/header.php");

echo "
<body>
<div class='container' id='wrapper'>
	<h2>Account</h2>
	<div class='row' id='left-nav'>
		<div class='col-xs-4 col-sm-3 col-md-2'>
		";
include("left-nav.php");
echo "
	</div>
	<div class='col-sm-6 col-md-8'>
		Hey, $loggedInUser->displayname. This is an example secure page designed to demonstrate some of the basic features of UserCake. Just so you know, your title at the moment is $loggedInUser->title, and that can be changed in the admin panel. You registered this account on " . date("M d, Y", $loggedInUser->signupTimeStamp()) . ".
	</div>
	</div><!-- row -->
</div>
</body>
</html>";

?>
