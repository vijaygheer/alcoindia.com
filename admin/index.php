<?php
@session_start();
require_once("../include/sql.php");

if(isset($_POST['submit']))
{
	$sql="select * FROM admin_account WHERE username='".mysqli_real_escape_string($connection,$_POST['username'])."' and password='".mysqli_real_escape_string($connection,$_POST['password'])."' and status='1'";
	$exe=mysqli_query($connection,$sql) or die(mysqli_error());
	$num=mysqli_num_rows($exe);
	if($num>0)
	{
			$result=mysqli_fetch_assoc($exe);
			$_SESSION['adminid'] = $result['id'];
			$_SESSION['adminname'] = $result['username'];
			echo '<script language="javascript">window.location.href="dashboard.php";</script>';
			
	}
	else
	{
		$msg="Username or Password does not match.";
	}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
      <meta name="robots" content="noarchive" />
     <title>ADMIN</title>
    
        <style type="text/css">
            
        html {background: #eee;}
        
        body {
          font-family: helvetica, arial, sans-serif !important;
          margin: 0;
          padding: 0 30px;
        }
        
        div#header {
          font-size: 12px;
          text-align: right;
          height: 40px;
          padding: 15px 30px;
          margin: 0 -30px;
        }
        
        html, body.users, body.login {
          height: 100%;
          padding: 0;
        }
        
        body.users div.container,
        body.login div.container {
          height: auto;
          min-height: 100%;
          position: relative;
          padding: 0 30px;
        }
        
        body.users div.container {padding: 0;}
        
        body.users div#header {margin: 0; padding-bottom: 10px;}
        
        div#other_products {
          position: absolute;
          bottom: 0;
          left: 0;
          background: #e5e5e5;
          text-align: center;
          width: 100%;
          margin: 0;
          padding: 0;
        }
        
        div#other_products div {
          display: block;
          padding: 10px 30px;
          margin: 0 auto;
          font-size: 12px;
          line-height: 15px;
          color: #ccc;
        }
        
        div#other_products ul,
        div#other_products li {
          display: inline;
          list-style: none;
          margin: 0;
          padding: 0;
        }
        
        body.login {
          padding: 0;
          text-align: center;
          border: none;
          background: #eee url("images/login_sprites.png") repeat-x left -938px !important;
        }
        
        body.login div#header {
          text-align: right;
          height: 33px;
          border: none;
          padding: 0;
          margin: 0;
        }
        
        body.login div#login_content {
          margin: 130px auto 20px auto;
          text-align: center;
          width: 100%;
          max-width: 988px;
          
        }
        
        body.login.basecamp div#login_content {
          background: url("images/onlyname.png") no-repeat 180px 42px;
		  background-size:200px 58px;
        }
        
        /*body.login div#signin_button input { width: 74px; }*/
        
        body.login div.login_dialog {
          width: 225px;
          margin: 0 auto;
          background: #fff;
          padding: 10px 39px 19px;
          -webkit-border-radius: 8px;
          -moz-border-radius: 8px;
          border-radius: 8px;
          border: 1px solid #aaa;
          -moz-box-shadow: 0 0 6px #999; /* firefox 3.5+ */
                -webkit-box-shadow: 0 0 6px #999; /* webkit */
                box-shadow: 0 0 6px #999;
                -ms-filter: "progid:DXImageTransform.Microsoft.Shadow(Strength=3, Direction=135, Color='#999999')"; /* IE 8+ */
                filter: progid:DXImageTransform.Microsoft.Shadow(Strength=3, Direction=135, Color='#999999'); /* IE < = 7 */
        }
        
        body:first-of-type.login div.login_dialog {border: none; margin-left:381px;}
        
        *:first-child+html body.login div.login_dialog {
          padding: 25px 39px 25px;
        }
        
        body.login div#login_content.wide div.login_dialog {
          width: 435px;
          padding: 10px 29px 25px;
        }
        
        body.login div.login_dialog h1 {
          font-size: 14px;
          font-weight: normal;
          line-height: 19px;
          margin: 13px 0 15px;
        }
        
        body.login div.login_dialog h1 strong {
          display: block;
          font-size: 17px;
        }
        
        body.login div.login_dialog div#remember_container {
          font-size: 12px;
          color: #333;
          margin: 0 0 15px;
        }
        
        body.login div.login_dialog div#user_name_login input {
          font-size: 13px;
          padding: 3px;
          width: 200px;
          font-family: helvetica, arial, sans-serif;
		 /* font-family:Arial,arial,sans-serif;
		  font-weight:bold;*/
		  
        }
        
        body.login div.login_dialog p {
          margin: 0 0 10px;
        }
        
        body.login div.extras {
          text-align: left;
          margin: 10px auto 10px 385px;
          width: 300px;
          text-align: center;
          color: #000;
        }
        
        body.login div.extras ul {
          margin: 0;
          padding: 0;
        }
        
        body.login div.extras ul li {
          list-style: none;
          font-size: 12px;
          margin-bottom: 3px;
        }
        
        body.login div.extras a {
          color: #CC0000;
        }
        
    </style>
    
        <script language="javascript" type="text/javascript">
            
            function validate(){
            
                if(document.singup.username.value==""){
                    alert("Please enter username");
                    document.singup.username.focus();
                    return false;
                }
                
                if(document.singup.password.value==""){
                    alert("Please enter password");
                    document.singup.password.focus();
                    return false;
                }
            
                return true;
            } 
    
    </script>
   <style type="text/css" media="all">
		@import url("css/style.css");
		
    </style>
	
	<!--[if lt IE 8]><style type="text/css" media="all">@import url("css/ie.css");</style><![endif]-->

</head>




<body>
	<div id="hld">
	<div class="wrapper">		<!-- wrapper begins -->
		<div class="block small center login">
			
				<div class="block_head">
					<div class="bheadl"></div>
					<div class="bheadr"></div>
					
					<h2>Login</h2>
								</div>		<!-- .block_head ends -->
				<div class="block_content">
					
					<!------------<div class="message info"><p>Just click login, this is an example.</p></div>-------->
					
					<form action="" method="post">
					<?php if(isset($msg)){?>
					<p style="color:red;"><?php echo $msg;?></p>
					<?php }?>
						<p>
							<label>Username:</label> <br />
							<input type="text" name="username" class="text" placeholder="admin" />
						</p>
						
						<p>
							<label>Password:</label> <br />
							<input type="password" name="password" class="text" placeholder="admin" />
						</p>
						
						<p>
							<input type="submit" class="submit" name="submit" value="Login" /> &nbsp; 
							<input type="checkbox" class="checkbox" checked="checked" id="rememberme" /> <label for="rememberme">Remember me</label>
						</p>
					</form>
					
				</div>		<!-- .block_content ends -->
					
				<div class="bendl"></div>
				<div class="bendr"></div>
								
			</div>		<!-- .login ends -->
		</div>						<!-- wrapper ends -->
	</div>		<!-- #hld ends -->
	<!--[if IE]><script type="text/javascript" src="js/excanvas.js"></script><![endif]-->	
	<script type="text/javascript" src="js/jquery.js"></script>
</body>
</html>