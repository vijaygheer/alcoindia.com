<?php include('header.php'); ?>
<?php
$display=$_GET['display'];
//delete code
$delget=$_GET['delid'];
if($delget)
{
 $delete="DELETE FROM gallery where id='$delget'";
 $conn->query($delete);
 header('location:addgallery.php');
}
//insert category code
if(isset($_POST['addbanner']))
{
$img = $_FILES['img']['name'];
move_uploaded_file($_FILES['img']['tmp_name'],"images/gallery/".$img);
$content=$_POST['content'];
$insert = "INSERT INTO gallery (`image`,`content`)VALUES ('$img','$content')";
	$qry = $conn->query($insert);
	if($qry)
	{
	 $display = "Image  Added on Gallery";
   header('location:addgallery.php?display='.$display);
	}
	else
	{
	$display = "Error";
	}
}

?>
<form method='POST' enctype="multipart/form-data">
	<table width=50% height=10px>
		<tr><td>Upload Image For Gallery</td><td><input type='file'  name='img' required > </td></tr>
    <tr><td>Content</td><td><input type='text'  name='content' > </td></tr>
	</table>
<button class='buton' name='addbanner'>Add Image</button><?php print $display ?>
</form>
<br><br><br>
<?php
$select ="SELECT * FROM gallery ";

$Qry=$conn->query($select);
print "<table width=100%
border=1 ><tr bgcolor='silver' text-color='white'><td>Sr no.</td><td>Image</td><td>Content</td><td>Delete</td></tr>";
$srno=0;

while($rec = $Qry->fetch_assoc())
{
$srno=$srno+1;
$address="images/gallery/".$rec[image];
print "<tr><td>$srno</td><td> <img src='$address' height='200px' width='300px' ></td><td>$rec[content]</td><td><a href='addgallery.php?delid=$rec[id]'>Delete</a></td></tr>";
}
print "</table>";


 ?>
<?php include('footer.php'); ?>
