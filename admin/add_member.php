<?php

@session_start();

require_once("../include/sql.php");

if(!isset($_SESSION['adminid'])){echo '<script language="javascript">window.location.href="index.php";</script>';}

if(isset($_REQUEST['id'])){

mysqli_query($connection,"delete from user where id='".$_REQUEST['id']."'");

echo "<script>window.location='add_member.php'</script>";

}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>Member | Admin</title>

<link rel="stylesheet" type="text/css" href="css/modal_window.css" />    

</head>

<body>

<?php include_once("include/main.php");?>  

<div class="grid_10">

		<div class="box round">

      <h2>Member List</h2>

      <div class="block">

        <table class="data display datatable" id="example">

          <thead>

            <tr>

              <th width="7%">Sr.No.</th>

              <th>User Name</th>

              <th>Name</th>

			  <th>Password</th>

			  <th>Phone</th>

			  <th>Company Name</th>

			  <th>Designation</th>

			  <th>Address</th>

			  <th>City/State</th>

			  <th>Country</th>

			  <th>Joinning Date</th>

			  <th>Action</th>

            </tr>

          </thead>

          <tbody>

            <?php

			$show = mysqli_query($connection,"select * from user order by id desc") or die (mysqli_error());

			$sr_no=0;

			while($row_s = mysqli_fetch_array($show))

			{

				$sr_no = $sr_no+1;

			?>

            <tr>

              <td width="7%"><?php echo $sr_no; ?></td>

              <td align="center"><?php echo $row_s['username']; ?></td>

			  <td align="center"><?php echo $row_s['fname'].' '.$row_s['lname']; ?></td>

			  <td align="center"><?php echo $row_s['password']; ?></td>

			  <td align="center"><?php echo $row_s['phone']; ?></td>

			  <td align="center"><?php echo $row_s['cname']; ?></td>

			  <td align="center"><?php echo $row_s['post']; ?></td>

			  <td align="center"><?php echo $row_s['address']; ?></td>

			  <td align="center"><?php echo $row_s['city'].'/'.$row_s['state']; ?></td>

			  <td align="center"><?php echo $row_s['country']; ?></td>

			  <td align="center"><?php echo $row_s['join_date']; ?></td>

              <td align="center"><a href="add_member.php?id=<?php echo $row_s['id']; ?>" onclick="return confirm('Are you sure want to delete?');">Delete</a> </td>

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