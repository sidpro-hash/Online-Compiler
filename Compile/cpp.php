<?php

    //putenv("PATH=F:\SOFT\CodeBlocks\MinGW\bin");
	$CC="g++";
	$out="timeout 10 ./a.out";
	$code=trim($_POST["text"]);
	$input=trim($_POST["input"]);
	$filename_code="main.cpp";
	$filename_in="input.txt";
	$filename_error="error.txt";
	$executable="./a.out";
	$command=$CC." -Wall -lm ".$filename_code;
	$command_error=$command." 2>".$filename_error;

	$Nothing = "<br><b style='color:red'>Your code didn't print anything.<b>";
	$sucess = "<span style=\"color:green;font-size:20px;border-bottom:2px solid #272822\">&nbsp;&nbsp;&nbsp;&nbsp;Compiled & Run Successful</span><br><br>"; 
	$compile_Error = "<span style=\"color:red;font-size:20px;border-bottom:2px solid #272822\">&nbsp;&nbsp;&nbsp;&nbsp;Compilation Error</span><br><br>";
	$Run_Error = "<span style=\"color:red;font-size:20px;border-bottom:2px solid #272822\">&nbsp;&nbsp;&nbsp;&nbsp;RunTime Error</span><br><br>";

	$file_code=fopen($filename_code,"w+");
	fwrite($file_code,$code);
	fclose($file_code);
	$file_in=fopen($filename_in,"w+");
	fwrite($file_in,$input);
	fclose($file_in);
  	//exec("icacls  $executable /g everyone:f"); calcs i deprecated use icacls
	//exec("icacls  $filename_error /g everyone:f");
  	//exec("icacls $filename_error /grant everyone:(F)");
	exec("chmod 777 $filename_error");
	exec("chmod 777 $filename_code");
	exec("chmod 777 $filename_in");
	shell_exec($command_error);
	$error=file_get_contents($filename_error);

	if(trim($error)=="")
	{
    		exec("chmod 777 $executable");
		if(trim($input)=="")
		{
			$output=shell_exec($out);
		}
		else
		{
			$out=$out." < ".$filename_in;
			exec("chmod 777 $file_out");
			$output=shell_exec($out);
		}
		if (trim($output)=="")echo "<b>$sucess</b>"."$Nothing";
		else echo "<b>$sucess</b>"."<b>$output</b>";
	}
	else if(!strpos($error,"error"))
	{
		echo "<b>$compile_Error</b>"."$error";
		if(trim($input)=="")
		{
			$output=shell_exec($out);
		}
		else{
			$out=$out." < ".$filename_in;
			$output=shell_exec($out);
		}
		echo "<b>$output</b>";
	}
	else{
		echo "<b>$compile_Error</b>"."$error";
	}
	exec("rm $filename_code");
	exec("rm *.o");
	exec("rm *.txt");
	exec("rm $executable");
?>
