<?php
class Mphoto extends ModelFrame {
	public function checkRequest($action)
	{
		if (!$_FILES["photoFile"])
		{
			return "Не выбран файл";
		}
		
		return 1;
	} 
    
    public function getNewsId(){
        $element = $this->getOneElementByFields(array("id"=>intval($_GET['param2'])));
        return $element['nid'];
    }
    
	public function deleteOne($id)
	{
		$rowFile = parent::getOneElementByIdAndFields($id);
		$this->reg["sql"]->query("delete from r_m_".$this->ename." where id = ".intval($id));
		
		unlink('data/photo/'.$rowFile['filename']);
        $smallFileName=(string) "data/photo/m".$rowFile['filename'];
        if (file_exists($smallFileName)){
		  unlink('data/photo/m'.$rowFile['filename']);
        }
		return 1;
	}
	public function addpicture($img,$sizex,$sizey) {
		$name=date('mdy_Is').rand(111111111,999999999).".jpg";
		$upfile = imagespath.$name;

		if ($img["error"] == 0)
		{
			if ($img["type"])
			{
				if (move_uploaded_file($img['tmp_name'],$upfile)) 
				{
	
					if (!$sizex==0 and !$sizey==0)
					{	
						 list($width_orig, $height_orig) = getimagesize($upfile);
			
						 if (($width_orig)<$sizex) $sizex=$width_orig;
					     if (($height_orig)<$sizey) $sizey=$width_orig;
					     
					     $ratio_orig = $width_orig/$height_orig;
					     if ($sizex/$sizey > $ratio_orig) {
					       $sizex = $sizey*$ratio_orig;
					     } else {
					       $sizey = $sizex/$ratio_orig;
					     }
					     $image_p = imagecreatetruecolor($sizex, $sizey);
					     if ($img["type"]=="image/gif")  $image = imagecreatefromgif($upfile);
					     if ($img["type"]=="image/jpeg") $image = imagecreatefromjpeg($upfile);
					     if ($img["type"]=="image/png") $image = imagecreatefrompng($upfile);
                         if ($img["type"]=="image/pjpeg") $image = imagecreatefromjpeg($upfile);
                         if ($img["type"]=="image/x-png") $image = imagecreatefrompng($upfile); 
					     imagecopyresampled($image_p, $image, 0, 0, 0, 0, $sizex, $sizey, $width_orig, $height_orig);
					     unlink($upfile);
						 imagejpeg($image_p, $upfile, 100);

						 
					     $width1 = 160;
					     $height1 = 120;
					
					     $ratio_orig1 = $width_orig/$height_orig;
					     if ($width1/$height1 > $ratio_orig1) {
					       $width1 = $height1*$ratio_orig1;
					     } else {
					       $height1 = $width1/$ratio_orig1;
					     }
					     $image_p1 = imagecreatetruecolor($width1, $height1);
					     if ($myfile_type=="image/gif")  $image1 = imagecreatefromgif($upfile);
					     if ($myfile_type=="image/jpeg") $image1 = imagecreatefromjpeg($upfile);
					     if ($myfile_type=="image/png") $image1 = imagecreatefrompng($upfile);
                         if ($myfile_type=="image/pjpeg") $image = imagecreatefromjpeg($upfile);
                         if ($myfile_type=="image/x-png") $image = imagecreatefrompng($upfile); 
					     imagecopyresampled($image_p1, $image, 0, 0, 0, 0, $width1, $height1, $width_orig, $height_orig);
					     imagejpeg($image_p1, $upfile = imagespath."m".$name, 100);

						 //minisizex
				 	}
				 	$tmp = getimagesize($upfile);
				 	if ($tmp["mime"])
				 		return array("name"=>$name,"type"=>$img['type']);
				 	else
				 		return 0;
				} else return 0;
				if ($tmp["mime"])
				return array("name"=>$name,"type"=>$img['type']);
			}
		} else return 0;
	}

}
?>