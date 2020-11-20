<?php

    /* by icyken.ru 2011 */

    class content extends ControllerAdmin
    {

        public function mainPage()
        {
            $this->reg["view"]->addBlock('block1', 'admin_content.tpl');
            $this->setMode("one");
        }

        public function listelements()
        {
            $elements = ORM::for_table('content')->select('id')->select('caption')->find_array();

            

            view::assign("listData", $elements);
            view::assign('moduleEname', $this->ename);
            $this->reg["view"]->addBlock('block1', 'admin_listelements.tpl');
        }


        public function elementNew()
        {
            if (!$this->reg['users']->is_admin())
            {
                $this->reg['view']->go404();
            }
            if ($_POST)
            {
                if ($this->m->checkRequest('new') == 1)
                {
                    $create_content = ORM::for_table('content')->create();
                    $create_content->caption = $_POST['content_newelement_caption'];
                    $create_content->content = $_POST['content_newelement_content'];
                    $create_content->save();
                    $this->reg->message("Элемент добавлен");
                }
                else
                {
                    $errorMsg = $this->m->checkRequest('new');
                    $this->reg->message($errorMsg);
                }
            }

            $this->reg["view"]->addBlock('block1', 'admin_content.tpl');
            $this->setMode("new");
        }

        public function elementEdit()
        {
            if (!$this->reg['users']->is_admin())
            {
                $this->reg['view']->go404();
            }
            if (is_numeric($_GET['param2']))
            {
                if ($_POST)
                {
                    $row = ORM::for_table('content')->where('id', $_GET['param2'])->find_one();
                    $row->content = $_POST['content_editelement_content'];
                    $row->caption = $_POST['content_editelement_caption'];
                    $row->save();
                    $this->reg->message("Элемент отредактирован");
                }

                $pageData = ORM::for_table('content')->where('id', $_GET['param2'])->find_one();
                if (!count($pageData))
                {
                    $this->reg['view']->go404();
                }

                $this->reg["view"]->addBlock('block1', 'admin_content.tpl');
                $this->setData($pageData);
                $this->setMode("edit");
            }
            else
            {
                $this->reg->go404();
            }
        }

        public function templatelist()
        {
            if (!$this->reg['users']->is_admin())
            {
                $this->reg['view']->go404();
            }
            if ($handle = opendir('templates'))
            {
                while (false !== ($entry = readdir($handle)))
                {
                    if ($entry != "." && $entry != ".." and substr($entry, 0, 5) == 'site_')
                    {
                        $res[] = $entry;
                    }
                }
                closedir($handle);
            }

            $this->reg["view"]->addBlock('block1', 'admin_content.tpl');
            $this->setData($res);
            $this->setMode("templatelist");
        }

        public function templateedit()
        {
            if (!$this->reg['users']->is_admin())
            {
                $this->reg['view']->go404();
            }
            if ($_GET['param2'])
            {
                if ($_POST)
                {
                    $fd = fopen("templates/" . $_GET['param2'], "w");
                    fwrite($fd, $_POST["templateedittext"]);
                    fclose($fd);
                    header("Location: /admin/content/templateedit/" . ($_GET['param2']));
                }

                if (file_exists('templates/' . $_GET['param2']))
                {
                    $fileData = file_get_contents('templates/' . $_GET['param2']);
                    $m = htmlspecialchars($fileData);
                    $this->reg["view"]->addBlock('block1', 'admin_content.tpl');
                    $this->setData($m);
                    $this->setMode("templateedit");
                }
            }
        }

        public function templatelistServices()
        {
            if (!$this->reg['users']->is_admin())
            {
                $this->reg['view']->go404();
            }
            if ($handle = opendir('templates/services'))
            {
                while (false !== ($entry = readdir($handle)))
                {
                    if ($entry != "." && $entry != "..")
                    {
                        $res[] = $entry;
                    }
                }
                closedir($handle);
            }

            $this->reg["view"]->addBlock('block1', 'admin_content.tpl');
            $this->setData($res);
            $this->setMode("templatelistServices");
        }

        public function templateeditServices()
        {
            if (!$this->reg['users']->is_admin())
            {
                $this->reg['view']->go404();
            }
            if ($_GET['param2'])
            {
                if ($_POST)
                {
                    $fd = fopen("templates/services/" . $_GET['param2'], "w");
                    fwrite($fd, $_POST["templateedittext"]);
                    fclose($fd);
                    header("Location: /admin/content/templatelistServices");
                }

                if (file_exists('templates/services/' . $_GET['param2']))
                {
                    $fileData = file_get_contents('templates/services/' . $_GET['param2']);
                    $m = htmlspecialchars($fileData);
                    $this->reg["view"]->addBlock('block1', 'admin_content.tpl');
                    $this->setData($m);
                    $this->setMode("templateeditServices");
                }
            }
        }

        public function listFeedback()
        {
            $data = ORM::for_table('feedback')->order_by_desc('data')->find_array();
            if (isset($data[0]['id']))
            {
                foreach ($data as $k => $v)
                {
                    $row_game = ORM::for_table('games')->where('id', (int)$v['gid'])->find_one();
                    $data[$k]['gcap'] = $row_game->caption;
                }
            }
            $this->setData($data);
            $this->setMode("listFeedback");
            $this->reg["view"]->addBlock('block1', 'admin_content.tpl');
        }

        public function deleteFeedback()
        {
            if ($_GET['param2'])
            {
                $delete = ORM::for_table('feedback')->where('id', $_GET['param2'])->find_one();
                $delete->delete();
                header("Location: /admin/content/listFeedback");
            }
            else
            {
                die('404');
            }
        }

        public function resolveFeedback()
        {
            $update = ORM::for_table('feedback')->where('id', $_GET['param2'])->find_one();
            $update->display = 1;
            $update->save();
            header("Location: /admin/content/listNewFeedback");
        }

        public function listNewFeedback()
        {
            $data = ORM::for_table('feedback')->order_by_asc('id')->where('display', 0)->find_array();
            if (isset($data[0]['id']))
            {
                foreach ($data as $k => $v)
                {
                    $row_game = ORM::for_table('games')->where('id', (int)$v['gid'])->find_one();
                    $data[$k]['gcap'] = $row_game->caption;
                }
            }
            $this->setData($data);
            $this->setMode("listNewFeedback");
            $this->reg["view"]->addBlock('block1', 'admin_content.tpl');
        }

        public function edit_feedback()
        {
            if (isset($_GET['param2']))
            {
                $data = ORM::for_table('feedback')->where('id', (int)$_GET['param2'])->find_one();
                if ($_POST)
                {
                    $data->answer = $_POST['edit_answer'];
                    if ($_POST['edit_feedback'] != $data->text_feedback)
                    {
                        $data->text_feedback = $_POST['edit_feedback'];
                        $data->is_edited = 1;
                    }
                    $data->save();
                    header('Location: /admin/content/listFeedback');
                    die();
                }
                $this->setData($data);
                $this->setMode("edit_feedback");
                $this->reg["view"]->addBlock('block1', 'admin_content.tpl');

                return true;
            }

            return false;
        }

        public function listFaq()
        {
            $data = ORM::for_table('faq')->find_array();
            $this->setData($data);
            $this->setMode("listFaq");
            $this->reg["view"]->addBlock('block1', 'admin_faq.tpl');
        }

        public function elementFaqNew()
        {
            if ($_POST)
            {
                $create = ORM::for_table('faq')->create();
                $create->question = $_POST['new_question'];
                $create->answer = $_POST['new_answer'];
                $create->category = $_POST['new_category'];
                $create->save();
                header("Location: /admin/content/listFaq");
                die();
            }
            $this->setData($data);
            $this->setMode("elementFaqNew");
            $this->reg["view"]->addBlock('block1', 'admin_faq.tpl');
        }

        public function editFaq()
        {
            $data = ORM::for_table('faq')->where('id', $_GET['param2'])->find_one();
            if ($_POST)
            {
                $update = ORM::for_table('faq')->where('id', $_GET['param2'])->find_one();
                $update->question = $_POST['edit_question'];
                $update->answer = $_POST['edit_answer'];
                $update->category = $_POST['edit_category'];
                $update->save();
                header("Location: /admin/content/listFaq");
                die();
            }
            $this->setData($data);
            $this->setMode("editFaq");
            $this->reg["view"]->addBlock('block1', 'admin_faq.tpl');
        }

        public function deleteFaq()
        {
            if ($_GET['param2'])
            {
                $delete = ORM::for_table('faq')->where('id', $_GET['param2'])->find_one();
                $delete->delete();
                header("Location: /admin/content/listFaq");
            }
            else
            {
                die('404');
            }
        }

        public function listUsers()
        {
            $param2 = '';
            if ($_GET['param2'])
            {
                $param2 = '/' . $_GET['param2'];
            }
            if (isset($_GET['count']) and $_GET['count'])
            {
                $data = ORM::for_table('users')->order_by_desc('money')->limit($_GET['count'])->find_array();
                if ($_GET['param2'])
                {
                    $data = ORM::for_table('users')->order_by_desc('money_ref')->limit($_GET['count'])->find_array();
                }
                $this->setData($data);
                if (count($data) == $_GET['count'])
                {
                    view::assign("still", $_GET['count'] + 100);
                }
                view::assign("param2", $param2);
                $this->setMode("listUsers");
                $this->reg["view"]->addBlock('block1', 'admin_content.tpl');

                return true;
            }
            else
            {
                header('Location: /admin/' . __CLASS__ . '/' . __FUNCTION__ . $param2 . '?count=100');
                die();
            }

            return false;
        }

        public function historyRef()
        {
            if ($_GET['param2'])
            {
                $data = ORM::for_table('history_ref')->where('uid', (int)$_GET['param2'])->order_by_desc('id')->find_array();
                if (isset($data[0]['id']))
                {
                    global $psystems;
                    foreach ($data as $k => $v)
                    {
                        $row_ur = ORM::for_table('users')->where('id', $v['urid'])->find_one();
                        $data[$k]['email'] = $row_ur->email;
                        $row_order = ORM::for_table('orders')->where('id', $v['oid'])->find_one();
                        $data[$k]['cap_ord'] = $row_order->caption;
                        $data[$k]['payment'] = $psystems[$row_order->payment]['caption'];
                    }
                }
                $this->setData($data);
                $this->setMode("history");
                $this->reg["view"]->addBlock('block1', 'admin_content.tpl');
            }
        }

        public function listOrdersUser()
        {
			
            if ($_GET['param2'])
            {
                $data['orders'] = ORM::for_table('orders')->where('uid', $_GET['param2'])->find_array();
                $data['users'] = ORM::for_table('users')->where('id', $_GET['param2'])->find_one();
            }
            else
            {
                die('404');
            }
            $this->setData($data);
            $this->setMode("listOrdersUser");
            $this->reg["view"]->addBlock('block1', 'admin_content.tpl');
        }

        public function nullifyRef()
        {
            if ($_GET['param2'])
            {
                $update = ORM::for_table('users')->where('id', $_GET['param2'])->find_one();
                $update->money_ref = 0;
                $update->save();
                header("Location: /admin/content/listUsers");
                die();
            }
            else
            {
                die('404');
            }
        }

        public function usersSearch()
        {
            $search = $_POST['q'];
            if ($search)
            {
                $searchData = ORM::for_table('users')->where_like('email', '%' . $search . '%')->find_one();
            }
            $this->setData($searchData);
            $this->setMode("search");
            $this->reg["view"]->addBlock('block1', 'admin_content.tpl');
        }

        public function newphoto()
        {
            if ($_FILES["newelement_photo"])
            {
                $imagename = time() . ".jpg";
                $upfile = "data/photo/" . $imagename;
                if (!move_uploaded_file($_FILES["newelement_photo"]['tmp_name'], $upfile))
                {
                    $imagename = "";
                }
            }
            $this->setMode("newphoto");
            $this->reg["view"]->addBlock('block1', 'admin_content.tpl');
        }

        public function listphoto()
        {
            if (!$this->reg['users']->is_admin())
            {
                $this->reg['view']->go404();
            }
            if ($handle = opendir('data/photo'))
            {
                while (false !== ($entry = readdir($handle)))
                {
                    if ($entry != "." && $entry != ".." and substr($entry, 0, 1) == '0' or substr($entry, 0, 1) == '1')
                    {
                        $res[] = $entry;
                        arsort($res, SORT_NUMERIC);
                    }
                }
                closedir($handle);
            }
            if ($_GET['del'])
            {
                unlink('data/photo/' . $_GET['del']);
                header("Location: /admin/content/listphoto");
            }

            $this->reg["view"]->addBlock('block1', 'admin_content.tpl');
            $this->setData($res);
            $this->setMode("listphoto");
        }








        public function newbackhoto()
        {
            if ($_FILES["newelement_photo1"])
            {

                $imagename = time() . ".png";
                $upfile = "data/img-back/" . $imagename;
                if (!move_uploaded_file($_FILES["newelement_photo1"]['tmp_name'], $upfile))
                {
                    $imagename = "";
                }
            }
            $this->setMode("newbackhoto");
            $this->reg["view"]->addBlock('block1', 'admin_content.tpl');
        }

        public function listbackphoto()
        {
            if (!$this->reg['users']->is_admin())
            {
                $this->reg['view']->go404();
            }
            if ($handle = opendir('data/img-back'))
            {
                while (false !== ($entry = readdir($handle)))
                {
                    if ($entry != "." && $entry != "..")
                    {
                        $res[] = $entry;

                        arsort($res, SORT_NUMERIC);
                    }
                }
                closedir($handle);
            }
            if ($_GET['del'])
            {
                unlink('data/img-back/' . $_GET['del']);
                header("Location: /admin/content/listbackphoto");
            }

            $this->reg["view"]->addBlock('block1', 'admin_content.tpl');
            $this->setData($res);
            $this->setMode("listbackphoto");
        }


















        public function newservicephoto()
        {
            if ($_FILES["newelement_photo"])
            {

                $imagename = time() . ".png";
                $upfile = "data/img-service/" . $imagename;
                if (!move_uploaded_file($_FILES["newelement_photo"]['tmp_name'], $upfile))
                {
                    $imagename = "";
                }
            }
            $this->setMode("newservicephoto");
            $this->reg["view"]->addBlock('block1', 'admin_content.tpl');
        }

        public function listservicephoto()
        {
            if (!$this->reg['users']->is_admin())
            {
                $this->reg['view']->go404();
            }
            if ($handle = opendir('data/img-service'))
            {
                while (false !== ($entry = readdir($handle)))
                {
                    if ($entry != "." && $entry != "..")
                    {
                        $res[] = $entry;

                        arsort($res, SORT_NUMERIC);
                    }
                }
                closedir($handle);
            }
            if ($_GET['del'])
            {
                unlink('data/img-service/' . $_GET['del']);
                header("Location: /admin/content/listservicephoto");
            }

            $this->reg["view"]->addBlock('block1', 'admin_content.tpl');
            $this->setData($res);
            $this->setMode("listservicephoto");
        }


        public function newadvantagesphoto()
        {
            if ($_FILES["newelement_photo"])
            {

                $imagename = time() . ".png";
                $upfile = "data/img-advantages/" . $imagename;
                if (!move_uploaded_file($_FILES["newelement_photo"]['tmp_name'], $upfile))
                {
                    $imagename = "";
                }
                if ($imagename)
                {
                    $create = ORM::for_table('advantages')->create();
                    $create->caption = $_POST['caption'];
                    $create->photo = $upfile;
                    $create->save();
                }
            }
            $this->setMode("newadvantagesphoto");
            $this->reg["view"]->addBlock('block1', 'admin_content.tpl');
        }

        public function editadvantagesphoto()
        {
            if (isset ($_GET['param2']))
            {
                $data = ORM::for_table('advantages')->where('id', $_GET['param2'])->find_one();

                if ($_FILES["newelement_photo"] || $_POST)
                {

                    $data->caption = $_POST['caption'];

                    $imagename = time() . ".png";
                    $upfile = "data/img-advantages/" . $imagename;
                    if (!move_uploaded_file($_FILES["newelement_photo"]['tmp_name'], $upfile))
                    {
                        $imagename = "";
                    }

                    if ($imagename){
                        $data->photo = $upfile;
                    }
                    $data->save();
                    header("Location: /admin/content/listadvantagesphoto");
                }

                $this->setData($data);

                $this->setMode("editadvantagesphoto");
                $this->reg["view"]->addBlock('block1', 'admin_content.tpl');
            }
            else
            {
                die();
            }
        }


        public function settingList()
        {
            $settings = ORM::for_table('setting')->find_array();
            view::assign("settings", $settings);
            view::assign("settingMode", "list");
            view::assign('moduleEname', $this->ename);
            $this->reg["view"]->addBlock('block1', 'admin_setting.tpl');
        }

        public function settingItem()
        {
            if (isset ($_GET['param2']))
            {
                $setting = ORM::for_table('setting')->where('id', $_GET['param2'])->find_one();

                if ($_POST && isset($_POST['setting']))
                {
                    $setting->value = $_POST['setting'];
                    $setting->save();

                    header("Location: /admin/content/settingList");
                }




                view::assign("setting", $setting);
                view::assign("settingMode", "item");
                view::assign('moduleEname', $this->ename);
                $this->reg["view"]->addBlock('block1', 'admin_setting.tpl');
            }
            else
            {
                die(404);
            }

        }


        public function listadvantagesphoto()
        {
            if (!$this->reg['users']->is_admin())
            {
                $this->reg['view']->go404();
            }

            $data = ORM::for_table('advantages')->order_by_asc('caption')->find_array();

            if ($_GET['del'])
            {
                $delete = ORM::for_table('advantages')->where('id', $_GET['del'])->find_one();
                unlink($delete->photo);

                $delete->delete();

                header("Location: /admin/content/listadvantagesphoto");
            }

            $this->reg["view"]->addBlock('block1', 'admin_content.tpl');
            $this->setData($data);
            $this->setMode("listadvantagesphoto");
        }


        public function listtitle()
        {
            $data = ORM::for_table('headers')->find_array();
            $this->setData($data);
            $this->setMode("listTitle");
            $this->reg["view"]->addBlock('block1', 'admin_title.tpl');
        }

        public function newtitle()
        {
            if ($_POST)
            {
                $create = ORM::for_table('headers')->create();
                $create->link = $_POST['new_link'];
                $create->title = $_POST['new_title'];
                $create->description = $_POST['new_description'];
                $create->keywords = $_POST['new_keywords'];
                $create->save();
                header("Location: /admin/content/listtitle");
                die();
            }
            $this->setMode("elementTitleNew");
            $this->reg["view"]->addBlock('block1', 'admin_title.tpl');
        }

        public function edittitle()
        {
            if (isset($_GET['param2']))
            {
                $data = ORM::for_table('headers')->where('id', $_GET['param2'])->find_one();
                if ($_POST)
                {
                    $data->link = $_POST['edit_link'];
                    $data->title = $_POST['edit_title'];
                    $data->description = $_POST['edit_description'];
                    $data->keywords = $_POST['edit_keywords'];
                    $data->save();
                    header("Location: /admin/content/listtitle");
                    die();
                }
                $this->setData($data);
                $this->setMode("editTitle");
                $this->reg["view"]->addBlock('block1', 'admin_title.tpl');
            }
            else
            {
                die('404');
            }
        }

        public function deletetitle()
        {
            if ($_GET['param2'])
            {
                $delete = ORM::for_table('headers')->where('id', $_GET['param2'])->find_one();
                $delete->delete();
                header("Location: /admin/content/listtitle");
            }
            else
            {
                die('404');
            }
        }

        public function edit_name_admin()
        {
            $data = ORM::for_table('users')->where('id', 1)->find_one();
            if ($_POST)
            {
                $data->first_name = $_POST['name'];
                $data->save();
                header("Location: /admin/content/" . __FUNCTION__);
                die();
            }
            $this->setData($data);
            $this->setMode("edit_name_admin");
            $this->reg["view"]->addBlock('block1', 'admin_content.tpl');
        }

        public function withdrawal_of_money()
        {
            if (isset($_GET['param2']))
            {
                $update = ORM::for_table('withdrawal_of_money')->where('id', (int)$_GET['param2'])->find_one();
                if (isset($update->id))
                {
                    $update->executed = 1;
                    $update->save();
                }
                header('Location: /admin/content/' . __FUNCTION__);
                die();
            }
            $data = ORM::for_table('withdrawal_of_money')->where('executed', 0)->find_array();
            if (isset($data[0]['id']))
            {
                foreach ($data as $k => $v)
                {
                    $row_users = ORM::for_table('users')->where('id', $v['uid'])->find_one();
                    $data[$k]['email'] = $row_users->email;
                }
            }
            $this->setData($data);
            $this->setMode("withdrawal_of_money");
            $this->reg["view"]->addBlock('block1', 'admin_content.tpl');

            return true;
        }

        public function edit_users()
        {
            if (isset($_GET['param2']))
            {
                $data = ORM::for_table('users')->where('id', (int)$_GET['param2'])->find_one();
                if ($_POST)
                {
                    $data->percent_ref = (int)$_POST['percent_ref'];
                    $data->type_purse = $_POST['type_purse'];
                    $data->score_purse = $_POST['score_purse'];
                    $data->save();
                    header('Location: /admin/content/listUsers');
                    die();
                }
                $this->setData($data);
                $this->setMode("edit_users");
                $this->reg["view"]->addBlock('block1', 'admin_content.tpl');

                return true;
            }

            return false;
        }

        public function list_menu_lk()
        {
            if (isset($_GET['del']) and $_GET['del'])
            {
                $row_mlk = ORM::for_table('menu_lk')->where('id', (int)$_GET['del'])->find_one();
                $row_mlk->delete();
                header('Location: /admin/content/list_menu_lk');
                die();
            }
            $data = ORM::for_table('menu_lk')->order_by_desc('id')->find_array();
            $this->setData($data);
            $this->setMode("list_menu_lk");
            $this->reg["view"]->addBlock('block1', 'admin_content.tpl');

            return true;
        }






        public function new_cat()
        {
            session_start();
            $chan7 = ORM::for_table('games')->select('caption')->order_by_expr('SOUNDEX(`caption`)')->where('parent', 0)->find_array();
     
$_SESSION['gam_t'] = $chan7;

            if ($_POST)
            {
                $create = ORM::for_table('categories')->create();


                $chan = ORM::for_table('games')->select('id')->where('caption', $_POST['namegame'])->find_one();
                    
                $create->maid = $chan->id;
                $create->caption = $_POST['name_cat'];








                $create->title = $_POST['titl'];
                $create->description = $_POST['desc'];
                $create->keywords = $_POST['keyw'];





                if ($_FILES['test_img']['tmp_name'] != ""){
                    move_uploaded_file($_FILES['test_img']['tmp_name'], 'data/img/' . $_FILES['test_img']['name']);
                    $create->back = $_FILES['test_img']['name'];
                  
                    }
                if ($_FILES['test_img1']['tmp_name'] != ""){
                    move_uploaded_file($_FILES['test_img1']['tmp_name'], 'data/img/' . $_FILES['test_img1']['name']);
                    $create->front = $_FILES['test_img1']['name'];
                  
                    }

            






                $create->save();
                header('Location: /admin/content/list_cat');
                die();
            }



            $this->setMode("new_cat");
            $this->reg["view"]->addBlock('block1', 'admin_content.tpl');

            return true;
        }


        public function deleteCat()
        {
            if ($_GET['param2'])
            {
                $delete1 = ORM::for_table('categories')->where('id', $_GET['param2'])->find_one();
                $delete1->delete();
                header("Location: /admin/content/list_cat");
            }
            else
            {
                die('404');
            }
        }


        public function edit_cat()
        {

            session_start();

           
            $chan7 = ORM::for_table('games')->select('caption')->order_by_expr('SOUNDEX(`caption`)')->where('parent', 0)->find_array();
     
$_SESSION['gam_t'] = $chan7;
            if (isset($_GET['param2']))
            {



              
                $data = ORM::for_table('categories')->where('id', (int)$_GET['param2'])->find_one();
               $test1 = $data->maid;
             
               $se1 = ORM::for_table('games')->where('id', $test1)->find_one();
           
               $fin1 = $se1->caption;
 
               $_SESSION['fin'] =  $fin1;
                if ($_POST)
                {
                   

                 if($_POST['namegame'] != ""){   $chan = ORM::for_table('games')->select('id')->where('caption', $_POST['namegame'])->find_one();
                    
                    $data->maid = $chan->id;}
                  if($_POST['name_cat']){  $data->caption = $_POST['name_cat'];}

                  if($_POST['titl']){  $data->title = $_POST['titl'];}
                    if($_POST['desc']){    $data->description = $_POST['desc'];}
                        if($_POST['keyws']){  $data->keywords = $_POST['keyw'];}


                    if ($_FILES['im5']['tmp_name'][0] != ""){
                    
                        move_uploaded_file($_FILES['im5']['tmp_name'][0], 'data/img/' . $_FILES['im5']['name'][0]);
                    $data->back = $_FILES['im5']['name'][0];
                    }
                    if ($_FILES['test_img1']['tmp_name'] != ""){
                        move_uploaded_file($_FILES['test_img1']['tmp_name'], 'data/img/' . $_FILES['test_img1']['name']);
                        $data->front = $_FILES['test_img1']['name'];
                      
                        }
                    $data->save();
                    
                    header('Location: /admin/content/list_cat');
                    die();
                }

              
                $this->setData($data);
                $this->setMode("edit_cat");
                $this->reg["view"]->addBlock('block1', 'admin_content.tpl');

                return true;
            }

            return false;
        }






        public function list_cat()
        {
            session_start();
    $listb1 = ORM::for_table('categories')->select('maid')->find_array(); 

    $serialized = array_map('serialize', $listb1);
    $unique = array_unique($serialized);
    $ted1 =  array_intersect_key($listb1, $unique);




    $cou_li1 = ORM::for_table('categories')->count(); 
$sort1 = ORM::for_table('games')->where('id', $ted1['maid'])->find_array();

for($i = 0; $i < count($ted1); $i++){

$test[$i] = ORM::for_table('games')->where('id', $ted1[$i]['maid'])->select('caption')->find_array(); 

}

//$ted = array(1 => array(1, 2, 3, 3), 1, 2, 3, 4);

//$ted1 = array_unique($ted, SORT_REGULAR);

//$ted1 = array_map($ted, array_unique(array_map($ted, $ted1)));


//$test1 = array();
//foreach ($test AS $item) {
  
      //  $test1[] = $item;
      // echo $item["0"]["caption"] . "\n";
    
//}


//$test1 = array_unique($test);
//foreach ($test1 as $value) {
  //print_r($value["0"]["caption"] . ", ");
//}
//print_r($test);

if(isset($_POST['btn_s'])){


$listbt = ORM::for_table('games')->where('caption', $_POST['sor'])->find_one();
$listb = ORM::for_table('categories')->where('maid', $listbt->id)->find_array();
$this->setData($listb);
}else{
$listb = ORM::for_table('categories')->find_array();
$this->setData($listb);
        



}
$_SESSION['och'] = $test;

$_SESSION['test_s'] = $sort1;
 //$listb = ORM::for_table('categories')->find_array();




      


            $this->setData($listb);
            $this->setMode("list_cat");
            $this->reg["view"]->addBlock('block1', 'admin_content.tpl');

            return true;
        }








        public function new_menu_lk()
        {
            if ($_POST)
            {
                $create = ORM::for_table('menu_lk')->create();
                $create->caption = $_POST['new_caption'];
                $create->content = $_POST['new_content'];
                $create->save();
                header('Location: /admin/content/list_menu_lk');
                die();
            }
            $this->setMode("new_menu_lk");
            $this->reg["view"]->addBlock('block1', 'admin_content.tpl');

            return true;
        }

        public function edit_menu_lk()
        {
            if (isset($_GET['param2']))
            {
                $data = ORM::for_table('menu_lk')->where('id', (int)$_GET['param2'])->find_one();
                if ($_POST)
                {
                    $data->caption = $_POST['edit_caption'];
                    $data->content = $_POST['edit_content'];
                    $data->save();
                    header('Location: /admin/content/list_menu_lk');
                    die();
                }
                view::assign('data', $data);
                $this->setMode("edit_menu_lk");
                $this->reg["view"]->addBlock('block1', 'admin_content.tpl');

                return true;
            }

            return false;
        }
    }

?>