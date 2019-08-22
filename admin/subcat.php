<?php include("../include/sql.php");
$query=mysql_query("select * from subcategory where catid='".$_GET['id']."'");
?>
<select name="subcat" id="subcat" onchange="showsubsubcat(this.value);">
<option value="">Select sub category</option>
<?php while($res=mysql_fetch_array($query)){?>

<option value="<?php echo $res['id'];?>"><?php echo $res['subcategory'];?></option>
<?php }?>
</select>