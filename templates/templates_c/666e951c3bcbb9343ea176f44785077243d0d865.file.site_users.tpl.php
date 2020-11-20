<?php /* Smarty version Smarty-3.1.18, created on 2020-06-02 13:08:12
         compiled from "templates/site_users.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1103148125ebe767f26c985-10383828%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '666e951c3bcbb9343ea176f44785077243d0d865' => 
    array (
      0 => 'templates/site_users.tpl',
      1 => 1591092487,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1103148125ebe767f26c985-10383828',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5ebe767f32aee9_47933492',
  'variables' => 
  array (
    'usersMode' => 0,
    'error' => 0,
    'user' => 0,
    'message' => 0,
    'users' => 0,
    'orders' => 0,
    'item' => 0,
    'ref' => 0,
    'status' => 0,
    'discount' => 0,
    'terms' => 0,
    'ref_orders' => 0,
    'row_materials' => 0,
    'menu' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ebe767f32aee9_47933492')) {function content_5ebe767f32aee9_47933492($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'smarty/plugins/modifier.date_format.php';
?><?php if ($_smarty_tpl->tpl_vars['usersMode']->value=='successReg') {?>
    <h2>Регистрация на сайте</h2>
	<div class="content-info-div">
	<b>Вы успешно зарегистрировались на сайте</b>
	</div>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['usersMode']->value=='reg') {?>








<section class="login" id="login">
	<div class="container">
	  <div class="login__wrapper">
		<div class="contacts-side login-side">
		  <h2 class="name-of login__name">
			Войти
		  </h2>
		  
		  <form method="post"  class="brown-form login-form">
			<input type="text" class="brown-input login-input login-input_mail" name="loginname" placeholder="Введите вашу эл.почту" required="">
			<input type="password" class="brown-input login-input login-input_password" name="loginpassword" placeholder="Введите пароль" required="">
			<a href="/users/recovery" class="login__forgot">
			  Забыли пароль?
			</a>
			<button name="log_but" type="submit" class="btn form__btn login__btn">
			  Войти на сайт
			</button>
		  </form>
		</div>
		<div class="contacts-side login-side">
		  <h2 class="name-of login__name">
			Создать аккаунт
		  </h2>
		  <?php if (isset($_smarty_tpl->tpl_vars['error']->value)) {?><p class="register-p" style="color:red"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</p><?php }?>
		  <form method="post" action="" class="brown-form login-form">
			<input type="text" class="brown-input login-input login-input_mail" name="email" placeholder="Введите вашу эл.почту" required="">
			<input type="password" class="brown-input login-input login-input_password" name="password1" placeholder="Введите пароль" required="">
			<input type="password" name="password2" class="brown-input login-input login-input_password" placeholder="Повторите пароль">
			<div class="g-recaptcha" data-sitekey="6LcsWPwUAAAAAOZbIdCmqzCmqy6Ew1TUqnG-Scw9"></div>
			<div class="login__check">
			  <input type="checkbox" class="check__input" required="">
			  <div class="check__text">
				Я прочитал и согласен с <a href="#" class="yellow-text">Пользовательским соглашением</a>
				и <a href="#" class="yellow-text">Политикой конфиденциальности</a>, а также даю согласие на
				обработку персональных данных.
			  </div>
			</div>
			<div class="login__check">
			  <input type="checkbox" class="check__input">
			  <div class="check__text">
				Да, я хотел бы получать эксклюзивные предложения и информацию о продуктах и услугах, которые могут
				быть мне интересны, по электронной почте. Клиенты могут в любое время отказаться от подписки
				частично
				или полностью.
			  </div>
			</div>
			<button name="reg_but" type="submit" class="btn form__btn contacts-form__btn">
			  Отправить
			</button>
		  </form>
		</div>
	  </div>
	</div>
  </section>














<?php }?>
<?php if ($_smarty_tpl->tpl_vars['usersMode']->value=='rec') {?>
<?php if (!$_smarty_tpl->tpl_vars['user']->value['id']) {?>
<div class="container">
<article class="content-info">
    <h2>Восстановление пароля</h2>
	<div class="content-info-div">
	<?php if (isset($_smarty_tpl->tpl_vars['message']->value)) {?><p class="register-p" style="color:red"><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</p><?php }?>
    <form method="post">
		<p style="text-align: center;" class="content-info-div-p">Введите вашу эл.почту, на которую будет отправлена информация для восстановления пароля</p>
<input style="width: 50%; margin: 0 auto; margin-top: 20px;" type="text" class="brown-input login-input login-input_mail" name="email" placeholder="Введите вашу эл.почту" >
        
        <div class="btn-wrap">
            <button style="display: block; margin: 0 auto; margin-top: 20px; margin-bottom: 20px;" class="btn" type="submit" name="send">Отправить</button>
        </div>
    </form>
	</div>
</article>
</div>
<?php }?>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['usersMode']->value=='profile') {?>
	
	<section class="admin" id="admin">
		<div class="container">
		  <ul class="nav nav-tabs admin-tabs" id="myTab" role="tablist">
			<li class="nav-item">
			  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#admin__profile" role="tab" aria-controls="home" aria-selected="false">
				<img src="../data/img/nav-icon-1.png" alt="Profile" class="nav__icon">
				Мой профиль</a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" id="order-tab" data-toggle="tab" href="#admin__orders" role="tab" aria-controls="profile" aria-selected="false">
				<img src="../data/img/nav-icon-2.png" alt="Profile" class="nav__icon">
				История заказов</a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" id="partner-tab" data-toggle="tab" href="#admin__partner" role="tab" aria-controls="contact" aria-selected="false">
				<img src="../data/img/nav-icon-3.png" alt="Profile" class="nav__icon">
				Партнерская программа</a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" id="status-tab" data-toggle="tab" href="#admin__status" role="tab" aria-controls="contact" aria-selected="true">
				<img src="../data/img/nav-icon-4.png" alt="Profile" class="nav__icon">
				Мой статус</a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" id="payment-tab" data-toggle="tab" href="#admin__payment" role="tab" aria-controls="contact" aria-selected="false">
				<img src="../data/img/nav-icon-5.png" alt="Profile" class="nav__icon">
				Инструкция по оплате</a>
			</li>
		  </ul>

		  <div class="tab-content" id="myTabContent">
			<div class="tab-pane fade admin__profile active show" id="admin__profile" role="tabpanel" aria-labelledby="home-tab">
			  <h2 class="name-of admin__name">
				Информация о пользователе

<a href="/users/u_logout">
				<p style="
				font-size: 20px;
				margin-top: 5px;
				text-decoration: underline;
				color: #fff;
			"> 
					Выйти
				</p>
			</a>


			  </h2>
			  <div class="admin__mail">
				Электронная почта: <a href="<?php echo $_smarty_tpl->tpl_vars['user']->value['email'];?>
"><?php echo $_smarty_tpl->tpl_vars['user']->value['email'];?>
</a>
			  </div>
			  <form method="POST" action="#" class="admin_form-wrap">
				<div class="admin__form">
				  <div class="admin__form_side">
					<label for="admin_tel">Телефон:</label>
					<input name="phone" type="tel" id="admin_tel" value="<?php echo $_smarty_tpl->tpl_vars['users']->value['phone'];?>
" class="brown-input admin__input">
					<label for="admin_skype">Skype:</label>
					<input name="skype" value="<?php echo $_smarty_tpl->tpl_vars['users']->value['skype'];?>
" type="text" id="admin_skype" class="brown-input admin__input">
					<label for="admin_icq">ICQ:</label>				
					<input name="icq"type="text" value="<?php echo $_smarty_tpl->tpl_vars['users']->value['icq'];?>
" id="admin_icq" class="brown-input admin__input">
				  </div>
				  <div class="admin__form_side">
					<label for="admin_pass">Новый пароль</label>
					<input name="pass_one" type="password" id="admin_pass" class="brown-input admin__input">
					<label for="admin_check">Повторите новый пароль</label>
					<input name="pass_two" type="password" id="admin_check" class="brown-input admin__input">
				  </div>
				</div>
				<button name="btn_prof" type="submit" class="btn admin__btn">
				  Сохранить изменения
				</button>
			  </form>
			</div>
			






			<div class="tab-pane fade admin__orders" id="admin__orders" role="tabpanel" aria-labelledby="orders-tab">
			  <h2 class="name-of orders__title">
				История заказов
			  </h2>
			  <div class="orders__text">
				Ваши заказы:
			  </div>
			  <?php if (isset($_smarty_tpl->tpl_vars['orders']->value[0]['id'])) {?>




	
				  <h2 class="name-of orders__title">
					История заказов
				  </h2>
				  <div class="orders__text">
					Ваши заказы:
				  </div>
			  
			  
			  
			  
				  <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['orders']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
				  <div class="orders__order">
					  <div class="orders__info">
						<div class="order__item">
						  <div class="order__title">
							Номер заказа: <span><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
 </span>
						  </div>
						  <div class="order__data order__game">
							<?php echo $_smarty_tpl->tpl_vars['item']->value['cap_game'];?>

						  </div>
						</div>
						<div class="order__item">
						  <div class="order__title">
							Статус
						  </div>
						  <div class="order__data order__status">
							<?php if ($_smarty_tpl->tpl_vars['item']->value['status']=='Выполнен') {?><p><span class="paid"><?php echo $_smarty_tpl->tpl_vars['item']->value['status'];?>
!</span></p><?php }?>
							<?php if ($_smarty_tpl->tpl_vars['item']->value['status']=='Оплачен, обрабатывается') {?>
								<p><span class="paid"><?php echo $_smarty_tpl->tpl_vars['item']->value['status'];?>
!</span></p>
								<small>[ Вы <?php echo $_smarty_tpl->tpl_vars['item']->value['num_ord'];?>
 в очереди ]</small>
							<?php }?>
							<?php if ($_smarty_tpl->tpl_vars['item']->value['status']=='Отменен') {?><p><span class="cancelled"><?php echo $_smarty_tpl->tpl_vars['item']->value['status'];?>
!</span></p><?php }?>
							<?php if ($_smarty_tpl->tpl_vars['item']->value['status']=='Ошибка') {?><p><span class="cancelled"><?php echo $_smarty_tpl->tpl_vars['item']->value['status'];?>
!</span>Свяжитесь с оператором</p><?php }?>
							<?php if ($_smarty_tpl->tpl_vars['item']->value['status']=='Возвращен') {?><p><?php echo $_smarty_tpl->tpl_vars['item']->value['status'];?>
</p><?php }?>
							<?php if ($_smarty_tpl->tpl_vars['item']->value['status']=='Не оплачен') {?><p><?php echo $_smarty_tpl->tpl_vars['item']->value['status'];?>
</p><?php }?>
						  </div>
						</div>
						<div class="order__item">
						  <div class="order__title">
							Email
						  </div>
						  <div class="order__data order__mail">
						<?php echo $_smarty_tpl->tpl_vars['users']->value['email'];?>

						  </div>
						</div>
						<div class="order__item">
						  <div class="order__title">
							<time datetime="2014-04-12T14:05"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['date'],"%H:%M %d.%m.%Y");?>
</time>
						  </div>
						  <div class="order__data order__amount">
							<?php echo $_smarty_tpl->tpl_vars['item']->value['money'];?>
 руб.
						  </div>
						</div>
						<div class="order__item">
						  <button class="order__link">
							Детали заказа
						  </button>
						</div>
					  </div>
					  <div class="orders__addition">
						<div class="addition__side">
							<?php echo $_smarty_tpl->tpl_vars['item']->value['data'];?>

						</div>
					  </div>
					</div>
					
				
				 
							  <?php } ?>
						
				
			  <?php } else { ?>
			  <h2>Заказов нет</h2>
			  <?php }?>
	
			</div>












			<div class="tab-pane fade admin__partner" id="admin__partner" role="tabpanel" aria-labelledby="partner-tab">
			  <h2 class="name-of partner__name">
				Партнерская программа
			  </h2>
			  <ul class="nav nav-tabs partner-tabs" id="myTab2" role="tablist">
				<li class="nav-item">
				  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#profile__docs" role="tab" aria-controls="home" aria-selected="true">Условия</a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" id="order-tab" data-toggle="tab" href="#profile__money" role="tab" aria-controls="profile" aria-selected="false">Начисления</a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" id="partner-tab" data-toggle="tab" href="#profile__materials" role="tab" aria-controls="contact" aria-selected="false">Материалы для партнера</a>
				</li>
			  </ul>
			  <div class="tab-content" id="myTabContent">
				<div class="tab-pane fade show active profile__docs" id="profile__docs" role="tabpanel" aria-labelledby="docs-tab">
				  <p class="docs__text">
					ОФЕРТА
	
					1. Предмет соглашения
					1.1. Любой пользователь, который зарегистрировался в интернет магазине Azerty-Money.ru, имеет право
					стать участником партнерской программы. <br>
					1.2. Партнеру выдается процент от суммы всех заказов, которые были сделаны именно по его ссылке.<br>
					1.3. На данный момент времени эта программа работает только с игровыми ценностями и игровой
					валютой<br>
					1.4. Начисление отчислений производиться лишь на уже выполненные заказы.<br>
					1.5. Партнер не получает вознаграждений за свои заказы.<br>
					1.6. В случае, когда комиссионные расходы берет на себя магазин, вознаграждение партнера
					рассчитывается следующем образом: процент берется со стоимости заказа за минусом комиссий, взятых
					платежной системой.<br><br>
	
					2. Партнерская программа: описание и основы ее работы<br>
					2.1. Каждый Партнер может увидеть свою Реферальную ссылку в специальном разделе, называемым
					«Материалы
					для Партнеров». Реферальная ссылка представляет собой стандартную ссылку, ведущую на определенную
					страницу портала, которая содержит в себе уникальный код Партнера.<br><br>
	
					К примеру:<br><br>
	
					a).Так выглядит стандартная ссылка на основную страницу сайта: http://azerty-money.ru, а это уже
					Реферальная ссылка: http://azerty-money.ru/?ref=94<br>
					b).Так выглядит стандартная ссылка на страницу, где можно приобрести игровую валюту для игры World
					of
					Warcraft: http://azerty-money.ru/wow_gold , а это уже Реферальная ссылка:
					http://azerty-money.ru/wow_gold?ref=94 <br>
					2.2. Пользователь закрепляется за партнером после перехода по предоставленной им реферальной ссылке,
					но лишь в том случае, если он осуществил заказ (оформлен и оплачен). Партнер в свою очередь получает
					свое вознаграждение. За все следующие приобретения данного пользователя партнер также будет получать
					процент с продаж.<br>
					2.3. Пользователь, закрепленный за партнером, идентифицируется благодаря технологии cookie. Во время
					перехода по реферальной ссылке в cookie пользователя записываются все сведения о партнере, чтобы
					после
					завершения заказа партнер смог получить свое вознаграждение.<br>
					2.4. Как только был совершен первый заказ, пользователь привязывается к партнеру уже по e-mail
					покупателя. В результате во время повторных покупок система проверяет первым делом электронную почту
					приобретателя, чтобы узнать, привязана ли она к какому-либо партнеру. В случае привязки партнер
					снова
					получит вознаграждение за покупку привязанного к нему пользователя. Исключения указаны ниже.<br>
					2.5. Пользователь «открепляется» от партнеров в ряде случаев:<br>
					2.5.1. Если по какой-либо причине пользователь не стал совершать заказ после осуществления перехода
					по
					Вашей реферальной ссылке, а затем попал на сайт по реферальной ссылке другого партнера и оплатил
					покупку игровой валюты или игровых ценностей, то он будет «закреплен» за последним партнером.<br>
					3. Правила применения материалов для партнерской ссылки.<br>
					3.1. В графических или текстовых материалах, где имеется реферальная ссылка, нужно в обязательно
					порядке указывать, куда именно попадет пользовать, если кликнет по ней, а также для чего она нужна.
					Нет необходимости упоминать наименование площадки, однако содержание графического материала и текста
					должны соответствовать странице, куда ведет ссылка.
					3.2. При прямом или косвенном нарушении содержанием реферальной ссылки авторских прав, Azerty Money
					может потребовать заменить содержание.<br>
					3.3. Реферальные ссылки запрещается размещать на следующих интернет-порталах: если они призывают к
					экстремизму или насилию, носят порнографический характер, пропагандируют наркотические
					препараты.<br>
					4. Размеры начислений партнерам<br>
					4.1. Стандартная ставка начислений партнерам равна 5% от стоимости совершенного пользователем
					заказа.<br>
					4.2. В особых случаях регулярная ставка начислений для партнера может быть установлена в
					индивидуальном порядке.
					5. Проведение выплат<br>
					5.1. Осуществляются выплаты по запросам партнера. Запрос можно сделать в разделе «Начисления».
					Размер
					запроса должен составлять не менее 50 рублей.<br>
					5.2. Осуществляются выплаты электронными деньгами с помощью следующих сервисов: Qiwi, Webmoney и
					Яндекс Деньги.<br>
					5.3. Чтобы обезопасить процесс перевода денежных средств, партнер не может самостоятельно сменить
					номер счета или платежную систему после проведения первого вывода денег. Изменить реквизиты можно
					будет только путем обращения к Администратору и объяснения ему сложившейся ситуации.<br>
					6. Особые случаи<br>
					6.1. Cookie браузера могут быть удалены пользователям. Он может решить использовать браузер, на
					котором не переходил по реферальной ссылке. Пользователь может указать не свой e-mail. Если системе
					не
					удастся идентифицировать пользователя по электронной почте или cookie, то партнер не получит своего
					вознаграждения. Если Вам, как партнеру, кажется, что по тому или иному заказу должно было быть
					выплачено партнерское вознаграждение, то следует обратиться в службу поддержки по контактам,
					указанным
					на портале, и изложить суть своей проблемы. Если покупателя будет невозможность идентифицировать, то
					Azerty Money не дает никаких гарантий на то, что Ваша претензия будет рассмотрена, а также может не
					сообщить сроков ее рассмотрения. При соглашении с этими правилами Вы принимаете тот факт, что
					партнерская программа является полностью автоматизированной системой, а потому Вам никто не может
					дать
					гарантию, что будут выполняться ручные операции.<br>
					6.2. Нельзя проводить искусственное создание покупок на новые электронные почты, чтобы получить
					повышенное партнерское вознаграждение.<br>
					6.3. Нельзя заниматься созданием двух и более партнерских аккаунтов одному и тому же лицу.
	
				  </p>

				</div>






		





				<div class="tab-pane fade profile__money" id="profile__money" role="tabpanel" aria-labelledby="money-tab">
				  <div class="money__box">
					<div class="money__row">
					  <div class="money__name">
						Ваш доход:
					  </div>
					  <div class="money__amount">
						<?php if ($_smarty_tpl->tpl_vars['users']->value['percent_ref']) {?><?php echo $_smarty_tpl->tpl_vars['users']->value['percent_ref'];?>
<?php } else { ?>5<?php }?>%
						<div class="money__comment">
						  Процент от суммы каждого заказа, сделанного по вашей ссылке
						</div>
					  </div>
					</div>
					<img src="../data/img/faq-line.png" alt="" class="faq__line money__line">
					<div class="money__row">
					  <div class="money__name">
						Текущий баланс:
					  </div>
					  <div class="money__amount">
						<span><?php echo $_smarty_tpl->tpl_vars['users']->value['money_ref'];?>
 руб.</span>
					  </div>
					</div>
				  </div>
				  <form method="post">
					  <label>Минимальная сумма 50 руб.</label>
					<input name="count_rubles" <?php if ($_smarty_tpl->tpl_vars['users']->value['money_ref']<50||$_smarty_tpl->tpl_vars['users']->value['score_purse']) {?>disabled<?php }?> style="    background: #3E4253;
					border: 1px solid rgba(255, 255, 255, 0.2);
					border-radius: 12px;
					padding: 15px 14px;
					color: #fff;
					margin-bottom: 15px; " type="text" placeholder="Сумма"><br>
				  <select name="payment_system" <?php if ($_smarty_tpl->tpl_vars['users']->value['money_ref']<50||$_smarty_tpl->tpl_vars['users']->value['score_purse']) {?>disabled<?php }?> style="background: rgba(98, 98, 98, 0.95);
				  border: 1px solid rgba(255, 255, 255, 0.2);
				  border-radius: 12px;
				  padding: 15px;
				  margin-top: 20px;
				  color: #fff;">
					<option>Яндекс деньги</option>
					<option>Qiwi</option>
					<option>WebMoney</option>
				  </select><br>
				  <input name="score_purse" <?php if ($_smarty_tpl->tpl_vars['users']->value['money_ref']<50||$_smarty_tpl->tpl_vars['users']->value['score_purse']) {?>disabled<?php }?> style="    background: #3E4253;
				  border: 1px solid rgba(255, 255, 255, 0.2);
				  border-radius: 12px;
				  padding: 15px 14px;
				  color: #fff;
				  margin-bottom: 15px; margin-top: 20px;" type="text" placeholder="Номер кошелька"><br>
				  <button <?php if ($_smarty_tpl->tpl_vars['users']->value['money_ref']<50) {?>disabled<?php }?> class="btn money__btn">
					Вывести деньги
				  </button>
				  </form>
				</div>















				<div class="tab-pane fade profile__materials" id="profile__materials" role="tabpanel" aria-labelledby="materials-tab">
				  <h4 class="materials__title">
					Ваша реферальная ссылка:
				  </h4>
				  <input type="text" class="brown-input materials__input" value="<?php echo $_smarty_tpl->tpl_vars['ref']->value;?>
">
				  <div class="materials__text">
					Заказы, оформленные при переходе по этой ссылке, приносят вам доход!
				  </div>
				  <img src="http://mykombain.ru/data/img/img-materials.png" alt="Game" class="materials__img">
				</div>
			  </div>
			</div>
			<div class="tab-pane fade admin__status" id="admin__status" role="tabpanel" aria-labelledby="status-tab">
			  <h2 class="name-of">
				Мой статус
			  </h2>
			  <div class="money__box status__box">
				<div class="status__item">
				  <div class="status__name">
					Ваш статус
				  </div>
				  <div class="status__info">
					<?php echo $_smarty_tpl->tpl_vars['status']->value;?>

				  </div>
				</div>
				<img src="../data/img/arrow-right.png" alt="Arrow-right" class="status__arrow">
				<div class="status__item">
				  <div class="status__name">
					Ваша скидка
				  </div>
				  <div class="status__info">
					<?php echo $_smarty_tpl->tpl_vars['discount']->value;?>
%
				  </div>
				</div>
			  </div>
			</div>
			<div class="tab-pane fade admin__payment" id="admin__payment" role="tabpanel" aria-labelledby="payments-tab">
			  <p class="docs__text payment__text">
				Для получения заказа необходимо выполнить всего 3 шага: <br><br>
	
				  Заполнить форму и нажать "Купить".<br><br>
	
				 Проверить введеные данные и подтвердить покупку нажав на "Купить"<br><br>
	
				 Принять заказ в игре.<br><br><br>
	
	
				Наш сайт Azerty-money.ru предоставляет большой выбор популярных способов оплаты для клиентов всех стран
				СНГ.<br>
				Для иностранных клиентов есть удобный способ оплаты картой Visa/MasterCard (для этого требуется только
				наличие пластиковой карты и платеж займет менее двух минут).<br><br>
	
				Вы можете оплатить заказ с помощью WebMoney:<br><br>
	
				1) Создайте заказ, выбрав способ оплаты "WebMoney(WMR)" (WMZ, WMU, WME, WMB).<br>
				2) Вы будете перенаправлены на сервис WebMoney.<br>
				3) Далее вам нужно будет ввести ваш мобильный номер и пароль. Либо авторизоваться другим способом.<br>
				4) Оплата будет проходить автоматически под системой Webmoney Merchant.<br>
				5) Комиссия платежной системы 0.8%<br><br>
	
				Вы можете оплатить заказ с помощью Qiwi:<br>
	
				1) Создайте заказ, выбрав способ оплаты "QIWI".<br><br>
				2) Вы будете перенаправлены на сервис Qiwi.<br>
				3) Далее вам нужно будет ввести ваш мобильный номер и пароль.<br>
				4) В личном кабинете уже будет выставлен счет для оплаты вашего заказа.<br>
				5) Комиссия платежной системы 0%<br><br>
	
				Мы принимаем оплату со всех номеров мира в которых действует платежная система Qiwi!<br><br>
	
				Вы можете оплатить заказ с помощью Яндекс.Деньги:<br><br>
	
				1) Создайте заказ, выбрав способ оплаты "Yandex".<br>
				2) Вы будете перенаправлены на сервис Яндекс.Деньги.<br>
				3) Далее вам нужно будет подтвердить оплату с помощью платежного пароля или мобильного телефона.<br>
				4) Комиссия платежной системы 0%<br><br>
	
				Вы можете оплатить заказ с помощью Visa или MasterCard:
	
			  </p>
			</div>
		  </div>
		  <div class="form__footer admin__alert">
			Внимание! Мы выполняем заказы с 11:00 до 23:00 (Москва, GMT+3, UTC+3)
		  </div>
		</div>
	  </section>









<?php }?>











<?php if ($_smarty_tpl->tpl_vars['usersMode']->value=='partner_program') {?>
	<article class="content-info">
		<div class="partner-program-block">
			<ul class="nav-tabs">
				<li class="nav-tabs-li active-tab" data-selector="context"><a><span>Условия</span></a></li>
				<li class="nav-tabs-li" data-selector="accrual"><a><span>Начисления</span></a></li>
				<li class="nav-tabs-li" data-selector="materials-for-partner"><a><span>Материалы для партнера</span></a></li>
			</ul>
			<div class="tab-pane active-tab-pane" id="context">
				<div class="tab-pane-fon"><?php echo $_smarty_tpl->tpl_vars['terms']->value;?>
</div>
			</div>
			<div class="tab-pane" id="accrual">
				<div class="tab-pane-fon">



					<p class="tap-p-left">Ваш доход:</p>
					<p class="tap-p-right">
						<strong class="tap-strong"><?php if ($_smarty_tpl->tpl_vars['users']->value['percent_ref']) {?><?php echo $_smarty_tpl->tpl_vars['users']->value['percent_ref'];?>
<?php } else { ?>5<?php }?>%</strong>— игровая валюта
						<small class="tab-small">Процент от суммы каждого заказа, сделанного по вашей ссылке</small>
					</p>
					<p class="tap-p-left">Текущий баланс:</p>
					<p class="tap-p-right"><strong class="ruble"><?php echo $_smarty_tpl->tpl_vars['users']->value['money_ref'];?>
</strong></p>
					<a id="open-withdraw-money" class="btn active-btn-withdraw-money">Вывести деньги</a>
					<div class="withdraw-money">
						<div class="withdraw-money-field">
							<form class="withdraw-money-wrap" method="post">
								<p class="withdraw-money-p">Кол-во выводимых средств (минимум 50 р.)</p>
								<input class="withdraw-money-input" name="count_rubles" <?php if ($_smarty_tpl->tpl_vars['users']->value['money_ref']<50) {?>disabled<?php }?>><label class="withdraw-money-label">рублей</label>
								<p class="withdraw-money-p">Выберите платежную систему</p>
								<div class="payment-system">
									<input <?php if ($_smarty_tpl->tpl_vars['users']->value['money_ref']<50||$_smarty_tpl->tpl_vars['users']->value['score_purse']) {?>disabled<?php }?> id="qiwi" name="payment_system" value="qiwi" type="radio" <?php if ($_smarty_tpl->tpl_vars['users']->value['type_purse']=='qiwi') {?>checked<?php }?> onclick="$('input[name=score_purse]').attr('placeholder', 'Начните вводить с +');"><label class="qiwi-label" for="qiwi"></label>
									<input <?php if ($_smarty_tpl->tpl_vars['users']->value['money_ref']<50||$_smarty_tpl->tpl_vars['users']->value['score_purse']) {?>disabled<?php }?> id="web-money" name="payment_system" value="webmoney" type="radio" <?php if ($_smarty_tpl->tpl_vars['users']->value['type_purse']=='webmoney') {?>checked<?php }?> onclick="$('input[name=score_purse]').attr('placeholder', 'Начните вводить с R или Z');"><label class="web-money-label" for="web-money"></label>
									<input <?php if ($_smarty_tpl->tpl_vars['users']->value['money_ref']<50||$_smarty_tpl->tpl_vars['users']->value['score_purse']) {?>disabled<?php }?> id="yandex-money" name="payment_system" value="yandexmoney" type="radio" <?php if ($_smarty_tpl->tpl_vars['users']->value['type_purse']=='yandexmoney') {?>checked<?php }?> onclick="$('input[name=score_purse]').attr('placeholder', '');"><label class="yandex-money-label" for="yandex-money"></label>
								</div>
								<p class="withdraw-money-p">Введите номер вашего кошелька</p>
								<input class="number-purse-input" name="score_purse" value="<?php echo $_smarty_tpl->tpl_vars['users']->value['score_purse'];?>
" <?php if ($_smarty_tpl->tpl_vars['users']->value['money_ref']<50||$_smarty_tpl->tpl_vars['users']->value['score_purse']) {?>disabled<?php }?>>
								<span class="withdraw-money-warning">
								Внимание! В целях безопасности, после первого вывода средств, самостоятельно изменить платежную систему или номер счета нельзя</span>
								<button <?php if ($_smarty_tpl->tpl_vars['users']->value['money_ref']<50) {?>disabled<?php }?> id="close-withdraw-money" class="btn" href="#">Вывести деньги</button>
							</form>
						</div>
					</div>
				<?php if (isset($_smarty_tpl->tpl_vars['ref_orders']->value[0]['id'])) {?><h2 class="context-h2">Партнерские заказы</h2><?php }?>
				</div>
				<?php if (isset($_smarty_tpl->tpl_vars['ref_orders']->value[0]['id'])) {?>
				<table id="example_two" class="display" cellspacing="0" width="100%">
					<thead>
						<tr>
							<td class="name-game">Игра</td>
							<td class="data-order">Дата заказа</td>
							<td class="number-order">Сумма</td>
							<td class="status-order">Статус заказа</td>
							<td class="details">Начислено</td>
						</tr>
					</thead>
					<tbody>
						<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['ref_orders']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
						<tr>
							<td class="name-game"><p><?php echo $_smarty_tpl->tpl_vars['item']->value['cap_game'];?>
</p></td>
							<td class="data-order"><time datetime="2014-04-12T14:05"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['date'],"%H:%M %d.%m.%Y");?>
</time></td>
							<td class="number-order"><?php echo $_smarty_tpl->tpl_vars['item']->value['money'];?>
</td>
							<td  class="status-order">
								<p><?php echo $_smarty_tpl->tpl_vars['item']->value['status'];?>
</p>
							</td>
							<td class="details open-continuation">
								<p><?php echo $_smarty_tpl->tpl_vars['item']->value['charged'];?>
 руб.</p>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
				<small class="str-table">Страницы:</small>
				<?php }?>
			</div>
			<div class="tab-pane" id="materials-for-partner">
				<div class="tab-pane-fon">
					<h3 class="content-info-div-h3">Ваша реферальная ссылка: </h3>
					<input readonly class="register_input_name-left" value="<?php echo $_smarty_tpl->tpl_vars['ref']->value;?>
">
					<p>Заказы, оформленные при переходе по этой ссылке, приносят вам доход!</p>
					<?php echo $_smarty_tpl->tpl_vars['row_materials']->value;?>

				</div>
			</div>
		</div>
    </article>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['usersMode']->value=='my_status') {?>
    <article class="content-info">
        <div class="content-info-div">
            <div class="my-status-block">
                <div class="left-my-status-block">
                    <small class="my-status-small">Ваш статус:</small>
                    <strong class="my-status-strong"><?php echo $_smarty_tpl->tpl_vars['status']->value;?>
</strong>
                </div>
                <div class="right-my-status-block">
                    <small class="my-status-small">Ваша скидка:</small>
                    <strong class="my-status-strong"><?php echo $_smarty_tpl->tpl_vars['discount']->value;?>
%</strong>
                </div>
            </div>
        </div>
    </article>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['usersMode']->value=='view_content') {?>
    <article class="content-info">
        <div class="content-info-div">
			<h2 class="main-h2"><?php echo $_smarty_tpl->tpl_vars['menu']->value['caption'];?>
</h2>
            <div class="tab-pane active-tab-pane"><?php echo $_smarty_tpl->tpl_vars['menu']->value['content'];?>
</div>
        </div>
    </article>
<?php }?><?php }} ?>
