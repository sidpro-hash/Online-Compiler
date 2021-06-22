<?php
	$CC="python3";
        $code=$_POST["text"];
	$input=$_POST["input"];
	$filename_code="main.py";
	$filename_in="input.txt";
	$filename_error="error.txt";
	$command=$CC." ".$filename_code;
	$command_error=$command." <".$filename_in." 2>".$filename_error;

	$Nothing = "<br><b style='color:red'>Your code didn't print anything.<b>";
	$sucess = "<span style=\"color:green;font-size:20px;border-bottom:2px solid #272822\">&nbsp;&nbsp;&nbsp;&nbsp;Interpreted & Run Successful</span><br><br>"; 
	$Run_Error = "<span style=\"color:red;font-size:20px;border-bottom:2px solid #272822\">&nbsp;&nbsp;&nbsp;&nbsp;RunTime Error</span><br><br>";

	$file_code=fopen($filename_code,"w+");
	fwrite($file_code,$code);
	fclose($file_code);
	$file_in=fopen($filename_in,"w+");
	fwrite($file_in,$input);
	fclose($file_in);

	exec("chmod 777 $filename_error");
	exec("chmod 777 $filename_code");
	exec("chmod 777 $filename_in");
	shell_exec($command_error);
	$error=file_get_contents($filename_error);

	if(trim($error)==""){
		if(trim($input)=="")$output=shell_exec($command);
		else{
			$command=$command." <".$filename_in;
			$output=shell_exec($command);
		}
		if (trim($output)=="")echo "<b>$sucess</b>"."$Nothing";
		else echo "<b>$sucess</b>"."<b>$output</b>";
	}
	else	echo "<b>$Run_Error</b>"."$error";

	exec("rm $filename_code");
	exec("rm *.txt");
?>
