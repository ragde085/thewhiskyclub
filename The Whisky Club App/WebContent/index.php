<?php
/*
 * UserCake Version: 2.0.2
 * http://usercake.com
 */
require_once ("models/config.php");
if (! securePage ( $_SERVER ['PHP_SELF'] )) {
	die ();
}
require_once ("models/header.php");
?>
<!-- main -->
<div class='container' ng-controller='whiskyController'>
	<div class='jumbotron'>
		<h1>
			The Whisky Club <br> <small>GDL Chapter</small>
		</h1>
		<address>La casa del Puerco</address>
	</div>
	<div class="row">
		<div ng-controller="SearchCtrl" class="col-md-6">
			<form class="well form-search">
				<label>Search:</label> <input type="text" ng-model="keywords" class="input-medium search-query" placeholder="Whisky Name...">
				<button type="submit" class="btn btn-default" ng-click="search()">Search</button>
				<p class="help-block">Try for example: "GlenGrant"</p>
			</form>
			<pre ng-model="result">{{result}}</pre>
		</div>
		<div ng-include src="'sandbox.html'"></div>
		<p>
			Currently there is information available about <label>{{totalwhiskies}}</label> whiskies.
		</p>
	</div>
</div>
</body>
</html>



