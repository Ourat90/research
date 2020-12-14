<?php 
ob_start();

require "../modules/util.php";
require "../config/database.php";

//Edit below variables
$username = $_POST['username'];
$msg = $_POST['password']; //To encrypt
$name = $_POST['name'];
$src = $_FILES['fileToUpload']['tmp_name']; //Start image

// Check is user is not exists
// Get image steganography password from database filter by username
$checkUser = $db->query("SELECT COUNT(*) as isExist FROM M_USER WHERE username = '$username'")->fetch_object()->isExist;

if ($checkUser < 1) {
  header("Location: ../index.php?message=User not found!");
}

echo $_FILES['fileToUpload']['name']."<br>";

echo $username." | ".$msg." | ".$name." | ".$src."<br>";

$filename = '../data/password.png';

$msg .='|'; //EOF sign, decided to use the pipe symbol to show our decrypter the end of the message
$msgBin = toBin($msg); //Convert our message to binary
$msgLength = strlen($msgBin); //Get message length
$img = imagecreatefromjpeg($src); //returns an image identifier

var_dump($_FILES['fileToUpload']);
echo "<br>";
var_dump($img);
echo "<br>";
list($width, $height, $type, $attr) = getimagesize($src); //get image size

if($msgLength>($width*$height)){ //The image has more bits than there are pixels in our image
  echo('Message too long. This is not supported as of now.');
  die();
}

$pixelX=0; //Coordinates of our pixel that we want to edit
$pixelY=0; //^

for($x=0;$x<$msgLength;$x++){ //Encrypt message bit by bit (literally)

  if($pixelX === $width+1){ //If this is true, we've reached the end of the row of pixels, start on next row
    $pixelY++;
    $pixelX=0;
  }

  if($pixelY===$height && $pixelX===$width){ //Check if we reached the end of our file
    echo('Max Reached');
    die();
  }

  $rgb = imagecolorat($img,$pixelX,$pixelY); //Color of the pixel at the x and y positions
  $r = ($rgb >>16) & 0xFF; //returns red value for example int(119)
  $g = ($rgb >>8) & 0xFF; //^^ but green
  $b = $rgb & 0xFF;//^^ but blue

  $newR = $r; //we dont change the red or green color, only the lsb of blue
  $newG = $g; //^
  $newB = toBin($b); //Convert our blue to binary
  $newB[strlen($newB)-1] = $msgBin[$x]; //Change least significant bit with the bit from out message
  $newB = toString($newB); //Convert our blue back to an integer value (even though its called tostring its actually toHex)

  $new_color = imagecolorallocate($img,$newR,$newG,$newB); //swap pixel with new pixel that has its blue lsb changed (looks the same)
  imagesetpixel($img,$pixelX,$pixelY,$new_color); //Set the color at the x and y positions
  $pixelX++; //next pixel (horizontally)

}

imagepng($img, $filename); //Create image
echo('done: ' . $filename. "<br>"); //Echo our image file name
imagedestroy($img); //get rid of it

// Generate base64 image
$type = pathinfo($filename, PATHINFO_EXTENSION);
$data = file_get_contents($filename);
$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
echo $base64."<br>";


// Store to database
$sql = "UPDATE M_USER SET (`password`) VALUES ('$base64')";

if ($db->query($sql)) {
  header("Location: ../index.php?message=success&username=$username");
} else {
   header("Location: ../index.php?message=".$db->error);
}


// Close connection
$db->close();

?>