<!--  -->
<?php
    include("../include/sql.php");
$page='about_us';
if(isset($_POST['sub']))
{
 $title =$_POST['title'];
 $aboutdesc = $_POST['description']; 
	if($_FILES['file']['name']) 
    {		
		$image=$_FILES["file"]["name"];		
		$flag = move_uploaded_file($_FILES["file"]["tmp_name"],"../uploads/".$_FILES["file"]["name"]);
		
		$u = "insert into pages set title ='".mysql_real_escape_string($title)."',descr='".mysql_real_escape_string($aboutdesc)."',img='".mysql_real_escape_string($image)."'";
	}
	else
	{
		$u = "insert into pages set title ='".mysql_real_escape_string($title)."',descr='".mysql_real_escape_string($aboutdesc)."'";
	} 
 
 mysql_query($u);
echo "<script>window.location='about.php'</script>";
}

if(isset($_GET['id']))
{
mysql_query("delete from pages where id='".$_GET['id']."' and page_name=''");
echo "<script>window.location='about.php'</script>";
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
                <span id="slide_close"><a href="dashboard.php"> Click Here to Go Back </a></span>

				<div class="cf">
					

				<div class="row cf">
					<div class="dp75 taj">
                        <h4 class="sepH_b">Add New Pages</h4>
                        
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

						<h1 class="sepH_c">Pages</h1>
<form action="" method="post" enctype="multipart/form-data" onsubmit="return valid();">
						<div class="formEl_a">

										<fieldset>
											<legend>Add</legend>
											<div class="sepH_b">
											    Title:<br>
											    <input type="text" class="inpt_a" name="title" id="title" value="" /><br><br>
												Description:<br>
											    <textarea class="tinymce txtar_a" name="description" id="description"></textarea><br><br>
												Image<br>
												<input type="file" name="file" id="file" ><br><br>
											   <input type="submit" class="btn btn_d" name="sub" id="sub">
											
											</div>

											

											
										</fieldset>

									</div>
						</form>
						
						<table cellpadding="0" cellspacing="0" border="0" class="display" id="data_table">
								<thead>
									<tr>
										
										<th><div class="th_wrapp">title</div></th>
										<!--<th><div class="th_wrapp">description</div></th>-->
										<th><div class="th_wrapp">Action</div></th>
										
									</tr>
								</thead>
								<tbody>
									<?php
									$select = "select * from pages";
									 $dr = mysql_query($select);
									 
										 while($rec = mysql_fetch_array($dr))
										 {
											 
												?>
												 <tr>
												 <td><?php echo $rec['title']; ?></td>
												 <!--<td><?php //echo $rec['descr']; ?></td>-->
												 <td>
												 <a href='editabout.php?id=<?php echo $rec[0] ?>' class="sepV_a" title="Edit">
												 <img src="images/icons/pencil_gray.png" alt="" /></a> <?php if($rec['page_name']==''){?> <a href='about.php?id=<?php echo $rec[0] ?>' class="sepV_a" title="Delete" onclick="return confirm('Are you sure?')">
												 <img src="images/icons/trashcan_gray.png" alt="" /></a><?php }?></td>
												 </tr>
											<?php	 
										 }
									 
                                 ?>
									
								</tbody>
							</table>
						
						

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
