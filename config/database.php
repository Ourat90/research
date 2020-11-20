<?php 

$db = new mysqli("localhost","root","root","web_x", 8889);

// Check connection
if ($db->connect_errno) {
  echo "Failed to connect to MySQL: " . $db->connect_error;
  exit();
}

?>