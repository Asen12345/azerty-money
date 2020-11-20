<?php
class View {
	public $reg;
	private $params;
	private $blocks;
   	public  $isclass=1;
	
	function __construct($reg)
	{
		$this->reg = $reg;
	}
	

	public function go404()
	{
		 http_response_code(404);
		 include('404.php'); // provide your own HTML for the error page die(); в <?php http_response_code(404); include('my_404.php'); // provide your own HTML for the error page die(); 
die();
	}


	public static function assign($varname,$var)
	{
		global $tpl;
		$tpl->assign($varname,$var);
		return 1;		
	}
	public function getValue($valueKey)
	{
		if ($this->params[$valueKey])
			return $this->params[$valueKey];
		else
			return 0;
	}	
    
    private function prepareDefaultViewWithoutValues()
    {
        switch (sitepage)
        {
            case 'admin':
            {
                if ($this->reg["users"]->is_login())
                	$defaultViewValues = array(
                	'mainTemplate' => 'admin.tpl'
                	);                
                else
                	$defaultViewValues = array(
                	'mainTemplate' => 'admin_users.tpl'
                	);              
                
                $this->reg["view"]->prepareDefaultViewValues($defaultViewValues);
                $this->reg["view"]->defaultPage(array("m"=>"users","param1"=>"login","fullpath"=>"/users/login/"));

                break;
            }
            
            case 'site':
            {
            	$defaultViewValues = array(
            	'mainTemplate' => 'site_1.tpl',
            	'subTemplate' => 'site_columns.tpl'
            	);                

                $this->reg["view"]->prepareDefaultViewValues($defaultViewValues);
                $this->reg["view"]->defaultPage(array("m"=>"content","param1"=>"mainpage","fullpath"=>"/content/mainpage"));

                break;
            }

        }
    }
	
	public function prepareDefaultViewValues($values='')
	{
	    if ($values=='')
        { 
            $this->prepareDefaultViewWithoutValues();
        } else
        {   
    		if ($values['mainTemplate'])
    			$this->params['mainTemplate'] = $values['mainTemplate'];
    
    		if ($values['subTemplate'])
    			$this->params['subTemplate']  = $values['subTemplate'];
    
    		if ($values['defaultPage'])
    			$this->params['defaultPage']  = $values['defaultPage'];
    		
    		if (count($values))
    		{
    			foreach ($values as $keyValue=>$value)
    			{
    				if ($keyValue!='mainTemplate' and $keyValue!='subTemplate' and $keyValue!='defaultPage')
    				{
    					$this->blocks[$keyValue] = $value;
    				}
    			}
    		}	
        }
		
		return 1;
	}
	
	public function addBlock($blockName,$blockTpl)
	{
		$this->blocks[$blockName] = $blockTpl;
		return 1;
	}
	
	public function setViewValues()
	{
		if ($this->params['mainTemplate'])
			self::assign("mainTemplate",$this->params['mainTemplate']);

		if ($this->params['subTemplate'])
			self::assign("subTemplate",$this->params['subTemplate']);
		
		if (count($this->blocks))
		{
			foreach ($this->blocks as $keyBlock=>$valueBlock)
			{
				self::assign($keyBlock,$valueBlock);
			}
		}
		
		if (sitepage=='site')
		{
			//self::assign("mapMainMenu",$this->reg['map']->getFirstLevelMap());
			//self::assign("mapFirstPage",$this->reg['map']->getFirstPageInAttachList());
			//self::assign("mapFromLevelTwo",$this->reg['map']->getMapFromLevelTwo());
			if ($this->params['defaultPage'])
				self::assign("defaultPage",$this->params['defaultPage']);
			if ($_GET['q']==$this->params['defaultPage'])
				self::assign("mapActivePage","/");			
			else
				self::assign("mapActivePage",htmlspecialchars($_GET['q']));
		}
		
		return 1;		
	}
	
