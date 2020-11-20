<?php /* Smarty version Smarty-3.1.18, created on 2020-06-03 19:14:31
         compiled from "templates/admin_services.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6233816095ec799de3ad7a2-36480062%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3666b18bf861b07eda38bd5d486b489abb5b66a0' => 
    array (
      0 => 'templates/admin_services.tpl',
      1 => 1591200867,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6233816095ec799de3ad7a2-36480062',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5ec799de4cf217_64312360',
  'variables' => 
  array (
    'servicesMode' => 0,
    'servicesData' => 0,
    'i' => 0,
    'key' => 0,
    'item' => 0,
    'servicesDataPhotos' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ec799de4cf217_64312360')) {function content_5ec799de4cf217_64312360($_smarty_tpl) {?>
    <style>
        .services_photo_list input[type="radio"]{display: none;}

        .services_photo_list  label img{border: white solid 1px; margin: 5px; padding: 5px; height: 90px}

        .services_photo_list input[type="radio"]:checked+label img{
            border: black solid 1px;
        }
    </style>


<?php if ($_smarty_tpl->tpl_vars['servicesMode']->value=='list') {?>
<h1>Список услуг</h1>
<?php if (isset($_smarty_tpl->tpl_vars['servicesData']->value[0]['id'])) {?>
<?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['i']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['servicesData']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value) {
$_smarty_tpl->tpl_vars['i']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['i']->key;
?>
<?php if (isset($_smarty_tpl->tpl_vars['i']->value['services'][0]['id'])) {?>
<b><?php echo $_smarty_tpl->tpl_vars['i']->value['caption'];?>
</b><br>

    <form method="post">
    <table>
	<tr><th>Заголовок</th><th>Сортировка</th><th>Действие</th></tr>
        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['i']->value['services']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
            <?php if (!(1 & $_smarty_tpl->tpl_vars['key']->value)) {?>
            <tr bgcolor="#f6f6f6">
            <?php } else { ?>
            <tr>
            <?php }?>
            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['caption'];?>
</td>
            <td><input type="text" name="sort_services[<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
]" style="width:70px" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['sort'];?>
"></td>
            <td><a href="/admin/forms/editServices/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">Редактировать</a>
                <a href="/admin/forms/deleteServices/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">Удалить</a></td>
            </tr>
        <?php } ?>
    </table>
    <br>
    <button type="submit">Сохранить сортировку</button>
    </form>
    <br>
    <br>
<br><br>
<?php }?>
<?php } ?>
<?php }?>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['servicesMode']->value=='servicesNew') {?>
<form method="post" enctype="multipart/form-data">
<h1>Добавление услуги</h1>
  <table>
  <tr background="/img/tab2bg.jpg"><td>Заголовок : </td>
  <td><input type="text" name="services_name" size="70" /></td></tr>
  <tr background="/img/tab2bg.jpg"><td>Тайтл : </td>
  <td><input type="text" name="services_title" size="70" /></td></tr>
  <tr background="/img/tab2bg.jpg"><td>description : </td>
  <td><input type="text" name="services_description" size="70" /></td></tr>
  <tr background="/img/tab2bg.jpg"><td>keywords : </td>
  <td><input type="text" name="services_keywords" size="70" /></td></tr>
  <tr background="/img/tab2bg.jpg"><td>Минимальная цена : </td>
  <td><input type="text" name="services_min_price" size="70" /></td></tr>
  <tr><td>Тип</td>
  <td>
  <select name="services_type">
	<option value="0" >Валюта</option>
	<option value="1" >Товар</option>
	<option value="2" >Услуга</option>
	<option value="3" >Текст</option>
	
  </select>
  </td>
  <tr background="/img/tab2bg.jpg"><td>Шаблон : </td>
  <td><input type="text" name="services_templates" size="70" /></td></tr>
  <tr><td colspan="2" style="color:red;">При добавлении услуги с типом:"Валюта", шаблон с формой создается заранее и копируется в директорию сайта "/templates/services/". В поле "Шаблон" записывается имя скопированного шаблона, без указания пути. <br>
service1.tpl-золото WOW ru<br>
service2.tpl-золото ArcheAge<br>
service3.tpl-золото WoW Free<br>
service4.tpl-кинары Aion<br>
service5.tpl-кинары Aion Free<br>
service6.tpl-золото Diablo 3<br>
service7.tpl-адену Lineage 2<br>
service8.tpl-адену Lineage 2 Free<br>
service9.tpl-платину Rift<br>
service10.tpl-ISK EVE Online<br>
service11.tpl-treasure key Dota 2<br>
service12.tpl-саронит WoW Free<br>
  </td></tr>
  <tr><td>Игра</td>
  <td>
  <select name="services_gid">
  <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['servicesData']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
	<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" ><?php echo $_smarty_tpl->tpl_vars['item']->value['caption'];?>
</option>
  <?php } ?>
  </select>
  </td></tr>
  <tr><td colspan="2" style="color:red;">Адрес страницы генерируется автоматически! Изменить его можно при редактировании услуги!</td></tr>
</table>
Описание:<br />
<textarea name="services_atext" cols=110 rows=15></textarea><br />
Мини гайд (Как сделать заказ):<br />
<textarea name="services_order_info" cols=110 rows=15></textarea><br />

    <div class="services_photo_list">
        Иконка услуги: <br>
        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['servicesDataPhotos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>

            <input type="radio" name="services_photo" value="<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
" id="services_photo<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
">
            <label for="services_photo<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" class="services_photo"><img src="<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
"></label>
        <?php } ?>
    </div>


    <div class="services_filters">
        <br>Фильтры (актуально, только если тип услуги - "Товар"): <br>
        <table>
            <tr>
                <td>Название фильтра 1:</td>
                <td><input type="text" name="services_filter_1" size="70" value=""></td>
            </tr>
            <tr>
                <td>Название фильтра 2: </td>
                <td><input type="text" name="services_filter_2" size="70" value=""></td>
            </tr>
            <tr>
                <td>Название фильтра 3: </td>
                <td><input type="text" name="services_filter_3" size="70" value=""></td>
            </tr>
            <tr>
                <td>Название фильтра 4: </td>
                <td><input type="text" name="services_filter_4" size="70" value=""></td>
            </tr>
            <tr>
                <td>Подсказка для окна поиска: </td>
                <td><input type="text" name="services_search_desc" size="70" value=""></td>
            </tr>
        </table>
    </div>


    <p> Единица товара: </p>
    <input type="text" name="prod_on"><br> <br>

    <p> Категория: </p>
    <input type="text" name="paren"><br> <br>
    <p style="color: red;"> Картинки должны лежать в /data/img </p>
    <p> Фоновая картинка: </p>
    <input type="file" name="test_im[]" /><br><br>
    <p> Передняя картинка: </p>
    <input type="file" name="test_im1[]" /><br><br>

<button type="submit">Добавить</button>
</form>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['servicesMode']->value=='servicesEdit') {?>
<form method="post" enctype="multipart/form-data">
<h1>Редактирование услуги</h1>

  <table>
  <tr background="/img/tab2bg.jpg"><td>Заголовок : </td>
  <td><input type="text" name="services_name" size="70" value="<?php echo $_smarty_tpl->tpl_vars['servicesData']->value['caption'];?>
" /></td></tr>
  <tr background="/img/tab2bg.jpg"><td>Тайтл : </td>
  <td><input type="text" name="services_title" size="70" value="<?php echo $_smarty_tpl->tpl_vars['servicesData']->value['title'];?>
" /></td></tr>
  <tr background="/img/tab2bg.jpg"><td>description : </td>
  <td><input type="text" name="services_description" size="70" value="<?php echo $_smarty_tpl->tpl_vars['servicesData']->value['description'];?>
" /></td></tr>
  <tr background="/img/tab2bg.jpg"><td>keywords : </td>
  <td><input type="text" name="services_keywords" size="70" value="<?php echo $_smarty_tpl->tpl_vars['servicesData']->value['keywords'];?>
" /></td></tr>
  <tr background="/img/tab2bg.jpg"><td>Минимальная цена : </td>
  <td><input type="text" name="services_min_price" size="70" value="<?php echo $_smarty_tpl->tpl_vars['servicesData']->value['min_price'];?>
" /></td></tr>
  <tr><td>Тип</td>
  <td>
  <select name="services_type">
	<option value="0" <?php if ($_smarty_tpl->tpl_vars['servicesData']->value['type']==0) {?>selected<?php }?>>Валюта</option>
	<option value="1" <?php if ($_smarty_tpl->tpl_vars['servicesData']->value['type']==1) {?>selected<?php }?>>Товар</option>
	<option value="2" <?php if ($_smarty_tpl->tpl_vars['servicesData']->value['type']==2) {?>selected<?php }?>>Услуга</option>
	<option value="3" <?php if ($_smarty_tpl->tpl_vars['servicesData']->value['type']==3) {?>selected<?php }?>>Текст</option>
  </select>
  </td>
  <tr background="/img/tab2bg.jpg"><td>Шаблон : </td>
  <td><input type="text" name="services_templates" size="70" <?php if (isset($_smarty_tpl->tpl_vars['servicesData']->value['template'])) {?>value="<?php echo $_smarty_tpl->tpl_vars['servicesData']->value['template'];?>
"<?php }?> /></td></tr>
  <tr><td>Игра</td>
  <td>
  <select name="services_gid" >
  <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['servicesData']->value['games']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
	<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['servicesData']->value['gid']==$_smarty_tpl->tpl_vars['item']->value['id']) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value['caption'];?>
</option>
  <?php } ?>
  </select>
  </td></tr>
  <?php if ($_smarty_tpl->tpl_vars['servicesData']->value['id']>45) {?>
  <tr background="/img/tab2bg.jpg"><td>Адрес страницы : </td>
  <td><input type="text" name="services_url" size="70" <?php if (isset($_smarty_tpl->tpl_vars['servicesData']->value['link'])) {?>value="<?php echo $_smarty_tpl->tpl_vars['servicesData']->value['link'];?>
"<?php }?> /></td></tr>
  <tr><td colspan="2" style="color:red;">Поле адрес не стоит трогать,если не надо менять адрес станицы. Но если это сделать необходимо,то : слэш перед адресом обязателен! Адрес обязательно должен быть на латинице без пробелов!</td></tr>
  <?php }?>
</table>
Описание:<br />
<textarea name="services_atext" cols=110 rows=15><?php if (isset($_smarty_tpl->tpl_vars['servicesData']->value['about'])) {?><?php echo $_smarty_tpl->tpl_vars['servicesData']->value['about'];?>
<?php }?></textarea><br />
Мини гайд (Как сделать заказ):<br />
<textarea name="services_order_info" cols=110 rows=15><?php if (isset($_smarty_tpl->tpl_vars['servicesData']->value['order_info'])) {?><?php echo $_smarty_tpl->tpl_vars['servicesData']->value['order_info'];?>
<?php }?></textarea><br />

    <div class="services_photo_list">
        Иконка услуги: <br>
        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['servicesDataPhotos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
            <input type="radio" name="services_photo" value="<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
" id="services_photo<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['item']->value==$_smarty_tpl->tpl_vars['servicesData']->value['photo']) {?>checked="checked" <?php }?>>
            <label for="services_photo<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" class="services_photo"><img src="<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
"></label>
        <?php } ?>
    </div>


    <div class="services_filters">
        <br>Фильтры (актуально, только если тип услуги - "Товар"): <br>
        <table>
            <tr>
                <td>Название фильтра 1:</td>
                <td><input type="text" name="services_filter_1" size="70" value="<?php echo $_smarty_tpl->tpl_vars['servicesData']->value['filter_1'];?>
"></td>
            </tr
            <tr>
                <td>Название фильтра 2: </td>
                <td><input type="text" name="services_filter_2" size="70" value="<?php echo $_smarty_tpl->tpl_vars['servicesData']->value['filter_2'];?>
"></td>
            </tr>
            <tr>
                <td>Название фильтра 3: </td>
                <td><input type="text" name="services_filter_3" size="70" value="<?php echo $_smarty_tpl->tpl_vars['servicesData']->value['filter_3'];?>
"></td>
            </tr>
            <tr>
                <td>Название фильтра 4: </td>
                <td><input type="text" name="services_filter_4" size="70" value="<?php echo $_smarty_tpl->tpl_vars['servicesData']->value['filter_4'];?>
"></td>
            </tr>
            <tr>
                <td>Подсказка для окна поиска: </td>
                <td><input type="text" name="services_search_desc" size="70" value="<?php echo $_smarty_tpl->tpl_vars['servicesData']->value['search_desc'];?>
"></td>
            </tr>
        </table>
    </div>


    <p> Единица товара: </p>
    <input type="text" name="prod_on"><br> <br>


    <p> Категория: </p>
   
    <select  name="paren">
        <option>
          
        </option>
        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_SESSION['par']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>


<option>
    <?php echo $_smarty_tpl->tpl_vars['item']->value['caption'];?>

</option>

        <?php } ?>
    </select>
   
    <p style="color: red;"> Картинки должны лежать в /data/img </p>
<p> Фоновая картинка: </p>
<input type="file" name="testimg[]" multiple><br><br>
<p> Передняя картинка: </p>
<input type="file" name="testimg1[]" multiple><br><br>
  
    
<button type="submit">Редактировать</button>
</form>
<?php }?><?php }} ?>
