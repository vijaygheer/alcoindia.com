<?php include('conn.php') ?>
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css'>
<link rel='stylesheet prefetch' href='http://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css'>
<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/jvectormap/2.0.4/jquery-jvectormap.min.css'>

      <link rel="stylesheet" href="css/style.css">

      <style media="screen">
      /*button
      {
      position:relative;
      left:100px;
       top:30px;
       border-radius:30px;
       background-color:white;
       width: 200px;
       height: 40px;
       font-weight:900;
       font-size: 20px;
      }
      button:hover
      {
      	background-color:#008080;
      	color:white;
      }
      input
      {
        position:relative;

         top:0px;
         border-radius:5px;
         background-color:white;
         width: 200px;
         height: 30px;
         font-weight:800;
         font-size: 20px;
      }

      select{
          position:relative;

           top:0px;
           left:10px;
           border-radius:5px;
           background-color:white;
           width: 200px;
           height: 30px;
           font-weight:800;
           font-size: 20px;
      }
*/

      </style>

</head>
<body>
  <section>
	<header>
		<nav class="rad-navigation">
			<div class="rad-logo-container">
				<a href="#" class="rad-logo"><i class=" fa fa-recycle"></i>Alco_india</a>

			</div>
      <div>
<form method="POST">
      <button style=" top:15px; float:right ;position:relative;  margin-right:10px;left:-100px;" name="lout" >LOG OUT</button>
</form>

    </div>
		</nav>
	</header>
</section>
<aside>
	<nav class="rad-sidebar">
		<ul>
			<li>
				<a href="index.php" class="inbox">
					<i class="fa fa-dashboard"><span class="icon-bg rad-bg-success"></span></i>
					<span class="rad-sidebar-item">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="addcate.php">
					<i class="fa fa-bar-chart-o">
						<span class="icon-bg rad-bg-danger"></span>
					</i>
					<span class="rad-sidebar-item">Categorys</span>
				</a>
			</li>
      			<li><a href="addbanner.php" class="snooz"><i class="fa fa-line-chart"><span class="icon-bg rad-bg-primary"></span></i><span class="rad-sidebar-item">Banner</span></a></li>

			<li>
				<a href="addsubcate.php">
					<i class="fa fa-wrench"><span class="icon-bg rad-bg-violet"></span></i>
					<span class="rad-sidebar-item">Subcategory</span>
				</a>
			</li>
      <li>
        <a href="product.php">
          <i class="fa fa-wrench"><span class="icon-bg rad-bg-danger"></span></i>
          <span class="rad-sidebar-item">Product</span>
        </a>
      </li>
      <li>
        <a href="managepro.php">
          <i class="fa fa-wrench"><span class="icon-bg rad-bg-danger"></span></i>
          <span class="rad-sidebar-item">Manage Products</span>
        </a>
      </li>
          <li>
            <a href="viewpr.php" class="snooz"><i class="fa fa-line-chart"><span class="icon-bg rad-bg-primary"></span></i><span class="rad-sidebar-item">Member List</span></a>
          </li>
          <li>
            <a href="addgallery.php" class="snooz"><i class="fa fa-line-chart"><span class="icon-bg rad-bg-primary"></span></i><span class="rad-sidebar-item">Add Gallery</span></a>
          </li>
              <li>
                <a href="viewpr.php" class="snooz"><i class="fa fa-line-chart"><span class="icon-bg rad-bg-primary"></span></i><span class="rad-sidebar-item">Latest Product</span></a>
              </li>

		</ul>
	</nav>
</aside>
<main>
	<section>
		<div class="rad-body-wrapper">
			<div class="container-fluid">
<?php

/*session
session_start();
if(isset($_SESSION['login']))
{

}
else
{
    header("location:../index.php");
}

if(isset($_POST['lout']))


{
error_reporting(0);
session_start();
unset($_SESSION);
session_destroy();
header("location:../index.php");
}
*/
 ?>
