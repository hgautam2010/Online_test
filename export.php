<?php
$con=mysqli_connect('localhost','root','') or die(mysql_error());
mysqli_select_db($con,'online_test') or die("cannot select DB");
$id=44;
 
$query=mysqli_query($con,"SELECT * FROM result WHERE test_id='$id'");
//$stmt->execute();
 
 
$columnHeader ='';
$columnHeader = "Username"."\t"."Marks"."\t";
 
$setData='';
 
$numrows=mysqli_num_rows($query);
if($numrows>0)
{
	while($rec=mysqli_fetch_row($query))
	{
		$rowData = '';
		$rowData=$rowData."".$rec[2]."\t".$rec[3];
		$setData .= trim($rowData)."\n";
	}
	header("Content-type: application/octet-stream");
	header("Content-Disposition: attachment; filename=Book record sheet.xls");
	header("Pragma: no-cache");
	header("Expires: 0");
 
	echo ucwords($columnHeader)."\n".$setData."\n";
}
else
	 echo "NO RESULT";
 

 
?>