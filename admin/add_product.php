<?php
@session_start();
require_once("../include/sql.php");
if(!isset($_SESSION['adminid'])){echo '<script language="javascript">window.location.href="index.php";</script>';}
if(isset($_POST['subscribe']))
{
	$query_check=mysqli_query($connection,"select id from product where catid='".$_POST['category']."' and subid='".$_POST['subcat']."' and pname='".$_POST['pname']."'");
	if(mysqli_num_rows($query_check)==0)
	{
		define("UPLOAD_DIR", "../product/");
		$filename = $_FILES['image']['name'];
		$filetempname = $_FILES['image']['tmp_name'];
		$name='blank.jpg';
		if (!empty($filename)) 
		{
			if ($_FILES['image']["error"] !== UPLOAD_ERR_OK) 
			{
				$message= "<p>An error occurred.</p>";
				exit;
			}

			// ensure a safe filename
			$name = preg_replace("/[^A-Z0-9._-]/i", "_", $filename);

			// don't overwrite an existing file
			$parts = pathinfo($name);
			if(file_exists(UPLOAD_DIR . $name)) 
			{
				$name = $parts["filename"].time().".".$parts["extension"];
			}

			// preserve file from temporary directory
			$success = move_uploaded_file($filetempname,UPLOAD_DIR . $name);
			if (!$success) 
			{
				$message= "<p>Unable to save file.</p>";
				exit;
			}

			// set proper permissions on the new file
			//chmod(UPLOAD_DIR . $name, 0644);
		}
		//echo "sdfsd";exit;
		define("UPLOAD_DIR_PDF", "../pdf/");
		$pdfname = $_FILES['pdf']['name'];
		$pdftempname = $_FILES['pdf']['tmp_name'];
		
		if (!empty($pdfname)) 
		{
$success = move_uploaded_file($pdftempname,UPLOAD_DIR_PDF. $pdfname);
			// set proper permissions on the new file
			//chmod(UPLOAD_DIR_PDF . $pdfname, 0644);
		}
		
		mysqli_query($connection,"insert into product (catid,subid,cnumber,pname,image,descr,title,keyword,meta_descr,pdf) values ('".$_POST['category']."','".$_POST['subcat']."','".$_POST['cnumber']."','".mysqli_real_escape_string($_POST['pname'])."','".$name."','".mysqli_real_escape_string($_POST['pdetail'])."','".mysqli_real_escape_string($_POST['mtitle'])."','".mysqli_real_escape_string($_POST['mkey'])."','".mysqli_real_escape_string($_POST['mdescr'])."','".$pdfname."')") or die (mysqli_error()."Image Uploading Error");

		$_SESSION['message']="Product has been added successfully !";
		echo "<script>window.location='add_product.php'</script>";
	}
	else
	{
		$message="Sorry! Product name already exist.";
	}
}

elseif(isset($_POST['update']))
{
	$query_check=mysqli_query($connection,"select id from product where catid='".$_POST['category']."' and subid='".$_POST['subcat']."' and pname='".$_POST['pname']."' and id!='".$_GET['id']."'");
	if(mysqli_num_rows($query_check)==0)
	{
		define("UPLOAD_DIR", "../product/");
		$filename = $_FILES['image']['name'];
		$filetempname = $_FILES['image']['tmp_name'];
		if (!empty($filename)) 
		{
			if ($_FILES['image']["error"] !== UPLOAD_ERR_OK) 
			{
				$message= "<p>An error occurred.</p>";
				exit;
			}
	
			// ensure a safe filename
			$name = preg_replace("/[^A-Z0-9._-]/i", "_", $filename);
 
			// don't overwrite an existing file
			$parts = pathinfo($name);

			if(file_exists(UPLOAD_DIR . $name)) 
			{
				$name = $parts["filename"].time().".".$parts["extension"];
			}

			// preserve file from temporary directory
			$success = move_uploaded_file($filetempname,UPLOAD_DIR . $name);
			if (!$success) 
			{
				$message= "<p>Unable to save file.</p>";
				exit;
			}

			// set proper permissions on the new file
			//chmod(UPLOAD_DIR . $name, 0644);
			mysqli_query($connection,"update product set image='".$name."' where id='".$_GET['id']."'") or die (mysqli_error()."Image Uploading Error");
		}
		
		define("UPLOAD_DIR_PDF", "../pdf/");
		$pdfname = $_FILES['pdf']['name'];
		$pdftempname = $_FILES['pdf']['tmp_name'];
		//$pdffile='blank.pdf';
		if (!empty($pdfname)) 
		{		

			// preserve file from temporary directory
			$success = move_uploaded_file($pdftempname,UPLOAD_DIR_PDF. $pdfname);
			

			// set proper permissions on the new file
			chmod(UPLOAD_DIR . $pdffile, 0644);
			mysqli_query($connection,"update product set pdf='".$pdffile."' where id='".$_GET['id']."'") or die (mysqli_error()."PDF Uploading Error");
		}
		

		mysqli_query($connection,"update product set catid='".$_POST['category']."', subid='".$_POST['subcat']."', cnumber='".$_POST['cnumber']."', pname='".mysql_real_escape_string($_POST['pname'])."', descr='".mysqli_real_escape_string($_POST['pdetail'])."', title='".mysqli_real_escape_string($_POST['mtitle'])."', keyword='".mysqli_real_escape_string($_POST['mkey'])."', meta_descr='".mysqli_real_escape_string($_POST['mdescr'])."' where id='".$_GET['id']."'") or die (mysqli_error()."Image Uploading Error");
		$_SESSION['message']="Product has been updated successfully !";
		echo "<script>window.location='add_product.php'</script>";			
	}
	else
	{
		$message="Sorry! Product name already exist.";
	}
}

