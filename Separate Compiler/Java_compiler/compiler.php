<?php

	$language=$_POST["language"];
	
	switch($language){
		case "java":
			include("Compile/java.php");
			break;
	}
	
?>

