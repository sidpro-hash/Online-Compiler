<?php

	$language=$_POST["language"];
	
	switch($language){
		case "javascript":
			include("Compile/javascript.php");
			break;
	}
	
?>

