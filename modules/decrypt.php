<?php
ob_start();
require "../config/database.php";
require "passwordDecryptor.php";

$username = $_POST['username'];
$src = $_FILES["fileToUpload"]["tmp_name"];

// Get image steganography password from database filter by username
$passwordDB = $db->query("SELECT password FROM M_USER WHERE username = '$username'");

$base64 = $passwordDB->fetch_object()->password;

// Check if username is exists then get base64 image
if ($base64 != null) {
	/* Execute decrypt from file upload */
	$decode64 = base64_decode(explode(",", $base64)[1]);

	// Load GD resource from binary data
	$im = imageCreateFromString($decode64);


	/* 
	Make sure that the GD library was able to load the image
	This is important, because you should not miss corrupted or unsupported images
	*/
	if (!$im) {
		header("Location: ../index.php?message=Password value is not a valid image");
	}

	// Specify the location where you want to save the image
	$imagefile = '../data/passwordDB.png';

	/*
	Save the GD resource as PNG in the best possible quality (no compression)
	This will strip any metadata or invalid contents (including, the PHP backdoor)
	To block any possible exploits, consider increasing the compression level
	*/
	imagepng($im, $imagefile, 0);
	
	// $img = imagecreatefrompng($src); //Returns image identifier
	$imgDB = imagecreatefrompng($imagefile); //Returns image identifier
	$decryptedPasswordDB = runDecrypt($imagefile, $imgDB);

	/* Execute decrypt from file upload */
	$imgUpload = imagecreatefrompng($src); //Returns image identifier
	$decryptedPassword = runDecrypt($src, $imgUpload);

	if ($decryptedPasswordDB == $decryptedPassword) {
		echo "Password sama: ".$decryptedPassword."<br>";
		header("Location: ../profile.php?username=$username");
	} else {
		header("Location: ../index.php?message=Password does not match.");
	}
} else {
	header("Location: ../index.php?message=User not exists.");
}

?>