<?php
 include('header.php');
 ?>
 <script type="text/javascript">
 function change()
 {
   var cid = document.getElementById('selectid').value;
   window.location='addproduct.php?id='+cid;
 }
 </script>
 <?php
$display=$_GET['display'];
//delete code
$delget=$_GET['delid'];
if($delget)
{
 $delete="DELETE FROM subcategory where id='$delget'";
 $conn->query($delete);
 header('location:addsubcate.php');
}
// print category from database
$select = "select * from category";
	$qry = $conn->query($select);
$catid=$_POST['selectt'];

// insert subcategory
if(isset($_POST['addscate']))
{
$scate = $_POST[subcate];
$meta=$_POST[meta_tag];
$keyword=$_POST[meta_key];
$meta_des=$_POST[descr];
$img = $_FILES['img']['name'];
move_uploaded_file($_FILES['img']['tmp_name'],"images/Subcategory/".$img);
$insert = "INSERT INTO subcategory (catid,subcategory,image,meta_title,meta_keyword,meta_descr) VALUES ('$catid', '$scate','$img', '$meta', '$keyword', '$meta_des')";
	$cry = $conn->query($insert);
	if($cry)
	{
	 $display = "Inserted Subcategory ";
	}
	else
	{
	$display = "ERROR";
	}
}
//update subcategory

$getup=$_GET['udateid'];
if(isset($_POST['update']))
{
  $scate = $_POST[subcate];
  $meta=$_POST[meta_tag];
  $keyword=$_POST[meta_key];
  $meta_des=$_POST[descr];
  $img = $_FILES['img']['name'];
  move_uploaded_file($_FILES['img']['tmp_name'],"images/Subcategory/".$img);
$update="UPDATE `subcategory` SET `category` = '$cate_name', `meta_title` = '$meta', `meta_keyword` = '$keyword', `meta_descr` = '$meta_des' WHERE `category`.`id` = '$getup'";
$qry = $conn->query($update);
if($qry)
{
header('location:addsubcate.php?display=Subcategory Updated on database');

}
else
{
$display = "Error";
}

}
if($getup)
{
  $seupdate ="SELECT * FROM subcategory  where id ='$getup' ";
	$qury1 = $conn->query($seupdate);
	$recprint = $qury1->fetch_assoc();
print"<form method='POST'  enctype='multipart/form-data'>
  <table width=40% height=20px>

    <tr><td>Subcategory Name</td><td><input  autofocus type='text'  name='subcate'value='$recprint[subcategory]'  required='plz enter sub category name' ></td></tr>
    <tr><td>Select Category</td><td><select  name='selectt'>";

        while($rec1 = $qry->fetch_assoc())
        {
          print "<option value='$rec1[id]'>$rec1[category]</option>";
        }

        print "
    </select></td></tr>
    <tr><td>Image</td><td><input  type='file'  name='img'></td></tr>
    <tr><td>Meta Tittle</td><td><input  type='text' value=$recprint[meta_title] name='meta_tag'></td></tr>
      <tr><td>Meta Keyword</td><td><input   type='text'value=$recprint[meta_keyword]  name='meta_key'></td></tr>
        <tr><td>Meta Desicripation</td><td><input  type='text' value=$recprint[meta_descr] name='descr'></td></tr>
  </table>
  <?php print $display?>

<button class='buton' name='addscate'>Update Subcategory</button>

</form>";
}
	else
	{
		print "<form method='POST' enctype='multipart/form-data'>
    	<table width=40% height=20px>

        <tr><td>Product Name</td><td><input  autofocus type='text'  name='pname'  ></td></tr>
        <tr><td>Catalogue Number</td><td><input  autofocus type='text'  name='cnum' ></td></tr>
    		<tr><td>Select Category</td><td><select  name='scat' id='selectid' onchange='change()'>";
        print "<option >SELECT category</option>";
    				while($rec = $qry->fetch_assoc())
    				{
    					print "<option value='$rec[id]'>$rec[category]</option>";
    				}

            print "
    		</select></td></tr>
        <tr><td>Select Subcategory</td><td><select  name='scat' id='selectid' onchange='change()'>";
        $id = $_GET['id'];
        $subcat = "SELECT * from subcategory where catid = $id";
        $subqry = $conn->query($subcat);
    				while($rsub = $subqry->fetch_assoc())
    				{
    					print "<option value='$rsub[id]'>$rsub[subcategory]</option>";
    				}

            print "
    		</select></td></tr>
        <tr><td>Product Image</td><td><input  type='file'  name='img'></td></tr>
        <tr><td>Product Tittle</td><td><input  type='text'  name='meta_tag'></td></tr>
          <tr><td>Product Keyword</td><td><input   type='text'  name='meta_key'></td></tr>
            <tr><td>Product Desicripation</td><td><textarea  type='text'  name='descr'></textarea></td></tr>
    	</table>
    	<?php print $display?>

    <button class='buton' name='addscate'>Insert</button>

    </form>";
	}



?>
<br><br><br>
<?php
$select ="SELECT * FROM products";

$Qry=$conn->query($select);
print "<table width=100%
border=1    ><tr bgcolor='silver' text-color='white'><td>Sr no.</td><td>Product Name</td><td>Subcategory</td><td>Category</td><td>Catalogue Number</td><td>Image</td><td>Meta Tittle</td><td>Meta Keyword</td><td>Meta Desicripation</td><td>Delete</td><td>Edit</td></tr>";
$srno=0;

while($rec = $Qry->fetch_assoc())
{
$srno=$srno+1;
//image fetch
$address="images/Subcategory/".$rec[image];

print "<tr><td>$srno</td><td>$rec[pname]</td>";
  $cselect ="SELECT * FROM category where id = $rec[catid]' ";
  $cqry=$conn->query($cselect);
  $recc = $cqry->fetch_assoc();
print "<td>$recc[category]</td><td>$recc[category]</td><td>$rec[cnumber]</td><td><img src='$address' height='50px' width='50px'> </td><td>$rec[meta_title]</td> <td>$rec[meta_keyword]</td><td>$rec[meta_descr]</td><td><a href='addsubcate.php?delid=$rec[id]'>Delete</a></td><td><a href='addsubcate.php?udateid=$rec[id]'>Update</a></td></tr>";
}
print "</table>";


 ?>

<?php include('footer.php'); ?>
