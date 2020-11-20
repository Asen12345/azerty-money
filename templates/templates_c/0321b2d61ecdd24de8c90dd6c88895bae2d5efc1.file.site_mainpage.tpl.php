<?php /* Smarty version Smarty-3.1.18, created on 2020-06-02 11:35:52
         compiled from "templates/site_mainpage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17953930125ebe749967f337-98841426%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0321b2d61ecdd24de8c90dd6c88895bae2d5efc1' => 
    array (
      0 => 'templates/site_mainpage.tpl',
      1 => 1591086950,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17953930125ebe749967f337-98841426',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5ebe74996c1131_38648653',
  'variables' => 
  array (
    'popular' => 0,
    'item' => 0,
    'feedback' => 0,
    'news1' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ebe74996c1131_38648653')) {function content_5ebe74996c1131_38648653($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include 'smarty/plugins/modifier.truncate.php';
?><div class="header" id="header">
      <div class="container">
		<div class="header__offer">
          <div class="offer__part">
            <h1 class="offer__title">
              Игровая валюта<br>
              <span>по самым лучшим ценам</span>
            </h1>
            <p class="offer__text">
              Мы ценим каждого нашего клиента и за последние три года ни один из них не ушел от нас недовольным.
              Подтверждением тому
              служат положительные отзывы наших клиентов.
            </p>
            <a href="#" class="btn offer__btn">
              Связатся с нами
            </a>
          </div>
          <div class="offer__part">
            <div class="offer__cards">
              <div class="offer__card hei">
                <img src="data/img/offer-icon-1.png" alt="Star" class="offer__img">
                <h4 class="offer__pros">
                  Более 9 лет на рынке
                </h4>
                <p class="offer__pros-text">
                  Более 10 000 удачных сделок
                </p>
              </div>
              <div class="offer__card hei">
                <img src="data/img/offer-icon-2.png" alt="Star" class="offer__img">
                <h4 class="offer__pros">
                  Лучшие цены на рынке
                </h4>
                <p class="offer__pros-text">
                  Доступные цены для наших клиентов
                </p>
              </div>
              <div class="offer__card hei">
                <img src="data/img/offer-icon-3.png" alt="Star" class="offer__img">
                <h4 class="offer__pros">
                  Партнерская программа
                </h4>
                <p class="offer__pros-text">
                  Всегда готовы сотрудничать с вами
                </p>
              </div>
              <div class="offer__card hei">
                <img src="data/img/offer-icon-4.png" alt="Star" class="offer__img">
                <h4 class="offer__pros">
                  Большой выбор
                </h4>
                <p class="offer__pros-text">
                  Игровая валюта для большого количества игр
                </p>
              </div>
            </div>
          </div>
        </div>
        <a href="#games" class="header__mouse">
          <img src="data/img/mouse.svg" alt="" class="mouse">
        </a>
	  </div>
	  </div>
<section class="games" id="games">
      <div class="container">
        <h2 class="games__title">
          Популярные игры
        </h2>
        <div class="games__wrap">
		<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['popular']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
          <a href="<?php if ($_smarty_tpl->tpl_vars['item']->value['parent']==0) {?> /cateus?cateus=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
 <?php } else { ?>/gamingam?game=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
  <?php }?>" class="games__card">
            <img src="/data/photo/<?php echo $_smarty_tpl->tpl_vars['item']->value['photo'];?>
" alt="Game" class="games__img">
          </a>
		  <?php } ?>
        </div>
        <a style="text-decoration: none !important; " href="/catalogs">
        <button class="btn secondary__btn games__btn">
          Больше игр
        </button>
      </a>
    </section>
    <section class="comments" id="comments">
      <div class="container">
        <h2 class="comments__title">
          Наши отзывы
        </h2>
        <div class="comments__slider">




          <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['feedback']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
          <div>
            <div class="comments__item tes_fed">
              <div class="comments__head">
              
                <div class="comments__info">
                  <div class="comments__date date">
                    <?php echo $_smarty_tpl->tpl_vars['item']->value['data'];?>

                  </div>
                  <div class="comments__person">
                    <?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>

                  </div>
              
                  <img src="data/img/comment-line.png" alt="" class="comments__line">
                </div>
              </div>
              <p class="comments__text">
                <?php echo $_smarty_tpl->tpl_vars['item']->value['text_feedback'];?>

              </p>
              <a href="/content/feedback" class="news__btn secondary__btn btn">
                Подробнее
              </a>
            </div>
          </div>

          <?php } ?>




          
        </div>
      </div>
    </section>
    <div class="news-about">
      <section class="news" id="news">
        <div class="container">
          <h2 class="comments__title">
            Новости
          </h2>
          <div class="news__slider comments__slider">





           
            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['news1']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
            
            <div>
              <div class="news__item comments__item">
                <div class="news__head">
                  <h3 class="news__category">
              <?php echo $_smarty_tpl->tpl_vars['item']->value['caption'];?>

                  </h3>
                  <div class="news__date date">
                    <?php echo $_smarty_tpl->tpl_vars['item']->value['data'];?>

                  </div>
                </div>
                <div class="news__body">
                  <img src="http://mykombain.ru/data/photo/<?php echo $_smarty_tpl->tpl_vars['item']->value['photo'];?>
" alt="Royal" class="news__img">
                  <div class="news__info">
                    <h4 class="news__title">
                      <?php echo $_smarty_tpl->tpl_vars['item']->value['preview'];?>

                    </h4>
                    <img src="data/img/news-line.png" alt="" class="news__line">
                    <p class="news__text">
                     
                      <?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['item']->value['ntext'],200,"...");?>
<br>
                      <a href="http://mykombain.ru//news/all/page" style="color: #fff; text-decoration: underline; font-size: 22px;">Все новости</a>
                    </p>
                  </div>
                </div>
              </div>
            </div>

          
            <?php } ?>




        


        



      
          </div>
        </div>



        
      </section>
      <section class="about" id="about">
        <div class="container">
          <h2 class="about__title">
            О Azerty-money.ru
          </h2>
          <img src="data/img/about-line.png" alt="" class="about__line">
          <p class="about__text">
            В 2011 году появилась группа в социальной сети ВКонтакте под названием Azerty Money, которая в те времена
            являлась
            одним из немногих сервисов в «Рунете», имеющих автоматизированные системы, способные проводить торговые
            операции
            с
            такими внутриигровыми предметами как игровая валюта, а также помогающие в развитии персонажей. Именно
            благодаря
            интернет-ресурсам подобным нашему, на рынке игровой валюты появилась накопительная скидка. К примеру, у нас
            при
            сумме заказов от ста до пятисот рублей скидка составляет один процент. Когда сумма превысит десять тысяч
            рублей,
            пользователь получит максимальную скидку в размере пяти процентов (не забывайте указывать одну и ту же
            электронную
            почту, чтобы получить бонус). <br><br>

            В начале в группе Azerty Money осуществляли обслуживание лишь одного сервера - wowcircle.com, к тому же не
            официального. Пользователи могли только приобрести голд для этой игровой платформы. Однако с течением
            времени
            у
            нас появился собственный интернет-портал Azerty-money.ru, на котором вы собственно сейчас и находитесь, а
            список
            услуг предоставляемых нашей группой значительно расширился и теперь он поистине огромен. На сегодняшний день
            вы
            можете получить следующие виды услуг на сайте и в группе: приобрести игровую валюту практически для любой
            современной MMORPG, включая золото и адену; заказать прокачку персонажа на официальных серверах популярных
            онлайн-игр; купить аккаунты с топовыми героями на неофициальных площадках; приобрести карты оплаты и ключи,
            а
            также игры для магазина Steam.<br><br>

            Мы ценим каждого нашего клиента и за последние три года ни один из них не ушел от нас недовольным.
            Подтверждением
            тому служат положительные отзывы, с которыми вы можете ознакомиться в любой момент в соответствующем разделе
            сайта. Главными достоинствами сервиса Azerty-money.ru всегда являлись следующие преимущества: исполнение
            заказов
            в
            самые короткие сроки (доставка осуществляется за пять-десять минут, так как кинары, адена и прочие виды
            игровых
            валют закупаются нами заранее), дружелюбная и оперативная служба поддержки и сравнительно низкие
            цены.<br><br>

            Сейчас данный интернет-портал занимается обслуживанием нескольких многопользовательских игр, а именно: EVE
            Online,
            для которой можно приобрести иски, ArcheAge, World of Warcraft, Aion, Diablo III, Rift, Lineage II, Dota 2,
            The
            Elder Scrolls Online и World of Tanks..
          </p>
        </div>
      </section>
    </div>
  </div><?php }} ?>
