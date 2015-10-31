<?php
require_once ("models/config.php");
if (! securePage ( $_SERVER ['PHP_SELF'] )) {
	die ();
}
require_once ('include/JSON.php');

$fields = $_POST ["fields"];
// Retrieve settings
if ($fields == "total") {
	$stmt = $mysqli->prepare ( "SELECT count(id) as total FROM whiskies" );
	$stmt->execute ();
	$stmt->bind_result ( $total );
} else if ($fields == "names") {
	$stmt = $mysqli->prepare ( "SELECT id, name  FROM whiskies" );
	$stmt->execute ();
	$stmt->bind_result ( $id, $name );
}

header ( 'Content-type: application/json' );
while ( $stmt->fetch () ) {
	if ($fields == "total") {
		$results ['results'] [] = array (
				'total' => $total 
		);
	} else if ($fields == "names") {
		$results ['results'] [] = array (
				'id' => $id,
				'name' => $name 
		);
	}
}
$stmt->close ();
// create a new instance of Services_JSON
$json = new Services_JSON ();

// convert a complex value to JSON notation

echo $json->encode ( $results );
?>