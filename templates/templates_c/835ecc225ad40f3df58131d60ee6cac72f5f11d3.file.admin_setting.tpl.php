<?php /* Smarty version Smarty-3.1.18, created on 2020-05-15 17:31:42
         compiled from "templates/admin_setting.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10761017455ebea7cea566f3-75479985%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '835ecc225ad40f3df58131d60ee6cac72f5f11d3' => 
    array (
      0 => 'templates/admin_setting.tpl',
      1 => 1589539959,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10761017455ebea7cea566f3-75479985',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'settingMode' => 0,
    'settings' => 0,
    'i' => 0,
    'setting' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5ebea7cea730c2_99222954',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ebea7cea730c2_99222954')) {function content_5ebea7cea730c2_99222954($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['settingMode']->value=='list') {?>
<h1>Список настроек</h1>
    <?php if (isset($_smarty_tpl->tpl_vars['settings']->value[0]['id'])) {?>
        <?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['i']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['settings']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value) {
$_smarty_tpl->tpl_vars['i']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['i']->key;
?>
            <b><?php echo $_smarty_tpl->tpl_vars['i']->value['title'];?>
</b> <a href="/admin/content/settingItem/<?php echo $_smarty_tpl->tpl_vars['i']->value['id'];?>
">Редактировать</a><br><br>
        <?php } ?>
    <?php }?>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['settingMode']->value=='item') {?>
<form method="post" enctype="multipart/form-data">
<h1>Редактирование настройки: <?php echo $_smarty_tpl->tpl_vars['setting']->value['title'];?>
</h1>
    <p><?php echo $_smarty_tpl->tpl_vars['setting']->value['description'];?>
</p>

    <textarea name="setting"><?php echo $_smarty_tpl->tpl_vars['setting']->value['value'];?>
</textarea>

    <br>

<button type="submit">Редактировать</button>
</form>
<?php }?><?php }} ?>
