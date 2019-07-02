<?php
$con=mysqli_connect("localhost","root","","demo");

if($con)
{
	$file= $_FILES['csvfile']['tmp_name'];
	$handle = fopen($file, "r");
	$row=1;
	while(($cont = fgetcsv($handle, 1000, ",")) !== false)
	{
		if($row == 1){$row++; continue;}
		$table = $_FILES['csvfile']['name'];
	
		$mobile_no = $cont[0];
		$vendor = $cont[1];
		$dates = $cont[2];
		$amount = $cont[3];
		$status = " ";
		$message = " ";
		
		if($cont[3] <= 160000)
		{
			$status = "Approved";
			
		}
		if($cont[3] >= 160000)
		{
			$status = "Approved";
			$message = "Warning:Your credit limit has reached 80%";
			
		}
		if($cont[3] >= 200000)
		{
			$status = "Declined";
			$message = "Error: You have exhausted your credit limit";
		
		}
		//$query="CREATE table person1(mobile_no varchar(10), vendor varchar(30), dates varchar(30), amount int(30), status varchar(50), message varchar(90));"
		$query="INSERT INTO person(mobile_no, vendor, dates, amount,status,message) VALUES('$cont[0]','$cont[1]','$cont[2]',$cont[3],'$status','$message')";	
		mysqli_query($con,$query);
	}
}
else
{
	echo"connection failed";
}
?>

<!DOCTYPE html> 
<html>
<body>
<center>
Uploaded sucessfully... <br>
<a href="success.php">Click here to know the payment status</a>
</center>
</body>
</html>