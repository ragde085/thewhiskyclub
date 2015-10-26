function whiskyController($scope) {
	$scope.getAvailableWhiskies = function() {
		return $scope.whiskies.length;
	}

	$scope.toCurrency = function(n) {
		return "$ " + n.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
	}
	$scope.sortType = 'name'; // set the default sort type
	$scope.sortReverse = false; // set the default sort order
	$scope.searchWhisky = ''; // set the default search/filter term
	$scope.toScoreColor = function(score) {
		if (score >= 9) {
			return "success";
		} else if (score >= 8) {
			return "";
		} else if (score >= 7) {
			return "info";
		} else if (score >= 6) {
			return "warning";
		} else {
			return "danger";
		}
	}

	$scope.whiskies = [ {
		name : "Clan McGregor",
		taste : 0,
		color : 0,
		smell : 0,
		score : 0,
		price : 100
	}, {
		name : "Macallan Ruby",
		taste : 10,
		color : 10,
		smell : 10,
		score : 9,
		price : 3500
	}, {
		name : "GlenGrant",
		taste : 8,
		color : 8,
		smell : 8,
		score : 8,
		price : 285
	} ];
}