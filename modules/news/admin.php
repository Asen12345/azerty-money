<?php
/* by icyken.ru 2011 */
class news extends ControllerAdmin {

	public function mainPage() {
		$this->reg["view"]->addBlock('block1','admin_news.tpl');
		$this->setMode("one");
	}
    
	public function listNews()
	{
		$data = ORM::for_table('news')->order_by_desc('id')->find_array();
		$this->setData($data);
		$this->setMode("listNews");
		$this->reg["view"]->addBlock('block1','admin_news.tpl');
	}
	public function elementNew() {
		if ($_POST)
		{
			if ($this->m->checkRequest('new')==1)
			{
				if ($_FILES["news_photo"])
				{
					$imagename = date('mdy_Is').rand(111111111,999999999).".jpg";
					$upfile = "data/img/news/".$imagename;
					if (!move_uploaded_file($_FILES["news_photo"]['tmp_name'],$upfile)) 
					$imagename = "";
				}
				$varDate = $this->m->createDate($_POST['Date_Year'],$_POST['Date_Month'],$_POST['Date_Day']);
				
				$create = ORM::for_table('news')->create();
				$create->data = $varDate;
				$create->caption = $_POST['news_newelement_caption'];
				$create->preview = $_POST['news_newelement_preview'];
				$create->ntext = $_POST['news_newelement_ntext'];
				$create->photo = $imagename;
				$create->save();
                $this->reg->message("Элемент добавлен");
			}
			else
			{
				$errorMsg = $this->m->checkRequest('new');
				$this->reg->message($errorMsg);
			}
		}
		$this->reg["view"]->addBlock('block1','admin_news.tpl');
		$this->setMode("new");
	}
    
	public function elementEdit() {
		if (is_numeric($_GET['param2']))
		{
			$pageData = ORM::for_table('news')->where('id',$_GET['param2'])->find_one();
			if ($_POST)
			{
				if ($this->m->checkRequest('edit')==1)
				{
					
					if ($_FILES["news_photo"])
					{
						$imagename = date('mdy_Is').rand(111111111,999999999).".jpg";
						$upfile = "data/img/news/".$imagename;
						if (!move_uploaded_file($_FILES["news_photo"]['tmp_name'],$upfile)) 
						$imagename=$pageData['photo'];
					}
					$varDate = $this->m->createDate($_POST['Date_Year'],$_POST['Date_Month'],$_POST['Date_Day']);
					$update = ORM::for_table('news')->select('id')->find_one($_GET['param2']);
					$update->$varDate;
					$update->caption = $_POST['news_editelement_caption'];
					$update->preview = $_POST['news_editelement_preview'];
					$update->ntext = $_POST['news_editelement_ntext'];
					$update->photo = $imagename;
					$update->save();
					$this->reg->message("Элемент отредактирован");
				}
				else
				{
					$errorMsg = $this->m->checkRequestEdit('edit');
					$this->reg->message($errorMsg);
				}
			}
			if (!count($pageData)) $this->reg['view']->go404();
			$this->reg["view"]->addBlock('block1','admin_news.tpl');
			$this->setData($pageData);
			$this->setMode("edit");		
		}
		else
			$this->reg->go404();
	}
	
	public function deleteNews()
	{	
		$delete = ORM::for_table('news')->where('id',$_GET['param2'])->find_one();
		if ($delete->photo)
		{
			unlink('data/img/news/'.$delete->photo);
		}
		$delete->delete();
		
		header("Location: /admin/news/listNews");
	}
	
}
?>