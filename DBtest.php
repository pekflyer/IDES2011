<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--
<html>
<head>
<script type="text/javascript" src="js/jquery-1.5.1.js"></script>

<title>henri u suck badly</title>
</head>
<body>
<h1>henri u don't suck</h1>
	<div id="page-wrap">
     	<h1>Reading XML with jQuery</h1>
     </div>
-->
	     <?php
	     error_reporting(E_ALL);
		 ini_set('display_errors', true);
     	 require_once('functions-db.php');
		 $db_control = new dataBase();
		 $query =  $db_control->query_getStudents();
		 
		

     ?>
<!--
</body>
</html>
-->