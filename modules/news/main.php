<?php
class news extends ControllerSite {
    public $module_name = "Новости";
    public $on_page = 2048;
    
    public function view()
    {
		if (is_numeric($_GET['param2']))
		{
			$pageData = $this->m->getOneElementByIdAndFields($_GET['param2']);
			if (!count($pageData)) $this->reg['view']->go404();
			$this->reg["view"]->addBlock('block1','site_news.tpl');
			$this->setData($pageData);
			$this->setMode("one");	
		} else
			$this->reg->go404();		
	}
    
	public function all()
	{
		$data = ORM::for_table('news')->order_by_desc('data')->find_array();
		if($_GET['param3'])
		{
			$data = ORM::for_table('news')->order_by_desc('data')->offset(($_GET['param3']*6)-6)->limit(6)->find_array();
		}
		if (!is_numeric($_GET['param2'])) $_GET['param2'] = 1;
			
			
			$paginatorData = $this->m->get_paginator_data(-1,$where);
			$data["paginatorData"] = $paginatorData;
			$this->reg["view"]->addBlock('block1','site_news.tpl');
			$this->setData($data);
			$this->setMode("all");
	}
}
?>