<?php /* Smarty version Smarty-3.1.18, created on 2020-06-02 12:04:48
         compiled from "templates/site_news.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10848982065ed40d74506568-47362441%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '26ae4c9c28e97442d4a7c9c6cefc6d8c0c2b3e77' => 
    array (
      0 => 'templates/site_news.tpl',
      1 => 1591088686,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10848982065ed40d74506568-47362441',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5ed40d745e4e94_85633931',
  'variables' => 
  array (
    'newsMode' => 0,
    'newsData' => 0,
    'news' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ed40d745e4e94_85633931')) {function content_5ed40d745e4e94_85633931($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'smarty/plugins/modifier.date_format.php';
?><!-- MAKE SWITCH CONSTRUCT -->
<?php if (isset($_smarty_tpl->tpl_vars['newsMode']->value)) {?>
<?php if ($_smarty_tpl->tpl_vars['newsMode']->value=='one') {?>
	<?php if (isset($_smarty_tpl->tpl_vars['newsData']->value)) {?>
	<div class="container" style="margin-bottom: 100px; display: flex; justify-content: center;">
    <article class="content-info">
        <div class="content-info-div">
			<time class="content-info-div-time"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['newsData']->value['data'],"%d-%m-%Y");?>
</time>
			<h6><?php echo $_smarty_tpl->tpl_vars['newsData']->value['caption'];?>
</h6>
			<?php if ($_smarty_tpl->tpl_vars['newsData']->value['photo']) {?>
				<img class="new-img" src="/data/img/news/<?php echo $_smarty_tpl->tpl_vars['newsData']->value['photo'];?>
">
			<?php }?>
			<p class="content-info-div-p"><?php echo $_smarty_tpl->tpl_vars['newsData']->value['ntext'];?>
</p>
			<span class="news-span">
                <a <?php if (count($_smarty_tpl->tpl_vars['news']->value)<6) {?> href="/news/all"<?php } else { ?> href="/news/all/page/1"<?php }?> class="news-a">Вернуться в раздел «Все новости»</a>
            </span>
		</div>
	</article>
</div>
	<?php }?>

<?php }?>

<?php if ($_smarty_tpl->tpl_vars['newsMode']->value=='all') {?> 
<?php if (isset($_smarty_tpl->tpl_vars['newsData']->value[0]['id'])) {?>
<style>
	.container-news{
		text-align: center;
		margin-top: 50px;
	}
</style>
<div class="container" style="margin-bottom: 100px; display: flex; justify-content: center;">
    <article class="content-info">
        <h2>Все новости</h2>
            <div class="content-info-div">
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['newsData']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
<?php if ($_smarty_tpl->tpl_vars['item']->value['id']>0) {?>
            <div class="container-news">
			<?php if ($_smarty_tpl->tpl_vars['item']->value['photo']) {?>
				<a href="/news/view/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><img class="all_news-img" src="/data/img/news/<?php echo $_smarty_tpl->tpl_vars['item']->value['photo'];?>
"></a>
			<?php } else { ?>
				<a href="/news/view/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><img class="all_news-img" src="/data/img/azerty_money-foto.png"></a>
			<?php }?>
				<div class="container-news-div">
					<time class="content-info-div-time"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['data'],"%d-%m-%Y");?>
</time>
					<a class="all_news-a" name="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" href="/news/view/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['caption'];?>
</a>
					<p class="content-info-div-p" name="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['item']->value['preview']);?>
</p>
				</div>
            </div>
            <span class="line"> </span>
<?php }?>
<?php } ?>
	
			</div>
	</article>
	</div>
<?php } else { ?>
<h2>Новостей нет.</h2>
<?php }?>
<?php }?>

<?php }?><?php }} ?>
