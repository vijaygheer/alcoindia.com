<!-- edit category -->
<?php     
include("../include/sql.php");
$page='about_us';
if(isset($_REQUEST['id']))
{
$edit =$_REQUEST['id'];
$query = "select * from pages where id = $edit";
$r = mysql_query($query);
while($rec = mysql_fetch_array($r))
{
 
 $title = $rec['title'];
 $description = $rec['descr'];
 $ppnm = $rec['page_name'];
 $e = $rec['img'];
 
}
if(isset($_POST['sub']))
{
 $title =$_POST['title'];
 $aboutdesc = $_POST['description'];
 $SelectDoc=mysql_query("select * from pages where id='".$_REQUEST["id"]."'");

	$RowDoc=mysql_fetch_array($SelectDoc);
	$documenttype =$RowDoc['img']; 
	if($_FILES['file']['name']) 
    {	
	   if($documenttype!="")
	   {	        
		    unlink("../uploads/".$documenttype);				
	   }		
		$image=$_FILES["file"]["name"];		
		$flag = move_uploaded_file($_FILES["file"]["tmp_name"],"../uploads/".$_FILES["file"]["name"]);
		
		$u = "update pages set title ='".mysql_real_escape_string($title)."',descr='".mysql_real_escape_string($aboutdesc)."',img='".mysql_real_escape_string($image)."' where id = '".$_REQUEST["id"]."'";
	}
	else
	{
		$u = "update pages set title ='".mysql_real_escape_string($title)."',descr='".mysql_real_escape_string($aboutdesc)."' where id = '".$_REQUEST["id"]."'";
	} 
 
 mysql_query($u);
echo "<script>window.location='about.php'</script>";
}
}
		     
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <title>Welcome </title>
    <link rel="shortcut icon" href="favicon.ico" />

    <link rel="stylesheet" href="css/style.css" media="all" type="text/css" />
    <link rel="stylesheet" href="lib/datatables/css/table_jui.css" type="text/css" />
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans" type="text/css" />

    <script type="text/javascript" src="js/head.load.min.js"></script>

</head>
<body class="bg_c sidebar fixed">

    <div id="slide_wrapper">
        <div id="slide_panel" class="wrapper">
            <div id="slide_content">
                <span id="slide_close"><img src="images/blank.gif" alt="" class="round_x16_b" /></span>

				<div class="cf">
					<div class="dp100 sortable"><p class="s_color tac sepH_a">You can drag widgets from dashboard and drop it here.</p></div>
				</div>

				<div class="row cf">
					<div class="dp75 taj">
                        <h4 class="sepH_b">Lorem ipsum dolor sit amet...</h4>
                        
                    </div>
					<div class="dp25">
                        <div id="chart_k"></div>
                    </div>
				</div>
            </div>
        </div>
    </div>

	<?php
		 include('header.php');
	?>

	<div id="main">
		<div class="wrapper cf">
			<div id="main_section" class="cf brdrrad_a">

				

				<div id="content_wrapper">
					<div id="main_content" class="cf">

						<h1 class="sepH_c">Edit <?php echo $ppnm;?></h1>
						<form action="" method="post" enctype="multipart/form-data" onsubmit="return valid();">
						<div class="formEl_a">

										<fieldset>
											<legend>edit</legend>
											<div class="sepH_b">
											    Title:<br>
											    <input type="text" class="inpt_a" name="title" id="title" value="<?php echo($title);?>" /><br><br>
												Description:<br>
											    <textarea class="tinymce txtar_a" name="description" id="description"><?php echo($description);?></textarea><br><br>
												Image<br>
												<img src="../uploads/<?php echo ($e); ?>" width='100px'><input type="file" name="file" id="file" ><br><br>
											   <input type="submit" class="btn btn_d" name="sub" id="sub">
											
											</div>

											

											
										</fieldset>

									</div>
						</form>
						</div>
				</div>

				
				</div>

			</div>
		</div>
	</div>

	<div id="footer">
	   <div class="wrapper">
		  <div class="cf ftr_content">
			<p class="fl">Copyright &copy; 2015</p>
			<a href="javascript:void(0)" class="toTop">Back to top</a>
		  </div>
	   </div>
	</div>

	<script type="text/javascript">
		head.js(
			"js/jquery-1.6.2.min.js",
			"lib/jquery-ui/jquery-ui-1.8.15.custom.min.js",
			"lib/harvesthq-chosen/chosen.jquery.min.js",
			"lib/fancybox/jquery.easing-1.3.pack.js",
			"lib/fancybox/jquery.fancybox-1.3.4.pack.js",
			"lib/file-uploader/fileuploader.js",
			"lib/tiny-mce/jquery.tinymce.js",
			"js/jquery.tools.min.js",
			"js/jquery.stickyPanel.js",
			"js/xbreadcrumbs.js",
			"lib/jquery-validation/jquery.validate.js",
			"lib/datatables/jquery.dataTables.min.js",
			"lib/datatables/dataTables.plugins.js",
			"lib/fusion-charts/FusionCharts.js",
			"js/jquery.microaccordion.js",
			"js/jquery.stickyPanel.js",
			"js/xbreadcrumbs.js",
			"js/lagu.js",
			function(){
				lga_fusionCharts.chart_k();
				$('#data_table').dataTable();
				lga_flowTabs.tabs_b();
				lga_selectBox.init();
				lga_datepicker.init();
				lga_editor.init();
				lga_sticky.sticky_contentActions();
				lga_clearForm.init();
				lga_form_a_validation.init();
			}
		)

function valid()
{
if($("#title").val()=='')
{
alert('Enter page title');
return false;
}
}
	</script>
</body>
</html>
