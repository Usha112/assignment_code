<!DOCTYPE html>
<html>
<head>
	<title>Payment status</title>
</head>

<body>
<table border=3 align="center">
<tr>
	<th>mobile_no</th>
	<th>vendor</th>
	<th>dates</th>
	<th>amount</th>
	<th>status</th>
	<th>message</th>
<tr>
<?php
$conn = mysqli_connect("localhost","root","","demo");
if($conn-> connect_error){
	die("connection failed". $conn->connect_error);
}
$sql = "SELECT mobile_no, vendor, dates, amount, status, message from person";
$result = $conn -> query($sql);
if($result -> num_rows > 0){
	while($row = $result -> fetch_assoc()){
		echo "<tr><td>".$row["mobile_no"]."</td><td>".$row["vendor"]."</td><td>".$row["dates"]."</td><td>".$row["amount"]."</td><td>".$row["status"]."</td><td>".$row["message"]."</td></tr>";
	}
	echo "</table>";
}
else
{
	echo "o result";
}
$conn-> close();
?>
</table>
</body>
</html>
