<?php
@session_start();
require_once("../include/sql.php");
if(!isset($_SESSION['adminid'])){echo '<script language="javascript">window.location.href="index.php";</script>';}
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
   
    <div class="box round">
      <h2>Manage Pages</h2>
      <div class="block">
        <table class="data display datatable" id="example">
          <thead>
            <tr>
              <th width="7%">Sr.No.</th>
              <th>Title</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
			$select_success_stories = mysql_query("select * from pages order by id asc") or die (mysql_error());
			$sr_no=0;
			while($row = mysql_fetch_array($select_success_stories))
			{
				$sr_no = $sr_no+1;
			?>
            <tr>
              <td width="7%"><?php echo $sr_no; ?></td>
              <td><?php echo $row['title']; ?></td>
              <td><a href="edit_page.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are You Sure?'); return false;">Edit</a></td>
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
