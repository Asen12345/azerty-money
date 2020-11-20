<?php
class ModelFrame {
	public $reg;
	protected $ename;
	
	function __construct($reg,$ename)
	{
		$this->reg = $reg;
		$this->ename = $ename;
	}
	
	public function getAll($order='',$fields='*',$table='')
	{
		if (!$table) $table = $this->ename;
		if ($order!='')
			$rowElements = ORM::for_table($table)->raw_query("select ".$fields." from r_m_".$table." order by ".$order)->find_array();
			//$this->reg["sql"]->sql2array("select ".$fields." from r_m_".$table." order by ".$order);
		else
			$rowElements = ORM::for_table($table)->select($fields)->find_array();
			//$this->reg["sql"]->sql2array("select ".$fields." from r_m_".$table."");
		return $rowElements;	
	}

    public function getAllElementsByFields($fields,$order='',$fieldsOut='*',$table='')
    {
		if ($fields != null)
		{
            if (!$table) $table = "r_m_".$this->ename;
			$queryTerms = " where ";
			foreach ($fields as $keyField=>$valueField)
			{
				switch (gettype($fields[$keyField]))
				{
					case "integer";
					case "double";
					{
						$queryTerms .= $keyField." = ".$fields[$keyField]." and ";					
						break;
					}
					default:
					{

						$queryTerms .= $keyField." = '".mysql_real_escape_string($fields[$keyField])."' and ";					
						break;					
					}
				}	
			}
			
			$queryTerms = substr($queryTerms,0,strlen($queryTerms)-4);
		} else 
		{
			$queryTerms = "";
		}
		if ($order!='')
            $rowElement = $this->reg["sql"]->sql2array("select ".$fieldsOut." from ".$table." ".$queryTerms." order by ".$order);
		else
			$rowElement = $this->reg["sql"]->sql2array("select ".$fieldsOut." from ".$table." ".$queryTerms);  
		if ($rowElement['0']['id'])
			return $rowElement;
		else
			return null;
	}
	
    public function getOneElementByIdAndFields($id,$fields=null,$table='')
    {
		if (!$table) $table = $this->ename;
		if ($fields != null)
		{
			foreach ($fields as $keyField)
			{
				$queryFields .= $keyField.", ";
			}
			
			$queryFields = substr($queryFields,0,strlen($queryFields)-2);
		} else 
		{
			$queryFields = "*";
		}
		
		$rowElement = ORM::for_table($table)->select($queryFields)->where('id',intval($id))->limit(1)->find_array();
		//$this->reg["sql"]->sql2array("select ".$queryFields." from r_m_".$table." where id = ".intval($id)." limit 1");
		if ($rowElement['0']['id'])
			return $rowElement['0'];
		else
			return null;
	}

    public function getOneElementByFields($fields,$limit=1)
    {
		if ($fields != null)
		{
			$queryTerms = " where ";
			foreach ($fields as $keyField=>$valueField)
			{
				switch (gettype($fields[$keyField]))
				{
					case "integer";
					case "double";
					{
						$queryTerms .= $keyField." = ".$fields[$keyField]." and ";					
						break;
					}
					default:
					{

						$queryTerms .= $keyField." = '".mysql_real_escape_string($fields[$keyField])."' and ";					
						break;					
					}
				}	
			}
			
			$queryTerms = substr($queryTerms,0,strlen($queryTerms)-4);
		} else 
		{
			$queryTerms = "";
		}
		if ($limit!=0)
            $rowElement = $this->reg["sql"]->sql2array("select * from r_m_".$this->ename." ".$queryTerms." limit ".intval($limit));
        else
            $rowElement = $this->reg["sql"]->sql2array("select * from r_m_".$this->ename." ".$queryTerms);
		if ($rowElement['0']['id'] and ($limit>1) or ($limit==0))
			return $rowElement;
			
		if ($rowElement['0']['id'])
			return $rowElement['0'];
		else
			return null;
	}

	
	public function insertElement($values,$keys = null)
	{
		if ($keys != null)
		{
			$queryFields = " (";
			foreach ($keys as $keyKeys=>$value)
			{
			$queryFields .= $keys[$keyKeys].", "; 
			}
			$queryFields = substr($queryFields,0,strlen($queryFields)-2).") ";
		} else $queryFields = "";
		

		$queryValues = "(";
		foreach ($values as $keyValue=>$value)
		{
			switch (gettype($values[$keyValue]))
			{
				case "integer";
				case "double";
				{
					$queryValues .= $values[$keyValue].", ";					
					break;
				}
				
				case null:
				{
					$queryValues .= "null, ";
					break;	
				}
				
				default:
				{
					if ($keys[$keyValue]=='date')
					{
						if ($values[$keyValue]=='now()')
							$queryValues .= $values[$keyValue].", ";						
						else
							$queryValues .= "'".mysql_real_escape_string($values[$keyValue])."', ";						
					}
					else
					{
						$queryValues .= "'".mysql_real_escape_string($values[$keyValue])."', ";					
					}
					break;					
				}
			}	
		}
		
		$queryValues = substr($queryValues,0,strlen($queryValues)-2).")";
		
		foreach ($keys as $keyKey=>$key)
		{
			if ($key=='caption')
			{
				$oneMap['caption'] = $key;
			}
		}
		
		$this->reg["sql"]->query("insert into r_m_".$this->ename." ".$queryFields." values ".$queryValues);		
		
//		$lastInsertId = $this->reg["sql"]->sql2array("SELECT LAST_INSERT_ID() as id");
//		$oneMap['id'] = $lastInsertId['0']['id'];
		
		return 1;
	}	

