<?php
error_reporting(7);
ini_set("display_errors", 'on');


    /* by icyken.ru 2011 */

    class forms extends ControllerAdmin
    {

        public function listOrders()
        {
            if (isset($_GET['count']) and $_GET['count'])
            {
                $orders = ORM::for_table('orders')->raw_query("SELECT id,caption,data,date,money,uid,status,comment FROM orders ORDER BY FIELD(status, 'Оплачен, обрабатывается','Ошибка','Обрабатывается','Не оплачен','Возвращен','Выполнен','Отменен'), id DESC LIMIT " . $_GET['count'])->find_array();
                if ($orders[0]['id'])
                {

                    foreach ($orders as $keyOrder => $valueOrder)
                    {
                        $orderDataRow = ORM::for_table('users')->where('id', $valueOrder['uid'])->find_one();
                        $orders[$keyOrder]['email'] = $orderDataRow->email;
                        $orders[$keyOrder]['data'] = str_replace("<script>","", str_replace("</script>","",str_replace("\r\n", '', htmlspecialchars($valueOrder['data']))));
                    }
                }


            /*if($_SERVER['HTTP_X_REAL_IP']=='188.163.99.215')
            {
                print_r($orders);
                exit;
            }*/


                view::assign("listData", $orders);
                if (count($orders) == $_GET['count'])
                {
                    view::assign("still", $_GET['count'] + 100);
                }
                view::assign('moduleEname', 'forms');
                $this->reg["view"]->addBlock('block1', 'admin_listelements_orders.tpl');

                return true;
            }
            else
            {
                header('Location: /admin/' . __CLASS__ . '/' . __FUNCTION__ . '?count=100');
                die();
            }

            return false;
        }

        public function ordersSearch()
        {
            $search = $_POST['q'];
            if ($search)
            {
                $searchData = ORM::for_table('orders')->where_like('id', '%' . $search . '%')->find_one();
                $searchData->data = str_replace("\r\n", '', $searchData->data);
                $searchData->data = htmlspecialchars($searchData->data);
                $searchData['email'] = ORM::for_table('users')->where('id', $searchData->uid)->find_one();
            }

            /*if($_SERVER['HTTP_X_REAL_IP']=='188.163.99.215')
            {
                print_r($searchData);
                exit;
            }*/

            view::assign("searchData", $searchData);
            $this->reg["view"]->assign("formsMode", "search");
            $this->reg["view"]->addBlock('block1', 'admin_listelements_orders.tpl');
        }

        public function ordersServicesExecute()
        {
            $orders = ORM::for_table('orders')->where('id', $_GET['param2'])->find_one();

            $update_orders = ORM::for_table('orders')->where('id', $_GET['param2'])->find_one();
            $update_orders->status = "Выполнен";
            $update_orders->save();

            header("Location: /admin/forms/listOrders");
            die();
        }

        public function ordersExecute()
        {
            $orders = ORM::for_table('orders')->where('id', $_GET['param2'])->find_one();
            $users = ORM::for_table('users')->where('id', $orders->uid)->find_one();

            $update_orders = ORM::for_table('orders')->where('id', $_GET['param2'])->find_one();
            $update_orders->status = "Выполнен";
            $update_orders->save();

            $this->reg["users"]->sendmail('Здравствуйте.<br>Сообщаем Вам что, заказ № : ' . $update_orders->id . ', оформленный на сайте Azerty-money.ru, выполнен в полном объеме.<br>Благодарим Вас, что воспользовались нашим сервисом. <br><br> Вы можете внести свой вклад в развитие нашего магазина оставляя отзывы и пожелания на сайте и группе вконтакте. Ваши интересные идеи смогут усовершенствовать наш сервис.<br>Отзывы о сайте: http://azerty-money.ru/content/feedback/page/1<br>Наша группа вконтакте: http://vk.com/azerty_money_ru<br><br>С уважением, Азерти и его команда. Azerty-money.ru', 'Выполнен заказ на сайте Azerty-money.ru', $users->email, 'info@azerty-money.ru');

            global $psystems;
            $money = $orders->money;
            $payment = $psystems[$orders->payment];
            if ($payment['cc'] != 'RUR')
            {
                $row_cr = ORM::for_table('currency_rate')->where('char_code', $payment['cc'])->find_one();
                $money = ($row_cr->value / $row_cr->nominal) * $orders->money;
            }
            $money = round($money, 0);

            $update_users = ORM::for_table('users')->where('id', $orders->uid)->find_one();
            $update_users->money = $users->money + $money;
            $update_users->save();

            if ($update_users->ref_id)
            {
                $update_users_ref = ORM::for_table('users')->where('id', $update_users->ref_id)->find_one();

                if ($update_users_ref->percent_ref)
                {
                    $percent = ($update_users_ref->percent_ref / 100);
                }
                else
                {
                    $percent = 0.05;
                }

                $update_users_ref->money_ref = $update_users_ref->money_ref + ($money * $percent);
                $update_users_ref->save();

                $history_ref = ORM::for_table('history_ref')->create();
                $history_ref->uid = $update_users_ref->id;
                $history_ref->urid = $update_users->id;
                $history_ref->oid = $orders->id;
                $history_ref->charged = ($money * $percent);
                $history_ref->save();
            }

            header("Location: /admin/forms/listOrders");
            die();
        }

        public function ordersCancel()
        {
            die('Сообщить программисту! Функция нашлась');
            $orders = ORM::for_table('orders')->where('id', $_GET['param2'])->find_one();
            $users = ORM::for_table('users')->where('id', $orders->uid)->find_one();

            $update_orders = ORM::for_table('orders')->where('id', $_GET['param2'])->find_one();
            $update_orders->status = "Отменен";
            $update_orders->save();

            $update_users = ORM::for_table('users')->where('id', $orders->uid)->find_one();
            $update_users->money = $users->money - $orders->money;
            $update_users->save();

            if ($update_users->money < 0)
            {
                $update_users->money = 0;
                $update_users->save();
            }

            if ($update_users->ref_id)
            {
                $update_users_ref = ORM::for_table('users')->where('id', $update_users->ref_id)->find_one();
                $update_users_ref->money_ref = $update_users_ref->money_ref - $orders->money * 0.05;
                $update_users_ref->save();

                if ($update_users_ref->money_ref < 0)
                {
                    $update_users_ref->money_ref = 0;
                    $update_users_ref->save();
                }


            }

            header("Location: /admin/forms/listOrders");
            die();
        }

        public function ordersServicesCancel()
        {
            $update_orders = ORM::for_table('orders')->where('id', $_GET['param2'])->find_one();
            $update_orders->status = "Отменен";
            $update_orders->save();

            header("Location: /admin/forms/listOrders");
            die();
        }


        public function ordersError()
        {
            if (isset($_GET['param2']))
            {
                $update_orders = ORM::for_table('orders')->where('id', (int)$_GET['param2'])->find_one();
                $update_orders->status = "Ошибка";
                $update_orders->save();
                $users = ORM::for_table('users')->where('id', (int)$update_orders->uid)->find_one();
                if (isset($users->id))
                {
                    $this->reg["users"]->sendmail('Ваш заказ номер ' . $update_orders->id . ', не может быть выполнен, так как вы допустили ошибки при оформлении заказа. Для решения данной проблемы, свяжитесь с оператором на сайте', 'Ошибка заказа на сайте Azerty-money.ru', $users->email, 'info@azerty-money.ru');
                }
                header("Location: /admin/forms/listOrders");
                die();
            }

            return false;
        }

        public function ordersReturned()
        {
            if (isset($_GET['param2']))
            {
                $update_orders = ORM::for_table('orders')->where('id', (int)$_GET['param2'])->find_one();
                $update_orders->status = "Возвращен";
                $update_orders->save();
                header("Location: /admin/forms/listOrders");
                die();
            }

            return false;
        }

        public function elementGamesNew()
        {
            if ($_POST)
            {
                if ($_FILES["games_photo"])
                {
                    $imagename = date('mdy_Is') . rand(111111111, 999999999) . ".jpg";
                    $upfile = "data/photo/" . $imagename;
                    if (!move_uploaded_file($_FILES["games_photo"]['tmp_name'], $upfile))
                    {
                        $imagename = "";
                    }
                }
                $create = ORM::for_table('games')->create();
                $create->caption = $_POST['games_name'];
                $create->popular = $_POST['games_popular'];
                $create->about = $_POST['games_atext'];
                $create->photo = $imagename;
                if ($_FILES["feedback_photo"])
                {
                    $imagename2 = date('mdy_Is') . rand(111111111, 999999999) . ".jpg";
                    $upfile2 = "data/photo/" . $imagename2;
                    if (move_uploaded_file($_FILES["feedback_photo"]['tmp_name'], $upfile2))
                    {
                        $create->photo_feedback = $imagename2;
                    }
                }
                $create->save();


                $update = ORM::for_table('games')->where('id', $create->id)->find_one();
                $update->elink = "/forms/game/" . $create->id;
                $update->link = "/" . $this->m->translit($create->caption);
                $update->save();


                header("Location: /admin/forms/listGames");
                die();
            }
            $this->reg["view"]->assign("gamesMode", "gamesNew");
            $this->reg["view"]->addBlock('block1', 'admin_games.tpl');
        }

        public function editGames()
        {

          

            $data = ORM::for_table('games')->where('id', $_GET['param2'])->find_one();
            if ($_POST)
            {
                if ($_FILES["games_photo"])
                {
                    $imagename = date('mdy_Is') . rand(111111111, 999999999) . ".jpg";
                    $upfile = "data/photo/" . $imagename;
                    if (!move_uploaded_file($_FILES["games_photo"]['tmp_name'], $upfile))
                    {
                        $imagename = $data['photo'];
                    }
                }
             

if($_POST['games_parent'] == "" ){

    $person = array("id" => 0);
    $results = 0;
    $results = array("parent" => 0);
   // $results->parent = 0;
   // $results->save();






}
else{


    $person = ORM::for_table('games')->select('id')->where('caption', $_POST['games_parent'])->find_one();
    $parnum = ORM::for_table('games')->select('parent')->find_one($person['id']);

  $results = ORM::for_table('games')->where('id', $person['id'])->find_one();
   $results->parent = 1;
   $results->save();

}


                $update = ORM::for_table('games')->where('id', $_GET['param2'])->find_one();
                $update->caption = $_POST['games_name'];
                $update->popular = $_POST['games_popular'];
                $update->about = $_POST['games_atext'];
                   $update->children = $person->id; 
              $update->parent_name = $_POST['games_parent'];
                $update->photo = $imagename;
                if ($_FILES["feedback_photo"])
                {
                    $imagename2 = date('mdy_Is') . rand(111111111, 999999999) . ".jpg";
                    $upfile2 = "data/photo/" . $imagename2;
                    if (move_uploaded_file($_FILES["feedback_photo"]['tmp_name'], $upfile2))
                    {
                        $update->photo_feedback = $imagename2;
                    }
                }
                if (!$_POST['games_url'])
                {
                    $update = ORM::for_table('games')->where('id', $update->id)->find_one();
                    $update->elink = "/forms/game/" . $update->id;
                    $update->link = "/" . $this->m->translit($update->caption);
                }
                else{
                    $update->link =$_POST['games_url'];
                }
                $update->save();


                header("Location: /admin/forms/listGames");
                die();
            }
            view::assign("gamesData", $data);
            $this->reg["view"]->assign("gamesMode", "gamesEdit");
            $this->reg["view"]->addBlock('block1', 'admin_games.tpl');
        }

        public function deleteGames()
        {
            $delete = ORM::for_table('games')->where('id', $_GET['param2'])->find_one();
            if ($delete->photo)
            {
                unlink('data/photo/' . $delete->photo);
            }
            $delete->delete();
            header("Location: /admin/forms/listGames");
        }

        public function listGames()
        {
            $sort = 'caption';
            if (isset($_GET['sort']) and $_GET['sort'])
            {
                $sort = $_GET['sort'];
            }
            if ($_POST and isset($_POST['sorting']))
            {
                if (!empty($_POST['sorting']))
                {
                    foreach ($_POST['sorting'] as $ks => $vs)
                    {
                        if ($vs)
                        {
                            $update_el = ORM::for_table('games')->where('id', (int)$ks)->find_one();
                            $update_el->sort = (int)$vs;
                            $update_el->save();
                        }
                    }
                }
                header('Location: /admin/' . __CLASS__ . '/' . __FUNCTION__);
                die();
            }
            $rowElements = ORM::for_table('games')->order_by_asc($sort)->find_array();
            view::assign("gamesData", $rowElements);
            view::assign('moduleEname', $this->ename);
            view::assign("gamesMode", "list");
            $this->reg["view"]->addBlock('block1', 'admin_games.tpl');
        }

        public function elementServicesNew()
        {
            $data = ORM::for_table('games')->find_array();
            if ($_POST)
            {


                $create = ORM::for_table('services')->create();



                $par2 = ORM::for_table('categories')->where('caption', $_POST['paren'])->find_one();
              //  $create->back =     $_FILES['test_im']['name'][0];// $_POST['testimg']
               // $create->front =   $_FILES['test_im1']['name'][0]; //$_POST['testimg1']


               if ($_FILES['test_im']['tmp_name'][0] != ""){
                    
                move_uploaded_file($_FILES['test_im']['tmp_name'][0], 'data/img/' . $_FILES['test_im']['name'][0]);
                $create->back = $_FILES['test_im']['name'][0];
            }
            if ($_FILES['test_im1']['tmp_name'][0] != ""){
                move_uploaded_file($_FILES['test_im1']['tmp_name'][0], 'data/img/' . $_FILES['test_im1']['name'][0]);
                $create->front = $_FILES['test_im1']['name'][0];
              
                }

                $create->parent = $par2->id;
                $create->min_tex = $_POST['prod_on'];

                $create->caption = $_POST['services_name'];
                $create->title = $_POST['services_title'];
                $create->description = $_POST['services_description'];
                $create->keywords = $_POST['services_keywords'];
                $create->about = $_POST['services_atext'];
                $create->order_info = $_POST['services_order_info'];
                $create->type = $_POST['services_type'];
                $create->template = $_POST['services_templates'];
                $create->min_price = $_POST['services_min_price'];
                $create->gid = $_POST['services_gid'];
                $create->photo = $_POST['services_photo'];

                $create->filter_1 = $_POST['services_filter_1'];
                $create->filter_2 = $_POST['services_filter_2'];
                $create->filter_3 = $_POST['services_filter_3'];
                $create->filter_4 = $_POST['services_filter_4'];
                $create->search_desc = $_POST['services_search_desc'];

              
                
                
                $create->save();

                $gameRow = ORM::for_table('games')->where('id', $create->gid)->find_one();

                $update = ORM::for_table('services')->where('id', $create->id)->find_one();
                $update->elink = "/forms/order/" . $create->id;
                $update->link = "/" . $this->m->translit($gameRow->caption . "_" . $_POST['services_name']);
                $update->save();

                header("Location: /admin/forms/listServices");
                die();
            }
            view::assign("servicesData", $data);

            $photos = array();
            if ($handle = opendir('data/img-service'))
            {
                while (false !== ($entry = readdir($handle)))
                {
                    if ($entry != "." && $entry != "..")
                    {
                        $photos[] = '/data/img-service/' . $entry;

                        arsort($photos, SORT_NUMERIC);
                    }
                }
                closedir($handle);
            }
            view::assign("servicesDataPhotos", $photos);


            $this->reg["view"]->assign("servicesMode", "servicesNew");
            $this->reg["view"]->addBlock('block1', 'admin_services.tpl');
        }

        public function editServices()
        {
            session_start();
            $data = ORM::for_table('services')->where('id', $_GET['param2'])->find_one();         
            $par = ORM::for_table('categories')->find_array();
          
           $_SESSION['par'] = $par;
            $data['games'] = ORM::for_table('games')->find_array();
            if ($_POST)
            {

                if($_POST['paren'] != ""){
                $par1 = ORM::for_table('categories')->where('caption', $_POST['paren'])->find_one();
                }
           



                $update = ORM::for_table('services')->where('id', $_GET['param2'])->find_one();
                


                if($_POST['prod_on']){
                $update->min_tex = $_POST['prod_on'];
                }








                if($_POST['paren'] != ""){    $update->parent = $par1->id;   }






                if ($_FILES['testimg']['tmp_name'][0] != ""){
                    
                    move_uploaded_file($_FILES['testimg']['tmp_name'][0], 'data/img/' . $_FILES['testimg']['name'][0]);
                    $update->back = $_FILES['testimg']['name'][0];
                }
                if ($_FILES['testimg1']['tmp_name'][0] != ""){
                    move_uploaded_file($_FILES['testimg1']['tmp_name'][0], 'data/img/' . $_FILES['testimg1']['name'][0]);
                    $update->front = $_FILES['testimg1']['name'][0];
                  
                    }


            //if( $_FILES['testimg']['name'][0] != ""){ $update->back =     $_FILES['testimg']['name'][0];}// $_POST['testimg']
             //  if($_FILES['testimg1']['name'][0] != ""){    $update->front =   $_FILES['testimg1']['name'][0];} //$_POST['testimg1']
              

               
                $update->caption = $_POST['services_name'];
                $update->title = $_POST['services_title'];
                $update->description = $_POST['services_description'];
                $update->keywords = $_POST['services_keywords'];
                $update->about = $_POST['services_atext'];
                $update->order_info = $_POST['services_order_info'];
                $update->type = $_POST['services_type'];
                $update->template = $_POST['services_templates'];
                $update->min_price = $_POST['services_min_price'];
                $update->gid = $_POST['services_gid'];
                $update->photo = $_POST['services_photo'];

                $update->filter_1 = $_POST['services_filter_1'];
                $update->filter_2 = $_POST['services_filter_2'];
                $update->filter_3 = $_POST['services_filter_3'];
                $update->filter_4 = $_POST['services_filter_4'];
                $update->search_desc = $_POST['services_search_desc'];

                if ($_POST['services_url'])
                {
                    $update->link = $_POST['services_url'];
                }
                $update->save();
                header("Location: /admin/forms/listServices");
                die();
            }
            view::assign("servicesData", $data);

            $photos = array();
            if ($handle = opendir('data/img-service'))
            {
                while (false !== ($entry = readdir($handle)))
                {
                    if ($entry != "." && $entry != "..")
                    {
                        $photos[] = '/data/img-service/' . $entry;

                        arsort($photos, SORT_NUMERIC);
                    }
                }
                closedir($handle);
            }
            view::assign("servicesDataPhotos", $photos);

            $this->reg["view"]->assign("servicesMode", "servicesEdit");
            $this->reg["view"]->addBlock('block1', 'admin_services.tpl');
        }

        public function deleteServices()
        {
            $delete = ORM::for_table('services')->where('id', $_GET['param2'])->find_one();
            $delete->delete();
            header("Location: /admin/forms/listServices");
        }

        public function listServices()
        {
            if ($_POST and isset($_POST['sort_services']))
            {
                if (!empty($_POST['sort_services']))
                {
                    foreach ($_POST['sort_services'] as $ks => $vs)
                    {
                        if ($vs)
                        {
                            $update_s = ORM::for_table('services')->where('id', (int)$ks)->find_one();
                            $update_s->sort = (int)$vs;
                            $update_s->save();
                        }
                    }
                }
                header('Location: /admin/' . __CLASS__ . '/' . __FUNCTION__);
                die();
            }

            $row_games = ORM::for_table('games')->order_by_desc('id')->find_array();
            if (isset($row_games[0]['id']))
            {
                foreach ($row_games as $kg => $vg)
                {
                    $row_services = ORM::for_table('services')->where('gid', (int)$vg['id'])->find_array();
                    if (isset($row_services[0]['id']))
                    {
                        $row_games[$kg]['services'] = $row_services;
                    }
                }
            }
            view::assign("servicesData", $row_games);
            view::assign('moduleEname', $this->ename);
            view::assign("servicesMode", "list");
            $this->reg["view"]->addBlock('block1', 'admin_services.tpl');
        }

        public function elementServersNew()
        {
            $data = ORM::for_table('services')->find_array();
            foreach ($data as $key => $value)
            {
                $row = ORM::for_table('games')->where('id', $value['gid'])->find_one();
                $data[$key]['game_caption'] = $row->caption;
            }
            if ($_POST)
            {
                $create = ORM::for_table('servers')->create();
                $create->caption = $_POST['servers_name'];
                $create->services = $_POST['services_type'];
                $create->coef = $_POST['servers_coef'];
                $create->save();
                if (isset($_POST['servers_all_price']) and $_POST['servers_all_price'] == 'on')
                {
                    $up_s = ORM::for_table('servers')->where('services', (int)$create->services)->find_many();
                    foreach ($up_s as $ks => $update_servers)
                    {
                        $update_servers->coef = $create->coef;
                        $update_servers->save();
                    }
                }
                header("Location: /admin/forms/listServers");
                die();
            }
            view::assign("serversData", $data);
            $this->reg["view"]->assign("serversMode", "serversNew");
            $this->reg["view"]->addBlock('block1', 'admin_servers.tpl');
        }

        public function editServers()
        {
            $data = ORM::for_table('servers')->where('id', $_GET['param2'])->find_array();
            $data['services'] = ORM::for_table('services')->find_array();
            foreach ($data['services'] as $key => $value)
            {
                $row = ORM::for_table('games')->where('id', $value['gid'])->find_one();
                $data['services'][$key]['game_caption'] = $row->caption;
            }
            if ($_POST)
            {
                $update = ORM::for_table('servers')->where('id', $_GET['param2'])->find_one();
                $update->caption = $_POST['servers_name'];
                $update->services = $_POST['services_type'];
                $update->coef = $_POST['servers_coef'];
                $update->save();
                if (isset($_POST['servers_all_price']) and $_POST['servers_all_price'] == 'on')
                {
                    $up_s = ORM::for_table('servers')->where('services', (int)$update->services)->find_many();
                    foreach ($up_s as $ks => $update_servers)
                    {
                        $update_servers->coef = $update->coef;
                        $update_servers->save();
                    }
                }
                header("Location: /admin/forms/listServers");
                die();
            }
            view::assign("serversData", $data);
            $this->reg["view"]->assign("serversMode", "serversEdit");
            $this->reg["view"]->addBlock('block1', 'admin_servers.tpl');
        }

        public function deleteServers()
        {
            $delete = ORM::for_table('servers')->where('id', $_GET['param2'])->find_one();
            $delete->delete();
            header("Location: /admin/forms/listServers");
        }

        public function listServers()
        {
            if ($_POST and isset($_POST['sort_server']))
            {
                if (!empty($_POST['sort_server']))
                {
                    foreach ($_POST['sort_server'] as $ks => $vs)
                    {
                        if ($vs)
                        {
                            $update_s = ORM::for_table('servers')->where('id', (int)$ks)->find_one();
                            $update_s->sort = (int)$vs;
                            $update_s->save();
                        }
                    }
                }
                header('Location: /admin/' . __CLASS__ . '/' . __FUNCTION__);
                die();
            }
            $rowElements = ORM::for_table('games')->order_by_desc('id')->find_array();
            if (isset($rowElements[0]['id']))
            {
                foreach ($rowElements as $kg => $vg)
                {
                    $row_services = ORM::for_table('services')->where('gid', (int)$vg['id'])->order_by_desc('id')->find_array();
                    if (isset($row_services[0]['id']))
                    {
                        $rowElements[$kg]['services'] = $row_services;
                        foreach ($row_services as $ks => $vs)
                        {
                            $row_servers = ORM::for_table('servers')->where('services', (int)$vs['id'])->order_by_desc('services')->find_array();
                            if (isset($row_servers[0]['id']))
                            {
                                $rowElements[$kg]['services'][$ks]['servers'] = $row_servers;
                            }
                        }
                    }
                }
            }
            view::assign("serversData", $rowElements);
            view::assign('moduleEname', $this->ename);
            view::assign("serversMode", "list");
            $this->reg["view"]->addBlock('block1', 'admin_servers.tpl');
        }

        public function elementItemNew()
        {
            if ($_POST)
            {
                if ($_FILES["item_newelement_photo"])
                {
                    $imagename = date('mdy_Is') . rand(111111111, 999999999) . '.' . pathinfo($_FILES["item_newelement_photo"]['name'], PATHINFO_EXTENSION);
                    $upfile = "data/photo/" . $imagename;
                    if (!move_uploaded_file($_FILES["item_newelement_photo"]['tmp_name'], $upfile))
                    {
                        $imagename = "";
                    }
                }








                $create = ORM::for_table('services_item')->create();



                
                $par2 = ORM::for_table('categories')->where('caption', $_POST['paren'])->find_one();
                $create->back =     $_FILES['test_im']['name'][0];// $_POST['testimg']
                $create->front =   $_FILES['test_im1']['name'][0]; //$_POST['testimg1']
                $create->parent = $par2->id;
                $create->caption = $_POST['item_newelement_caption'];
                $create->about = $_POST['item_newelement_about'];
                $create->sid = $_POST['item_services_type'];
                $create->price = $_POST['item_newelement_price'];
                $create->photo = $imagename;
                $create->link = $_POST['item_newelement_link'];
                $create->active = $_POST['item_newelement_active'];


                $create->filter_1 = $_POST['filter_1'];
                $create->filter_2 = $_POST['filter_2'];
                $create->filter_3 = $_POST['filter_3'];
                $create->filter_4 = $_POST['filter_4'];
                $create->advantages_id_1 = (int)$_POST['advantages_id_1'];
                $create->advantages_id_2 = (int)$_POST['advantages_id_2'];
                $create->advantages_id_3 = (int)$_POST['advantages_id_3'];

                $create->short_about = $_POST['short_about'];
                $create->characteristic = $_POST['characteristic'];
                $create->review = $_POST['review'];
                $create->activation = $_POST['activation'];

                $create->caption_about = $_POST['caption_about'];
                $create->caption_characteristic = $_POST['caption_characteristic'];
                $create->caption_review = $_POST['caption_review'];
                $create->caption_activation = $_POST['caption_activation'];

                $create->save();

                $update = ORM::for_table('services_item')->where('id', $create->id)->find_one();
                $update->elink = "/forms/itemform/" . $create->id;
                $update->seo_link = "/" . $this->m->translit($create->caption);
                $update->save();

                if ($_FILES["slider_images"])
                {
                    foreach ($_FILES["slider_images"]["error"] as $key => $error) {
                        if ($error == UPLOAD_ERR_OK) {

                            $imagename = date('mdy_Is') . rand(111111111, 999999999) . '.' . pathinfo($_FILES["slider_images"]['name'][$key], PATHINFO_EXTENSION);
                            $upfile = "data/img-sliders/" . $imagename;


                            if (move_uploaded_file($_FILES["slider_images"]['tmp_name'][$key], $upfile))
                            {
                                $sliders_create = ORM::for_table('sliders')->create();

                                $sliders_create->services_item_id = $create->id();
                                $sliders_create->photo = $imagename;
                                $sliders_create->sort_order = (int)$_POST['sort_order'][$key];

                                $sliders_create->save();
                            }
                        }
                    }
                }

                header("Location: /admin/forms/listItem");
                die();
            }
            $data['services'] = ORM::for_table('services')->where('type', 1)->find_array();
            foreach ($data['services'] as $key => $value)
            {
                $row = ORM::for_table('games')->where('id', $value['gid'])->find_one();
                $data['services'][$key]['game_caption'] = $row->caption;
            }

            $data['advantages'] = ORM::for_table('advantages')->find_array();
            $data['sliders'] = ORM::for_table('sliders')->where('services_item_id', $data['item']->id)->find_array();

            view::assign("servicesItemData", $data);
            $this->reg["view"]->assign("servicesItemMode", "servicesItemNew");
            $this->reg["view"]->addBlock('block1', 'admin_services_item.tpl');
        }

        public function editItem()
        {



            session_start();
              
           



            $data['item'] = ORM::for_table('services_item')->where('id', $_GET['param2'])->find_one();


            $par = ORM::for_table('categories')->where('id', $data->parent)->find_one();
          
            $_SESSION['par'] = $par->caption;

            $data['services'] = ORM::for_table('services')->where('type', 1)->find_array();
            foreach ($data['services'] as $key => $value)
            {
                $row = ORM::for_table('games')->where('id', $value['gid'])->find_one();
                $data['services'][$key]['game_caption'] = $row->caption;
            }

            $data['advantages'] = ORM::for_table('advantages')->find_array();
            $data['sliders'] = ORM::for_table('sliders')->where('services_item_id', $data['item']->id)->order_by_asc('sort_order')->find_array();

            if ($_POST)
            {
                if ($_FILES["item_editelement_photo"])
                {
                    $imagename = date('mdy_Is') . rand(111111111, 999999999) . '.' . pathinfo($_FILES["item_editelement_photo"]['name'], PATHINFO_EXTENSION);
                    $upfile = "data/photo/" . $imagename;
                    if (!move_uploaded_file($_FILES["item_editelement_photo"]['tmp_name'], $upfile))
                    {
                        $imagename = $data['item']['photo'];
                    }
                }

                    $par1 = ORM::for_table('categories')->where('caption', $_POST['paren1'])->find_one();
               
    
    

                    
                  







                $update = ORM::for_table('services_item')->where('id', $_GET['param2'])->find_one();
                $update->parent = $par1->id;
                $update->back =     $_FILES['testimg2']['name'][0];// $_POST['testimg']
                $update->front =   $_FILES['testimg3']['name'][0]; //$_POST['testimg1']

                $update->caption = $_POST['item_editelement_caption'];
                $update->about = $_POST['item_editelement_about'];
                $update->sid = $_POST['item_services_type'];
                $update->price = $_POST['item_editelement_price'];
                $update->photo = $imagename;
                $update->link = $_POST['item_editelement_link'];
                $update->active = $_POST['item_editelement_active'];


                $update->filter_1 = $_POST['filter_1'];
                $update->filter_2 = $_POST['filter_2'];
                $update->filter_3 = $_POST['filter_3'];
                $update->filter_4 = $_POST['filter_4'];
                $update->advantages_id_1 = $_POST['advantages_id_1'];
                $update->advantages_id_2 = $_POST['advantages_id_2'];
                $update->advantages_id_3 = $_POST['advantages_id_3'];
                $update->short_about = $_POST['short_about'];
                $update->characteristic = $_POST['characteristic'];
                $update->review = $_POST['review'];
                $update->activation = $_POST['activation'];

                $update->caption_about = $_POST['caption_about'];
                $update->caption_characteristic = $_POST['caption_characteristic'];
                $update->caption_review = $_POST['caption_review'];
                $update->caption_activation = $_POST['caption_activation'];


                if ($_POST['seo_link'])
                {
                    $update->seo_link = $_POST['seo_link'];
                }
                else
                {
                    $update->elink = "/forms/itemform/" . $update->id;
                    $update->seo_link = "/" . $this->m->translit($update->caption);
                    $update->save();
                }



                //сначала избавляемся от удаленных слайдов (картинки не трогаем, пусть валяются, тем более могут пригодиться на след. шаге)
                ORM::for_table('sliders')->where('services_item_id', $update->id)->delete_many();

                //добавляем старые из hidden
                if (isset ($_POST['slider_images_old']))
                {
                    foreach ($_POST['slider_images_old'] as $key => $value)
                    {
                        $sliders_create = ORM::for_table('sliders')->create();

                        $sliders_create->services_item_id = $update->id();
                        $sliders_create->photo = $value;
                        $sliders_create->sort_order = (int)$_POST['sort_order_old'][$key];

                        $sliders_create->save();
                    }
                }

                //добавляем нове файлы
                if ($_FILES["slider_images"])
                {
                    foreach ($_FILES["slider_images"]["error"] as $key => $error) {
                        if ($error == UPLOAD_ERR_OK) {

                            $imagename = date('mdy_Is') . rand(111111111, 999999999) . '.' . pathinfo($_FILES["slider_images"]['name'][$key], PATHINFO_EXTENSION);
                            $upfile = "data/img-sliders/" . $imagename;

                            if (move_uploaded_file($_FILES["slider_images"]['tmp_name'][$key], $upfile))
                            {
                                $sliders_create = ORM::for_table('sliders')->create();

                                $sliders_create->services_item_id = $update->id();
                                $sliders_create->photo = $imagename;
                                $sliders_create->sort_order = (int)$_POST['sort_order'][$key];

                                $sliders_create->save();
                            }
                        }
                    }
                }




                $update->save();
                header("Location: /admin/forms/listItem");
                die();
            }
            view::assign("servicesItemData", $data);
            $this->reg["view"]->assign("servicesItemMode", "servicesItemEdit");
            $this->reg["view"]->addBlock('block1', 'admin_services_item.tpl');
        }

        public function deleteItem()
        {
            $delete = ORM::for_table('services_item')->where('id', $_GET['param2'])->find_one();
            if ($delete->photo)
            {
                unlink('data/photo/' . $delete->photo);
            }
            ORM::for_table('sliders')->where('services_item_id', $delete->id)->delete_many();

            $delete->delete();
            header("Location: /admin/forms/listItem");
        }

        public function listItem()
        {

            $rowElements = ORM::for_table('games')->order_by_desc('id')->find_array();
            if (isset($rowElements[0]['id']))
            {
                foreach ($rowElements as $kg => $vg)
                {
                    $row_services = ORM::for_table('services')->where('gid', (int)$vg['id'])->where('type', 1)->order_by_desc('id')->find_array();
                    if (isset($row_services[0]['id']))
                    {
                        foreach ($row_services as $ks => $vs)
                        {
                            $row_services_item = ORM::for_table('services_item')->where('sid', (int)$vs['id'])->order_by_desc('id')->find_array();
                            if (isset($row_services_item[0]['id']))
                            {
                                foreach ($row_services_item as $ksi => $vsi)
                                {
                                    $rowElements[$kg]['s_i'][] = $vsi;
                                }
                            }
                        }
                    }
                }
            }

            $digisellerItems = ORM::for_table('services_item')->where('sid', 0)->where_not_equal('digiseller_id', 0)->order_by_desc('id')->find_array();

            view::assign("digisellerItems", $digisellerItems);
            view::assign("servicesItemData", $rowElements);
            view::assign('moduleEname', $this->ename);
            view::assign("servicesItemMode", "list");
            $this->reg["view"]->addBlock('block1', 'admin_services_item.tpl');
        }


        public function listItemCategory()
        {

            if ($_POST && isset($_POST['item_ids']) && $_POST['item_new_cat'] != 0){
                foreach ($_POST['item_ids'] as $item_id)
                {

                    $item = ORM::for_table('services_item')->where('id', (int)$item_id)->find_one();
                    $item->sid = (int)$_POST['item_new_cat'];
                    $item->save();

                }
            }

            $items = ORM::for_table('services_item')->order_by_desc('id')->find_array();
            foreach ($items as &$item)
            {
                $service = ORM::for_table('services')->where('id', $item['sid'])->find_array();
                $item['service'] = $service[0];
                $game = ORM::for_table('games')->where('id',$item['service']['gid'])->find_array();
                $item['game'] = $game[0];
            }


            $services = ORM::for_table('services')->where('type', 1)->find_array();
            foreach ($services as $key => $value)
            {
                $row = ORM::for_table('games')->where('id', $value['gid'])->find_one();
                $services[$key]['game_caption'] = $row->caption;
            }


            view::assign("items", $items);
            view::assign("services", $services);
            view::assign('moduleEname', $this->ename);
            view::assign("servicesItemMode", "listCategory");
            $this->reg["view"]->addBlock('block1', 'admin_services_item.tpl');
        }









        //START DIGISELLER
        public function getDigisellerData($address, $xml){
            $ch = curl_init($address);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
            curl_setopt($ch, CURLOPT_POST,1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
            $result=curl_exec($ch);
            return $result;
        }

        public function getDigisellerCategoryIds($categories)
        {
            $temp = array();

            foreach ($categories as $category)
            {
                $temp[] = (int)$category->id;
                if (isset($category->category))
                {
                    $temp = array_merge($temp, $this->getDigisellerCategoryIds($category->category));
                }

            }

            return $temp;
        }

        public function updateDigiseller()
        {
            //error_reporting(7);
            //ini_set("display_errors", 'on');
            set_time_limit(0);

            $old_items = ORM::for_table('services_item')->select('digiseller_id')->where_not_equal('digiseller_id', 0)->find_array();

            foreach ($old_items as $key=>$value)
            {
                $old_items[$key] = $value['digiseller_id'];
            }


            //получим список всех категорий с дига
            $xml="
                    <digiseller.request>
                        <seller>
                            <id>".DIGISELLER_ID."</id>
                        </seller>
                        <category>
                            <id>0</id>
                        </category>
                        <lang>ru-RU</lang>
                    </digiseller.request>
                 ";

            $answer=$this->GetDigisellerData("https://shop.digiseller.ru/xml/shop_categories.asp", $xml);
            $xmlres = simplexml_load_string($answer, null, LIBXML_NOCDATA);
            $categoryIds = $this->getDigisellerCategoryIds($xmlres->categories);

            //получим товары в категориях
            $all_items = array();


            foreach ($categoryIds as $categoryId)
            {
                $num = 0;

                do
                {
                    $num++;

                    $xml = "
                        <digiseller.request>
                            <category>
                                <id>". $categoryId ."</id>
                            </category>
                            <seller>
                                <id>" . DIGISELLER_ID . "</id>
                            </seller>
                            <pages>
                                <num>".$num."</num>
                                <rows>200</rows>
                            </pages>
                            <products>
                                <order>name</order>
                                <currency>RUR</currency>
                            </products>
                            <lang>ru-RU</lang>
                        </digiseller.request>
                    ";

                    $answer = $this->GetDigisellerData("https://shop.digiseller.ru/xml/shop_products.asp", $xml);
                    $xmlres = simplexml_load_string($answer, null, LIBXML_NOCDATA);



                    $count = 0;


                    foreach ($xmlres->products->product as $product)
                    {
                        $count++;

                        $all_items[] = $product->id;
                        //обновляем цену, если находим товар с таким digiseller id
                        //иначе создаем новый товар
                        $update = ORM::for_table('services_item')->where('digiseller_id', $product->id)->find_one();
                        if (isset($update->id))
                        {
                            $update->price = $product->price;
                            $update->active = $product->in_stock;
                            $update->save();
                        }
                        else
                        {
                            $xml = "
                                <digiseller.request>
                                  <product>
                                    <id>" . $product->id . "</id>
                                  </product>
                                  <seller>
                                    <id>" . DIGISELLER_ID . "</id>
                                  </seller>
                                  <lang>ru-RU</lang>
                                </digiseller.request>
                            ";

                            $answer = $this->GetDigisellerData("https://shop.digiseller.ru/xml/shop_product_info.asp", $xml);
                            $xmlres_info = simplexml_load_string($answer, null, LIBXML_NOCDATA);

                            if (isset($xmlres_info->product))
                            {
                                $create = ORM::for_table('services_item')->create();

                                $create->digiseller_id = $product->id;
                                $create->price = $product->price;
                                $create->active = $product->in_stock;


                                $create->caption = $xmlres_info->product->name;

                                $create->sid = 0;
                                $create->sort = 0;


                                if ($xmlres_info->product->seller->id == DIGISELLER_ID)
                                {
                                    $create->advantages_id_1 = 2;
                                    $create->advantages_id_2 = 3;
                                    $create->advantages_id_3 = 4;
                                }
                                else
                                {
                                    $create->advantages_id_1 = 2;
                                    $create->advantages_id_2 = 3;
                                }


                                $create->link = 'http://www.oplata.info/asp/pay_wm.asp?id_d=' . $product->id;
                                if ($xmlres_info->product->seller->id != DIGISELLER_ID)
                                {
                                    $create->link .= '&ai=' . DIGISELLER_ID;
                                }


                                if ($xmlres_info->product->info != '')
                                {
                                    $xmlres_info->product->info = html_entity_decode($xmlres_info->product->info);
                                    $xmlres_info->product->info = nl2br($xmlres_info->product->info);
                                    $create->about = '<p>' . $xmlres_info->product->info . '</p>';
                                    $create->caption_about = 'Описание';
                                }

                                if ($xmlres_info->product->add_info != '')
                                {
                                    $xmlres_info->product->add_info = html_entity_decode($xmlres_info->product->add_info);
                                    $xmlres_info->product->add_info = nl2br($xmlres_info->product->add_info);
                                    $create->characteristic = '<p>' . $xmlres_info->product->add_info . '</p>';
                                    $create->caption_characteristic = 'Дополнительная информация';
                                }

                                if (isset ($xmlres_info->product->discounts->discount))
                                {
                                    $disc = array();
                                    $i = 0;
                                    foreach ($xmlres_info->product->discounts->discount as $discount)
                                    {
                                        $disc[$i]['summa'] = (int)$discount->summa;
                                        $disc[$i]['percent'] = (int)$discount->percent;
                                        $i++;
                                    }

                                    $create->discounts = serialize($disc);
                                }

                                $create->seller_id = $xmlres_info->product->seller->id;
                                $create->seller_name = $xmlres_info->product->seller->name;


                                $create->photo = '';
                                if (isset($xmlres_info->product->previews_img->preview_img[0]))
                                {
                                    $img = $xmlres_info->product->previews_img->preview_img[0];

                                    $imagename = date('mdy_Is') . rand(111111111, 999999999) . '.' . pathinfo($img->img_real, PATHINFO_EXTENSION);
                                    $upfile = "data/photo/" . $imagename;

                                    if (copy($img->img_real, $upfile))
                                    {
                                        $create->photo = $imagename;
                                    }
                                }


                                $create->save();

                                $update = ORM::for_table('services_item')->where('id', $create->id)->find_one();
                                $update->elink = "/forms/itemform/" . $create->id;
                                $update->seo_link = "/" . $this->m->translit($create->caption . '_' . $create->id);
                                $update->save();

                                $i = 0;
                                if (isset($xmlres_info->product->previews_img->preview_img))
                                {
                                    foreach ($xmlres_info->product->previews_img->preview_img as $img)
                                    {

                                        $imagename = date('mdy_Is') . rand(111111111, 999999999) . '.' . pathinfo($img->img_real, PATHINFO_EXTENSION);
                                        $upfile = "data/img-sliders/" . $imagename;

                                        if (copy($img->img_real, $upfile))
                                        {
                                            $sliders_create = ORM::for_table('sliders')->create();

                                            $sliders_create->services_item_id = $create->id;
                                            $sliders_create->photo = $imagename;
                                            $sliders_create->sort_order = $i;

                                            $sliders_create->save();
                                        }

                                        $i++;
                                    }
                                }
                            }
                        }
                    }

                } while($count>=200);

            }

			

            //удалим товары которых больше нет в DIGI
            $del_items = array_diff($old_items, $all_items);




            foreach ($del_items as $del_item)
            {
                $delete = ORM::for_table('services_item')->where('digiseller_id', $del_item)->find_one();
                if ($delete->photo)
                {
                    unlink('data/photo/' . $delete->photo);
                }
                ORM::for_table('sliders')->where('services_item_id', $delete->id)->delete_many();

                $delete->delete();
            }

            exit;
        }
        //END DIGISELLER







        public function list_promo_code()
        {
            $row_elements = ORM::for_table('promo_code')->order_by_desc('id')->find_array();
            view::assign("page_data", $row_elements);
            view::assign('moduleEname', $this->ename);
            view::assign("mode", "list");
            $this->reg["view"]->addBlock('block1', 'admin_promo_code.tpl');

            return true;
        }

        public function new_promo_code()
        {
            if ($_POST)
            {
                $create = ORM::for_table('promo_code')->create();
                $create->discount_size = (float)$_POST['new_discount_size'];
                $create->date_end = (string)date('Y-m-d', strtotime($_POST['new_date_end']));
                $create->code = (string)$_POST['new_code'];
                $create->gid = (int)$_POST['new_gid'];
                $create->save();
                header("Location: /admin/" . __CLASS__ . "/list_promo_code");
                die();
            }
            $data = ORM::for_table('games')->order_by_desc('id')->find_array();
            view::assign("page_data", $data);
            $this->reg["view"]->assign("mode", "new_promo_code");
            $this->reg["view"]->addBlock('block1', 'admin_promo_code.tpl');

            return true;
        }

        public function edit_promo_code()
        {
            if (isset($_GET['param2']))
            {
                if ($_POST)
                {
                    $update = ORM::for_table('promo_code')->where('id', (int)$_GET['param2'])->find_one();
                    $update->discount_size = (float)$_POST['edit_discount_size'];
                    $update->date_end = (string)date('Y-m-d', strtotime($_POST['edit_date_end']));
                    $update->code = (string)$_POST['edit_code'];
                    $update->gid = (int)$_POST['edit_gid'];
                    $update->save();
                    header("Location: /admin/" . __CLASS__ . "/list_promo_code");
                    die();
                }
                $data['pc'] = ORM::for_table('promo_code')->where('id', (int)$_GET['param2'])->find_one();
                if (!isset($data['pc']->id))
                {
                    return false;
                }
                $data['games'] = ORM::for_table('games')->order_by_desc('id')->find_array();
                view::assign("page_data", $data);
                $this->reg["view"]->assign("mode", "edit_promo_code");
                $this->reg["view"]->addBlock('block1', 'admin_promo_code.tpl');

                return true;
            }

            return false;
        }


        public function delete_promo_code()
        {
            if (isset($_GET['param2']))
            {
                $delete = ORM::for_table('promo_code')->where('id', (int)$_GET['param2'])->find_one();
                if (isset($delete->id))
                {
                    $delete->delete();
                }
                header("Location: /admin/forms/list_promo_code");
                die();

                return true;
            }

            return false;
        }
    }

?>
