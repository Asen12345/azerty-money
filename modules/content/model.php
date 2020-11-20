<?php
class Mcontent extends ModelFrame {
	
	
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
            $count = ORM::for_table("feedback")->select_expr('COUNT(*)', 'cnt')->where('display', 1)->find_array();
        }
        $data['count'] = ceil($count['0']['cnt'] / $this->on_page);
		$data['page'] = $_GET['param3'];
		
        return $data;
    }




    public function checkRequest($action)
	{
		switch ($action)
		{
			case 'new':
			{
				if ($_POST['content_newelement_caption'])
				{
					if (strlen($_POST['content_newelement_caption'])<3 or strlen($_POST['content_newelement_caption'])>128)
					{
						return "Заголовок должен быть не меньше двух символов и не больше 128";
					}
				}
				break;
			}
			
			case 'edit':
			{
				if ($_POST['content_editelement_caption'])
				{
					if (strlen($_POST['content_editelement_caption'])<3 or strlen($_POST['content_editelement_caption'])>128)
					{
						return "Заголовок должен быть не меньше двух символов и не больше 128";
					}
					
				}				
				break;
			}
			
			default:
			{
				return "Неизвестная ошибка";
				break;
			}
		}
		
		return 1;
	}
	
	public function processSearchForm($search)
	{
		$rowGame = ORM::for_table('games')->where_like('caption', '%'.$search.'%')->find_array();
		return $rowGame;
	}
	
	
}
?>