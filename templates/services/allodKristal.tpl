<h2>Оформить заказ</h2>
                        <p class="leave_a_comment-p calculator">Выберите сервер</p>
                        <select name="server" class="gold_game_selection" required>
							<option selected value="">---------------------------------------</option>
                        {foreach key=key item=item from=$servers}
							<option value="{$item.id}">{$item.caption}</option>
						{/foreach}
                        </select>
							<div class="clr"><span> </span></div>
						<script>
							function unit_of_currency() { return 1; } //единица валюты
						</script>
						<p class="leave_a_comment-cena"></p>
						<p class="leave_a_comment-b" name="sum_game" style="display:none;">Цена за 1 кристалл: <span></span></p></br>
						<div class="clr"><span> </span></div>
                        <input class="gold_input_name" name="Укажите имя персонажа" required>
                        <p class="leave_a_comment-p calculator">Укажите имя персонажа</p>
						<div class="clr"><span> </span></div>
                        <select class="gold_game_selection" name="payment">
							{foreach key=key item=item from=$psystems}
								<option cc="{$item.cc}" value="{$key}">{$item.caption}</option>
							{/foreach}
                        </select>
                        <p class="leave_a_comment-p calculator">Выберите способ оплаты</p>
						<div class="clr"><span> </span></div>
                        <p class="p-buy">Я покупаю</p>
                        <input class="input-buy_paying" name="calc1" required>
                        <p class="p-paying">Я оплачу
							<span class="input-rouble">
								<input class="input-buy_paying" name="calc2">
								<span class="bg-valut"><img src="/data/img/rouble.png"></span>
							</span>
						</p>
						<div class="clr"><span> </span></div>
						<p class="leave_a_comment-cena"></p>
						<p class="leave_a_comment-b" style="color:#ffd940;margin-left:0;" id="message_minimum">Минимальная сумма заказа {if $min_price}{$min_price}{else}50{/if} <del> P</del></p></br>
<script>
							$(document).ready(function(){
								$('input[id=radio1]').change(function(){
									$('span[name=text1]').text('');
									$('span[name=text2]').text('');
								});$('input[id=radio2]').change(function(){
									$('span[name=text1]').text('Встреча в игре)');
									$('span[name=text2]').text('');	
								});	 	 
								$('input[id=radio3]').change(function(){
									$('span[name=text2]').text('Кристалы будут доставлены на игровую почту');
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
                                <input name="Способ доставки" type="radio" id="radio2" value="Встреча в игре"><span></span>
                            </label>
                            <label for="radio2">Встреча в игре</label><br>
							<span class="p-delivery_method-span" name="text1"></span>
                            <label class="radio-delivery_method">
                                <input name="Способ доставки" type="radio" id="radio3" value="Почтой"><span></span>
                            </label>
                            <label for="radio3">Почтой</label><br>
							<span class="p-delivery_method-span" name="text2"></span>
                        </p>
						<div class="clr"><span> </span></div>
<h2>Контактная информация</h2>
                        <input class="gold_input_name" {if isset($user.email)}value="{$user.email}"{/if} name="email" required>
                        <p class="leave_a_comment-p">Ваша эл. почта</p>
<input class="gold_input_name" name="Укажите ICQ или Skype:">
	<p class="leave_a_comment-p calculator">Укажите ICQ или Skype:</p>						
<h2>Прочие данные</h2>
                        <p class="input_information-p">Оставьте комментарий о предпочитаемом времени доставки</p>
                        <textarea class="input_information" name="Оставьте комментарий о предпочитаемом времени доставки" cols="40" rows="3"></textarea>
<div class="g-recaptcha" data-sitekey="6Le6DvgUAAAAAE_kVDDYqXOsBNDw4SYMuvY8k4QW"></div>




 <script src='https://www.google.com/recaptcha/api.js'></script>