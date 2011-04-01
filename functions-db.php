
<?php

/*
*This file handles all the database queries. 
*
*/

class dataBase
{

	private $mysqlConnec;
	function __construct()
	{
			$this->mysqlConnec = mysql_connect('localhost', 'root', 'root');
			
			if (!$this->mysqlConnec) {
		    die('Could not connect: ' . mysql_error());
		}
		
		echo 'Connected successfully';
		echo "<BR />";
		
		$db_selected = mysql_select_db('ides_db', $this->mysqlConnec);
		
		if (!$db_selected) {
		    die ('Can\'t use foo : ' . mysql_error());
		}
		
		$result = mysql_list_tables("ides_db");
		$num_rows = mysql_num_rows($result);
	
		for ($i = 0; $i < $num_rows; $i++) {
		    echo "Table: ", mysql_tablename($result, $i), "\n";
		    echo "<BR />";
		}
	}
	
	function __destruct()
	{}
	
	/*
	*
	*
	*/
	function query_getStudents()
	{
		$query_string = "SELECT * FROM studentTable ORDER BY stu_id";
		$query = mysql_query($query_string, $this->mysqlConnec);
		while($row = mysql_fetch_object($query)){ 
			//print($row);
			 echo "<xmp>";
			 var_dump($row);
			 echo "</xmp>";
		}
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
	*
	*
	*/
	function query_getPic($stu_ID)
	{
		$query_string =  sprintf('SELECT * FROM photoTable WHERE studentID = %d',$stu_ID);
		$query = mysql_query($query_string, $this->mysqlConnec);
	}
	
}


?>

