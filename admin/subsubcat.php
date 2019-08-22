<?php include("../include/sql.php");
$query=mysql_query("select * from subsubcategory where subcatid='".$_GET['id']."'");
?>
<select name="subsubcat" id="subsubcat">
<option value="">Select Sub Subcategory</option>
<?php while($res=mysql_fetch_array($query)){?>

<option value="<?php echo $res['id'];?>"><?php echo $res['subsubcategory'];?></option>
<?php }?>
</select>