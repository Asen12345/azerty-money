<?php /* Smarty version Smarty-3.1.18, created on 2020-05-16 10:24:05
         compiled from "templates/services/steam.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12898368625ebf859e08e9e8-92257323%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1559161330b7ef30435b0aecabb09002cf08bd4b' => 
    array (
      0 => 'templates/services/steam.tpl',
      1 => 1589613858,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12898368625ebf859e08e9e8-92257323',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5ebf859e0ce1f4_55902657',
  'variables' => 
  array (
    'servers' => 0,
    'item' => 0,
    'psystems' => 0,
    'key' => 0,
    'min_price' => 0,
    'user' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ebf859e0ce1f4_55902657')) {function content_5ebf859e0ce1f4_55902657($_smarty_tpl) {?><h2>Оформить заказ</h2>
                        <p class="leave_a_comment-p calculator">Выберите сервер</p>
                        <select name="server" class="gold_game_selection" required>
							<option selected value="">---------------------------------------</option>
                        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['servers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
							<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['caption'];?>
</option>
						<?php } ?>
                        </select>
						<div class="clr"><span> </span></div>
						<script>
							function unit_of_currency() { return 1; } //единица валюты
						</script>
						<p class="leave_a_comment-cena"></p>
						<p class="leave_a_comment-b" name="sum_game" style="display:none;">Цена за 1 рубль: <span></span></p></br><div class="clr"><span> </span></div>
                        <select class="gold_game_selection" name="payment">
						<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['psystems']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
							<option cc="<?php echo $_smarty_tpl->tpl_vars['item']->value['cc'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['caption'];?>
</option>
						<?php } ?>
                        </select>
                        <p class="leave_a_comment-p calculator">Выберите способ оплаты</p>
						<div class="clr"><span> </span></div>
                        <p class="p-buy">Я покупаю <input class="input-buy_paying" name="calc1" required></p>
                        <p class="p-paying">Я оплачу
							<span class="input-rouble">
								<input class="input-buy_paying" name="calc2">
								<span class="bg-valut"><img src="/data/img/rouble.png"></span>
							</span>
						</p>
						<p class="leave_a_comment-cena"></p>
						<p class="leave_a_comment-b" style="color:#ffd940;margin-left:0;" id="message_minimum">Минимальная сумма заказа <?php if ($_smarty_tpl->tpl_vars['min_price']->value) {?><?php echo $_smarty_tpl->tpl_vars['min_price']->value;?>
<?php } else { ?>50<?php }?> <del> P</del></p></br> <div class="clr"><span> </span></div> 
 <script>
							$(document).ready(function(){
								$('input[id=radio1]').change(function(){
									$('span[name=text1]').text('');
									$('span[name=text2]').text('');
								});$('input[id=radio2]').change(function(){
									$('span[name=text1]').text('');
									$('span[name=text2]').text('');	
								});	 	 
								$('input[id=radio3]').change(function(){
									$('span[name=text2]').text('Свяжитесь с оператором ');
									$('span[name=text1]').text('');
								});		 
							});
						</script>
                        <p class="leave_a_comment-p calculator">Способ доставки</p>
                        <p class="p-delivery_method">
                            <label class="radio-delivery_method">
                                <input name="Способ доставки" type="radio" id="radio1" checked value="На усмотрение оператора"><span></span>
                            </label>
                            <label for="radio1">На усмотрение оператора</label><br>        
                            <label class="radio-delivery_method">
                                <input name="Способ доставки" type="radio" id="radio3" value="Через оператора"><span></span>
                            </label>
                            <label for="radio3">Через оператора</label><br>
							<span class="p-delivery_method-span" name="text2"></span>
                        </p>
						<div class="clr"><span> </span></div>
<h2>Контактная информация</h2>
                        <input class="gold_input_name" <?php if (isset($_smarty_tpl->tpl_vars['user']->value['email'])) {?>value="<?php echo $_smarty_tpl->tpl_vars['user']->value['email'];?>
"<?php }?> name="email" required>
                        <p class="leave_a_comment-p calculator">Ваша эл. почта</p>
<input class="gold_input_name" name="Укажите ICQ или Skype:">
	<p class="leave_a_comment-p calculator">Укажите ICQ или Skype:</p>
						<div class="clr"><span> </span></div>
<h2>Прочие данные</h2>						
                        <p class="input_information-p">Оставьте комментарий о предпочитаемом времени доставки</p>
                        <textarea class="input_information" name="Оставьте комментарий о предпочитаемом времени доставки" cols="40" rows="3"></textarea>
<div class="g-recaptcha" data-sitekey="6Le6DvgUAAAAAE_kVDDYqXOsBNDw4SYMuvY8k4QW"></div>




 <script src='https://www.google.com/recaptcha/api.js'></script><?php }} ?>
