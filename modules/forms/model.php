<?php
class Mforms extends ModelFrame {
	
	private $on_page = 8;
    
    public function setOnPage($p)
    {
        $this->on_page = $p;
        return 1;
    }
    
    public function getNewsOnPage()
    {
        return $this->on_page;    
    }
	 public function get_paginator_data($id,$where='')
    {
        if ($id==-1)
        {
            $count = ORM::for_table("services_item")->select_expr('COUNT(*)', 'cnt')->where('sid',$_GET['param2'])->find_array();
        }
        $data['count'] = ceil($count['0']['cnt'] / $this->on_page);
		$data['page'] = $_GET['param4'];
		
        return $data;
    }

    public function get_paginator_page_data($id,$where='')
    {
        $count = array();
        if ($id==-1)
        {
            $count = ORM::for_table("services_item")->select_expr('COUNT(*)', 'cnt')->where('active', 1)->where('sid',$_GET['param2']);
            if (isset($_POST['filter_1']) && $_POST['filter_1'] != '')
            {
                $count = $count->where('filter_1', $_POST['filter_1']);
            }

            if (isset($_POST['filter_2']) && $_POST['filter_2'] != '')
            {
                $count = $count->where('filter_2', $_POST['filter_2']);
            }

            if (isset($_POST['filter_3']) && $_POST['filter_3'] != '')
            {
                $count = $count->where('filter_3', $_POST['filter_3']);
            }

            if (isset($_POST['filter_4']) && $_POST['filter_4'] != '')
            {
                $count = $count->where('filter_4', $_POST['filter_4']);
            }

            if (isset($_POST['filter_search']) && $_POST['filter_search'] != '')
            {
                $count = $count->where_like('caption', '%'.$_POST['filter_search'].'%');
            }

            $count = $count->find_array();
        }

        $data['count'] = ceil($count['0']['cnt'] / $this->on_page);
        $data['page'] = $_GET['page']?$_GET['page']:1;

        return $data;
    }
	
	function translit($insert) 
	{ 
		$insert = strtolower($insert);
		$replase = array(
		'а'=>'a',
		'б'=>'b',
		'в'=>'v',
		'г'=>'g',
		'д'=>'d',
		'е'=>'e',
		'ё'=>'yo',
		'ж'=>'zh',
		'з'=>'z',
		'и'=>'i',
		'й'=>'j',
		'к'=>'k',
		'л'=>'l',
		'м'=>'m',
		'н'=>'n',
		'о'=>'o',
		'п'=>'p',
		'р'=>'r',
		'с'=>'s',
		'т'=>'t',
		'у'=>'u',
		'ф'=>'f',
		'х'=>'h',
		'ц'=>'c',
		'ч'=>'ch',
		'ш'=>'sh',
		'щ'=>'shh',
		'ъ'=>'j',
		'ы'=>'y',
		'ь'=>'',
		'э'=>'e',
		'ю'=>'yu',
		'я'=>'ya',
		'А'=>'a',
		'Б'=>'b',
		'В'=>'v',
		'Г'=>'g',
		'Д'=>'d',
		'Е'=>'e',
		'Ё'=>'yo',
		'Ж'=>'zh',
		'З'=>'z',
		'И'=>'i',
		'Й'=>'j',
		'К'=>'k',
		'Л'=>'l',
		'М'=>'m',
		'Н'=>'n',
		'О'=>'o',
		'П'=>'p',
		'Р'=>'r',
		'С'=>'s',
		'Т'=>'t',
		'У'=>'u',
		'Ф'=>'f',
		'Х'=>'h',
		'Ц'=>'c',
		'Ч'=>'ch',
		'Ш'=>'sh',
		'Щ'=>'shh',
		'Ъ'=>'j',
		'Ы'=>'y',
		'Ь'=>'',
		'Э'=>'e',
		'Ю'=>'yu',
		'Я'=>'ya',
		' '=>'_',
		'  '=>'_',
		' - '=>'-',
		'_'=>'_',
		'.'=>'_',
		':'=>'_',
		';'=>'',
		','=>'',
		'!'=>'',
		'?'=>'',
		'>'=>'',
		'<'=>'',
		'&'=>'',
		'*'=>'',
		'%'=>'',
		'$'=>'',
		'"'=>'',
		'\''=>'',
		'('=>'',
		')'=>'',
		'`'=>'',
		'+'=>'',
		'/'=>'',
		'\\'=>''
		);
		$insert=preg_replace("/  +/"," ",$insert); 
		$insert = strtr($insert,$replase);
		return $insert;
	}
	
}
?>