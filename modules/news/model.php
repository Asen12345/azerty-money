<?php
class Mnews extends ModelFrame {
	private $on_page = 6;
    
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
            $count = ORM::for_table("news")->select_expr('COUNT(*)', 'cnt')->find_array();
        }
        $data['count'] = ceil($count['0']['cnt'] / $this->on_page);
		$data['page'] = $_GET['param3'];
		
        return $data;
    }
	public function deleteOne($id)
	{
		$delete = ORM::for_table('news')->where('id',intval($id))->find_one();
		$delete->delete();
		return true;
	}
    public function getLastNews($count)
    {
		$rowElements = ORM::for_table("news")->order_by_desc('data')->limit(intval($count))->find_array();
		if ($rowElements['0']['id'])
			return $rowElements;	
		else
			return 0;
	}
    
	public function getLastNewsByPage($count,$page)
	{
		$rowElements = ORM::for_table("news")->raw_query("select * from news order by data desc limit ".(($page-1)*$count).", ".intval($count))->find_array();
		$countElements = ORM::for_table("news")->select_expr('COUNT(*)', 'cnt')->find_array();
		$rowElements['0']['page'] = intval($page);
		$rowElements['0']['pages'] = ceil ($countElements['0']['cnt']/intval($count));
		if ($rowElements['0']['id'])
			return $rowElements;	
		else
			return 0;		
	}

	public function checkRequest($action)
	{
		switch ($action)
		{
			case 'new':
			{
				if ($_POST['news_newelement_caption'])
				{
					if (strlen($_POST['news_newelement_caption'])<3 or strlen($_POST['news_newelement_caption'])>250)
					{
						return "Заголовок должен быть не меньше двух символов и не больше 250";
					}
				}
				break;
			}
			
			case 'edit':
			{
				if ($_POST['news_editelement_caption'])
				{
					if (strlen($_POST['news_editelement_caption'])<3 or strlen($_POST['news_editelement_caption'])>250)
					{
						return "Заголовок должен быть не меньше двух символов и не больше 250";
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

}
?>