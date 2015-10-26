<?php
/*
UserCake Version: 2.0.2
http://usercake.com
*/

require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}
require_once("models/header.php");

echo "<body>";
include("navbar.php");
echo "
	<!-- main -->
	<div class='container' ng-controller='whiskyController'>
		<div class='jumbotron'>
			<h1>
				The Whisky Club <br> <small>GDL Chapter</small>
			</h1>
			<address>La casa del Puerco</address>
		</div>
		<!--<div ng-include src=\"'pricesTable.html'\"></div> -->
		<div ng-include src=\"'sandbox.html'\"></div>
		<span>Current available whiskies {{getAvailableWhiskies()}}</span>
	</div>
</body>
</html>";

?>
