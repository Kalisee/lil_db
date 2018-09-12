<!DOCTYPE html>
<html>
<head>
<title> Lil' DB </title>
<style>
body{
background-image: url("sports.jpg");
opacity: 0.9;
filter: alpha(opacity=90);
}
div{
	background: #CC0000;
	padding: 10px;
	color: white; 
	margin-left: 250px;
	margin: auto;
	width: 750px;
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
<center><h3>Results:</h3></center>
<center><table border='1'></center>
<tr><td><strong>Sport</strong></td><td><strong>Player Name </strong></td><td><strong>Team</strong></td><td><strong>Hometown</strong></td><td><strong>Description</strong></td></tr>

<?php

$con = @mysqli_connect("localhost", "root", "","lil_db");

if(mysqli_connect_errno($con)){
	die('Could not connect to db '.mysqli_connect_error);
}

$query = "SELECT sport_name, player_name, Team, Hometown, Description FROM player_stats";
$query_run = mysqli_query($con, $query);

if($query_run -> num_rows > 0){

	while($row = mysqli_fetch_assoc($query_run)){
	echo "<tr><td>".$row["sport_name"]."</td><td>".$row["player_name"]."</td><td>".$row["Team"]."</td><td>".$row["Hometown"]."</td><td>".$row["Description"]."</br>";
	
	}
	}
?> 

</table>
</center>
</div>
</body>
</html>