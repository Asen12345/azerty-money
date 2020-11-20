<?php


Class ControllerAdmin {
	public $reg;
	public $m;
	protected $ename;

	function __construct($registry,$ename) {
	    $this->reg = $registry;
	    $this->ename = $ename;

	    $id = isset($_SESSION['loginid']) ? $_SESSION['loginid'] : null;
	    $pass = isset($_SESSION['loginpass']) ? $_SESSION['loginpass'] : null;

	    if ($id && $pass) {
	    	$find = ORM::for_table('users')->where('id',$id)
	    		->where('id',$id)
	    		->where('password',$pass)
	    		->find_one();

	    	if (!isset($find->id)) {
	    		session_destroy();
	    		header("location:/admin");
	    	}
	    }

	    if ($id && !$pass)  {
	    	session_destroy();
	    	header("location:/admin");
	    }


    }
    
    public function listelements() {
		$rowElements = $this->m->getAll('','id,caption,no_edit');
		$rowElementsR = array();
		if ($rowElements[0]['id'])
		{
			foreach ($rowElements as $keyRow=>$valueRow)
			{
				if (isset($valueRow['no_edit']) and $valueRow['no_edit'] == 1)
				{
				
				} else
				{
					$rowElementsR[] = $valueRow;
				}
			}
		}
		view::assign("listData",$rowElementsR);
		view::assign('moduleEname',$this->ename);
		$this->reg["view"]->addBlock('block1','admin_listelements.tpl');
	}
	
	public function deleteElement()
	{
		$this->m->deleteOne($_GET['param2']);
		//$this->reg['sql']->query("delete from r_map where link = '/".$this->ename."/view/".intval($_GET['param2'])."'");
		header("Location: /admin/".$this->ename."/listelements");
		die();
	}
    
    public function getModel() {
		return $this->m;
	}
	
	public function setModel($m) {
		$this->m = $m;
	}
	
    public function getEname() {
		return $this->ename;
	}
			
	public function setMode($mode) {
		view::assign($this->getEname()."Mode",$mode);
	}
	
	public function setData($data) {
		view::assign($this->getEname()."Data",$data);
	}
	
}

Class ControllerSite {
	public $reg;
	public $m;
	private $ename;
	
	function __construct($registry,$ename) {
	    $this->reg = $registry;
	    $this->ename = $ename;
    }    
    
    public function getEname() {
		return $this->ename;
	}

    public function getModel() {
		return $this->m;
	}
	
	public function setModel($m) {
		$this->m = $m;
	}
			
	public function setMode($mode) {
		view::assign($this->getEname()."Mode",$mode);
	}
	
	public function setData($data,$data2=null) {
	   if ($data2!=null)
        $data['files'] = $data2;
		view::assign($this->getEname()."Data",$data);
	}
}

Class Registry Implements ArrayAccess {
    public  $isclass=1;
    
	private $vars = array();


    function offsetExists($offset) {
            return isset($this->vars[$offset]);
    }


    function offsetGet($offset) {
            return $this->get($offset);
    }


    function offsetSet($offset, $value) {
            $this->set($offset, $value);
    }


    function offsetUnset($offset) {
            unset($this->vars[$offset]);
    }

	function set($key, $var) {
        if (isset($this->vars[$key]) == true) {
                throw new Exception('Unable to set var `' . $key . '`. Already set.');
        }

        $this->vars[$key] = $var;
        return true;
}


	function get($key) {
        if (isset($this->vars[$key]) == false) {
                return null;
        }
        return $this->vars[$key];
	}

	public function getModel($ename) {
		if (isset($this->vars[$k]) == false)
		{
			return null;
		}
		
		return $this->vars[$k]->getModel();
	}

	function remove($var) {
        unset($this->vars[$key]);
}

	public function codecheck($s) {
		if (!strpos($s," ")) return 1; else return 0;
	}	

	public function adminsetparametres($structure) {
		if ($structure->admin_section) 
		{
			if ($structure->module_name) $r["module_name"]=$structure->module_name; else $r['module_name']="неизвестный модуль";
			if ($structure->admin_menu) $r["module_menu"] = $structure->admin_menu;
			$this["tpl"]->append("admin_menu",$r);
		}
	}
	
	public function check_post() {
		foreach ($_POST as $k=>$v) {
			$_POST[$k] = mysql_real_escape_string($v);
			$_POST[$k] = htmlspecialchars($_POST[$k]);
		}
		
	}

	public function check_get() {
		foreach ($_GET as $k=>$v) {
		    $_GET[$k] = mysql_real_escape_string($v);
			$_GET[$k] = htmlspecialchars($v);
		}
	}
	
	
	public function message($text) {
		if (isset($this->vars["tpl"]))
		 $this->vars["tpl"]->assign("message",$text);
	}	
}
?>