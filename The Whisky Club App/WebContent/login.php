<?php
/*
 * UserCake Version: 2.0.2
 * http://usercake.com
 */
require_once ("models/config.php");
require_once ("models/header.php");
if (! securePage ( $_SERVER ['PHP_SELF'] )) {
	die ();
}
// Prevent the user visiting the logged in page if he/she is already logged in
if (isUserLoggedIn ()) {
	header ( "Location: account.php" );
	die ();
}

// Forms posted
if (! empty ( $_POST )) {
	$errors = array ();
	$username = sanitize ( trim ( $_POST ["username"] ) );
	$password = trim ( $_POST ["password"] );
	
	// Perform some validation
	// Feel free to edit / change as required
	if ($username == "") {
		$errors [] = lang ( "ACCOUNT_SPECIFY_USERNAME" );
	}
	if ($password == "") {
		$errors [] = lang ( "ACCOUNT_SPECIFY_PASSWORD" );
	}
	
	if (count ( $errors ) == 0) {
		// A security note here, never tell the user which credential was incorrect
		if (! usernameExists ( $username )) {
			$errors [] = lang ( "ACCOUNT_USER_OR_PASS_INVALID" );
		} else {
			$userdetails = fetchUserDetails ( $username );
			// See if the user's account is activated
			if ($userdetails ["active"] == 0) {
				$errors [] = lang ( "ACCOUNT_INACTIVE" );
			} else {
				// Hash the password and use the salt from the database to compare the password.
				$entered_pass = generateHash ( $password, $userdetails ["password"] );
				
				if ($entered_pass != $userdetails ["password"]) {
					// Again, we know the password is at fault here, but lets not give away the combination incase of someone bruteforcing
					$errors [] = lang ( "ACCOUNT_USER_OR_PASS_INVALID" );
				} else {
					// Passwords match! we're good to go'
					
					// Construct a new logged in user object
					// Transfer some db data to the session object
					$loggedInUser = new loggedInUser ();
					$loggedInUser->email = $userdetails ["email"];
					$loggedInUser->user_id = $userdetails ["id"];
					$loggedInUser->hash_pw = $userdetails ["password"];
					$loggedInUser->title = $userdetails ["title"];
					$loggedInUser->displayname = $userdetails ["display_name"];
					$loggedInUser->username = $userdetails ["user_name"];
					
					// Update last sign in
					$loggedInUser->updateLastSignIn ();
					$_SESSION ["userCakeUser"] = $loggedInUser;
					
					// Redirect to user account page
					header ( "Location: /" );
					die ();
				}
			}
		}
	}
}

require_once ("models/header.php");

require_once ("navbar.php");
echo "
<body>
<div id='main'>";
echo resultBlock ( $errors, $successes );

echo "
	<br></br>
	<div class='container well' >
		<div class='row'>
			<h2>Log In</h2>
			<div class='col-xs-12 col-sm-3 col-lg-2'></div>
		  	<div class='col-xs-12 col-sm-6 col-lg-8'>
				<form class='form' role='form' method='post' action='" . $_SERVER ['PHP_SELF'] . "' accept-charset='UTF-8' id='login-nav'>
					<div class='form-group'>
						<label class='sr-only' for='username'>Username</label>
						<input type='text' class='form-control' name='username' id='username' placeholder='Username' required>
					</div>
					<div class='form-group'>
						<label class='sr-only' for='password'>Password</label>
						<input type='password' class='form-control'  name='password' id='password' placeholder='Password' required>
						<div class='help-block text-right'>
							<a href='/forgot-password.php'>Forgot the password ?</a>
						</div>
					</div>
					<div class='form-group'>
						<button type='submit' class='btn btn-primary btn-block submit'>
							Sign in
						</button>
					</div>
				</form>
				<div class='bottom text-center'>
					New here ? <a href='/register.php'><b>Join Us</b></a>
				</div>
			</div>
		</div> <!-- row -->
	</div>
</div>
</body>
</html>";

?>
