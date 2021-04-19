<?php
class DB
{
    static function init()
    {
     		$servername = "localhost";
			$username = "oakscode";
			$password = "oakscode";
			$dbname = "poc";
			$conn = mysqli_connect($servername, $username, $password, $dbname);
			if (!$conn) 
			{
  				die("Connection failed: " . mysqli_connect_error());
			}
		return $conn;
    }
    static function insert($table,$data,$conn)
	{
	//oquery builder
        $fields=array_keys($data);	
        $number_of_fields=count($fields);   
	   	$sql = "INSERT INTO ".$table;
	   	for($count=0;$count < $number_of_fields;$count++)
	   		{
	   			if($count ==0)
	   				{
	   					$sql=$sql." (".$fields[$count].",";
	   				}
	   			else
	   				{
	   					$sql=$sql."".$fields[$count].")";
	   				}
	   		}
	   	$sql=$sql." VALUES";
	   	for($count=0;$count < $number_of_fields;$count++)
	   	{
	   		if($count ==0)
	   		{
	   		    $array_data=$fields[$count];
	   			$sql=$sql." ('".$data[$array_data]."',";
	   		}
	   		else
	   		{
	   			$sql=$sql."'".$data[$array_data]."')";
	   		}
	   	}
	   	//query builder
	   	if (mysqli_query($conn, $sql))
		{
  			return true;
		} 
		else 
		{
  			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}
	static function FillDropdown($value,$text,$table,$init)
	{
		//this function is to fill dropdown from the table
	    $dropdown='';
	    $sql = "SELECT ";
	    $sql = $sql." ".$value.",".$text." from ".$table;
	    $result = mysqli_query($init, $sql);
		if (mysqli_num_rows($result) > 0) 
			{
  			// output data of each row
  				while($row = mysqli_fetch_assoc($result)) 
  				{
    				$dropdown = $dropdown."<option value=".$row[$value].">".$row[$text]."</option>";
  				}
			}
			else 
			{
  				$dropdown=$dropdown."<option>NO DATA</option>";
			}
		echo $dropdown;
    }
}
?>
