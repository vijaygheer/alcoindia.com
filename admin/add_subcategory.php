<?php

@session_start();

require_once("../include/sql.php");

if(!isset($_SESSION['adminid'])){echo '<script language="javascript">window.location.href="index.php";</script>';}

?>

<?php

if(isset($_POST['update']))

{

	$query_check=mysqli_query($connection,"select id from subcategory where catid='".$_POST['category']."' and subcategory='".$_POST['subcat']."' and id!='".$_GET['id']."'");

	if(mysql_num_rows($query_check)==0)

	{

		define("UPLOAD_DIR", "../subcategory/");

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

			mysqli_query($connection,"update subcategory set image='".$name."' where id='".$_GET['id']."'") or die (mysqli_error()."Image Uploading Error");

		}

		mysqli_query($connection,"update subcategory set catid='".$_POST['category']."',subcategory='".mysql_real_escape_string($_POST['subcat'])."',meta_title='".mysqli_real_escape_string($_POST['meta_title'])."'

		,meta_keyword='".mysqli_real_escape_string($_POST['meta_keyword'])."',meta_descr='".mysqli_real_escape_string($_POST['meta_descr'])."' where id='".$_GET['id']."'") or die (mysqli_error()."Image Uploading Error");

		$message="Subcategory has been updated successfully !";

	}

	else

	{

		$message="Sorry! Subcategory name already exist.";

	}

}



if(isset($_POST['subscribe']))

{

	$query_check=mysqli_query($connection,"select id from subcategory where catid='".$_POST['category']."' and subcategory='".$_POST['subcat']."'");

	if(mysqli_num_rows($query_check)==0)

	{

		define("UPLOAD_DIR", "../subcategory/");

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

			mysqil_query($connection,"insert into subcategory (catid,subcategory,image,meta_title,meta_keyword,meta_descr) values ('".$_POST['category']."','".mysql_real_escape_string($_POST['subcat'])."','".$name."','".mysqli_real_escape_string($_POST['meta_title'])."','".mysqli_real_escape_string($_POST['meta_keyword'])."','".mysqli_real_escape_string($_POST['meta_descr'])."')") or die (mysql_error()."Image Uploading Error");

			$message="Subcategory has been added successfully !";

		}

	}

	else

	{

		$message="Sorry! Subcategory name already exist.";

	}

}



if(isset($_REQUEST['del_id']))

{

	$query_check=mysqli_query($connection,"select id from product where subid='".$_REQUEST['del_id']."'");

	if(mysqli_num_rows($query_check)==0)

	{

		mysqli_query($connection,"delete from subcategory where id='".$_REQUEST['del_id']."'") or die (mysqli_error()."Deletion Error");

		@header("Location : add_subcategory.php");

	}

	else

	{

		echo "<script>alert('Sorry! Sub Category is already used for products');</script>";

		@header("Location : add_subcategory.php");

	}

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

	if(document.getElementById('category').value=='')

	{

		alert('Please Select Category Name');

		return false;

	}

	if(document.getElementById('subcat').value=='')

	{

		alert('Please Enter Sub Category Name');

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

      <h2>Subcategory</h2>

      <div class="block">

        <?php

	  if(isset($message))

	  {

		?>

        <div style="color:red" ><?php echo $message; ?></div>

        <?php

	  }

	  ?>

	  <?php

		if(isset($_GET['id'])){

		  $query=mysqli_query($connection,"select * from `subcategory` where id='".$_GET['id']."'");

		  $row=mysqli_fetch_array($query);

	  }

	  ?>

        <form action="" method="post" enctype="multipart/form-data" onSubmit="return chkform();">

          <table width="100%" cellpadding="10px;" cellspacing="2">

		  <tr>

              <td> <b>Category Name</b> </td>

              <td><select name="category" id="category">

			  <option value="">Select Category</option>

			  <?php $category = mysqli_query($connection,"select * from category order by id desc") or die (mysqli_error());

			while($rcat = mysqli_fetch_array($category))

			{?>

			  <option value="<?php echo $rcat['id'];?>" <?php if(isset($row['catid']) && $row['catid']==$rcat['id']){echo "selected";}?>><?php echo $rcat['category'];?></option>

			  <?php }?>

			  </select></td>

            </tr>

			<tr>

              <td> <b>Sub Category Name</b> </td>

              <td><input type="text" name="subcat" id="subcat" class="mytextbox" value="<?php if(isset($row['subcategory'])){echo $row['subcategory'];}?>"></td>

            </tr>

            <tr>

              <td> <b>Images</b> </td>

              <td><input type="file" name="image" id="image" class="mytextbox">

			  <?php if(isset($row['image'])){?>

			  <img src="../subcategory/<?php echo $row['image'];?>" width="40">

			  <?php }?>

			  </td>

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

              <td align="left"><input type="submit" name="<?php if(isset($row['id'])){echo "update";}else{echo "subscribe";} ?>" id="subscribe" class="btn btn-black" value="<?php if(isset($row['id'])){echo "Update";}else{echo "Submit";} ?>" /></td>

            </tr>

          </table>

        </form>

      </div>

    </div>

    <div class="clear"></div>

    <div class="box round">

      <h2>Manage Sub Category</h2>

      <div class="block">

        <table class="data display datatable" id="example">

          <thead>

            <tr>

              <th width="7%">Sr.No.</th>

			  <th>Category</th>

			  <th>Sub Category</th>

              <th>image</th>

			  <th>Meta Title</th>

			  <th>Meta Keyword</th>

			  <th>Meta Description</th>

              <th>Action</th>

            </tr>

          </thead>

          <tbody>

            <?php

			$sel = mysqli_query($connection,"select category.category,subcategory.* from subcategory left join category on subcategory.catid=category.id order by subcategory.id desc") or die (mysqli_error());

			$sr_no=0;

			while($rsel = mysqli_fetch_array($sel))

			{

				$sr_no = $sr_no+1;

			?>

            <tr>

              <td width="7%"><?php echo $sr_no; ?></td>

			  <td align="center"><?php echo $rsel['category']; ?></td>

			  <td align="center"><?php echo $rsel['subcategory']; ?></td>

              <td align="center"><img src="../subcategory/<?php echo $rsel['image']; ?>" width="100"/></td>

			  <td align="center"><?php echo $rsel['meta_title']; ?></td>

			  <td align="center"><?php echo $rsel['meta_keyword']; ?></td>

			  <td align="center"><?php echo $rsel['meta_descr']; ?></td>

              <td align="center"><a href="add_subcategory.php?id=<?php echo $rsel['id']; ?>">Edit</a> | <a href="add_subcategory.php?del_id=<?php echo $rsel['id']; ?>" onclick="return confirm('Are You Sure You Want To Delete This?'); return false;">Delete</a></td>

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
