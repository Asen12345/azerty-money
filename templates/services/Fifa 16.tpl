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
							function unit_of_currency() { return 1000; } //единица валюты
						</script>
						<p class="leave_a_comment-cena"></p>
						<p class="leave_a_comment-b" name="sum_game" style="display:none;">Цена за 1000 монет: <span></span></p></br>
						<div class="clr"><span> </span></div>
                        <select class="gold_game_selection" name="payment">
							{foreach key=key item=item from=$psystems}
								<option cc="{$item.cc}" value="{$key}">{$item.caption}</option>
							{/foreach}
                        </select>
                        <p class="leave_a_comment-p calculator">Выберите способ оплаты</p>
						<div class="clr"></div>
<link href="css/stylefifa.css" rel="stylesheet" />
<p class="leave_a_comment-p calculator" id="viborigrok">Выберите игрока:</p> <input class="input-player gold_input_name" type="text" placeholder="Начните писать имя и выбирайте" id="arigrok">
<div class="player-area"></div>
<div class="select-players">
			<div class="player-template">
<img class="player-photo" src="/parserfifa/fifa/16/players/photo/41.png" width="40px"><img class="player-country" src="/parserfifa/fifa/16/players/country/4.png" width="40px"><span class="player-rating">98</span><span class="player-name">Jusepo Pan roni</span>
<img class="delete-button" src="images/close.png">
<br>
<span class="min-price-word leave_a_comment-p"> цена мин.:</span> 
<input class="min-price" type="text" placeholder="1" value="0" required="" >
<span class="max-price-word leave_a_comment-p"> цена макс.:</span> 
<input class="max-price" type="text" placeholder="99999" value="0" required="" >
<select class="gold_game_selection calculator" required="" >
				<option value="0" disabled selected>Время</option>
				<option>1 час</option>
				<option>3 часа</option>
				<option>6 часов</option>
				<option>12 часов</option>
				<option>1 день</option>
				<option>3 дня</option>
</select>
<input type="hidden" value="" class="newigroknam"/>
			</div>
</div>
<script src="data/js/main.fifa.js"></script>
<div class="clr"></div>
                        <p class="p-buy">Я покупаю <input class="input-buy_paying" name="calc1" required></p>
                        <p class="p-paying">Я оплачу
							<span class="input-rouble">
								<input class="input-buy_paying" name="calc2">
								<span class="bg-valut"><img src="/data/img/rouble.png"></span>
							</span>
						</p>
						<div class="clr"><span> </span></div>
						<p class="leave_a_comment-cena"></p>
						<p class="leave_a_comment-b" style="color:#ffd940;margin-left:0;" id="message_minimum">Минимальная сумма заказа {if $min_price}{$min_price}{else}50{/if} <del> P</del></p></br>
						<div class="clr"><span> </span></div>
<h2>Контактная информация</h2>
<input class="gold_input_name" name="Укажите ICQ или Skype:">
	<p class="leave_a_comment-p calculator">Ваш VK, ICQ или Skype:</p>
                        <input class="gold_input_name" {if isset($user.email)}value="{$user.email}"{/if} name="email" required>
                        <p class="leave_a_comment-p">Ваша эл. почта</p>
<h2>Прочие данные</h2>
                        <p class="input_information-p">Комментарий:</p>
                        <textarea class="input_information" name="Оставьте комментарий о предпочитаемом времени доставки" cols="40" rows="3"></textarea>
<div class="g-recaptcha" data-sitekey="6Le6DvgUAAAAAE_kVDDYqXOsBNDw4SYMuvY8k4QW"></div>




 <script src='https://www.google.com/recaptcha/api.js'></script>