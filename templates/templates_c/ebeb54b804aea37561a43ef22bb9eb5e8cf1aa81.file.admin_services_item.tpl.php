<?php /* Smarty version Smarty-3.1.18, created on 2020-06-03 17:11:12
         compiled from "templates/admin_services_item.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6790286875ec793416b4be1-39751620%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ebeb54b804aea37561a43ef22bb9eb5e8cf1aa81' => 
    array (
      0 => 'templates/admin_services_item.tpl',
      1 => 1591193470,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6790286875ec793416b4be1-39751620',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5ec793418246f9_72217514',
  'variables' => 
  array (
    'servicesItemMode' => 0,
    'digisellerItems' => 0,
    'key' => 0,
    'item' => 0,
    'servicesItemData' => 0,
    'i' => 0,
    'items' => 0,
    'services' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ec793418246f9_72217514')) {function content_5ec793418246f9_72217514($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['servicesItemMode']->value=='list') {?>
    <input class="btn_update_digiseller" type="button" value="Обновить товары с digiseller.ru">

    <h1>Список товаров</h1>



        <b>Товары без категории (с digiseller.ru)</b><br>
    <?php if (isset($_smarty_tpl->tpl_vars['digisellerItems']->value[0]['id'])) {?>
                <table>
                    <tr><th>Заголовок</th><th>Действие</th></tr>
                    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['digisellerItems']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
                    <td><a href="/admin/forms/editItem/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">Редактировать</a></td>
                    </tr>
                    <?php } ?>
                </table>
            <br>
            <br>
    <?php } else { ?>
        отсутствуют<br>
        <br>
    <?php }?>


<?php echo $_smarty_tpl->tpl_vars['servicesItemData']->value[0]['id'];?>


    <?php if (isset($_smarty_tpl->tpl_vars['servicesItemData']->value[0]['id'])) {?>
        <?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['i']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['servicesItemData']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value) {
$_smarty_tpl->tpl_vars['i']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['i']->key;
?>
            <?php if (isset($_smarty_tpl->tpl_vars['i']->value['s_i'][0]['id'])) {?>
                <b><?php echo $_smarty_tpl->tpl_vars['i']->value['caption'];?>
</b><br>
                <table>
                    <tr><th>Заголовок</th><th>Действие</th></tr>
                    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['i']->value['s_i']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
</td><td><a href="/admin/forms/editItem/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">Редактировать</a> <a href="/admin/forms/deleteItem/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">Удалить</a></td>
                    </tr>
                    <?php } ?>
                </table>
                <br>
                <br>
            <?php }?>
        <?php } ?>
    <?php }?>

    
    <script>
        $('body').on('click', '.btn_update_digiseller', function(e)
        {
            e.preventDefault();
            $(this).prop('disabled','disabled');
            $(this).val('Пожалуйста ожидайте. Страница перезагрузится автоматически...');

            $.ajax({
                url: 'updateDigiseller',
                type: "POST",
                dataType: "html",
                data: 'btn_update_digiseller=1',

                success: function (response) {
                    location.reload();
                }
            });
        });
    </script>
    
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['servicesItemMode']->value=='listCategory') {?>
    <h1>Список товаров</h1>

    <?php if (isset($_smarty_tpl->tpl_vars['items']->value[0]['id'])) {?>
        <form method="post">
            <table>
                <tr>
                    <td colspan="5">
                        <select name="item_new_cat">
                            <option value="0">Выберите категорию</option>
                            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['services']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" ><?php echo $_smarty_tpl->tpl_vars['item']->value['caption'];?>
 -> <?php echo $_smarty_tpl->tpl_vars['item']->value['game_caption'];?>
</option>
                            <?php } ?>
                        </select>
                        <input type="submit" value="Переместить выбранные товары">
                    </td>
                </tr>
                <tr>
                    <th style="width: 20px"></th>
                    <th>Заголовок</th>
                    <th>Услуга</th>
                    <th>Игра</th>
                    <th>Действие</th>
                </tr>
                <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['items']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                    <?php if (!(1 & $_smarty_tpl->tpl_vars['key']->value)) {?>
                        <tr bgcolor="#f6f6f6">
                            <?php } else { ?>
                        <tr>
                    <?php }?>
                    <td><input type="checkbox" name="item_ids[]" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"> </td>
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['caption'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['service']['caption'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['game']['caption'];?>
</td>
                    <td><a href="/admin/forms/editItem/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">Редактировать</a></td>
                    </tr>
                <?php } ?>
            </table>
        </form>
        <br>
        <br>
    <?php } else { ?>
        отсутствуют<br>
        <br>
    <?php }?>



    <?php if (isset($_smarty_tpl->tpl_vars['servicesItemData']->value[0]['id'])) {?>
        <?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['i']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['servicesItemData']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value) {
$_smarty_tpl->tpl_vars['i']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['i']->key;
?>
            <?php if (isset($_smarty_tpl->tpl_vars['i']->value['s_i'][0]['id'])) {?>
                <b><?php echo $_smarty_tpl->tpl_vars['i']->value['caption'];?>
</b><br>
                <table>
                    <tr><th>Заголовок</th><th>Действие</th></tr>
                    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['i']->value['s_i']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
</td><td><a href="/admin/forms/editItem/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">Редактировать</a> <a href="/admin/forms/deleteItem/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">Удалить</a></td>
                        </tr>
                    <?php } ?>
                </table>
                <br>
                <br>
            <?php }?>
        <?php } ?>
    <?php }?>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['servicesItemMode']->value=='servicesItemNew') {?>
<form method="post" enctype="multipart/form-data">
<h2>Новый товар</h2>
  <table>
  <tr background="/img/tab2bg.jpg"><td>Заголовок : </td><td><input type="text" name="item_newelement_caption" size="70" required/></td></tr>
  <tr><td>Услуга</td>
  <td>
  <select name="item_services_type">
  <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['servicesItemData']->value['services']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
	<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" ><?php echo $_smarty_tpl->tpl_vars['item']->value['caption'];?>
 -> <?php echo $_smarty_tpl->tpl_vars['item']->value['game_caption'];?>
</option>
  <?php } ?>
  </select>
  </td></tr>
  <tr background="/img/tab2bg.jpg"><td>Цена : </td><td><input type="text" name="item_newelement_price" size="70" /></td></tr>
  <tr background="/img/tab2bg.jpg"><td>Ссылка : </td><td><input type="text" name="item_newelement_link" size="70" /></td></tr>
  <tr><td>Выводить :</td>
  <td>
  <select name="item_newelement_active">
	<option value="1" >Да</option>
	<option value="0" >Нет</option>
  </select>

  </td>
  </tr>
      <tr><td colspan="2" style="color:red;">Адрес страницы генерируется автоматически! Изменить его можно при редактировании товара!</td></tr>

      <tr>
          <td>Фильтр 1</td>
          <td><input type="text" name="filter_1" value=""></td>
      </tr>
      <tr>
          <td>Фильтр 2</td>
          <td><input type="text" name="filter_2" value=""></td>
      </tr>
      <tr>
          <td>Фильтр 3</td>
          <td><input type="text" name="filter_3" value=""></td>
      </tr>
      <tr>
          <td>Фильтр 4</td>
          <td><input type="text" name="filter_4" value=""></td>
      </tr>

      <tr>
          <td>Преимущество 1</td>
          <td>
              <select name="advantages_id_1">
                  <option value="0" selected>---</option>
                  <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['servicesItemData']->value['advantages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                      <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" ><?php echo $_smarty_tpl->tpl_vars['item']->value['caption'];?>
</option>
                  <?php } ?>
              </select>
          </td>
      </tr>
      <tr>
          <td>Преимущество 2</td>
          <td>
              <select name="advantages_id_2">
                  <option value="0" selected>---</option>
                  <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['servicesItemData']->value['advantages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                      <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" ><?php echo $_smarty_tpl->tpl_vars['item']->value['caption'];?>
</option>
                  <?php } ?>
              </select>
          </td>
      </tr>
      <tr>
          <td>Преимущество 3</td>
          <td>
              <select name="advantages_id_3">
                  <option value="0" selected>---</option>
                  <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['servicesItemData']->value['advantages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                      <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" ><?php echo $_smarty_tpl->tpl_vars['item']->value['caption'];?>
</option>
                  <?php } ?>
              </select>
          </td>
      </tr>
</table>
    <br>
    Краткое описание: <br />
    <textarea name="short_about" rows="20" cols="120" ></textarea><br />

    <br>
    Название вкладки 1:
    <input type="text" name="caption_about" value="">
    <br />
    Описание вкладки 1: <br />
    <textarea name="item_newelement_about" rows="20" cols="120" ></textarea><br />

    <br>
    Название вкладки 2:
    <input type="text" name="caption_characteristic" value="">
    <br />
    Описание вкладки 2: <br />
    <textarea name="characteristic" rows="20" cols="120" ></textarea><br />

    <br>
    Название вкладки 3:
    <input type="text" name="caption_review" value="">
    <br />
    Описание вкладки 3: <br />
    <textarea name="review" rows="20" cols="120" ></textarea><br />

    <br>
    Название вкладки 4:
    <input type="text" name="caption_activation" value="">
    <br />
    Описание вкладки 4: <br />
    <textarea name="activation" rows="20" cols="120" ></textarea><br />



    <p> Категория: </p>
    <input type="text" name="paren"><br> <br>
    <p style="color: red;"> Картинки должны лежать в /data/img </p>
    <p> Фоновая картинка: </p>
    <input type="file" name="test_im[]" /><br><br>
    <p> Передняя картинка: </p>
    <input type="file" name="test_im1[]" /><br><br>

   


Фото:<br />
<input type="file" name="item_newelement_photo" required/><br /><br />

    Слайдер: <br />
    <div class="slider_images">
        <div class="add_slider">
            <a href="#" class="add_slider_btn">Добавить изображение</a>
        </div>
    </div>
    <br />
    <br />
<input type="submit" value="Создать товар" />
    <br />
    <br />
    <br />
</form>
<?php }?>


<?php if ($_smarty_tpl->tpl_vars['servicesItemMode']->value=='servicesItemEdit') {?>
<form method="post" enctype="multipart/form-data">
<h2>Редактировать товар</h2>
  <table>
  <tr background="/img/tab2bg.jpg"><td>Заголовок : </td><td><input type="text" name="item_editelement_caption" size="70" value="<?php echo $_smarty_tpl->tpl_vars['servicesItemData']->value['item']['caption'];?>
" required/></td></tr>
  <tr><td>Услуга</td>
  <td>
  <select name="item_services_type">
  <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['servicesItemData']->value['services']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
	<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['servicesItemData']->value['item']['sid']==$_smarty_tpl->tpl_vars['item']->value['id']) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value['caption'];?>
 -> <?php echo $_smarty_tpl->tpl_vars['item']->value['game_caption'];?>
</option>
  <?php } ?>
  </select>
  </td></tr>
  <tr background="/img/tab2bg.jpg"><td>Цена : </td><td><input type="text" name="item_editelement_price" size="70" value="<?php echo $_smarty_tpl->tpl_vars['servicesItemData']->value['item']['price'];?>
"/></td></tr>
  <tr background="/img/tab2bg.jpg"><td>Ссылка : </td><td><input type="text" name="item_editelement_link" size="70" value="<?php echo $_smarty_tpl->tpl_vars['servicesItemData']->value['item']['link'];?>
"/></td></tr>
  <tr><td>Выводить :</td>
  <td>
  <select name="item_editelement_active">
	<option value="1" <?php if ($_smarty_tpl->tpl_vars['servicesItemData']->value['item']['active']==1) {?>selected<?php }?>>Да</option>
	<option value="0" <?php if ($_smarty_tpl->tpl_vars['servicesItemData']->value['item']['active']==0) {?>selected<?php }?>>Нет</option>
  </select>
  </td>
  </tr>

      <tr>
          <td>Адрес страницы:</td>
          <td><input type="text" name="seo_link" value="<?php echo $_smarty_tpl->tpl_vars['servicesItemData']->value['item']['seo_link'];?>
"></td>
      </tr>
      <tr><td colspan="2" style="color:red;">Если хотите, чтобы адрес сформировался автоматически - оставьте поле пустым! Руками поле адрес не стоит трогать, если не надо менять адрес станицы. Но если это сделать необходимо,то : слэш перед адресом обязателен! Адрес обязательно должен быть на латинице без пробелов!</td></tr>
      <tr>
          <td>Фильтр 1</td>
          <td><input type="text" name="filter_1" value="<?php echo $_smarty_tpl->tpl_vars['servicesItemData']->value['item']['filter_1'];?>
"></td>
      </tr>
      <tr>
          <td>Фильтр 2</td>
          <td><input type="text" name="filter_2" value="<?php echo $_smarty_tpl->tpl_vars['servicesItemData']->value['item']['filter_2'];?>
"></td>
      </tr>
      <tr>
          <td>Фильтр 3</td>
          <td><input type="text" name="filter_3" value="<?php echo $_smarty_tpl->tpl_vars['servicesItemData']->value['item']['filter_3'];?>
"></td>
      </tr>
      <tr>
          <td>Фильтр 4</td>
          <td><input type="text" name="filter_4" value="<?php echo $_smarty_tpl->tpl_vars['servicesItemData']->value['item']['filter_4'];?>
"></td>
      </tr>

      <tr>
          <td>Преимущество 1</td>
          <td>
              <select name="advantages_id_1">
                  <option value="0" <?php if ($_smarty_tpl->tpl_vars['servicesItemData']->value['item']['advantages_id_1']==0) {?>selected<?php }?>>---</option>
                  <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['servicesItemData']->value['advantages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                      <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['servicesItemData']->value['item']['advantages_id_1']==$_smarty_tpl->tpl_vars['item']->value['id']) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value['caption'];?>
</option>
                  <?php } ?>
              </select>
          </td>
      </tr>
      <tr>
          <td>Преимущество 2</td>
          <td>
              <select name="advantages_id_2">
                  <option value="0" <?php if ($_smarty_tpl->tpl_vars['servicesItemData']->value['item']['advantages_id_2']==0) {?>selected<?php }?>>---</option>
                  <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['servicesItemData']->value['advantages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                      <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['servicesItemData']->value['item']['advantages_id_2']==$_smarty_tpl->tpl_vars['item']->value['id']) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value['caption'];?>
</option>
                  <?php } ?>
              </select>
          </td>
      </tr>
      <tr>
          <td>Преимущество 3</td>
          <td>
              <select name="advantages_id_3">
                  <option value="0" <?php if ($_smarty_tpl->tpl_vars['servicesItemData']->value['item']['advantages_id_3']==0) {?>selected<?php }?>>---</option>
                  <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['servicesItemData']->value['advantages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                      <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['servicesItemData']->value['item']['advantages_id_3']==$_smarty_tpl->tpl_vars['item']->value['id']) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value['caption'];?>
</option>
                  <?php } ?>
              </select>
          </td>
      </tr>


</table>

    <br>
    Краткое описание:
    <br />
    <textarea name="short_about" rows="20" cols="120" ><?php echo $_smarty_tpl->tpl_vars['servicesItemData']->value['item']['short_about'];?>
</textarea><br />

    <br>
    Название вкладки 1:
    <input type="text" name="caption_about" value="<?php if ($_smarty_tpl->tpl_vars['servicesItemData']->value['item']['caption_about']) {?><?php echo $_smarty_tpl->tpl_vars['servicesItemData']->value['item']['caption_about'];?>
<?php } else { ?>Описание<?php }?>">
    <br />
    Описание вкладки 1: <br />
    <textarea name="item_editelement_about" rows="20" cols="120" ><?php echo $_smarty_tpl->tpl_vars['servicesItemData']->value['item']['about'];?>
</textarea><br />


    <br>
    Название вкладки 2:
    <input type="text" name="caption_characteristic" value="<?php echo $_smarty_tpl->tpl_vars['servicesItemData']->value['item']['caption_characteristic'];?>
">
    <br />
    Описание вкладки 2: <br />
    <textarea name="characteristic" rows="20" cols="120" ><?php echo $_smarty_tpl->tpl_vars['servicesItemData']->value['item']['characteristic'];?>
</textarea><br />

    <br>
    Название вкладки 3:
    <input type="text" name="caption_review" value="<?php echo $_smarty_tpl->tpl_vars['servicesItemData']->value['item']['caption_review'];?>
">
    <br />
    Описание вкладки 3: <br />
    <textarea name="review" rows="20" cols="120" ><?php echo $_smarty_tpl->tpl_vars['servicesItemData']->value['item']['review'];?>
</textarea><br />

    <br>
    Название вкладки 4:
    <input type="text" name="caption_activation" value="<?php echo $_smarty_tpl->tpl_vars['servicesItemData']->value['item']['caption_activation'];?>
">
    <br />
    Описание вкладки 4: <br />
    <textarea name="activation" rows="20" cols="120" ><?php echo $_smarty_tpl->tpl_vars['servicesItemData']->value['item']['activation'];?>
</textarea><br />

Фото:<br />
<?php if ($_smarty_tpl->tpl_vars['servicesItemData']->value['item']['photo']) {?>
<img src="/data/photo/<?php echo $_smarty_tpl->tpl_vars['servicesItemData']->value['item']['photo'];?>
" style="width:160px" /><br />
<?php }?>
<input type="file" name="item_editelement_photo" <?php if (!$_smarty_tpl->tpl_vars['servicesItemData']->value['item']['photo']) {?>required<?php }?>/><br /><br />


    Слайдер: <br />
    <div class="slider_images">

        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['servicesItemData']->value['sliders']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
            <div>
                <input type="hidden" name="slider_images_old[<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
]" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['photo'];?>
">
                <img src="/data/img-sliders/<?php echo $_smarty_tpl->tpl_vars['item']->value['photo'];?>
" style="width: 160px" > <input type="text" name="sort_order_old[<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
]" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['sort_order'];?>
" size="3" maxlength="3" required> <a href="#" class="delete_slider_btn">Удалить</a>
            </div>
        <?php } ?>




        <div class="add_slider">
            <a href="#" class="add_slider_btn">Добавить изображение</a>
        </div>
    </div>
    <br />
    <br />
    <p> Категория: </p>
    <input type="text" name="paren1" value="<?php echo $_SESSION['par'];?>
"><br> <br>
    <p style="color: red;"> Картинки должны лежать в /data/img </p>
<p> Фоновая картинка: </p>
<input type="file" name="testimg2[]" multiple><br><br>
<p> Передняя картинка: </p>
<input type="file" name="testimg3[]" multiple><br><br>

<input type="submit" value="Редактировать товар" /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href ="/admin/forms/deleteItem/<?php echo $_smarty_tpl->tpl_vars['servicesItemData']->value['item']['id'];?>
">Удалить товар</a>
    <br />
    <br />
    <br />
</form>
<?php }?>

    <style>
        .slider_images div{
            margin-top: 10px;
        }
        .slider_images div img {
            vertical-align: middle;
        }
    </style>
    <script>
        $(function(){
            $('.add_slider_btn').click(function(e){
                e.preventDefault();
                $('.add_slider').before('<div><input type="file" name="slider_images[]" required> <input type="text" name="sort_order[]" value="0" size="3" maxlength="3" required> <a href="#" class="delete_slider_btn">Удалить</a></div>');
            });

            $('.slider_images').on('click', '.delete_slider_btn', function(e) {
                e.preventDefault();
                $(this).parent().remove();
            });
        });
    </script>
<?php }} ?>
