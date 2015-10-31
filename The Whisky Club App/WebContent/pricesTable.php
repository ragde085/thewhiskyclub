<?php
require_once ("models/config.php");
require_once ("models/header.php");
if (!isUserLoggedIn ()) {
	echo '<script type="text/javascript"> window.location = "login.php" </script>';
} else {
?>
<!-- main -->
<h2>Prices</h2>
<div class='container' ng-controller='whiskyController'>
	<!-- Collapsable prices -->
	<div id="whiskyPrices" class="well">
		<h3>List of available Whiskies:</h3>
		<div class="alert alert-info well" <?php if (!$loggedInUser->checkPermission(array(2))){echo "hidden";}?>>
			<p>Sort Type: {{ sortType }}</p>
			<p>Sort Reverse: {{ sortReverse }}</p>
			<p>Search Query: {{ searchWhisky}}</p>
		</div>
		<form>
			<div class="form-group">
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-search"></i>
					</div>

					<input type="text" class="form-control" placeholder="Search" ng-model="searchWhisky">

				</div>
			</div>
		</form>
		<table id="whiskies_table" class="table table-striped table-responsive table-hover tablesorter">
			<thead class="bg-info">
				<th><a href="#" ng-click="sortType = 'name'; sortReverse = !sortReverse"> Name <span ng-show="sortType == 'name' && sortReverse" class="fa fa-caret-down"></span>
						<span ng-show="sortType == 'name' && !sortReverse" class="fa fa-caret-up"></span>
				</a></th>
				<th><a id="priceLabel" href="#" ng-click="sortType = 'price'; sortReverse = !sortReverse"> Price <i class="fa fa-usd"></i> <span
						ng-show="sortType == 'price' && sortReverse" class="fa fa-caret-down"></span> <span ng-show="sortType == 'price' && !sortReverse" class="fa fa-caret-up"></span>
				</a></th>
			</thead>
			<tbody>
				<tr ng-repeat="whisky in whiskies | orderBy:sortType:sortReverse | filter:searchWhisky" class="{{toScoreColor(whisky.score)}}">
					<td>{{whisky.name}}</td>
					<td align="right">{{toCurrency(whisky.price)}}</td>
				</tr>
			</tbody>
		</table>
	</div>

	<script>
			$(document).ready(function() {
				$("#priceLabel").popover({
					content : "Prices are in MX Pesos",
					trigger : "hover"
				});
				$("#whiskies_table").tablesorter();
			});
		</script>
	<!-- / Collapsable prices -->
	</body>
<?php }?>