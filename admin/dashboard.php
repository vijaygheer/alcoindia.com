=<?php

@session_start();

require_once("../include/sql.php");

if(!isset($_SESSION['adminid']))

{

echo '<script language="javascript">window.location.href="index.php";</script>';}



if(isset($_POST['subscribe']))

{

	mysqli_query($connection,"update admin_account set username='".$_POST['username']."',password='".$_POST['pass']."'") or die (mysqli_error()."Image Uploading Error");

$message="updated successfully";

}

$query=mysqli_query($connection,"select * from admin_account");

$res=mysqli_fetch_array($query);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />

    <title>Dashboard | Admin</title>

    

</head>

<body>

 <?php include("include/main.php");?>

        <div class="grid_10">

          <div class="box round first">

                <h2>Admin Dashboard</h2>

                <div class="block">

        <?php

	  if(isset($message))

	  {

		?>

        <div style="" align="center"><?php echo $message; ?></div>

        <?php

	  }

	  ?>

        <form action="" method="post" >

          <table width="100%" cellpadding="10px;" cellspacing="2">

 <tr>

              <td> User Name </td>

              <td><input type="text" name="username" id="username" class="mytextbox" value="<?php echo $res['username'];?>"></td>

            </tr>



            <tr>

              <td> Password </td>

              <td><input type="password" name="pass" id="pass" class="mytextbox" value="<?php echo $res['password'];?>"></td>

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

    </div>

    <div class="clear"></div>

    <?php include("include/footer.php");?>

</body>

</html>