if(isset($_REQUEST['del_id']))
{
	mysqli_query($connection,"delete from product where id='".$_REQUEST['del_id']."'") or die (mysqli_error()."Deletion Error");
	echo "<script>window.location='add_product.php'</script>";
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

	if(document.getElementById('pname').value=='')
	{
		alert('Please Enter Product Name');
		return false;
	}
return true;
}

function chkform_edit()
{
	if(document.getElementById('category').value=='')
	{
		alert('Please Select Category Name');
		return false;
	}	

	if(document.getElementById('pname').value=='')
	{
		alert('Please Enter Product Name');
		return false;
	}
return true;
}

function showsubcat(id)
{
	$.ajax({
		type: "GET",
		url: 'subcat.php?id='+id,
		data: '',
		dataType: 'html',
		success: function(result){
			$('#shsubcat').html(result);
		}
	});
}
</script>

</head>

<body>

<?php include_once("include/main.php");?>

  <div class="grid_10">

    <div class="box round first">

      <h2>Product</h2>

      <div class="block">

        <?php if(isset($message)) {?>

        <div style="color:red" ><?php echo $message; ?></div>

        <?php }elseif(isset($_SESSION['message'])){?>

	  <div style="color:green;" ><?php echo $_SESSION['message']; ?></div>

	  <?php unset($_SESSION['message']);}

	  if(!isset($_GET['id'])){

	  ?>

        <form action="" method="post" enctype="multipart/form-data" onSubmit="return chkform();">

          <table width="100%" cellpadding="10px;" cellspacing="2">

		  <tr>

              <td> Category Name </td>

              <td><select name="category" id="category" onchange="showsubcat(this.value);">

			  <option value="">Select Category</option>

			  <?php $category = mysqli_query($connection,"select * from category order by id desc") or die (mysqli_error());

			while($rcat = mysqli_fetch_array($category))

			{?>

			  <option value="<?php echo $rcat['id'];?>" <?php if(isset($_POST['category']) && $_POST['category']==$rcat['id']){echo "selected";}?>><?php echo $rcat['category'];?></option>

			  <?php }?>

			  </select></td>

            </tr>

			<tr>

              <td> Sub Category Name </td>

              <td id="shsubcat"><select name="subcat" id="subcat">

			  <option value="">Select Sub Category</option>

			  <?php $subcategory = mysqli_query($connection,"select * from subcategory order by id desc") or die (mysqli_error());

			while($rsubcat = mysqli_fetch_array($subcategory))

			{?>

			  <option value="<?php echo $rsubcat['id'];?>" <?php if(isset($_POST['subcat']) && $_POST['subcat']==$rcat['id']){echo "selected";}?>><?php echo $rsubcat['subcategory'];?></option>

			  <?php }?>

			  </select></td>

            </tr>

			

			

			

			<tr>

              <td> Catalogue Number </td>

              <td><input type="text" name="cnumber" id="cnumber" class="mytextbox" value="<?php if(isset($_POST['cnumber'])){echo $_POST['cnumber'];}?>" maxlength="30"></td>

            </tr>

			<tr>

              <td> Product Name </td>

              <td><input type="text" name="pname" id="pname" class="mytextbox" value="<?php if(isset($_POST['pname'])){echo $_POST['pname'];}?>"></td>

            </tr>

			

            <tr>

              <td> Images </td>

              <td><input type="file" name="image" id="image" class="mytextbox"></td>

            </tr>

			

			<tr>

              <td> Detail </td>

              <td><textarea name="pdetail" id="pdetail" class="tinymce" ><?php if(isset($_POST['pdetail'])){echo $_POST['pdetail'];}?></textarea></td>

            </tr>

			

			<tr>

              <td> Meta Title </td>

              <td><input type="text" name="mtitle" id="mtitle" class="mytextbox" value="<?php if(isset($_POST['mtitle'])){echo $_POST['mtitle'];}?>"></td>

            </tr>

			

			<tr>

              <td> Meta Keyword </td>

              <td><input type="text" name="mkey" id="mkey" class="mytextbox" value="<?php if(isset($_POST['mkey'])){echo $_POST['mkey'];}?>"></td>

            </tr>

			

			<tr>

              <td> Meta Description </td>

              <td><textarea name="mdescr" id="mdescr" cols="40" rows="5" ><?php if(isset($_POST['mdescr'])){echo $_POST['mdescr'];}?></textarea></td>

            </tr>
			
			<tr>

              <td> Upload PDF </td>
              <td><input type="file" name="pdf" id="pdf" class=""></td>

            </tr>

            <tr>

              <td align="center"><input type="submit" name="subscribe" id="subscribe" class="btn btn-black" /></td>

            </tr>

          </table>

        </form>

		<?php }else{

		$dd=mysql_query("select * from product where id='".$_GET['id']."'");

		$dde=mysql_fetch_array($dd);

		?>

		

		<form action="" method="post" enctype="multipart/form-data" onSubmit="return chkform_edit();">

          <table width="100%" cellpadding="10px;" cellspacing="2">

		  <tr>

              <td> Category Name </td>

              <td><select name="category" id="category" onchange="showsubcat(this.value);">

			  <option value="">Select Category</option>

			  <?php $category = mysql_query("select * from category order by id desc") or die (mysql_error());

			while($rcat = mysql_fetch_array($category))

			{?>

			  <option value="<?php echo $rcat['id'];?>" <?php if($rcat['id']==$dde['catid']){echo "selected";}?>><?php echo $rcat['category'];?></option>

			  <?php }?>

			  </select></td>

            </tr>

			<tr>

              <td> Sub Category Name </td>

              <td id="shsubcat"><select name="subcat" id="subcat">
			  <option value="">Select Sub Category</option>
			  <?php $subcategory = mysqli_query($connection,"select * from subcategory where catid='".$dde['catid']."' order by id desc") or die (mysqli_error());
			while($rsubcat = mysqli_fetch_array($subcategory)){?>
			  <option value="<?php echo $rsubcat['id'];?>" <?php if($rsubcat['id']==$dde['subid']){echo "selected";}?>><?php echo $rsubcat['subcategory'];?></option>
			  <?php }?>
			  </select></td>
            </tr>
	<tr>
              <td> Catalogue Number </td>
              <td><input type="text" name="cnumber" id="cnumber" class="mytextbox" value="<?php echo $dde['cnumber'];?>" maxlength="30"></td>
            </tr>
		<tr>
              <td> Product Name </td>
              <td><input type="text" name="pname" id="pname" class="mytextbox" value="<?php echo $dde['pname'];?>"></td>
            </tr>

            <tr>
              <td> Images </td>
              <td><input type="file" name="image" id="image" class="mytextbox">
		  <img src="../product/<?php echo $dde['image'];?>" width="50"></td>
            </tr>
		<tr>
              <td> Detail </td>
              <td><textarea name="pdetail" id="pdetail" class="tinymce" ><?php echo $dde['descr'];?></textarea></td>
            </tr>
		<tr>
              <td> Meta Title </td>
              <td><input type="text" name="mtitle" id="mtitle" class="mytextbox" value="<?php echo $dde['title'];?>"></td>
            </tr>
		<tr>
              <td> Meta Keyword </td>
              <td><input type="text" name="mkey" id="mkey" class="mytextbox" value="<?php echo $dde['keyword'];?>"></td>
            </tr>
		<tr>
              <td> Meta Description </td>
              <td><textarea name="mdescr" id="mdescr" cols="40" rows="5" ><?php echo $dde['meta_descr'];?></textarea></td>
            </tr>
<tr>

              <td> Upload PDF </td>
              <td><input type="file" name="pdf" id="pdf" class=""></td>

            </tr>

            <tr>
              <td align="center"><input type="submit" name="update" id="update" class="btn btn-black" /></td>
            </tr>
          </table>
        </form>
	<?php }?>
      </div>
    </div>
    <div class="clear"></div>
    <div class="box round">
      <h2>Manage Product</h2>
      <div class="block">
        <table class="data display datatable" id="example">
          <thead>
            <tr>
              <th >Sr.No.</th>
			  <th>Category</th>
			  <th>Sub Category</th>
			  <th>Catalogue Number</th>
			  <th>Product Name</th>
              <th>image</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
			$sel = mysqli_query($connection,"select category.category,subcategory.subcategory,product.* from product left join subcategory on product.subid=subcategory.id left join category on product.catid=category.id order by product.id desc") or die (mysqli_error());
			$sr_no=0;
			while($rsel = mysqli_fetch_array($sel)){
				$sr_no = $sr_no+1;
			?>
            <tr>
              <td ><?php echo $sr_no; ?></td>
		  <td align="center"><?php echo $rsel['category']; ?></td>
			  <td align="center"><?php echo $rsel['subcategory']; ?></td>
			  <td align="center"><?php echo $rsel['cnumber']; ?></td>
			  <td align="center"><?php echo $rsel['pname']; ?></td>
              <td align="center"><img src="../product/<?php echo $rsel['image']; ?>" width="100"/></td>
              <td align="center"><a href="add_product.php?id=<?php echo $rsel['id']; ?>">Edit</a> | <a href="add_product.php?del_id=<?php echo $rsel['id']; ?>" onclick="return confirm('Are You Sure You Want To Delete This?'); return false;">Delete</a></td>
            </tr>
            <?php }?>
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