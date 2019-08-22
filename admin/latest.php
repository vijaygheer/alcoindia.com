<?php
@session_start();
require_once("../include/sql.php");
if(!isset($_SESSION['adminid'])){echo '<script language="javascript">window.location.href="index.php";</script>';}
?>
<?php
if(isset($_POST['subscribe']))
{
	define("UPLOAD_DIR", "../product/latest/");
		$filename = $_FILES['image']['name'];
		$filetempname = $_FILES['image']['tmp_name'];
		
		if (!empty($filename)) {
		 
			if ($_FILES['image']["error"] !== UPLOAD_ERR_OK) {
				$message= "<p>An error occurred.</p>";
				exit;
			}
		 
			// ensure a safe filename
			$name = preg_replace("/[^A-Z0-9._-]/i", "_", $filename);
	 
			// don't overwrite an existing file
			$parts = pathinfo($name);
			if(file_exists(UPLOAD_DIR . $name)) {
				$name = $parts["filename"].time().".".$parts["extension"];
			}
		 
			// preserve file from temporary directory
			$success = move_uploaded_file($filetempname,UPLOAD_DIR . $name);
			if (!$success) {
				$message= "<p>Unable to save file.</p>";
				exit;
			}
		 
			// set proper permissions on the new file
			chmod(UPLOAD_DIR . $name, 0644);
			mysql_query("insert into latest_product (image) values ('".$name."')") or die (mysql_error()."Image Uploading Error");
			$message="Product has been added successfully !";
		}
}

if(isset($_REQUEST['del_id']))
{
	mysql_query("delete from latest_product where id='".$_REQUEST['del_id']."'") or die (mysql_error()."Deletion Error");
	echo "<script>window.location='latest.php'</script>";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin</title>
<link rel="stylesheet" type="text/css" href="css/modal_window.css" />
<script language="javascript" type="application/javascript" >
function chkform()
{
	if(document.getElementById('image').value=='')
	{
		alert('Please browse image');
		return false;
	}
return true;
}
</script>

</head>
<body>
<?php include_once("include/main.php");?>
  <div class="grid_10">
    <div class="box round first">
      <h2>Latest Product</h2>
      <div class="block">
        <?php
	  if(isset($message))
	  {
		?>
        <div style="color:red" ><?php echo $message; ?></div>
        <?php
	  }
	  ?>
        <form action="" method="post" enctype="multipart/form-data" onSubmit="return chkform();">
          <table width="100%" cellpadding="10px;" cellspacing="2">
		    <tr>
              <td> <b>Image</b> </td>
              <td><input type="file" name="image" id="image" class="mytextbox"></td>
            </tr>			
            <tr>
			<td>&nbsp;</td>
              <td align="left"><input type="submit" name="subscribe" id="subscribe" class="btn btn-black" /></td>
            </tr>
          </table>
        </form>
      </div>
    </div>
    <div class="clear"></div>
    <div class="box round">
      <h2>Manage Latest Product</h2>
      <div class="block">
        <table class="data display datatable" id="example">
          <thead>
            <tr>
              <th width="7%">Sr.No.</th>
              <th>image</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
			$sel = mysql_query("select * from latest_product order by id desc") or die (mysql_error());
			$sr_no=0;
			while($rsel = mysql_fetch_array($sel))
			{
				$sr_no = $sr_no+1;
			?>
            <tr>
              <td width="7%"><?php echo $sr_no; ?></td>
              <td align="center"><img src="../product/latest/<?php echo $rsel['image']; ?>" width="100"/></td>
              <td align="center"><a href="latest.php?del_id=<?php echo $rsel['id']; ?>" onclick="return confirm('Are You Sure You Want To Delete This?'); return false;">Delete</a></td>
            </tr>
            <?php
			}
			?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="clear"></div>
</div>
<div class="clear"></div>
<?php include("include/footer.php");?>
</body>
</html>
