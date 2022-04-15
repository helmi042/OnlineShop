<?php 
$conn = mysqli_connect('localhost', 'root', '', 'codeme');

function ambilData($query){
	global $conn;
	$result = mysqli_query($conn, $query);
	$data = [];
	while($a = mysqli_fetch_assoc($result)){
		$data[] = $a;
	}
	return $data;
}

function saveData($query){
	global $conn;
	mysqli_query($conn, $query);
}

function hapusData($query){
	global $conn;
	mysqli_query($conn, $query);
}

?>