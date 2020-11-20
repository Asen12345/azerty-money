<?php /* Smarty version Smarty-3.1.18, created on 2020-06-03 13:34:33
         compiled from "templates/services/test.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8935754205ecf938f18eaa8-66713878%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f5b3fe501f8e3af9805777a571588eab42feff66' => 
    array (
      0 => 'templates/services/test.tpl',
      1 => 1591180406,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8935754205ecf938f18eaa8-66713878',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5ecf938f21ede7_08991526',
  'variables' => 
  array (
    'formsData' => 0,
    'psystems' => 0,
    'item' => 0,
    'key' => 0,
    'servers' => 0,
    'min_price' => 0,
    'user' => 0,
    'test' => 0,
    'test1' => 0,
    'feedback_game' => 0,
    'foo' => 0,
    'test2' => 0,
    'gimg' => 0,
    'tes' => 0,
    'tes1' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ecf938f21ede7_08991526')) {function content_5ecf938f21ede7_08991526($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'smarty/plugins/modifier.date_format.php';
?>
<div class="container">
<div class="head-of">
          <div class="breadcrumbs">
            <a href="/" class="breadcrumbs__home">
              Главная
            </a> / Оформить заказ
          </div>
          <h1 class="title-of">
            <?php echo $_smarty_tpl->tpl_vars['formsData']->value['caption'];?>

          </h1>
        </div>
</div>
        <section class="payment" id="payment">
      <div class="container">
        <p class="payment__text">
            <?php echo $_smarty_tpl->tpl_vars['formsData']->value['order_info'];?>

        </p>
        <h2 class="name-of payment__name">
          Оформить заказ
        </h2>
        <form style="width: 100% !important;" onsubmit="return check_form($(this));" method="POST" class="payment__data js-form popupResult" id="popupResult2" novalidate="novalidate">

        <div class="payment__types">

            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['psystems']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
          
            <div name= "payment" cc="<?php echo $_smarty_tpl->tpl_vars['item']->value['cc'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['cc'];?>
" class="payment__item <?php if ($_smarty_tpl->tpl_vars['item']->value['sort']==1) {?> payment__item_active <?php }?>">
                <img src="http://mykombain.ru/data/img/<?php echo $_smarty_tpl->tpl_vars['item']->value['img'];?>
" alt="WebMoney" class="payment__icon">
                <span><?php echo $_smarty_tpl->tpl_vars['item']->value['caption'];?>
</span>
                  <input name="payment" cc="<?php echo $_smarty_tpl->tpl_vars['item']->value['cc'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" type="hidden">
              </div>
            

        <?php } ?>
        <input id="inp_hid" name="paymen" value="" type="hidden">


  


        </div>
        <div class="payment__wrap pay-line">
          <p class="payment__desk">
            Анотации к заказу<br><br>
            Равным образом начало повседневной работы по формированию позиции влечет за собой процесс внедрения и
            модернизации позиций, занимаемых участниками в отношении поставленных задач. С другой стороны консультация
            с
            широким активом в значительной степени обуславливает создание дальнейших направлений развития. <br><br>

            Задача организации, в особенности же реализация намеченных плановых заданий представляет собой интересный
            эксперимент проверки систем массового участия. Не следует, однако забывать, что постоянное
            информационно-пропагандистское обеспечение нашей деятельности влечет за собой процесс внедрения и
            модернизации систем массового участия. Значимость этих проблем настолько очевидна, что рамки и место
            обучения кадров требуют от нас анализа направлений прогрессивного развития. Задача организации, в
            особенности же дальнейшее развитие различных форм деятельности играет важную роль в формировании
            соответствующий условий активизации. Равным образом начало повседневной работы по формированию позиции
            влечет за собой процесс внедрения и модернизации позиций, занимаемых участниками в отношении поставленных
            задач. С другой стороны консультация с широким активом в значительной степени обуславливает создание
            дальнейших направлений развития. <br><br>

            Задача организации, в особенности же реализация намеченных плановых заданий представляет собой интересный
            эксперимент проверки систем массового участия. Не следует, однако забывать, что постоянное
            информационно-пропагандистское обеспечение нашей деятельности влечет за собой процесс внедрения.
          </p>
<div id="rov">
            <div class="data__row">
              <div class="data__name">
                Выберите сервер<span class="required" aria-required="true">*</span>
              </div>
              <div class="data__side">
                <label for="data__server"></label>



                <select name="server" id="data__server" class="data__input" required>
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
                <script>
                    function unit_of_currency() { return 1; } //единица валюты
                </script>
                	<p class="leave_a_comment-cena"></p>
                    <p class="data__text" name="sum_game" style="display:none;"><?php echo $_smarty_tpl->tpl_vars['formsData']->value['min_tex'];?>
<span></span></p></br>
                    <div class="clr"><span> </span></div>
            
              </div>
            </div>
            <div class="data__row">
              <div class="data__name">
                Валюта<span class="required" aria-required="true">*</span>
              </div>
              <div class="data__side_cur">
                <div class="side__div">
                  <input type="text" name="calc1" class="data__input data__input_cur" required="" aria-required="true">
                  <span class="addition-sm">Сумма<span class="required" aria-required="true">*</span> </span>
                  <input type="number"  name="calc2" class="data__input data__input_cur" required="" aria-required="true">
                  <span class="currency">₽</span>
                </div>
                <div id="message_minimum" class="data__text data__text_yellow">
                  Минимальная сумма заказа <?php if ($_smarty_tpl->tpl_vars['min_price']->value) {?><?php echo $_smarty_tpl->tpl_vars['min_price']->value;?>
<?php } else { ?>50<?php }?> P
                </div>
              </div>
            </div>
            <div class="data__row">
              <div class="data__name">
                Укажите имя персонажа<span class="required" aria-required="true">*</span>
              </div>
              <input type="text" name="Укажите имя персонажа" class="data__input data__input_nic" placeholder="Никнейм" required="" aria-required="true">
            </div>
            <div class="data__row">
              <div class="data__side data__side_text">
                <input type="text" <?php if (isset($_smarty_tpl->tpl_vars['user']->value['email'])) {?> value="<?php echo $_smarty_tpl->tpl_vars['user']->value['email'];?>
" <?php }?>  name="email" class="data__input" placeholder="E-mail" required="" aria-required="true">
                <p class="data__text">
                  Накопительная система скидок. <br>
                  Для получения скидки Вам достаточно лишь указывать один и тот же email ко всем заказам. Посмотреть
                  набранный % скидки Вы можете в личном кабинете.
                </p>
              </div>
              <div style="margin-left: 20px;" class="data__side">
                <div class="discount__row">
                  <div class="discount__point">
                    100 - 500
                  </div>
                  <div class="discount__rate">
                    1%
                  </div>
                </div>
                <div class="discount__row">
                  <div class="discount__point">
                    500 - 2000
                  </div>
                  <div class="discount__rate">
                    2%
                  </div>
                </div>
                <div class="discount__row">
                  <div class="discount__point">
                    2000 - 5000
                  </div>
                  <div class="discount__rate">
                    3%
                  </div>
                </div>
                <div class="discount__row">
                  <div class="discount__point">
                    5000 - 10000
                  </div>
                  <div class="discount__rate">
                    4%
                  </div>
                </div>
                <div class="discount__row">
                  <div class="discount__point">
                    10000 - 30000
                  </div>
                  <div class="discount__rate">
                    5%
                  </div>
                </div>
                <div class="discount__row">
                  <div class="discount__point">
                    VIP статус &gt; 30000
                  </div>
                  <div class="discount__rate">
                    10%
                  </div>
                </div>
              </div>
            </div>
            <div class="data__row">
              <div class="data__name">
                Есть промокод? Укажите его здесь!
              </div>
              <input type="text" name="promo_code" class="data__input data__input_nic">
            </div>
            <div class="data__row">
              <div class="data__name">
                Связь:<span class="required" aria-required="true">*</span>
              </div>
              <textarea name="Контактные данные" class="data__input data__input_nic data__textarea" placeholder="Как с вами связаться? Укажите удобный вам способ связи (WhatsApp, Telegram, Skype, VK)" required="" aria-required="true"></textarea>
            </div>
            <div class="data__row_last">
              <div class="data__check">
                <input class="data__checkbox" type="checkbox" required>
               
                <div class="data__text">
                  Я ознакомился с <a href="#" class="data__link">условиями соглашения</a>
                </div>
              </div>
              <div class="data__total">
                <div class="total__text">
                    <p  name="c_discount"> &nbsp; </p>
                   <span><p name="n_discount" style="background:none"></p></span> 
                </div>
                <div class="total__text">
                    <style>
#test_i img{
    display: none;
}
                    </style>
                    <p name="c_sum"> &nbsp; </p>
                    <span><p  id="test_i" name="n_sum" style="background:none; display: flex; padding-left: 20px;"></p></span> 
                </div>
              </div>
            </div>
          
                <input type="hidden" value=0 name="calc_type" />
                <?php if ($_smarty_tpl->tpl_vars['formsData']->value['type']==0) {?>
                <input type="hidden" value="" name="manok_1" />
                <input type="hidden" value="i_got" name="manok_2" />
                <?php }?>
                <button type="submit" class="btn total__btn ml-auto" >
              Купить
             
            </button>
    
        </div>
        </div>
    </form>
        <div class="payment__reviews reviews">
          <h2 class="name-of reviews-name">
            Отзывы
          </h2>
          <a style="font-size: 22px; color: #ffffff;     margin-left: 5px;
          margin-right: 5px; text-decoration: underline;" href="#nav_g">
            Оставить отзыв
          </a>
          <a style="font-size: 22px; color: #ffffff;     margin-left: 5px;
          margin-right: 5px; text-decoration: underline;" href="http://mykombain.ru/content/feedback" target="_blank">
            Все отзывы
          </a>



          <?php $_smarty_tpl->tpl_vars['foo'] = new Smarty_variable(0, null, 0);?>   
		
          <?php $_smarty_tpl->tpl_vars['test'] = new Smarty_variable($_GET['feed']*15, null, 0);?>
          <?php $_smarty_tpl->tpl_vars['test1'] = new Smarty_variable($_smarty_tpl->tpl_vars['test']->value+1, null, 0);?>
          <?php $_smarty_tpl->tpl_vars['test2'] = new Smarty_variable($_smarty_tpl->tpl_vars['test1']->value-15, null, 0);?>



          <?php if (isset($_smarty_tpl->tpl_vars['feedback_game']->value[0]['id'])) {?>
          <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['feedback_game']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
          <?php if ($_smarty_tpl->tpl_vars['item']->value['id']>0) {?>

   <div style="display: none;"> <?php echo $_smarty_tpl->tpl_vars['foo']->value++;?>
   </div> 

      <?php if ($_smarty_tpl->tpl_vars['foo']->value<$_smarty_tpl->tpl_vars['test2']->value) {?>
        
      <?php continue 1?>
      
      
          <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['foo']->value==$_smarty_tpl->tpl_vars['test1']->value) {?>
        
    <?php break 1?>
    
    
        <?php }?>

          <div class="reviews__item pay-line">
            <div class="payment-line"></div>
            <img src="http://mykombain.ru/data/photo/<?php echo $_smarty_tpl->tpl_vars['gimg']->value;?>
" alt="Person" class="reviews__img">
            <div class="reviews__content">
              <div class="reviews__head">
                <h5 class="reviews__name">
                    <?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>

                </h5>
                <div class="reviews__date">
                    <time class="review-time">(<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['data'],"%d.%m.%Y \ %H:%M");?>
)</time>
                </div>
              </div>
              <div class="reviews__text">
                <?php echo $_smarty_tpl->tpl_vars['item']->value['text_feedback'];?>

              </div>

   <?php if ($_smarty_tpl->tpl_vars['item']->value['answer']) {?>
              <div class="reviews__admin">
                <img src="http://mykombain.ru/data/img/admin-icon.png" alt="admin" class="reviews__admin-img">
                <div class="reviews__admin-side">
                  <div class="reviews__admin-name">
                    Администратор Azerty Money
                  </div>
                  <div class="reviews__admin-text">
                    <?php echo $_smarty_tpl->tpl_vars['item']->value['answer'];?>

                  </div>
                </div>
              </div>
              <?php }?>

            </div>
          </div>
          <?php }?>
     
          <?php } ?>
          <div class="catalog__pages review__pages">
          
            <?php $_smarty_tpl->tpl_vars['foo'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['foo']->step = 1;$_smarty_tpl->tpl_vars['foo']->total = (int) ceil(($_smarty_tpl->tpl_vars['foo']->step > 0 ? $_SESSION['feed1']+1 - (1) : 1-($_SESSION['feed1'])+1)/abs($_smarty_tpl->tpl_vars['foo']->step));
if ($_smarty_tpl->tpl_vars['foo']->total > 0) {
for ($_smarty_tpl->tpl_vars['foo']->value = 1, $_smarty_tpl->tpl_vars['foo']->iteration = 1;$_smarty_tpl->tpl_vars['foo']->iteration <= $_smarty_tpl->tpl_vars['foo']->total;$_smarty_tpl->tpl_vars['foo']->value += $_smarty_tpl->tpl_vars['foo']->step, $_smarty_tpl->tpl_vars['foo']->iteration++) {
$_smarty_tpl->tpl_vars['foo']->first = $_smarty_tpl->tpl_vars['foo']->iteration == 1;$_smarty_tpl->tpl_vars['foo']->last = $_smarty_tpl->tpl_vars['foo']->iteration == $_smarty_tpl->tpl_vars['foo']->total;?>
            <?php $_smarty_tpl->tpl_vars['tes'] = new Smarty_variable($_GET['feed']+1, null, 0);?>
            <?php $_smarty_tpl->tpl_vars['tes1'] = new Smarty_variable($_GET['feed']-1, null, 0);?>
        
            <?php if ($_smarty_tpl->tpl_vars['tes']->value<$_smarty_tpl->tpl_vars['foo']->value) {?>
        
            <?php break 1?>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['tes1']->value>$_smarty_tpl->tpl_vars['foo']->value) {?>
            <?php continue 1?>
          
            <?php }?>

        
      
      
            <a class="	<?php if ($_smarty_tpl->tpl_vars['foo']->value==$_GET['feed']) {?>  active__page   <?php }?>"
            style="text-decoration:none;" href=?feed=<?php echo $_smarty_tpl->tpl_vars['foo']->value;?>
>
              <?php echo $_smarty_tpl->tpl_vars['foo']->value;?>

              </a>
              <?php }} ?>
  
            </div>
  
  






          
              <span class="line"> </span>
              <?php }?>


        </div>






        <p class="docs__text payment__text after__text">
          Посвящая свободное время играм, задумываетесь ли вы о том, как бы в той или иной ситуации пригодилась игровая
          валюта? Прокачка персонажа, покупка нового усовершенствованного для ожесточенного боя оружия – все это
          занимает много времени и требует от вас максимум усилий. Отныне способ достичь желаемого результата стал в
          разы проще. Сервис Azerty-Money создан специально для упрощения игровой жизни. Игровая валюта продается на
          самых выгодных условиях, а список игр, для аккаунтов которых она предоставляется, - весьма обширен. Вам
          предоставляется масса возможностей! <br><br>



          На сайте вы с легкостью можете купить золото wowcircle, воспользовавшись специальной формой для оформления
          заказа. Это идеальный способ в кратчайшие сроки прокачать персонажа, добавить ему необходимые боевые навыки,
          защитные элементы и оружие. Не стоит тратить по десять часов на достижение цели. Проще приобрести валюту у
          нас. К тому же, доставка Голд Wowcircle занимает минимум времени – от 5 до 15 минут, реже – до 24-х часов, но
          это в крайне редких случаях. Остается практически стопроцентная вероятность того, что вы получите заказанную
          валюту в первые 15 минут.<br><br>



          К преимуществам покупки валюты через наш сервис также можно отнести низкую цену. Она, как нетронутая
          постоянная, остается таковой не зависимо ни от чего. В очередной раз посещая ресурс, дабы пополнить запасы
          золота, вы не столкнетесь с резким повышением цены. Дешевый голд вов циркл всегда будет в общем доступе по
          оптимальным ценам. Вы будете приятно удивлены, когда более детально ознакомитесь со стоимостью золота и
          суммой, доступной для минимального заказа. Она не оставит равнодушным даже бывалого геймера, повидавшего
          миллионы подобных ресурсов.<br><br>



          Сервис богат не только выгодными предложениями и накопительными акциями для покупки голды, но и предоставляет
          возможность продать её. Удобная и простая в заполнении форма поможет вам осуществить любую продажу: будь то
          игровые ценности или продажа золота на wowcircle. Достаточно выбрать желаемую игру из списка или ввести ее
          вручную, указать сервер, количество продаваемых ресурсов и цену, за которую вы готовы расстаться с золотом – и
          вуаля. Выгодная сделка успешно проведена.<br><br>



          Эти и многие другие перечисленные здесь преимущества не оставят сомнений при выборе сервиса для покупки и
          продажи голды. Многочисленные отзывы, многолетняя репутация и железобетонные гарантии красочно подтверждают
          безопасность, удобство и скорость работы сайта.
        </p>
        <div class="contacts-side payment__form" id="nav_g"> 
          <h2 class="name-of payment__form_title">
            Оставить отзыв
          </h2>
          <form method="POST" class="brown-form">
            <input name="name" type="text" class="brown-input" placeholder="Ваше имя" required="">
            <input name="email"  <?php if (isset($_smarty_tpl->tpl_vars['user']->value['email'])) {?>value="<?php echo $_smarty_tpl->tpl_vars['user']->value['email'];?>
"<?php }?> type="mail" class="brown-input" placeholder="Ваша эл. почта" required="">
            <textarea  name="comment" class="brown-input brown-textarea" placeholder="Оставьте свой отзыв здесь" required=""></textarea>
            <div class="form__footer contacts-form__footer">
              <button class="btn form__btn contacts-form__btn">
                Оставить отзыв
              </button>
            </div>
          </form>
        </div>
      </div>
    </section><?php }} ?>
