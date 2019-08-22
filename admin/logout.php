<?php
session_start();
unset($_SESSION['adminid']);
session_destroy();
if(!isset($_SESSION['adminid'])){
	echo '<script language="javascript">document.location.href="index.php";</script>';
}
?>