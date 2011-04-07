
<?php

/*
*This file handles all the database queries. 
*@author: Allan Yong
*@date: March 31, 2011
*/

class dataBase
{

	private $mysqlConnec;
	
	function __construct()
	{
			$this->mysqlConnec = mysql_connect('localhost', 'root', 'things');
			
			if (!$this->mysqlConnec) {
		    die('Could not connect: ' . mysql_error());
		}
		
		
		$db_selected = mysql_select_db('ides_db', $this->mysqlConnec);
		
		if (!$db_selected) {
		    die ('Can\'t use foo : ' . mysql_error());
		}
		
		$result = mysql_list_tables("ides_db");
		$num_rows = mysql_num_rows($result);
	
	}
	
	function __destruct()
	{}
	
	/*
	*gets the information from student table
	*
	*/
	function query_getStudents()
	{
		$query_string = "SELECT * FROM studentTable ORDER BY stu_fname";
		$query = mysql_query($query_string, $this->mysqlConnec);
		return $query;
	}
	
	/*
	*
	*
	*/
	function query_forGroupHome()
	{
		$query_string = "SELECT * FROM groupTable ORDER BY grp_id";
		$query = mysql_query($query_string, $this->mysqlConnec);
	}
	
	/*
	*
	*
	*/
	function query_forGroupPage()
	{
	
	}
	
	/*
	*This function gets an id and passed into this function to get the image pathes
	*@$stu_id, the id of the student from student table to picture table
	*/
	function query_getPic($stu_ID)
	{
		$query_string =  sprintf('SELECT * FROM photoTable WHERE studentID = %d',$stu_ID);
		$query = mysql_query($query_string, $this->mysqlConnec);
	}
	
}


?>

