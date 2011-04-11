<?php
	error_reporting(E_ALL);
	ini_set('display_errors', false);
	
	$studentName;
	$stdImage;
	$studentWeb;
	$studentEmail;
	$studentHome;
	$groupTitle;
	$groupName;
	$groupInstr;
	$questions[6];
	
	$mysqlConnec = mysql_connect('localhost', 'root', 'things');
	if(!$mysqlConnec) 
	{
	    die('Could not connect: ' . mysql_error());
	}
	
	$db_selected = mysql_select_db('ides_db', $mysqlConnec);
	if (!$db_selected) {
	    die ('Can\'t use foo : ' . mysql_error());
	}
	
	if(isset($_GET["std_id"]))
	{
	 	$std_id = $_GET['std_id'];
		$query_string = sprintf('SELECT * FROM studentTable WHERE stu_id = %d', $std_id);
		$query 	= mysql_query($query_string, $mysqlConnec);
		$row 	= mysql_fetch_array($query);

		//store all data		
		$studentName 	= $row["stu_fname"].' '.$row["std_lname"];
		$stdImage		= $row["stu_fname"].'_'.$row["std_lname"];
		$studentWeb 	= $row["stu_web"];
		$studentEmail 	= $row["stu_email"];
		$studentHome 	= $row["stu_hometown"];
		
		$groupTitle		= $row["grp_title"];
		$groupName		= $row["grp_name"];
		$groupInstr		= $row["instructor"];
		
		
		$questions[0] 	= $row["quesOne"];
		$questions[1] 	= $row["quesTwo"];
		$questions[2] 	= $row["quesThree"];
		$questions[3] 	= $row["quesFour"];
		$questions[4] 	= $row["quesFive"];
		$questions[5] 	= $row["quesSix"];
		

	//echo "<script>alert(".$stdImage."');</script>";
		
	}
	
	//echo "<script>alert(".$stdImage."');</script>";
	//echo "<script>$(\"project_topbar\").html(\"".$studentName."\");</script>";
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="css/student.css" type="text/css" media="all"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js" type="text/javascript"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.11/jquery-ui.min.js" type="text/javascript"></script>

<title>IDES Graduates 2011</title>
</head>

<body>
	<div class="project_topbar">
	<? 
		echo "<h1 class=\"grp\">".$groupName." : ".$groupTitle."</h1>\n";
		echo "<h3 class=\"stu\">".$studentName."</h3>\n";
	?>
	</div>
	<div class="project_left">
		<?
			echo "<div class=\"portrait\">
		<img src=\"./images/students/".$stdImage.".jpg\"></img>\n";				echo "</div>\n";
			echo "<div>HOMETOWN</div>\n";
			echo $studentHome."\n";
		    echo "<div><a href=\"".$studentWeb."\">PORTFOLIO</a></div>\n";
		    echo "<div><a href=\"mailto:".$studentEmail."\">CONTACT</div>\n";
	    ?>
	    </div>
	</div>
	    
	<div class="bigimage">
		<?
			echo "<img src=\"./images/students/".$stdImage.".jpg\"/>";
		?>
	</div>
	    
	<div class="project_right">
		<?
			for($q = 0; $q < 6; $q++)
			{
				echo "<p><b>Question ".($q+1)."</b> ".$questions[$q]."</p>";
			}
		?>
	</div>
	    
	<div class="smallimage">
		<?
			for($s = 1; $s <= 3; $s++)
			{
				echo "<img src=\"./images/students/additional/".$stdImage."_".$s.".jpg\" class=\"small\"/>";
			}
		?>
	</div>
</body>
</html>
