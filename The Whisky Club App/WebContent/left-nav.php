<?php
/*
UserCake Version: 2.0.2
http://usercake.com
*/

if (!securePage($_SERVER['PHP_SELF'])){die();}

//Links for logged in user
if(isUserLoggedIn()) {
	echo "
	<div class='dropdown'>
	    <button class='btn btn-primary dropdown-toggle' type='button' id='menu1' data-toggle='dropdown'>Accout Options
	    <span class='caret'></span></button>
	    <ul class='dropdown-menu' role='menu' aria-labelledby='menu1'>
			<li role='presentation'><a role='menuitem' tabindex='-1' href='user_settings.php'>User Settings</a></li>
	";
	
	//Links for permission level 2 (default admin)
	if ($loggedInUser->checkPermission(array(2))){
	echo "
		    <li role='presentation' class='dropdown-header'>Admin Tools</li>
			<li><a href='admin_configuration.php'>Admin Configuration</a></li>
			<li><a href='admin_users.php'>Admin Users</a></li>
			<li><a href='admin_permissions.php'>Admin Permissions</a></li>
			<li><a href='admin_pages.php'>Admin Pages</a></li>
	";
	}
	echo"
			<li role='presentation' class='divider'></li>
		    <li role='presentation'><a role='menuitem' tabindex='-1' href='logout.php'>Logout</a></li>
		</ul>
	</div>
	";
} 
//Links for users not logged in
else {
	echo "
	<ul class='nav nav-pills nav-stacked'>
		<li><a href='index.php'>Home</a></li>
		<li><a href='login.php'>Login</a></li>
		<li><a href='register.php'>Register</a></li>
		<li><a href='forgot-password.php'>Forgot Password</a></li>";
		if ($emailActivation)
		{
		echo "<li><a href='resend-activation.php'>Resend Activation Email</a></li>";
		}
	echo "</ul>";
}
?>