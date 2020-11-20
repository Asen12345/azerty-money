<?php
class file extends ControllerSite {
    public $module_name = "Файл";
	
	public function view()
	{
		if (is_numeric($_GET['param2']))
		{
			$rowElement = $this->m->getOneElementByIdAndFields(intval($_GET['param2']));
			if (!$rowElement["file"]) die("Unknown file");
	        header("Content-Disposition: attachment; filename=".$rowElement['file']);
			if(isset($_SERVER['HTTP_USER_AGENT']) and strpos($_SERVER['HTTP_USER_AGENT'],'MSIE'))
				Header('Content-Type: application/force-download');
			else
				Header('Content-Type: application/octet-stream'); 
			readfile("data/file/".$rowElement["file"] );
			die();
		} else $this->reg->go404();		
	}
}
?>