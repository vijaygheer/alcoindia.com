<?php include('header.php'); ?>
<?php
$display=$_GET['display'];
//delete code
$delget=$_GET['delid'];
if($delget)
{
 $delete="DELETE FROM banner where id='$delget'";
 $conn->query($delete);
print"<script language='javascript'>window.location.href='addbanner.php?display=Banner Deleted';</script>";
}
//insert category code
if(isset($_POST['addbanner']))
{

$img = $_FILES['img']['name'];
move_uploaded_file($_FILES['img']['tmp_name'],"images/banner/".$img);

$insert = "INSERT INTO banner (`image`)VALUES ('$img')";
	$qry = $conn->query($insert);
	if($qry)
	{
	 $display = "Banner Added on database";
	}
	else
	{
	$display = "Error";
	}
}

?>
<form method='POST' enctype="multipart/form-data">
	<table width=50% height=10px>
		<tr><td>Upload Image For Banner</td><td><input type='file'  name='img' required > </td></tr>
	</table>
<button class='buton' name='addbanner'>Add Banner</button><?php print $display ?>
</form>
<br><br><br>
<?php
$select ="SELECT * FROM banner   ";

$Qry=$conn->query($select);
print "<table width=50%
border=1 ><tr bgcolor='silver' text-color='white'><td>Sr no.</td><td>Banner Image</td><td>Action</td></tr>";
$srno=0;

while($rec = $Qry->fetch_assoc())
{
$srno=$srno+1;
$address="images/banner/".$rec[image];
print "<tr><td>$srno</td><td> <img src='$address' height='150px' width='300px' >  </td><td><a href='addbanner.php?delid=$rec[id]'>Delete</a></td></tr>";
}
print "</table>";


 ?>
<?php include('footer.php'); ?>
