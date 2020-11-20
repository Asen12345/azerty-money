<?php
class photo extends ControllerSite {
    public $module_name = "Фото";

	public function attachedToNewsPhotos()
	{
		if ($_GET['param2'])
		{
			$rowElements = $this->m->getOneElementByFields(array("nid"=>intval($_GET['param2'])),1000);
			if ($rowElements['0']['id'])
			{
				$this->setData($rowElements);
			}
		}
	}
}
?>