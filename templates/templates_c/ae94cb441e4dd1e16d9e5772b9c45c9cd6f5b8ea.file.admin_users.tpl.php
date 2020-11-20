<?php /* Smarty version Smarty-3.1.18, created on 2020-05-15 13:56:11
         compiled from "templates/admin_users.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19460115455ebe6fe6a617a2-38043422%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ae94cb441e4dd1e16d9e5772b9c45c9cd6f5b8ea' => 
    array (
      0 => 'templates/admin_users.tpl',
      1 => 1589539959,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19460115455ebe6fe6a617a2-38043422',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5ebe6fe6afaf86_77352491',
  'variables' => 
  array (
    'loginform' => 0,
    'message' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ebe6fe6afaf86_77352491')) {function content_5ebe6fe6afaf86_77352491($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['loginform']->value)) {?>
<?php if (isset($_smarty_tpl->tpl_vars['message']->value)) {?><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
<?php }?>

<style>
    form{}   
    .form-in{width:300px;margin:0 auto;padding:20px 0;text-align:center;border:1px solid black;} 
</style>

<form method="post" action=""><br /><br /><br /><br /><br />
<div class="form-in">
		<label>Логин:</label>
			<input type="text" name="loginname" /><br /><br />
		<label>Пароль:</label>
			<input type="password" name="loginpassword"  /><br /><br />
			<input type="submit" value="Войти" name="submit" class="submit" />
</div>
</form>	
<?php }?>
<?php }} ?>
