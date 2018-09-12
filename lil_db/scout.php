<!DOCTYPE html>
<html>
<head>
<title> Lil' DB </title>
<style>
body{
background-image: url("sports.jpg");
opacity: 0.8;
filter: alpha(opacity=80);
}
div{
	background: #CC0000;
	padding: 10px;
	color: white; 
	margin-left: 250px;
	margin: auto;
	width: 650px;
	border-style: solid;
	border-color: white;
	box-shadow: 10px 10px 5px #888888;
	text-align: center;
	font-family: Arial, Helvetica;	
}
</style>
</head>
<body>
<div>		
<center><h3>What States Are Producing The Most Professional Athletes?</h3></center>
<center><table border='1'></center>
<tr><td><strong>State</strong></td><td><strong>Amount</strong></td></tr>

<?php

$con = @mysqli_connect("localhost", "root", "","lil_db");

if(mysqli_connect_errno($con)){
	die('Could not connect to db '.mysqli_connect_error);
}

$query = "SELECT Hometown, COUNT(Hometown) AS Amount FROM player_stats GROUP BY Hometown ORDER BY Amount DESC";
$query_run = mysqli_query($con, $query);


	while($row = mysqli_fetch_assoc($query_run)){
	echo "<tr><td>".$row["Hometown"]."</td><td>".$row["Amount"]."</td></tr>";
	
	}
?> 

</table>
</center>
</div>
</body>
</html>