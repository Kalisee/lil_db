<!DOCTYPE html>
<html>
<head>
<title> Search Results </title>
<style>
ul { list-style: none; }
body{
background-image: url("sports.jpg");
opacity: 0.8;
filter: alpha(opacity=80);
}
form{
	background: #CC0000;
	padding: 10px;
	color: white; 
	margin-top: 100px;
	margin-left: 300px;
	width: 650px;
	border-style: solid;
	border-color: white;
	box-shadow: 10px 10px 5px #888888;
	text-align: center;
	font-family: Arial, Helvetica;	
}
a.button {
    width: 140px;
    background-color: #0e8db6;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
input[type=submit] {
    width: 140px;
    background-color: #0e8db6;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #89c8dd;
}
</style>
</head>
<body>

	<form action = "pSearch.php" method = "POST">
		<center><table border='1'></center>
<tr><td><strong>Sport</strong></td><td><strong>Player Name </strong></td><td><strong>Team</strong></td><td><strong>Hometown</strong></td><td><strong>Description</strong></td></tr>

<center><h1>Find Players:<h1></center>
<ul>
<center>
<li><label for="Sport">Sport: </label>
    <select id="sp" name="sp">
      <option value="Baseball">Baseball</option>
      <option value="Basketball">Basketball</option>
      <option value="Football">Football</option>
      <option value="Ice Hockey">Ice Hockey</option>
    </select> <br><br>
<li> <label for = "Player"> Player: </label>
<input type="text" name="pl" id="pl" placeholder= "e.g. Alex Rodriguez" required/></li></br>
			<input type = "submit" value = "SEARCH">
			</center>
			</form>	
		<center><h2>OR...</h2></center><br>
		<a href="scout.php" class="button">Scout</a>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="show.php" class="button">Show Database</a>
</body>
</html>
<?php

$sp = "";
$pl = "";
$con = @mysqli_connect("localhost", "root", "","lil_db");

if(mysqli_connect_errno($con)){
	die('Could not connect to db '.mysqli_connect_error);
}

$query = "SELECT sport_name, player_name FROM player_stats WHERE CONCAT (sport_name AND player_name LIKE '%$sp%' AND '%$pl%')";  

$query_run = mysqli_query($con, $query);

if($query_run -> num_rows > 0){

	while($row = mysqli_fetch_assoc($query_run)){
	echo "<tr><td>".$row["sport_name"]."</td><td>".$row["player_name"]."</br>";
	} 
 
}
mysqli_close($con);

?>