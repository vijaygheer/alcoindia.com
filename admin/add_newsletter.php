<?php
@session_start();
require_once("../include/sql.php");
if(!isset($_SESSION['adminid'])){echo '<script language="javascript">window.location.href="index.php";</script>';}

if(isset($_REQUEST['id']))
{
	mysql_query("update newsletter set status='1' where id='".$_REQUEST['id']."'") or die (mysql_error()."Deletion Error");
	@header("Location : add_newsletter.php");
}

if(isset($_POST['submit']))
{
	$to= implode(',',$_POST['category']);		
			$subject 	= $_POST['pname'];
			$message=$_POST['pdetail'];
			$message=wordwrap($message,70);
			// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <info@jaincolab.com>' . "\r\n";

	define("UPLOAD_DIR", "../uploads/");
	
		 $filename = $_FILES['image']['name'];
		if (!empty($filename)) {
		$filetempname = $_FILES['image']['tmp_name'];
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
			
			$file = "../uploads/". $name;
    $file_size = filesize($file);
    $handle = fopen($file, "r");
    $content = fread($handle, $file_size);
    fclose($handle);
    $content = chunk_split(base64_encode($content));
    $separator = md5(time());
    $eol = PHP_EOL;
	
			// attachment
    $headers .= "--" . $separator . $eol;
    $headers .= "Content-Type: application/octet-stream; name=\"" . $name . "\"" . $eol;
    $headers .= "Content-Transfer-Encoding: base64" . $eol;
    $headers .= "Content-Disposition: attachment" . $eol . $eol;
    $headers .= $content . $eol . $eol;
    $headers .= "--" . $separator . "--";

			}
			
			
	
			$result=mail($to,$subject,$message,$headers);
}
if(isset($_REQUEST['del_id']))
{
	mysql_query("delete from newsletter where id='".$_REQUEST['del_id']."'") or die (mysql_error()."Deletion Error");
	@header("Location : add_newsletter.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Newsletter | Admin</title>
<link rel="stylesheet" type="text/css" href="css/modal_window.css" />
</head>
<body>
<?php include_once("include/main.php");?>  
<script language="javascript" type="application/javascript" >
function chkform()
{
	if($("#category").val()==null)
	{
		alert('Please Select email address');
		return false;
	}
	
	if(document.getElementById('pname').value=='')
	{
		alert('Please enter subject');
		return false;
	}
return true;
}
</script>

<div class="grid_10">
    <div class="box round first">
<h2>Send Newsletter</h2>
      <div class="block">
        <?php
	  if(isset($message))
	  {
		?>
        <div style="color:green" >Newsletter Send Successfully.</div>
        <?php
	  }
	  ?>
        <form action="" method="post" onSubmit="return chkform();">
          <table width="100%" cellpadding="10px;" cellspacing="2">
		  <tr>
              <td> <b>To<b> </td>
              <td><select name="category[]" id="category" multiple style="width:354px;">
			  <?php $user = mysql_query("select * from newsletter where email!=''") or die (mysql_error());
			while($rcat = mysql_fetch_array($user))
			{?>
			  <option value="<?php echo $rcat['email'];?>"><?php echo $rcat['email'];?></option>
			  <?php }?>
			  </select></td>
            </tr>
			
			<tr>
              <td> <b>Subject<b> </td>
              <td><input type="text" name="pname" id="pname" class="mytextbox" value="" style="width:350px;"></td>
            </tr>
			
			<tr>
              <td> <b>Message<b> </td>
              <td><textarea name="pdetail" id="pdetail" class="tinymce" ></textarea></td>
            </tr>
			
			<tr>
              <td> Attachment </td>
              <td><input type="file" name="image" id="image" class="mytextbox"></td>
            </tr>
            <tr >
			<td>&nbsp;</td>
              <td align="left"><input type="submit" name="submit" id="submit" class="btn btn-black" /></td>
            </tr>
          </table>
        </form>
      </div>
    </div>
    <div class="clear"></div>
		<div class="box round">
      <h2>Manage Newsletter</h2>
      <div class="block">
        <table class="data display datatable" id="example">
          <thead>
            <tr>
              <th width="7%">Sr.No.</th>
              <th>Email Address</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <?php
			$show = mysql_query("select * from newsletter where email!='' order by id desc") or die (mysql_error());
			$sr_no=0;
			while($row_s = mysql_fetch_array($show))
			{
				$sr_no = $sr_no+1;
			?>
            <tr>
              <td width="7%"><?php echo $sr_no; ?></td>
              <td align="center"><?php echo $row_s['email']; ?></td>
			  
              <td align="center"><a href="add_newsletter.php?del_id=<?php echo $row_s['id']; ?>" onclick="return confirm('Are you sure want to delete?');">Delete</a></td>
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