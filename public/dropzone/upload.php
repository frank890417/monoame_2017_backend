<?php
	header("Content-Type:text/html; charset=utf-8");
  	header('Access-Control-Allow-Origin: http://build.monoame.com');  
  	header('Access-Control-Allow-Headers: Cache-Control, Access-Control-Allow-Headers, Origin,Accept, X-Requested-With, Content-Type, Access-Control-Request-Method, Access-Control-Request-Headers');
  	header('Access-Control-Allow-Methods: POST,GET,OPTIONS,PUT,DELETE');

	$ds          = DIRECTORY_SEPARATOR;  //1
	 
	$storeFolder = 'uploads';   //2
	 
	function RandomString()
	{
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $randstring = '';
	    for ($i = 0; $i < 20; $i++) {
	        $randstring .= $characters[rand(0, strlen($characters))];
	    }
	    return $randstring;
	}

	function TimeString()
	{
		return date('Y_m_d_h_i_s');
	}

	if (!empty($_FILES)) {
	    // echo "receive file!";
	    $hash=TimeString()."_";
	    $tempFile =  $_FILES['file']['tmp_name'];          //3             
	      
	    $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;  //4
	     
	    $targetFile =  $targetPath. $hash . $_FILES['file']['name'];  //5
	 
	    move_uploaded_file($tempFile,$targetFile); //6
	    echo $targetFile;
	     
	}
?>   