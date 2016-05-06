<?php
if(isset($_POST)){
	$res = array(
		'user' => $_POST['user'],
		'pass' => $_POST['pass'],
	);
	echo json_encode($res);
}
?>
