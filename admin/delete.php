

<?php
			     mysql_connect("localhost","root","");
				 mysql_select_db('laguadmin');
				     $d = "delete from addsubcategory  where subcat_id = '".$_REQUEST['id']."'";
					 mysql_query($d);
				 header("location:addsubcategory.php");
?>

