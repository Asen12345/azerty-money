<?php /* Smarty version Smarty-3.1.18, created on 2020-05-15 13:53:13
         compiled from "templates/site_mainmenu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17169381285ebe74996c55d1-25847274%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '768b068a29dad237612ffbfe805b80ffc4d4310d' => 
    array (
      0 => 'templates/site_mainmenu.tpl',
      1 => 1589539959,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17169381285ebe74996c55d1-25847274',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'map' => 0,
    'item' => 0,
    'fullPath' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5ebe74996d8771_71300952',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ebe74996d8771_71300952')) {function content_5ebe74996d8771_71300952($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include 'smarty/plugins/modifier.replace.php';
?>
<div class="sort">
	<div class="sort-wrap">
		<small>Сортировать:</small>
		<!--сотировка от а до я у блока sort-a-z дополнительный класс sort-a,
		сотировка от я до а у блока sort-a-z дополнительный класс sort-z-->
		<a class="sort-a-z" onclick="sorting('a_z', $(this));"><span>А-я</span></a>
		<a class="rating rating-active sort-z" onclick="sorting('rait', $(this));"><span>рейтинг</span></a>
	</div>
</div>
<ul class="sidebar-ul">
	<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['map']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
	<div sort="<?php echo $_smarty_tpl->tpl_vars['item']->value['sort'];?>
" class="sidebar-li">
        <a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['link'];?>
">
            <div <?php ob_start();?><?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['item']->value['link'],'/','');?>
<?php $_tmp1=ob_get_clean();?><?php if ($_smarty_tpl->tpl_vars['fullPath']->value==$_tmp1) {?> class="dedicated sidebar-li" <?php } else { ?> class="sidebar-li" <?php }?>class="sidebar-li">
                <?php echo $_smarty_tpl->tpl_vars['item']->value['caption'];?>

            </div>
        </a>
	</div>
    <?php } ?>
</ul><?php }} ?>
