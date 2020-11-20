<?php
$host = 'localhost';
  $database = 'u0811447_azartymoney';
  $user = 'u0811447_default';
  $pass = 'yEB_sl69';
  $dsn = "mysql:host=$host;dbname=$database;";
  $options = array(
      PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
  );
$pdo = new PDO($dsn, $user, $pass, $options);
$stmt = $pdo->query('SELECT * FROM sliders');

//тут папка с картинками 
$photo = "data/img-sliders/";
$new_photo_folder = "temp";

if( is_dir($new_photo_folder) === false )
    mkdir($new_photo_folder);

while ($row = $stmt->fetch())
{
	if(file_exists($photo.'/'.$row['photo']))
		copy($photo . '/' .$row['photo'], $new_photo_folder . '/' . $row['photo']);
}
