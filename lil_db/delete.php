<!DOCTYPE html>
<html>
<head>
<title> Lil' DB </title>
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
	
	<form action = "delete.php" method = "POST">
		
<center><h1>Enter Players Into Lil' DB Here:<h1></center>
<ul>
<center>
<li><label for="Sport">Sport: </label>
    <select id="sp" name="sp">
      <option value="Baseball">Baseball</option>
      <option value="Basketball">Basketball</option>
      <option value="Football">Football</option>
      <option value="Ice Hockey">Ice Hockey</option>
    </select> <br><br>
<li> <label for = "Player"> <strong> Player: </strong></label>
<input type="text" name="pl" id="pl" placeholder= "e.g. Alex Rodriguez" required/></li></br>

<li> <label for = "Team"> <strong> Team: </strong> </label>
<input type="text" name="t" id="t" placeholder="e.g. New York Yankees" required/></li></br>

<li><label for = "Hometown"> <strong> Hometown: </strong> </label>
<select id ="h" name = "h">
	<option value="Alabama">Alabama</option>
	<option value="Alaska">Alaska</option>
	<option value="Arizona">Arizona</option>
	<option value="Arkansas">Arkansas</option>
	<option value="California">California</option>
	<option value="Colorado">Colorado</option>
	<option value="Connecticut">Connecticut</option>
	<option value="Delaware">Delaware</option>
	<option value="Washington D.C.">District Of Columbia</option>
	<option value="Florida">Florida</option>
	<option value="Georgia">Georgia</option>
	<option value="Hawaii">Hawaii</option>
	<option value="Idaho">Idaho</option>
	<option value="Illinois">Illinois</option>
	<option value="Indiana">Indiana</option>
	<option value="Iowa">Iowa</option>
	<option value="Kansas">Kansas</option>
	<option value="Kentucky">Kentucky</option>
	<option value="Louisiana">Louisiana</option>
	<option value="Maine">Maine</option>
	<option value="Maryland">Maryland</option>
	<option value="Massachusetts">Massachusetts</option>
	<option value="Michigan">Michigan</option>
	<option value="Minnesota">Minnesota</option>
	<option value="Mississippi">Mississippi</option>
	<option value="Missouri">Missouri</option>
	<option value="Montana">Montana</option>
	<option value="Nebraska">Nebraska</option>
	<option value="Nevada">Nevada</option>
	<option value="New Hampshire">New Hampshire</option>
	<option value="New Jersey">New Jersey</option>
	<option value="New Mexico">New Mexico</option>
	<option value="New York">New York</option>
	<option value="North Carolina">North Carolina</option>
	<option value="North Dakota">North Dakota</option>
	<option value="Ohio">Ohio</option>
	<option value="Oklahoma">Oklahoma</option>
	<option value="Oregon">Oregon</option>
	<option value="Pennsylvania">Pennsylvania</option>
	<option value="Rhode Island">Rhode Island</option>
	<option value="South Carolina">South Carolina</option>
	<option value="South Dakota">South Dakota</option>
	<option value="Tennessee">Tennessee</option>
	<option value="Texas">Texas</option>
	<option value="Utah">Utah</option>
	<option value="Vermont">Vermont</option>
	<option value="Virginia">Virginia</option>
	<option value="Washington">Washington</option>
	<option value="West Virginia">West Virginia</option>
	<option value="Wisconsin">Wisconsin</option>
	<option value="Wyoming">Wyoming</option>
</select><br><br>			


<li> <label for = "Description"> <strong> Description: </strong> </label>
<input type="text" name="d" id="d" placeholder="Description" required/></li></br>
			<input type = "submit" value = "ADD PLAYER">
			</center>
			</form>	
		<center><h2>OR...</h2></center><br>
		
		
</body>
</html>

<?php
$sp = "";
$pl = "";
$t = "";
$h = "";
$d = "";

if(isset($_POST["sp"]) && isset($_POST["pl"]) && isset($_POST["t"]) && isset($_POST["h"]) && isset($_POST["d"])) {
$sp = $_POST["sp"];
$pl = $_POST["pl"];
$t  = $_POST["t"];
$h  = $_POST["h"];
$d  = $_POST["d"];

$con = @mysqli_connect("localhost", "root", "","lil_db");

if(mysqli_connect_errno($con)){
	die('Could not connect to db '.mysqli_connect_error);
}

$query = "DELETE FROM player_stats (sport_name, player_name, Team, Hometown, Description) VALUES ('".$sp."','".$pl."','".$t."','".$h."','".$d."')";

if($query_run = mysqli_query($con, $query)){
	echo str_repeat('&nbsp;', 10).$pl." on the ".$t." was deleted from Lil' DB";
} else {
	echo "failure";
}

mysqli_close($con);

}
?>