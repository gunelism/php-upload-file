<?php

	$adi = $_POST['name'];
	$yeri = $_POST['place'];

if (!empty($adi) && !empty($yeri)) {
	$myfile = fopen("array.txt", "a+") or die("Unable to open file!");
	$target_dir = "uploads/";
	$target_file = date("dmYGis"). basename($_FILES["pict"]["name"]);
	move_uploaded_file($_FILES["pict"]["tmp_name"], "uploads/".$target_file);

	$text = $adi . "|" . $yeri . "|" . $target_dir . $target_file . "@@@###@@@";
	fwrite($myfile, $text);

	fclose($myfile);
	
	chmod("array.txt",0777);
	header('Location:index.php');
	}
	else{
		header('Location: index.php'); 
		}



?>