<?php
	
	
	include("db.php");
	header("Content-Type: text/html; charset=utf-8");
	$year = "16"; //год fifa 
	$photo_dir =  "/fifa/" . $year . "/players/photo/";
	$country_dir = "/fifa/" . $year ."/players/country/";
	
	
	$query= $_GET['query'];
	$result = db::select("SELECT  Players.id,Players.name, Players.rating, Nations.name as country, Photos.name as photo FROM Players 
	LEFT JOIN  Nations ON Players.id_country =  Nations.id
	LEFT JOIN  Photos ON Players.id_photo =  Photos.id
	WHERE MATCH (Players.name) AGAINST ('+$query*' IN BOOLEAN MODE)
	ORDER by Players.rating DESC
	limit 100");
	
	
	$json = json_encode($result);
	 echo $json;
	//foreach($result as $player) {
		//echo $player['id'] . $player['name'] .  ":".  $player['rating']    ;
		//echo "<img src='".$photo_dir.$player['photo']."' height='50px'>";
		//echo "<img src='".$country_dir.$player['country']."' height='50px'>";
		//echo "<br>"; 
	//}
	
?>