	public function updateElement($id,$values,$keys)
	{
		foreach ($values as $keyValue=>$value)
		{
			switch (gettype($values[$keyValue]))
			{
				case "integer";
				case "double";
				{
					$queryValues .= "`".$keys[$keyValue]."` = ". $values[$keyValue].", ";					
					break;
				}
				
				default:
				{
					$queryValues .= "`".$keys[$keyValue]."` = '".mysql_real_escape_string($values[$keyValue])."', ";
					break;					
				}
			}	
		}
		
		$queryValues = substr($queryValues,0,strlen($queryValues)-2);
		
		$this->reg["sql"]->query("UPDATE  `r_m_".$this->ename."` SET ".$queryValues." WHERE `id` =".intval($id)." LIMIT 1 ;");
		return 1;
	}
	
	public function deleteOne($id)
	{
		$this->reg["sql"]->query("delete from r_m_".$this->ename." where id = ".intval($id));
		return 1;
	}
    public function getImagesForNews(){
        $rowElements = $this->reg['sql']->sql2array("select * from r_m_photo where nid!=0 and main=1"); 
        return $rowElements;
    }
    
    public function getNewsForMainPage($count=3){
        $rowElements = $this->reg['sql']->sql2array("select * from r_m_category");
        foreach($rowElements as $key=>$value){
            if($value['id']!=1) $num = $count; else $num = 10;
            unset($nid);
            $nid = $this->reg["sql"]->sql2array("select nid from r_connection where cid=".intval($value['id'])." order by id desc limit ".intval($num));           
            if ($nid)   
                foreach($nid as $k=>$v){
                    $rowElements[$key]['content'][] = $this->reg["sql"]->sql2array("select id,caption,atext,date from r_m_news where id = ".$v['nid']);
                }
        }
		if ($rowElements)
			return $rowElements;	
		else
			return 0;
    }
    
    public function getDataForMainPage($count=5){
        $rowElements['news'] = $this->reg['sql']->sql2array("select * from r_m_news order by date desc limit ".intval($count));
        return $rowElements;
    }
    
    public function getFilesForPurchases($pid){
        $rowElements = $this->reg['sql']->sql2array("select * from r_m_file where pid=".intval($pid));
        return $rowElements;
    }    
    
    public function getFilesFordocs($did){
        $rowElements = $this->reg['sql']->sql2array("select * from r_m_file where did=".intval($did));
        return $rowElements;
    }
    
    public function getFilesForformdocs($fdid){
        $rowElements = $this->reg['sql']->sql2array("select * from r_m_file where fdid=".intval($fdid));
        return $rowElements;
    }
    
    public function getFilesForNormact($nid){
        $rowElements = $this->reg['sql']->sql2array("select * from r_m_file where nid=".intval($nid));
        return $rowElements;
    }
    
    public function getFileFromArray($array,$key){
        $tempFile['name']=(int)microtime(true)."_".$this->translitIt($array['name'][$key]);
        $tempFile['type']=$array['type'][$key];
        $tempFile['tmp_name']=$array['tmp_name'][$key];
        $tempFile['error']=$array['error'][$key];
        $tempFile['size']=$array['size'][$key];  
        return $tempFile;
    }
    public function createDate($Date_Year,$Date_Month,$Date_Day){
        $result = $Date_Year."-".$Date_Month."-".$Date_Day;
        return $result;      
    }
     public function translitIt($string)
     {
        $string = iconv("UTF-8","CP1251",$string);
        $rus = array('�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�');
        $lat = array('yo','zh','tc','ch','sh','sh','yu','ya','YO','ZH','TC','CH','SH','SH','YU','YA','','','','');
        $string = str_replace($rus,$lat,$string);
        $string = preg_replace( '#[^a-z0-9\. _\-�������������������������������������Ũ��������������������������]*#i', '', $string );
        $string = strtr($string,
         "������������������������������������������������ ",
         "abvgdezijklmnoprstufh_i_eabvgdezijklmnoprstufhie_"); 
        
        //     "������������������������������������������������ ",
        //     "ABVGDEZIJKLMNOPRSTUFH_I_Eabvgdezijklmnoprstufhie_");
        $string = iconv("CP1251","UTF-8",$string);  
        return($string);
     }

}
?>