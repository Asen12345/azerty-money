<?php
class MFile extends ModelFrame {

	public function checkRequest($action)
	{		
		return 1;
	}	
	public function uploadFile($file)
	{
		if ($file["error"] == 0)
		{
			if (move_uploaded_file($file['tmp_name'],'data/file/'.iconv("utf-8", "windows-1251", $file['name']))) return 1; else return 0;
		} else return 0;
	}
	public function deleteOne($id)
	{
		$fileData = $this->getOneElementByIdAndFields(intval($id));
		if (file_exists('data/file/'.$fileData['file']))
		{
			unlink('data/file/'.$fileData['file']);
		}
		$this->reg["sql"]->query("delete from r_m_".$this->ename." where id = ".intval($id));		
		return 1;
	}
}

?>