	public function defaultPage($pageGetParameters)
	{
		if (!isset($_GET['m']))
		{			
			if (count($pageGetParameters))
			{
				foreach ($pageGetParameters as $keyGetElement=>$valueGetElement)
				{
					if ($keyGetElement!="fullpath")
						$_GET[$keyGetElement] = $valueGetElement;
					else
						$_GET['q'] = $valueGetElement;
				}
			}
		}
		$this->params['defaultPage'] = $pageGetParameters['fullpath'];
		return 1;
	}

	public function defaultAdminPage($pageGetParameters)
	{
		if (!isset($_GET['m']))
		{			
			if (count($pageGetParameters))
			{
				foreach ($pageGetParameters as $keyGetElement=>$valueGetElement)
				{
					if ($keyGetElement!="fullpath")
						$_GET[$keyGetElement] = $valueGetElement;
					else
						$_GET['q'] = $valueGetElement;
				}
			}
		}
		$this->params['defaultAdminPage'] = $pageGetParameters['fullpath'];
		return 1;
	}

	
	public function delegatePath()
	{
		if (is_callable(array($this->reg[$_GET["m"]], $_GET['param1'])) and !(substr($_GET["param1"],0,1)=="_") and !($this->reg[$_GET["m"]]->isclass)) 
		{
			$this->reg[$_GET["m"]]->$_GET["param1"]();
        } else 
		{
		//	if (!(sitepage=="admin" and !$_GET["param1"]))
				$this->go404();
		}
		$elink = ORM::for_table('services')->find_array();
		foreach($elink as $key=>$value)
		{
			if ($_SERVER['REQUEST_URI'] == $value['elink'] or $_SERVER['REQUEST_URI'] == $value['elink']."/")
			{
				$this->go404();
			}
		}
	}
	
	public function prepareAlternativeViewValues()
    {
		
        $elinkArray = ORM::for_table('map')->select('elink')->select('link')->where_not_equal('elink','')->where('link','/'.$_GET["q"])->find_array();
        if ($elinkArray[0]['elink']!="" )
        {
            $elink=htmlspecialchars(trim($elinkArray[0]['elink'],"\/"));
            $t=(explode('/',$elink));
            foreach ($t as $k=>$v)
            { 
                if ($k=="0") { 
                    $_GET["m"]=$v;
                }
                else if ($k>0) $_GET["param".($k)]=$v;
            }
        }
		
        $elinkArrayServices = ORM::for_table('services')->select('elink')->select('link')->where_not_equal('elink','')->where('link','/'.$_GET["q"])->find_array();
        if ($elinkArrayServices[0]['elink']!="" )
        {
            $elink=htmlspecialchars(trim($elinkArrayServices[0]['elink'],"\/"));
            $t=(explode('/',$elink));
            foreach ($t as $k=>$v)
            { 
                if ($k=="0") { 
                    $_GET["m"]=$v;
                }
                else if ($k>0) $_GET["param".($k)]=$v;
            }
        }


        $elinkArrayGames = ORM::for_table('games')->select('elink')->select('link')->where_not_equal('elink','')->where('link','/'.$_GET["q"])->find_array();
        if ($elinkArrayGames[0]['elink']!="" )
        {
            $elink=htmlspecialchars(trim($elinkArrayGames[0]['elink'],"\/"));
            $t=(explode('/',$elink));
            foreach ($t as $k=>$v)
            {
                if ($k=="0") {
                    $_GET["m"]=$v;
                }
                else if ($k>0) $_GET["param".($k)]=$v;
            }

        }


        $elinkArrayServicesItem = ORM::for_table('services_item')->select('elink')->select('link')->where_not_equal('elink','')->where('seo_link','/'.$_GET["q"])->find_array();
        if ($elinkArrayServicesItem[0]['elink']!="" )
        {

            $elink=htmlspecialchars(trim($elinkArrayServicesItem[0]['elink'],"\/"));
            $t=(explode('/',$elink));
            foreach ($t as $k=>$v)
            {
                if ($k=="0") {
                    $_GET["m"]=$v;
                }
                else if ($k>0) $_GET["param".($k)]=$v;
            }

        }


    }
	
	public function display()
	{
		global $tpl;
		$tpl->display($this->params['mainTemplate']);
	}
}
?>