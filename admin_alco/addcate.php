<?php include('header.php'); ?>
<?php
$display=$_GET['display'];
//delete code
$delget=$_GET['delid'];
if($delget)
{
 $delete="DELETE FROM category where id='$delget'";
 $conn->query($delete);
print"<script language='javascript'>window.location.href='addcate.php?display=Category Deleted';</script>";
}
//insert category code
if(isset($_POST['addvalue']))
{
$cate_name = $_POST[catename];
$meta=$_POST[meta_tag];
$keyword=$_POST[meta_key];
$meta_des=$_POST[descr];

$insert = "INSERT INTO category (`category`, `meta_title`, `meta_keyword`, `meta_descr`)VALUES ('$cate_name', '$meta', '$keyword', '$meta_des')";
	$qry = $conn->query($insert);
	if($qry)
	{
    print"<script language='javascript'>window.location.href='addcate.php?display=Category Added on database';</script>";

	}
	else
	{
	$display = "Error";
	}
}
// update category code
$getup=$_GET['udateid'];
if(isset($_POST['update']))
{
	$cate_name = $_POST[catename];
	$meta=$_POST[meta_tag];
	$keyword=$_POST[meta_key];
	$meta_des=$_POST[descr];
$update="UPDATE `category` SET `category` = '$cate_name', `meta_title` = '$meta', `meta_keyword` = '$keyword', `meta_descr` = '$meta_des' WHERE `category`.`id` = '$getup'";
$qry = $conn->query($update);
if($qry)
{
  print"<script language='javascript'>window.location.href='addcate.php?display=Category Updated on database';</script>";


}
else
{
$display = "Error";
}

}
if($getup)
{
	$seupdate ="SELECT * FROM category  where id ='$getup' ";
	$qry = $conn->query($seupdate);
	$rec = $qry->fetch_assoc();
print"<form method='POST'>
	<table width=50% height=10px>
		<tr><td>Category Name</td><td><input  autofocus type='text'  name='catename' value='$rec[category]' required ></td></tr>
	<tr><td>Meta Tittle</td><td><input  type='text'  name='meta_tag'  value='$rec[meta_title]'></td></tr>
		<tr><td>Meta Keyword</td><td><input   type='text'  name='meta_key'  value='$rec[meta_keyword]'></td></tr>
			<tr><td>Meta Desicripation</td><td><input  type='text'  name='descr'  value='$rec[meta_descr]'></td></tr>
	</table>

<button class='buton' name='update'>Update Category</button> $display

</form>";
}
	else
	{
		print "<form method='POST'>
			<table width=50% height=10px>
				<tr><td>Category Name</td><td><input  autofocus type='text'  name='catename' required ></td></tr>
			<tr><td>Meta Tittle</td><td><input  type='text'  name='meta_tag'></td></tr>
				<tr><td>Meta Keyword</td><td><input   type='text'  name='meta_key'></td></tr>
					<tr><td>Meta Desicripation</td><td><input  type='text'  name='descr'></td></tr>
			</table>

		<button class='buton' name='addvalue'>ADD CATEGORY</button> $display

		</form>";
	}

?>
<br><br><br>
<?php
$select ="SELECT * FROM category   ";

$Qry=$conn->query($select);
print "<table width=100%
border=1    ><tr bgcolor='silver' text-color='white'><td>Sr no.</td><td>Category Name</td><td>Meta Tittle</td><td>Meta Keyword</td><td>Meta Desicripation</td><td>Delete</td><td>Edit</td></tr>";
$srno=0;

while($rec = $Qry->fetch_assoc())
{
$srno=$srno+1;
print "<tr><td>$srno</td><td>$rec[category]</td><td>$rec[meta_title]</td> <td>$rec[meta_keyword]</td><td>$rec[meta_descr]</td><td><a href='addcate.php?delid=$rec[id]'>Delete</a></td><td><a href='addcate.php?udateid=$rec[id]'>Update</a></td></tr>";
}
print "</table>";


 ?>
<?php include('footer.php'); ?>
