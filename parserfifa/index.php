<?
	header("Content-Type: text/html; charset=utf-8");
	include("db.php");
	include("simple_html_dom.php");
	
	set_time_limit(0); 
	$html = new simple_html_dom();
	$year = "16"; //год fifa 
	$page_id = 1; // старница
	$page_end = 286;// страница конечная
	
	
	
		function cut_file_name($file) {
		$position = strripos($file, '/');
		$file_name =  substr($file,$position+1,strlen ($file)-$position);
		return $file_name;
	}
	
	function clear_name($string) {
		$position = strripos($string, '<br');
		$name =  substr($string,0,$position);
		return trim($name);
	}
	
	
	
	
	
	function download_photo($internet_file,$uniqid) {
		GLOBAL $photo_dir;
		
		// качаем фотку игрока + заносим в базу
		
		
		$file_name =  cut_file_name($internet_file);
		
		
		
		
		$output_file = $photo_dir . $file_name;
		 
		if(!file_exists($output_file))  {
			file_put_contents($output_file , file_get_contents($internet_file));
			$id = db::insert("INSERT INTO Photos (`name`) VALUES ('$file_name')");
			return $id;
		} else
		
		{
			
			$result = db::select("SELECT id from Photos where name = '$file_name' ");
			if(count($result)>0) {
				return $result[0]['id'];
				} else {
				$id = db::insert("INSERT INTO Photos (`name`) VALUES ('$file_name')");
				return $id;
			}
			
		}
		
		
	}
	
	
	function download_country($internet_file,$uniqid) {
	
	//качаем картинку странцы и заноми ее в базу,
		GLOBAL $country_dir;
		$file_name =  cut_file_name($internet_file);
		$output_file = $country_dir . $file_name;
		
		if(!file_exists($output_file))  {
			file_put_contents($output_file , file_get_contents($internet_file));
			$id = db::insert("INSERT INTO Nations (`name`) VALUES ('$file_name')");
			return $id;
		} else
		
		{
			
			$result = db::select("SELECT id from Nations where name = '$file_name' ");
			if(count($result)>0) {
				return $result[0]['id'];
				} else {
				$id = db::insert("INSERT INTO Nations (`name`) VALUES ('$file_name')");
				return $id;
			}
			
		}
		
		
	}
	
	
	
	function create_player($name,$id_photo,$id_country,$rating){
		 //echo "INSERT INTO `Players` (`name`, `id_photo`, `id_country`, `rating`) VALUES ('$name' , $id_photo , $id_country , $rating );";	
		 db::insert("INSERT INTO `Players` (`name`, `id_photo`, `id_country`, `rating`) VALUES ('$name' , $id_photo , $id_country , $rating );");
		// создаем игрока
		
		
		
	}
	
	
	
	
	
	
	
	for($page_id = 1; $page_id < $page_end; $page_id++) {
	
	 
	 
	 echo "парсим страницу " . $page_id ."<br>";
     flush();
	
	
	//ходит по страницам от $page_id до  $page_end
	$page_link = "http://www.futhead.com/{$year}/players/?page={$page_id}";
	$photo_dir = dirname(__FILE__) . "/fifa/" . $year . "/players/photo/";
	$country_dir = dirname(__FILE__) . "/fifa/" . $year ."/players/country/";
	
	

	
	
	
	
	
	
	$html->load_file($page_link);
	$players = $html->find("tbody tr.player-row");
	foreach($players as $player) {
		$photo =  $player->find("td.player img.headshot",0)->src;
		//$club =  $player->find("td.player img.club",0)->src;
		$nation = $player->find("td.player img.nation",0)->src;
		$name = $player->find("td.player .name",0)->innertext;
		$name = clear_name($name);
		
		$rating = trim($player->find("td.rating span.gold",0)->innertext);
		
		$uniqid = uniqid();
		$id_photo = download_photo($photo,$uniqid);
		//echo $id_photo;
		$id_country = download_country($nation,$uniqid);
		//echo $id_country;
		create_player($name,$id_photo,$id_country,$rating); 
		
		
		
	 
		
	}
	
	
	
	
	
	}
	
	
	
	
 
	
	 
	
	
?>