<?php
/* by icyken.ru 2011 */
class file extends ControllerAdmin {
	
    public function deleteElement()
	{
        $backPath = $this->m->getOneElementByIdAndFields($_GET['param2']);
		$this->m->deleteOne($_GET['param2']);
        if ($backPath['nid']!=0)
		  header("Location: /admin/normact/elementEdit/".$backPath['nid']);
        else if ($backPath['pid']!=0)
          header("Location: /admin/purchases/elementEdit/".$backPath['pid']);
        else if ($backPath['did']!=0)
          header("Location: /admin/docs/elementEdit/".$backPath['did']);
        else if ($backPath['fdid']!=0)
          header("Location: /admin/formdocs/elementEdit/".$backPath['fdid']);
        else
          header("Location: /admin/".$this->ename."/listelements");
		die();
	}
    public function listelements() {
		$rowElements = $this->m->getAll('','id, caption, file');
		$this->setData($rowElements);
		$this->setMode('list');
		$this->reg["view"]->addBlock('block1','admin_file.tpl');
	}
    public function deleteAllFromNormact($nid){
        $rowElements = $this->m->getAllElementsByFields(array("nid"=>$nid)); 
        if ($rowElements['0']['id'])
        foreach($rowElements as $k=>$v){
            $this->m->deleteOne($v['id']);
        }
    }
    public function deleteAllFromdocs($did){
        $rowElements = $this->m->getAllElementsByFields(array("did"=>$did));  
        if ($rowElements['0']['id'])
        foreach($rowElements as $k=>$v){
            $this->m->deleteOne($v['id']);
        }     
    }
    public function attachFileTodocs($did){
        for($i=0;$i<count($_FILES['attachedFiles']['name']);$i++){
            if ($_FILES['attachedFiles']['error'][$i]==0){
                $tempFile = $this->m->getFileFromArray($_FILES['attachedFiles'],$i);
                if ($this->m->uploadFile($tempFile))
                    $this->m->insertElement(array(0=>(string)$_POST['attachedFilesCaption'][$i],1=>(string) $tempFile['name'],2=>(string) $tempFile['type'],3=>$did),array(0=>'caption',1=>'file',2=>'mime_type',3=>'did'));     
            }
        }
        return true;              
    }
    public function attachedTodocsFile($did){
        $rowElements = $this->m->getAllElementsByFields(array("did"=>$did));
        return $rowElements;
    }
    public function deleteAllFromformdocs($fdid){
        $rowElements = $this->m->getAllElementsByFields(array("fdid"=>$fdid));  
        if ($rowElements['0']['id'])
        foreach($rowElements as $k=>$v){
            $this->m->deleteOne($v['id']);
        }     
    }
    public function attachFileToformdocs($fdid){
        for($i=0;$i<count($_FILES['attachedFiles']['name']);$i++){
            if ($_FILES['attachedFiles']['error'][$i]==0){
                $tempFile = $this->m->getFileFromArray($_FILES['attachedFiles'],$i);
                if ($this->m->uploadFile($tempFile))
                    $this->m->insertElement(array(0=>(string)$_POST['attachedFilesCaption'][$i],1=>(string) $tempFile['name'],2=>(string) $tempFile['type'],3=>$fdid),array(0=>'caption',1=>'file',2=>'mime_type',3=>'fdid'));     
            }
        }
        return true;              
    }
    public function attachedToformdocsFile($fdid){
        $rowElements = $this->m->getAllElementsByFields(array("fdid"=>$fdid));
        return $rowElements;
    }
    public function attachFileToNormact($nid){
        for($i=0;$i<count($_FILES['attachedFiles']['name']);$i++){
            if ($_FILES['attachedFiles']['error'][$i]==0){
                $tempFile = $this->m->getFileFromArray($_FILES['attachedFiles'],$i);
                if ($this->m->uploadFile($tempFile))
                    $this->m->insertElement(array(0=>(string)$_POST['attachedFilesCaption'][$i],1=>(string) $tempFile['name'],2=>(string) $tempFile['type'],3=>$nid),array(0=>'caption',1=>'file',2=>'mime_type',3=>'nid'));     
            }
        }
        return true;              
    }
    public function attachedToNormactFile($nid){
        $rowElements = $this->m->getAllElementsByFields(array("nid"=>$nid));
        return $rowElements;
    }
	public function elementNew() {
		if ($_POST)
		{
			if ($this->m->checkRequest('new')==1)
			{
				if ($this->m->uploadFile($_FILES['file_newelement_file']))
				{
					$this->m->insertElement(array(0=>(string)$_POST['file_newelement_caption'],1=>(string)$_FILES['file_newelement_file']['name']),array(0=>'caption',1=>'file'));
					$this->reg->message("Элемент добавлен");
				} else
				{
					$errorMsg = "Не удалось загрузить файл";
					$this->reg->message($errorMsg);
				}
			}
			else
			{
				$errorMsg = $this->m->checkRequest('new');
				$this->reg->message($errorMsg);
			}
		}

		$this->reg["view"]->addBlock('block1','admin_file.tpl');
		$this->setMode("new");
	}

	public function elementEdit() {
		if (is_numeric($_GET['param2']))
		{
			if ($_POST)
			{
				if ($this->m->checkRequest('edit')==1)
				{
					$this->m->updateElement(intval($_GET['param2']),array(0=>(string) $_POST['file_editelement_caption']),array(0=>'caption'));
					$this->reg->message("Элемент отредактирован");
				}
				else
				{
					$errorMsg = $this->m->checkRequestEdit('edit');
					$this->reg->message($errorMsg);
				}
			}
			
			$pageData = $this->m->getOneElementByIdAndFields(intval($_GET['param2']));
			if (!count($pageData)) $this->reg['view']->go404();

			$this->reg["view"]->addBlock('block1','admin_file.tpl');
			$this->setData($pageData);
			$this->setMode("edit");		
		}
		else
			$this->reg->go404();
	}		
}
?>