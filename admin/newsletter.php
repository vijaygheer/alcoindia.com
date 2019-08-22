<?php
@session_start();
require_once("../include/sql.php");
if(!isset($_SESSION['adminid']))
{
echo '<script language="javascript">window.location.href="index.php";</script>';
}
?>
<?php
if(isset($_POST['subscribe']))
{
	mysql_query("insert into newsletter_sent(newsletter,day,date,time) values ('".mysql_real_escape_string($_POST['newsletter'])."','$day','$date','$time')") or die(mysql_error()."Insertion Error");
$eee=explode(",",$_POST['email']);
	for($i=0;$i<=count($eee);$i++)
	{
		//Email Sending For Verification
		ini_set("SMTP","aspmx.l.google.com");
		$to		= $eee[$i];
		$subject 	= "NewsLetter From ".$_SERVER['HTTP_HOST']."";
		$txt 		= $_POST['newsletter'];
		$headers 	= "MIME-Version: 1.0" . "\r\n";
		$headers 	.= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
		$headers 	.= "From: ".$_SERVER['HTTP_HOST']."\r\n";
		@mail($to,$subject,$txt,$headers);
	}
	$message = "NewsLetter Sent Successfully.";
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
      <h2>News Letter</h2>
      <div class="block">
      <?php
	  if(isset($message))
	  {
		?>
        <div style="" align="center"><?php echo $message; ?></div>
        <?php
	  }
	  ?>
      
      <form action="" method="post">
        <table width="100%" cellpadding="10px;" cellspacing="2">
<tr>
            <td> Email Address:
<?php $select_subscriber = mysql_query("select * from newsletter where status='1'") or die (mysql_error()."Selecting Subscriber Error");
$emailname='';
	while($row_select_subscriber = mysql_fetch_array($select_subscriber))
	{
	$emailname .=','.$row_select_subscriber['email'];
	}?>
              <input name="email" id="email" value="<?php echo ltrim($emailname,",");?>" size="97"  /></td>
          </tr>
          <tr>
            <td> NewsLetter : 
              <textarea class="tinymce" name="newsletter" id="newsletter"></textarea></td>
          </tr>
          <tr>
            <td align="center"><input type="submit" name="subscribe" id="subscribe" value="Subscribe" class="btn btn-black" /></td>
          </tr>
        </table>
        </form>
      </div>
    </div>
    <div class="clear"></div>
    <div class="box round">
      <h2>News Letters</h2>
      <div class="block">
        <table class="data display datatable" id="example">
          <thead>
            <tr>
              <th width="7%">Sr.No.</th>
              <th>NewsLetter</th>
              <th>Day</th>
              <th align="center">Date</th>
              <th width="7%">Time</th>
            </tr>
          </thead>
          <tbody>
            <?php
			$select_newsletter_sent = mysql_query("select * from newsletter_sent order by id desc") or die (mysql_error()."News Letter Sent Error");
			$sr_no=0;
			while($row_select_newsletter_sent = mysql_fetch_array($select_newsletter_sent))
			{
				$sr_no = $sr_no+1;
			?>
            <tr>
            <td width="7%"><?php echo $sr_no; ?></td>
            <td><?php echo $row_select_newsletter_sent['newsletter']; ?></td>
            <td><?php echo $row_select_newsletter_sent['day']; ?></td>
            <td><?php echo $row_select_newsletter_sent['date']; ?></td>
            <td><?php echo $row_select_newsletter_sent['time']; ?></td>
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