<?php
/* by icyken.ru 2011 */
class photo extends ControllerAdmin {

    public function listelements() {
        $rowElements = $this->m->getAllElementsByFields(array("nid"=>0),'','id,filename,caption');
		//$rowElements = $this->m->getAll('','id,filename,caption');
		view::assign("listData",$rowElements);
		view::assign('moduleEname',$this->ename);
		
		$this->reg["view"]->addBlock('block1','admin_photo.tpl');
		$this->setMode("listelements");
	}
    
    public function attachedToNewsPhoto()
    {
		if ($_GET['param2'])
		{
			$rowElements = $this->m->getOneElementByFields(array("nid"=>intval($_GET['param2'])),1000);
			return $rowElements;
		}            
    }
    public function attachPhotoToNews($nid)
    {
        if (($_FILES['mainPhoto']) and ($_FILES['mainPhoto']['error']==0)){
				$r = $this->m->addpicture($_FILES["mainPhoto"],800,600);	
				$this->m->insertElement(array(0=>(string) '',1=>(string) $r['name'],2=>(string) $r['type'],3=>$nid,4=>1),array(0=>'caption',1=>'filename',2=>'mime_type',3=>'nid',4=>'main'));  
        }
        if ($_FILES['attachedPhoto']){
            for($i=0;$i<count($_FILES['attachedPhoto']['name']);$i++){
                if ($_FILES['attachedPhoto']['error'][$i]==0){
                    $tempImage = $this->m->getPictureFromArray($_FILES['attachedPhoto'],$i);
                    $r = $this->m->addpicture($tempImage,800,600);	
                    $this->m->insertElement(array(0=>(string) '',1=>(string) $r['name'],2=>(string) $r['type'],3=>$nid,4=>0),array(0=>'caption',1=>'filename',2=>'mime_type',3=>'nid',4=>'main'));     
                }
            }
        }    
        return true;
    }
	public function deleteElement()
	{
        if ($this->m->getNewsId()){
            $nid = $this->m->getNewsId();
            $this->m->deleteOne($_GET['param2']);
            header("Location: /admin/news/elementEdit/".$nid);
    		die();    
        }
		$this->m->deleteOne($_GET['param2']);
		header("Location: /admin/".$this->ename."/listelements");
		die();
	}

	public function elementNew() {
		if ($_FILES)
		{
			if ($this->m->checkRequest('new')==1)
			{
				$r = $this->m->addpicture($_FILES["photoFile"],800,600);	
				$this->m->insertElement(array(0=>(string) '',1=>(string) $r['name'],2=>(string) $r['type']),array(0=>'caption',1=>'filename',2=>'mime_type'));
				$this->reg->message("Фото добавлено. Url : <br /> <a href='/data/photo/".$r['name']."'>/data/photo/".$r['name']."</a><br />Ссылка на уменьшенную копию : <br /> <a href='/data/photo/m".$r['name']."'>/data/photo/m".$r['name']."</a>");
			}
			else
			{
				$errorMsg = $this->m->checkRequest('new');
				$this->reg->message($errorMsg);
			}
		}

		$this->reg["view"]->addBlock('block1','admin_photo.tpl');
		$this->setMode("new");
	}

	
}

?>