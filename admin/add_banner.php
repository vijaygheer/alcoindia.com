<?php
@session_start();
require_once("../include/sql.php");
if(!isset($_SESSION['adminid'])){echo '<script language="javascript">window.location.href="index.php";</script>';}
?>
<?php
if(isset($_POST['subscribe']))
{
	define("UPLOAD_DIR", "../banner/");
	foreach($_FILES['image']['tmp_name'] as $key => $val)
	{
		$filename = $_FILES['image']['name'][$key];
		$filesize = $_FILES['image']['size'][$key];
		$filetempname = $_FILES['image']['tmp_name'][$key];
		
		if (!empty($filename)) {
		 
			if ($_FILES['image']["error"][$key] !== UPLOAD_ERR_OK) {
				echo "<p>An error occurred.</p>";
				exit;
			}
		 
			// ensure a safe filename
			$name = preg_replace("/[^A-Z0-9._-]/i", "_", $filename);
	 
			// don't overwrite an existing file
			$i = 0;
			$parts = pathinfo($name);
			while (file_exists(UPLOAD_DIR . $name)) {
				$i++;
				$name = $parts["filename"] . "-" . $i . "." . $parts["extension"];
			}
		 
			// preserve file from temporary directory
			$success = move_uploaded_file($filetempname,UPLOAD_DIR . $name);
			if (!$success) {
				echo "<p>Unable to save file.</p>";
				exit;
			}
		 
			// set proper permissions on the new file
			chmod(UPLOAD_DIR . $name, 0644);
			mysqli_query($connection,"insert into banner (image) values ('$name')") or die (mysqli_error()."Image Uploading Error");
		}
	}
}

if(isset($_REQUEST['del_id']))
{
	mysqli_query($connection,"delete from banner where id='".$_REQUEST['del_id']."'") or die (mysqli_error()."Deletion Error");
	echo "<script>window.location='add_banner.php'</script>";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin</title>
<link rel="stylesheet" type="text/css" href="css/modal_window.css" />
</head>
<body>
<?php include_once("include/main.php");?>
  <div class="grid_10">
    <div class="box round first">
      <h2>Latest Products</h2>
      <div class="block">
        <?php
	  if(isset($message))
	  {
		?>
        <div style="" align="center"><?php echo $message; ?></div>
        <?php
	  }
	  ?>
        <form action="" method="post" enctype="multipart/form-data">
          <table width="100%" cellpadding="10px;" cellspacing="2">
            <tr>
              <td> Images </td>
              <td><input type="file" name="image[]" id="image" class="mytextbox"></td>
            </tr>
            <tr>
              <td align="center"><input type="submit" name="subscribe" id="subscribe" class="btn btn-black" /></td>
            </tr>
          </table>
        </form>
      </div>
    </div>
    <div class="clear"></div>
    <div class="box round">
      <h2>Manage Latest</h2>
      <div class="block">
        <table class="data display datatable" id="example">
          <thead>
            <tr>
              <th width="7%">Sr.No.</th>
              <th>image</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
            <?php
			$select_success_stories = mysqli_query($connection,"select * from banner order by id desc") or die (mysqli_error());
			$sr_no=0;
			while($row = mysqli_fetch_array($select_success_stories))
			{
				$sr_no = $sr_no+1;
			?>
            <tr>
              <td width="7%"><?php echo $sr_no; ?></td>
              <td style="padding-top: 5px;"><img src="../banner/<?php echo $row['image']; ?>" width="100"/></td>
              <td><a href="add_banner.php?del_id=<?php echo $row['id']; ?>" onclick="return confirm('Are You Sure You Want To Delete This?'); return false;">Delete</a></td>
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
