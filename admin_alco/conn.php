<?php
error_reporting(0);
$conn=mysqli_connect("localhost","root","","alco_india");
if($conn)
{
print "";
}
else {
  die("not connected".mysqli_connect_error());
}
?>
