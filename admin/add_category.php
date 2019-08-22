<?php

@session_start();

require_once("../include/sql.php");

if(!isset($_SESSION['adminid']))

{

echo '<script language="javascript">window.location.href="index.php";</script>';

}

?>



<?php

if(isset($_POST['update']))

{

	$query_check=mysqli_query($connection,"select id from category where category='".mysqli_real_escape_string($_POST['category'])."' and id!='".$_GET['id']."'");

	if(mysqli_num_rows($query_check)==0)

	{

		$up_frnt_data=mysqli_query($connection,"update `category` set category='".mysqli_real_escape_string($_POST['category'])."',meta_title='".mysqli_real_escape_string($_POST['meta_title'])."',meta_keyword='".mysqli_real_escape_string($_POST['meta_keyword'])."',meta_descr='".mysqli_real_escape_string($_POST['meta_descr'])."' where id='".$_GET['id']."'") or die (mysqli_error());

		$msg=$_POST['category']." has been updated successfully !";

	}

	else

	{

		$msg=$_POST['category']." has been already exist !";

	}

}

elseif(isset($_POST['submit']))

{

	$query_check=mysql_query("select id from category where category='".mysql_real_escape_string($_POST['category'])."'");

	if(mysql_num_rows($query_check)==0)

	{

		$up_frnt_data=mysqli_query($connection,"insert into `category`(category,meta_title,meta_keyword,meta_descr)values('".mysqli_real_escape_string($_POST['category'])."','".mysqli_real_escape_string($_POST['meta_title'])."','".mysqli_real_escape_string($_POST['meta_keyword'])."','".mysqli_real_escape_string($_POST['meta_descr'])."')") or die (mysqli_error());

		$msg=$_POST['category']." has been added successfully !";

	}

	else

	{

		$msg=$_POST['category']." has been already exist !";

	}

}

elseif(isset($_REQUEST['del_id']))

{

	$query_check=mysqli_query($connection,"select id from subcategory where catid='".$_REQUEST['del_id']."'");

	if(mysqli_num_rows($query_check)==0)

	{

		mysqli_query($connection,"delete from category where id='".$_REQUEST['del_id']."'") or die (mysqli_error()."Deletion Error");

		@header("Location : add_category.php");

	}

	else

	{

		echo "<script>alert('Sorry! Category is already used for subcategory');</script>";

		@header("Location : add_category.php");

	}

}



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>Category | Admin</title>

<link rel="stylesheet" type="text/css" href="css/modal_window.css" />

<script language="javascript" type="application/javascript" >

function chkform()

{

	if(document.getElementById('category').value.length==0)

	{

		alert('Please Enter Category Name');

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

    <h2>Category</h2>

      <div class="block">

        <table class="form">

          <?php if(isset($msg)){ ?>

	      <tr>

            <td colspan="2"><strong style="color:#F00;"><?php echo $msg; ?></strong></td>

         </tr>

         <?php

		  }

		 ?>

         <tr>

          <td >

           <table width="100%" border="1">

  			<tr>

   			 <td>

        <?php

		if(isset($_GET['id'])){

		  $query=mysql_query("select * from `category` where id='".$_GET['id']."'");

		  $row=mysql_fetch_array($query);

	  }

	  ?>

		<form name="add_topic" action="" method="post" onsubmit="return chkform();" enctype="multipart/form-data">

        	<table width="100%" border="1">

					<tr>

    					<td width="10%"><b>Category</b></td>

						<td><input type="text" name="category" id="category" value="<?php if(isset($row['category'])){echo $row['category'];} ?>"></td>

  					</tr>

					<tr>

    					<td width="10%"><b>Meta Title</b></td>

						<td><input type="text" name="meta_title" id="meta_title" value="<?php if(isset($row['meta_title'])){echo $row['meta_title'];} ?>"></td>

  					</tr>

					<tr>

    					<td width="10%"><b>Meta Keyword</b></td>

						<td><input type="text" name="meta_keyword" id="meta_keyword" value="<?php if(isset($row['meta_keyword'])){echo $row['meta_keyword'];} ?>"></td>

  					</tr>

					<tr>

    					<td width="10%"><b>Meta Description</b></td>

						<td><input type="text" name="meta_descr" id="meta_descr" value="<?php if(isset($row['meta_descr'])){echo $row['meta_descr'];} ?>"></td>

  					</tr>

  					<tr>

					<td>&nbsp;</td>

    					<td align="left" ><input type="submit" name="<?php if(isset($row['category'])){echo "update";}else{echo "submit";} ?>" value="<?php if(isset($row['category'])){echo "Update";}else{echo "Add";} ?>" class="btn btn-black" /></td>

  					</tr>

				</table>

			</form>

    </td>

  </tr>

</table>

	     </td>

            </tr>



                    </table>

                    </form>

                </div>

            </div>

        <div class="clear"></div>

		<div class="box round">

      <h2>Manage Category</h2>

      <div class="block">

        <table class="data display datatable" id="example">

          <thead>

            <tr>

              <th width="7%">Sr.No.</th>

              <th>Category Name</th>

			  <th>Meta Title</th>

			  <th>Meta Keyword</th>

			  <th>Meta Description</th>

              <th>Action</th>

            </tr>

          </thead>

          <tbody>

            <?php

			$show = mysqli_query($connection,"select * from category order by id desc") or die (mysqli_error());

			$sr_no=0;

			while($row_s = mysqli_fetch_array($show))

			{

				$sr_no = $sr_no+1;

			?>

            <tr>

              <td width="7%"><?php echo $sr_no; ?></td>

              <td align="center"><?php echo $row_s['category']; ?></td>

			  <td align="center"><?php echo $row_s['meta_title']; ?></td>

			  <td align="center"><?php echo $row_s['meta_keyword']; ?></td>

			  <td align="center"><?php echo $row_s['meta_descr']; ?></td>



              <td align="center"><a href="add_category.php?id=<?php echo $row_s['id']; ?>">Edit</a>  | <a href="add_category.php?del_id=<?php echo $row_s['id']; ?>" onclick="return confirm('Are You Sure You Want To Delete This?'); return false;">Delete</a></td>

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
