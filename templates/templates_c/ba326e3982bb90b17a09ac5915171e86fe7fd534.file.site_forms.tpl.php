<?php /* Smarty version Smarty-3.1.18, created on 2020-06-03 18:35:44
         compiled from "templates/site_forms.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13278808085ebe74a7c19922-94563468%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ba326e3982bb90b17a09ac5915171e86fe7fd534' => 
    array (
      0 => 'templates/site_forms.tpl',
      1 => 1591198542,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13278808085ebe74a7c19922-94563468',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5ebe74a7eb67c3_72877616',
  'variables' => 
  array (
    'formsMode' => 0,
    'formsData' => 0,
    'item' => 0,
    'feedback_item' => 0,
    'user' => 0,
    'paginatorData' => 0,
    'digiseller_id' => 0,
    'feedback' => 0,
    'error' => 0,
    'feedback_game' => 0,
    'gimg' => 0,
    'admin_name' => 0,
    'gid' => 0,
    'data' => 0,
    'p_get' => 0,
    'test' => 0,
    'test1' => 0,
    'foo' => 0,
    'test2' => 0,
    'advantage' => 0,
    'tes' => 0,
    'tes1' => 0,
    'pyandex' => 0,
    'cook_order' => 0,
    'account' => 0,
    'probo' => 0,
    'url' => 0,
    'paywm' => 0,
    'description' => 0,
    'purse' => 0,
    'pqiwi' => 0,
    'shop_id' => 0,
    'order_data' => 0,
    'phone_unit' => 0,
    'redirect_url' => 0,
    'servers' => 0,
    'spentMoney' => 0,
    'min_price' => 0,
    'discounts' => 0,
    'games' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ebe74a7eb67c3_72877616')) {function content_5ebe74a7eb67c3_72877616($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'smarty/plugins/modifier.date_format.php';
?><?php if ($_smarty_tpl->tpl_vars['formsMode']->value=='partners') {?>
<div class="faq-wrapper" style="background-image: none !important;">

    <!-- Тут начинается "Header" (повторяюшиеся элементы) -->
    <section class="seller" id="seller">
      <div class="container">
        <div class="head-of">
        
          <h1 class="title-of">
            Поставщикам
          </h1>
        </div>
        <div class="seller__body">
          <img src="img/faq-line.png" alt="" class="faq__line">
          <h2 class="name-of">
            Ведется набор поставщиков во всех играх
          </h2>
          <form method="post" class="brown-form seller__form">
            <input name="Контакты" type="text" class="brown-input seller__input" placeholder="Как с вами связатся?" required>
            <input name="game_name" type="text" class="brown-input seller__input" placeholder="Игра, сервер, реалм" required>
            <textarea name="Данные" class="brown-input seller__textarea" placeholder="Количество и цена"
              required></textarea>
              <div class="g-recaptcha" data-sitekey="6LerZvwUAAAAAL0L9V_AMXXzcqHT9eUCt7pi58Ct"></div>
            <div class="form__footer">
              <div class="form__alert">
                Внимание! Мы выполняем заказы с 11:00 до 23:00 (Москва, GMT+3, UTC+3)
              </div>
              <button type="submit" class="btn form__btn">
                Отправить
              </button>
            </div>
          </form>
        </div>
      </div>
    </section>
  </div>
<?php }?>











<?php if ($_smarty_tpl->tpl_vars['formsMode']->value=='game') {?>
    <article class="content-info">
        <h2><?php echo $_smarty_tpl->tpl_vars['formsData']->value['caption'];?>
</h2>
        <div class="content-info-div">
            <?php if (isset($_smarty_tpl->tpl_vars['formsData']->value['services'][0]['id'])) {?>
                <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['formsData']->value['services']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                        <a class="game-services" href="<?php echo $_smarty_tpl->tpl_vars['item']->value['link'];?>
">
                            <div class="photo">
                                <?php if ($_smarty_tpl->tpl_vars['item']->value['photo']) {?>
                                    <div class="image" style="background-image: url('<?php echo $_smarty_tpl->tpl_vars['item']->value['photo'];?>
')"></div>
                                <?php }?>
                            </div>
                            <p class="caption">
                                <?php echo $_smarty_tpl->tpl_vars['item']->value['caption'];?>

                            </p>
                        </a>
                <?php } ?>
                <div class="clear"></div>
                <div class="game-description"><?php echo $_smarty_tpl->tpl_vars['formsData']->value['about'];?>
</div>
            <?php }?>
        </div>
    </article>
<?php }?>



<?php if ($_smarty_tpl->tpl_vars['formsMode']->value=='itemform') {?>
<div class="container">
<div class="head-of">
    <div class="breadcrumbs">
		<a href="/" class="breadcrumbs__home">
		  Главная
		</a> /  Оформить заказ
	  </div>
    <h1 class="title-of">
        <?php echo $_smarty_tpl->tpl_vars['formsData']->value['service']['caption'];?>

    </h1>
  </div>
</div>
<section class="product" id="product">
    <div class="container">
      <div class="product__wrap">


      <!--  <div class="product__previews">
            <a data-fancybox="gallery" href="http://mykombain.ru/data/img/slide1.png" class="previews__item">
              <img src="img/slider-1.png" alt="Product">
              <div class="previews__overlay"></div>
            </a>
            <a data-fancybox="gallery" href="http://mykombain.ru/data/img/slide1.png" class="previews__item">
              <img src="img/slider-1.png" alt="Product">
              <div class="previews__overlay"></div>
            </a>
            <a data-fancybox="gallery" href="http://mykombain.ru/data/img/slide1.png" class="previews__item">
              <img src="img/slider-1.png" alt="Product">
              <div class="previews__overlay"></div>
            </a>
            <a data-fancybox="gallery" href="http://mykombain.ru/data/img/slide1.png" class="previews__item">
              <img src="img/slider-1.png" alt="Product">
              <div class="previews__overlay"></div>
            </a>
          </div>-->
          <style>



            .product__slider .slick-slide{
            width: 100%;
            
            }
                        </style>
          <div class="product__previews" style="width: 10%;">
            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['formsData']->value['sliders']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
          
            <a data-fancybox="gallery" href= "http://mykombain.ru/data/img-sliders/<?php echo $_smarty_tpl->tpl_vars['item']->value['photo'];?>
" class="previews__item">
                  <img style="width: 100%;" src= "http://mykombain.ru/data/img-sliders/<?php echo $_smarty_tpl->tpl_vars['item']->value['photo'];?>
" alt="Product">
             
                  <div class="previews__overlay"></div>
                </a>
             
               
           
              <?php } ?>
            </div>
          
          <div class="product__slider">
          
            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['formsData']->value['sliders']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
            <div>
                <a style="cursor: zoom-in" data-fancybox="gallery" href= "http://mykombain.ru/data/img-sliders/<?php echo $_smarty_tpl->tpl_vars['item']->value['photo'];?>
" >
                <img style="width: 100%;" src="http://mykombain.ru/data/img-sliders/<?php echo $_smarty_tpl->tpl_vars['item']->value['photo'];?>
" alt="Product" class="product__img">
            
            </a>
              
              </div>
          
            <?php } ?>
            
           
          </div>

    



        <div class="product__offer">
          <h2 class="name-of product__title">
            <?php echo $_smarty_tpl->tpl_vars['formsData']->value['item']['caption'];?>

          </h2>
          <div class="product__info info_short">
            <?php echo $_smarty_tpl->tpl_vars['formsData']->value['item']['short_about'];?>

          </div>
          <div class="product__price">
            <?php if ($_smarty_tpl->tpl_vars['formsData']->value['item']['active']==1) {?>
            <div class="price">
              
                <?php echo $_smarty_tpl->tpl_vars['formsData']->value['item']['price'];?>
 руб.
            </div>
        <?php } else { ?>
                <div class="price">
                    <p></p>
                    Нет в наличии
                </div>
        <?php }?>
          </div>
          <div class="product__footer">
         



                <?php if ($_smarty_tpl->tpl_vars['formsData']->value['item']['active']==1) {?>
          
                    <?php if (strlen($_smarty_tpl->tpl_vars['formsData']->value['item']['link'])==0) {?><form method="post"><?php }?>
                        <input type="hidden" name="id_service_item" value="<?php echo $_smarty_tpl->tpl_vars['formsData']->value['item']['id'];?>
" />

                        <?php if (strlen($_smarty_tpl->tpl_vars['formsData']->value['item']['link'])>0) {?><a href="<?php echo $_smarty_tpl->tpl_vars['formsData']->value['item']['link'];?>
">   <button class="btn product__btn"  onclick="location.href='<?php echo $_smarty_tpl->tpl_vars['formsData']->value['item']['link'];?>
'">Купить</button></a><?php } else { ?></form><?php }?>
                    <?php if (strlen($_smarty_tpl->tpl_vars['formsData']->value['item']['link'])==0) {?><button class="btn_buy" id="button_item">Купить</button><?php }?>
     
            <?php }?>






          
            <a href="#product__more-info" class="btn secondary__btn product__more">
              Смотреть полное описание
            </a>
            <div class="product__icons">
              <div class="icons__info" data-title="Лучшие цены и способы оплаты">
                <img src="http://mykombain.ru/data/img/skillup-like.png" alt="Like" class="product__icon">
              </div>
              <div class="icons__info" data-title="Моментальная доставка">
                <img src="http://mykombain.ru/data/img/skillup-fast.png" alt="Fast" class="product__icon">
              </div>
            </div>
          </div>
        </div>
      </div>
     
        <?php if ($_smarty_tpl->tpl_vars['formsData']->value['notice']) {?>
        <p class="product__text">
            <?php echo $_smarty_tpl->tpl_vars['formsData']->value['notice'];?>

        </p>
    <?php }?>
      
      <ul class="nav nav-tabs product-tabs" id="myTab2" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#product__more-info" role="tab" aria-controls="home" aria-selected="true">Доп. информация</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="order-tab" data-toggle="tab" href="#product__discount" role="tab" aria-controls="profile" aria-selected="false">Скидки</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="partner-tab" data-toggle="tab" href="#product__reviews" role="tab" aria-controls="contact" aria-selected="false">Отзывы</a>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade product__more-info active show" id="product__more-info" role="tabpanel" aria-labelledby="more-tab">
          <div class="product__addition">
            <div class="product__info">
                <?php echo $_smarty_tpl->tpl_vars['formsData']->value['item']['about'];?>

            </div>
          </div>
        </div>
        <div class="tab-pane fade product__discount" id="product__discount" role="tabpanel" aria-labelledby="discount-tab">

            <?php if ($_smarty_tpl->tpl_vars['formsData']->value['item']['discounts']) {?>
            <div id="tab-discounts" class="tab-content">
                <?php echo $_smarty_tpl->tpl_vars['formsData']->value['discounts_text'];?>

                <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['formsData']->value['item']['discounts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                    <li><?php echo $_smarty_tpl->tpl_vars['item']->value['summa'];?>
$ - скидка <b><?php echo $_smarty_tpl->tpl_vars['item']->value['percent'];?>
%</b></li>
                <?php } ?>
            </div>
        <?php }?>
        </div>
        <div class="tab-pane fade product__reviews" id="product__reviews" role="tabpanel" aria-labelledby="reviews-tab">
          <div class="payment__reviews reviews">
            <h2 class="name-of reviews-name">
              Отзывы
            </h2>


           



            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['feedback_item']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>



            <div class="reviews__item pay-line">
                <img style="width: 80px;" src="http://mykombain.ru/data/img/user1.svg" alt="Person" class="reviews__img">
                <div class="reviews__content">
                  <div class="reviews__head">
                    <h5 class="reviews__name">
                        <?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>

                    </h5>
                    <div class="reviews__date">
                        <time><?php echo $_smarty_tpl->tpl_vars['item']->value['date'];?>
</time>
                    </div>
                  </div>
                  <div class="reviews__text">
                    <?php echo $_smarty_tpl->tpl_vars['item']->value['info'];?>

                                  </div>
                                  <?php if ($_smarty_tpl->tpl_vars['item']->value['comment']) {?>
                  <div class="reviews__admin">
                    <img src="http://mykombain.ru/data/img/admin-icon.png" alt="admin" class="reviews__admin-img">
                    <div class="reviews__admin-side">
                      <div class="reviews__admin-name">
                        Администратор Azerty Money
                      </div>
                      <div class="reviews__admin-text">
                        <?php echo $_smarty_tpl->tpl_vars['item']->value['comment'];?>

                                              </div>
                    </div>
                  </div>
                  <?php }?>
                </div>
              </div>
  

        <?php } ?>






         
          </div>
        </div>
      </div>

      <div class="product__contacts">
        <div class="contacts-side payment__form">
          <h2 class="name-of payment__form_title">
            Оставить отзыв
          </h2>
          <form method="post" name="feedback" class="brown-form">
            <input name="name" type="text" class="brown-input" placeholder="Ваше имя" required="">
            <input name="email" type="mail" <?php if (isset($_smarty_tpl->tpl_vars['user']->value['email'])) {?>value="<?php echo $_smarty_tpl->tpl_vars['user']->value['email'];?>
"<?php }?> class="brown-input" >
            <textarea name="comment" class="brown-input brown-textarea" placeholder="Оставьте свой отзыв здесь" required=""></textarea>
            <div class="form__footer contacts-form__footer">
              <button type="submit" class="btn form__btn contacts-form__btn">
                Оставить отзыв
              </button>
            </div>
          </form>
        </div>
        <div class="contacts-side payment__contacts">
          <h2 class="name-of payment__form_title">
            Поделиться:
          </h2>
          <div class="contacts__links">
            <a href="#" class="contacts_link">
              <img src="http://mykombain.ru/data/img/vk-white.png" alt="VK">
            </a>
            <a href="#" class="contacts_link">
              <img src="http://mykombain.ru/data/img/fb-white.png" alt="Facebook">
            </a>
            <a href="#" class="contacts_link">
              <img src="http://mykombain.ru/data/img/tw-white.png" alt="Twitter">
            </a>
          </div>
          <p class="contacts_text">
            Следует заметить оставляя красный отзыв, до момента ответа продавца, вы попадаете в черный список
            Всем удачных покупок!
          </p>
        </div>
      </div>
    </div>
  </section>

<!--



    <article class="content-info">

        <div class="head-of">
            <div class="breadcrumbs">
              <a href="#" class="breadcrumbs__home">
                Главная
              </a> / х5 428. [Орда] Маг: PvE 5606 GS
            </div>
            <h1 class="title-of">
                <?php echo $_smarty_tpl->tpl_vars['formsData']->value['service']['caption'];?>

            </h1>
          </div>
      




          


      <?php if ($_smarty_tpl->tpl_vars['formsData']->value['sliders']) {?>




      <section class="product" id="product">
        <div class="container">
          <div class="product__wrap">
            <div class="product__previews">
              <a data-fancybox="gallery" href="img/slider-1.png" class="previews__item">
                <img src="img/slider-1.png" alt="Product">
                <div class="previews__overlay"></div>
              </a>
              <a data-fancybox="gallery" href="img/slider-1.png" class="previews__item">
                <img src="img/slider-1.png" alt="Product">
                <div class="previews__overlay"></div>
              </a>
              <a data-fancybox="gallery" href="img/slider-1.png" class="previews__item">
                <img src="img/slider-1.png" alt="Product">
                <div class="previews__overlay"></div>
              </a>
              <a data-fancybox="gallery" href="img/slider-1.png" class="previews__item">
                <img src="img/slider-1.png" alt="Product">
                <div class="previews__overlay"></div>
              </a>
            </div>
            <div class="product__slider slick-initialized slick-slider"></div>

 
              <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['formsData']->value['sliders']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
              <div>
                <img src="http://mykombain.ru/data/img-sliders/<?php echo $_smarty_tpl->tpl_vars['item']->value['photo'];?>
" alt="Product" class="product__img">
              </div>
              <?php } ?>
            </div>


  <?php }?>




        <div class="content-info-div">
            <div class="item_form">
                <div class="photo">
                    <img src="/data/photo/<?php echo $_smarty_tpl->tpl_vars['formsData']->value['item']['photo'];?>
">
                </div>
                <div class="card">
                    <h3><?php echo $_smarty_tpl->tpl_vars['formsData']->value['item']['caption'];?>
</h3>
                    <div class="card_middle">


                        <?php if ($_smarty_tpl->tpl_vars['formsData']->value['item']['active']==1) {?>
                            <div class="price">
                                <p>ЦЕНА:</p>
                                <?php echo $_smarty_tpl->tpl_vars['formsData']->value['item']['price'];?>
Р
                            </div>
                        <?php } else { ?>
                                <div class="price">
                                    <p></p>
                                    Нет в наличии
                                </div>
                        <?php }?>


                        <div class="short_about">
                            <?php echo $_smarty_tpl->tpl_vars['formsData']->value['item']['short_about'];?>

                        </div>

                        <div class="advantages">
                            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['formsData']->value['advantages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                                <div class="tooltip" data-title="<?php echo $_smarty_tpl->tpl_vars['item']->value['caption'];?>
"><img src="/<?php echo $_smarty_tpl->tpl_vars['item']->value['photo'];?>
"></div>
                            <?php } ?>
                        </div>

                        <div class="clear"></div>
                    </div>
                    <div class="card_bottom">

                        <?php if ($_smarty_tpl->tpl_vars['formsData']->value['item']['active']==1) {?>
                            <div class="buy">
                                <?php if (strlen($_smarty_tpl->tpl_vars['formsData']->value['item']['link'])==0) {?><form method="post"><?php }?>
                                    <input type="hidden" name="id_service_item" value="<?php echo $_smarty_tpl->tpl_vars['formsData']->value['item']['id'];?>
" />

                                    <?php if (strlen($_smarty_tpl->tpl_vars['formsData']->value['item']['link'])>0) {?><a href="<?php echo $_smarty_tpl->tpl_vars['formsData']->value['item']['link'];?>
"><button class="btn_buy" onclick="location.href='<?php echo $_smarty_tpl->tpl_vars['formsData']->value['item']['link'];?>
'">Купить</button></a><?php } else { ?></form><?php }?>
                                <?php if (strlen($_smarty_tpl->tpl_vars['formsData']->value['item']['link'])==0) {?><button class="btn_buy" id="button_item">Купить</button><?php }?>
                            </div>
                        <?php }?>

                        <div class="share">
                            <p>Поделиться:</p>
                            <div class="tooltip" data-title="ВКонтакте"><a href="http://vk.com/share.php?url=http://<?php echo $_SERVER['SERVER_NAME'];?>
<?php echo $_SERVER['REQUEST_URI'];?>
" target="_blank"><img src="/data/img/vk_2.png"></a></div>
                            <div class="tooltip" data-title="Facebook"><a href="https://www.facebook.com/sharer.php?u=http://<?php echo $_SERVER['SERVER_NAME'];?>
<?php echo $_SERVER['REQUEST_URI'];?>
"  target="_blank"><img src="/data/img/fb.png"></a></div>
                            <div class="tooltip" data-title="Twitter"><a href="http://twitter.com/share?text=<?php echo $_smarty_tpl->tpl_vars['formsData']->value['item']['caption'];?>
&url=http://<?php echo $_SERVER['SERVER_NAME'];?>
<?php echo $_SERVER['REQUEST_URI'];?>
" target="_blank"><img src="/data/img/tw.png"></a></div>
                        </div>

                        <div class="clear"></div>
                    </div>
                </div>
                <div class="clear"></div>

                <?php if ($_smarty_tpl->tpl_vars['formsData']->value['notice']) {?>
                    <div class="notice">
                        <?php echo $_smarty_tpl->tpl_vars['formsData']->value['notice'];?>

                    </div>
                <?php }?>

              
                <div id="tabs" class="htabs">

                    <?php if ($_smarty_tpl->tpl_vars['formsData']->value['item']['about']&&$_smarty_tpl->tpl_vars['formsData']->value['item']['caption_about']) {?>
                        <a href="#tab-about"><?php echo $_smarty_tpl->tpl_vars['formsData']->value['item']['caption_about'];?>
</a>
                    <?php }?>

                    <?php if ($_smarty_tpl->tpl_vars['formsData']->value['item']['characteristic']&&$_smarty_tpl->tpl_vars['formsData']->value['item']['caption_characteristic']) {?>
                        <a href="#tab-characteristic"><?php echo $_smarty_tpl->tpl_vars['formsData']->value['item']['caption_characteristic'];?>
</a>
                    <?php }?>

                    <?php if ($_smarty_tpl->tpl_vars['formsData']->value['item']['review']&&$_smarty_tpl->tpl_vars['formsData']->value['item']['caption_review']) {?>
                        <a href="#tab-review"><?php echo $_smarty_tpl->tpl_vars['formsData']->value['item']['caption_review'];?>
</a>
                    <?php }?>

                    <?php if ($_smarty_tpl->tpl_vars['formsData']->value['item']['activation']&&$_smarty_tpl->tpl_vars['formsData']->value['item']['caption_activation']) {?>
                        <a href="#tab-activation"><?php echo $_smarty_tpl->tpl_vars['formsData']->value['item']['caption_activation'];?>
</a>
                    <?php }?>

                    <?php if ($_smarty_tpl->tpl_vars['formsData']->value['item']['discounts']) {?>
                        <a href="#tab-discounts">Скидки</a>
                    <?php }?>

                    <a href="#tab-feedback">Отзывы</a>
                </div>


                <?php if ($_smarty_tpl->tpl_vars['formsData']->value['item']['about']&&$_smarty_tpl->tpl_vars['formsData']->value['item']['caption_about']) {?><div id="tab-about" class="tab-content"><?php echo $_smarty_tpl->tpl_vars['formsData']->value['item']['about'];?>
</div><?php }?>
                <?php if ($_smarty_tpl->tpl_vars['formsData']->value['item']['characteristic']&&$_smarty_tpl->tpl_vars['formsData']->value['item']['caption_characteristic']) {?><div id="tab-characteristic" class="tab-content"><?php echo $_smarty_tpl->tpl_vars['formsData']->value['item']['characteristic'];?>
</div><?php }?>
                <?php if ($_smarty_tpl->tpl_vars['formsData']->value['item']['review']&&$_smarty_tpl->tpl_vars['formsData']->value['item']['caption_review']) {?><div id="tab-review" class="tab-content"><?php echo $_smarty_tpl->tpl_vars['formsData']->value['item']['review'];?>
</div><?php }?>
                <?php if ($_smarty_tpl->tpl_vars['formsData']->value['item']['activation']&&$_smarty_tpl->tpl_vars['formsData']->value['item']['caption_activation']) {?><div id="tab-activation" class="tab-content"><?php echo $_smarty_tpl->tpl_vars['formsData']->value['item']['activation'];?>
</div><?php }?>

                <?php if ($_smarty_tpl->tpl_vars['formsData']->value['item']['discounts']) {?>
                    <div id="tab-discounts" class="tab-content">
                        <?php echo $_smarty_tpl->tpl_vars['formsData']->value['discounts_text'];?>

                        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['formsData']->value['item']['discounts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                            <li><?php echo $_smarty_tpl->tpl_vars['item']->value['summa'];?>
$ - скидка <b><?php echo $_smarty_tpl->tpl_vars['item']->value['percent'];?>
%</b></li>
                        <?php } ?>
                    </div>
                <?php }?>

                <?php if ($_smarty_tpl->tpl_vars['feedback_item']->value) {?>
                    <div id="tab-feedback" class="tab-content">
                        <p>Зайдите на <a style="color: #ff0000;" href="https://www.oplata.info" title="Oplata.info" target="_blank">Oplata.info</a>, авторизуйтесь, найдите свою покупку и в поле "Ваш отзыв:" оставьте свой отзыв, после чего он появится на нашем сайте.</p>
                        <br><br>
                        <div id="cont_res">
                            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['feedback_item']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                                <div class="container-news">
                                        <a class="img-comment" style="width: auto;">
                                            <?php if ($_smarty_tpl->tpl_vars['item']->value['type']=='good') {?>
                                                <span class="feedback_good">+</span>
                                            <?php } else { ?>
                                                <span class="feedback_bad">‒</span>
                                            <?php }?>

                                        </a>
                                        <div class="text-comment" style="width: 595px">
                                            <time class="review-time"><?php echo $_smarty_tpl->tpl_vars['item']->value['date'];?>
</time>
                                            <p class="content-info-div-p"><?php echo $_smarty_tpl->tpl_vars['item']->value['info'];?>
</p>
                                            <?php if ($_smarty_tpl->tpl_vars['item']->value['comment']) {?>
                                                <div class="sub-comment">
                                                    <div class="text-sub-comment">
                                                        <p class="admin review_name">Ответ продавца</p>
                                                        <p class="content-info-div-p"><?php echo $_smarty_tpl->tpl_vars['item']->value['comment'];?>
</p>
                                                    </div>
                                                </div>
                                            <?php }?>
                                        </div>

                                </div>
                                <span class="line"> </span>
                            <?php } ?>
                            <?php if (isset($_smarty_tpl->tpl_vars['paginatorData']->value)&&$_smarty_tpl->tpl_vars['paginatorData']->value['count']>1) {?>
                                <div class="pagination">
                                    <p>Страницы:</p>
                                    <ul><?php if ($_smarty_tpl->tpl_vars['paginatorData']->value['page']>5&&$_smarty_tpl->tpl_vars['paginatorData']->value['count']>4) {?>
                                            <li class="pagination-li"><a href="javascript:void(0);" onclick="func_pagination(1, <?php echo $_smarty_tpl->tpl_vars['digiseller_id']->value;?>
);">1</a></li>
                                            <li class="pagination-li"><a href="javascript:void(0);">...</a></li>
                                        <?php }?>
                                        <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['pager'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['pager']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['name'] = 'pager';
$_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['start'] = (int) 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['paginatorData']->value['page']+4) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['step'] = 1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['start'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['start'] = max($_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['step'] > 0 ? 0 : -1, $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['loop'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['start']);
else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['start'] = min($_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['loop'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['loop']-1);
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['total']);
?>
                                            <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['pager']['index']>0&&$_smarty_tpl->getVariable('smarty')->value['section']['pager']['index']>($_smarty_tpl->tpl_vars['paginatorData']->value['page']-4)&&$_smarty_tpl->getVariable('smarty')->value['section']['pager']['index']<$_smarty_tpl->tpl_vars['paginatorData']->value['count']+1) {?>
                                                <li <?php if ($_smarty_tpl->tpl_vars['paginatorData']->value['page']==$_smarty_tpl->getVariable('smarty')->value['section']['pager']['index']) {?>class="pagination-li active"<?php }?>  class="pagination-li"><a href="javascript:void(0);" onclick="func_pagination(<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['pager']['index'];?>
, <?php echo $_smarty_tpl->tpl_vars['digiseller_id']->value;?>
);"><?php echo $_smarty_tpl->getVariable('smarty')->value['section']['pager']['index'];?>
</a></li>
                                            <?php }?>
                                        <?php endfor; endif; ?>
                                        <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['pager']['index']<$_smarty_tpl->tpl_vars['paginatorData']->value['count']&&$_smarty_tpl->tpl_vars['paginatorData']->value['count']>4) {?>
                                            <li class="pagination-li"><a href="javascript:void(0);">...</a></li>
                                            <li class="pagination-li"><a href="javascript:void(0);" onclick="func_pagination(<?php echo $_smarty_tpl->tpl_vars['paginatorData']->value['count'];?>
, <?php echo $_smarty_tpl->tpl_vars['digiseller_id']->value;?>
);"><?php echo $_smarty_tpl->tpl_vars['paginatorData']->value['count'];?>
</a></li>
                                        <?php }?>
                                    </ul>
                                </div>
                            <?php }?>
                        </div>
                    </div>
                <?php } else { ?>
                    <div id="tab-feedback" class="tab-content">
                        <div class="header-comment">
                            <a id="leave-review" class="pen a-zoloto-wow active-leave-review">
                                <span class="blue-text">Оставить отзыв</span>
                            </a>
                            <a id="collapse-review" class="pen a-zoloto-wow">
                                <span  class="blue-text">Свернуть</span>
                            </a>
                            <p class="all-comment"><strong><a <?php if ($_smarty_tpl->tpl_vars['feedback']->value['count']<8) {?> href="/content/feedback#<?php echo $_smarty_tpl->tpl_vars['feedback']->value['id'];?>
" <?php } else { ?>href="/content/feedback/page/1#<?php echo $_smarty_tpl->tpl_vars['feedback']->value['id'];?>
"<?php }?>>Все отзывы</a></strong><span>(<?php echo $_smarty_tpl->tpl_vars['feedback']->value['count'];?>
)</span></p>
                            <div class="field-form-review">
                                <h3 id="leave-a-review" class="leave_a_comment">Оставить отзыв</h3>
                                <form name="feedback" method="post" action="/content/feedback<?php if ($_smarty_tpl->tpl_vars['feedback']->value['count']>8) {?>/page/1<?php }?>">
                                    <p class="leave_a_comment-p">Ваше имя:</p>
                                    <input class="input_name" required type="text" name="name">
                                    <p class="leave_a_comment-p">Ваша эл. почта</p>
                                    <input <?php if (isset($_smarty_tpl->tpl_vars['user']->value['email'])) {?> value="<?php echo $_smarty_tpl->tpl_vars['user']->value['email'];?>
" <?php }?> class="gold_input_name" required name="email">
                                    <input type="hidden" name="game" value="<?php echo $_smarty_tpl->tpl_vars['formsData']->value['service']['gid'];?>
">

                                    <p class="leave_a_comment-p">Ваш отзыв:</p>
                                    <textarea required class="input_comment" name="comment" cols="40" rows="3"></textarea>
                                    <p class="kod">Введите символы указанные на картинке</p>
                                    <img  src = "/data/captcha/captcha.php" >
                                    <input required class="input_kod" type = "text" name = "captcha">
                                    <div class="btn-wrap">
                                        <input class="btn" type="submit" value="Оставить отзыв">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php if (isset($_smarty_tpl->tpl_vars['error']->value)) {?><p class="register-p" style="color:red"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</p><?php }?>
                        <div id="cont_res">
                            <?php if (isset($_smarty_tpl->tpl_vars['feedback_game']->value[0]['id'])) {?>
                                <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['feedback_game']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                                    <?php if ($_smarty_tpl->tpl_vars['item']->value['id']>0) {?>
                                        <div class="container-news">
                                            <a class="img-comment"><img src="/data/photo/<?php echo $_smarty_tpl->tpl_vars['gimg']->value;?>
"></a>
                                            <div class="text-comment">
                                                <p class="review_name"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</p>
                                                <time class="review-time">(<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['data'],"%d.%m.%Y \ %H:%M");?>
)</time>
                                                <p class="content-info-div-p" name="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['text_feedback'];?>
<?php if ($_smarty_tpl->tpl_vars['item']->value['is_edited']) {?><br><span>Отредактировано администратором</span><?php }?></p>
                                                <?php if ($_smarty_tpl->tpl_vars['item']->value['answer']) {?>
                                                    <div class="sub-comment">
                                                        <a class="img-sub-comment"><img src="/data/img/sack.png"></a>
                                                        <div class="text-sub-comment">
                                                            <p class="admin review_name"><?php echo $_smarty_tpl->tpl_vars['admin_name']->value;?>
</p>
                                                            <p class="content-info-div-p"><?php echo $_smarty_tpl->tpl_vars['item']->value['answer'];?>
</p>
                                                        </div>
                                                    </div>
                                                <?php }?>
                                            </div>
                                        </div>
                                        <span class="line"> </span>
                                    <?php }?>
                                <?php } ?>
                                <?php if (isset($_smarty_tpl->tpl_vars['paginatorData']->value)&&$_smarty_tpl->tpl_vars['paginatorData']->value['count']>1) {?>
                                    <div class="pagination">
                                        <p>Страницы:</p>
                                        <ul><?php if ($_smarty_tpl->tpl_vars['paginatorData']->value['page']>5&&$_smarty_tpl->tpl_vars['paginatorData']->value['count']>4) {?>
                                                <li class="pagination-li"><a href="javascript:void(0);" onclick="func_pagination(1, <?php echo $_smarty_tpl->tpl_vars['gid']->value;?>
);">1</a></li>
                                                <li class="pagination-li"><a href="javascript:void(0);">...</a></li>
                                            <?php }?>
                                            <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['pager'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['pager']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['name'] = 'pager';
$_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['start'] = (int) 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['paginatorData']->value['page']+4) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['step'] = 1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['start'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['start'] = max($_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['step'] > 0 ? 0 : -1, $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['loop'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['start']);
else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['start'] = min($_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['loop'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['loop']-1);
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['total']);
?>
                                                <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['pager']['index']>0&&$_smarty_tpl->getVariable('smarty')->value['section']['pager']['index']>($_smarty_tpl->tpl_vars['paginatorData']->value['page']-4)&&$_smarty_tpl->getVariable('smarty')->value['section']['pager']['index']<$_smarty_tpl->tpl_vars['paginatorData']->value['count']+1) {?>
                                                    <li <?php if ($_smarty_tpl->tpl_vars['paginatorData']->value['page']==$_smarty_tpl->getVariable('smarty')->value['section']['pager']['index']) {?>class="pagination-li active"<?php }?>  class="pagination-li"><a href="javascript:void(0);" onclick="func_pagination(<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['pager']['index'];?>
, <?php echo $_smarty_tpl->tpl_vars['gid']->value;?>
);"><?php echo $_smarty_tpl->getVariable('smarty')->value['section']['pager']['index'];?>
</a></li>
                                                <?php }?>
                                            <?php endfor; endif; ?>
                                            <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['pager']['index']<$_smarty_tpl->tpl_vars['paginatorData']->value['count']&&$_smarty_tpl->tpl_vars['paginatorData']->value['count']>4) {?>
                                                <li class="pagination-li"><a href="javascript:void(0);">...</a></li>
                                                <li class="pagination-li"><a href="javascript:void(0);" onclick="func_pagination(<?php echo $_smarty_tpl->tpl_vars['paginatorData']->value['count'];?>
, <?php echo $_smarty_tpl->tpl_vars['gid']->value;?>
);"><?php echo $_smarty_tpl->tpl_vars['paginatorData']->value['count'];?>
</a></li>
                                            <?php }?>
                                        </ul>
                                    </div>
                                <?php }?>
                            <?php }?>
                        </div>
                    </div>
                <?php }?>

                
                    <script type="text/javascript">
                        $('#tabs a').tabs();
                    </script>
                
            </div>
        </div>
    </article>-->
<?php }?>




<?php if ($_smarty_tpl->tpl_vars['formsMode']->value=='service_items') {?>
    <article class="content-info">
        <h2><?php echo $_smarty_tpl->tpl_vars['formsData']->value['caption'];?>
</h2>
        <div class="content-info-div filter_item">

            <!-- <form class="filters">
                <?php if ($_smarty_tpl->tpl_vars['data']->value['filter_1']['filter']) {?>
                    <div class="filter">
                        <label for="filter_1"><?php echo $_smarty_tpl->tpl_vars['data']->value['filter_1']['filter'];?>
:</label>
                        <select id="filter_1" name="filter_1">
                            <option value=""></option>
                            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value['filter_1']['filters']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</option>
                            <?php } ?>
                        </select>
                    </div>
                <?php }?>

                <?php if ($_smarty_tpl->tpl_vars['data']->value['filter_2']['filter']) {?>
                    <div class="filter">
                        <label for="filter_2"><?php echo $_smarty_tpl->tpl_vars['data']->value['filter_2']['filter'];?>
:</label>
                        <select id="filter_2" name="filter_2">
                            <option value=""></option>
                            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value['filter_2']['filters']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</option>
                            <?php } ?>
                        </select>
                    </div>
                <?php }?>

                <?php if ($_smarty_tpl->tpl_vars['data']->value['filter_3']['filter']) {?>
                    <div class="filter">
                        <label for="filter_3"><?php echo $_smarty_tpl->tpl_vars['data']->value['filter_3']['filter'];?>
:</label>
                        <select id="filter_3" name="filter_3">
                            <option value=""></option>
                            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value['filter_3']['filters']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</option>
                            <?php } ?>
                        </select>
                    </div>
                <?php }?>

                <?php if ($_smarty_tpl->tpl_vars['data']->value['filter_4']['filter']) {?>
                    <div class="filter">
                        <label for="filter_4"><?php echo $_smarty_tpl->tpl_vars['data']->value['filter_4']['filter'];?>
:</label>
                        <select id="filter_4" name="filter_4">
                            <option value=""></option>
                            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value['filter_4']['filters']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</option>
                            <?php } ?>
                        </select>
                    </div>
                <?php }?>

                <div class="filter">
                    <label for="filter_search">Поиск по названию:</label>
                    <?php if ($_smarty_tpl->tpl_vars['data']->value['search_desc']) {?><div class="tooltip" data-title="<?php echo $_smarty_tpl->tpl_vars['data']->value['search_desc'];?>
"><?php }?>
                        <input class="search-input-field" type="search" name="filter_search" id="filter_search" placeholder="Введите текст">
                        <input class="search-btn" type="submit" value="">
                    <?php if ($_smarty_tpl->tpl_vars['data']->value['search_desc']) {?></div><?php }?>
                </div> 

                <input type="hidden" id="p_get" value="<?php echo $_smarty_tpl->tpl_vars['p_get']->value;?>
">

            </form>-->
      
              
           

          

         


             

          







       
        </div>

        <section class="skillup skillup-account" id="skillup">
            <div class="container">
                <form class="filters">
              <div class="skillup__inputs lined skillup__inputs_wrap">
                
                <div class="skillup-account__inputs">


                  


                  






                <?php if ($_smarty_tpl->tpl_vars['data']->value['filter_1']['filter']) {?>
                  <div class="catalog__sort skillup-account__sort">
                    <div class="sort__text">
                        <?php echo $_smarty_tpl->tpl_vars['data']->value['filter_1']['filter'];?>

                    </div>
                  
                    <select name="filter_1" id="filter_1" class="skillup__input">
                        <option value=""></option>
                        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value['filter_1']['filters']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</option>
                        <?php } ?>
                    </select>
                  </div>
                  <?php }?>









              <?php if ($_smarty_tpl->tpl_vars['data']->value['filter_2']['filter']) {?>
                  <div class="catalog__sort skillup-account__sort">
                    <div class="sort__text">
                        <?php echo $_smarty_tpl->tpl_vars['data']->value['filter_2']['filter'];?>
:
                    </div>
                  
                    <select name="filter_2"id="filter_2" class="skillup__input">
                        <option value=""></option>
                        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value['filter_2']['filters']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</option>
                        <?php } ?>
                    </select>
                  </div>
                  <?php }?>





                  <?php if ($_smarty_tpl->tpl_vars['data']->value['filter_3']['filter']) {?>
                  <div class="catalog__sort skillup-account__sort">
                    <div class="sort__text">
                        <?php echo $_smarty_tpl->tpl_vars['data']->value['filter_3']['filter'];?>
:
                    </div>
                    <label for="#sort-fraction" class="sort__category"></label>
                    <select  name="filter_3" id="filter_3" class="skillup__input">
                        <option value=""></option>
                        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value['filter_3']['filters']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</option>
                        <?php } ?>
                    </select>
                  </div>
                  <?php }?>



             



              <?php if ($_smarty_tpl->tpl_vars['data']->value['filter_4']['filter']) {?>
                  <div class="catalog__sort skillup-account__sort">
                    <div class="sort__text">
                        <?php echo $_smarty_tpl->tpl_vars['data']->value['filter_4']['filter'];?>
:
                    </div>
                   
                    <select name="filter_4" id="filter_4" class="skillup__input">
                        <option value=""></option>
                        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value['filter_4']['filters']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</option>
                        <?php } ?>
                    </select>
                  </div>
                  <?php }?>

                  <input type="hidden" id="p_get" value="<?php echo $_smarty_tpl->tpl_vars['p_get']->value;?>
">

       
              


                </div>




          


               

                <div class="skillup__sort skillup__sort_search">
                    <div class="skillup__search-text">
                      Поиск по названию:
                    </div>
                    <?php if ($_smarty_tpl->tpl_vars['data']->value['search_desc']) {?><div class="tooltip" data-title="<?php echo $_smarty_tpl->tpl_vars['data']->value['search_desc'];?>
"><?php }?>
                        <div style="    background: rgba(53, 53, 53, 0.95);
                        display: flex;
                        border: 1px solid rgba(255, 255, 255, 0.2);
                        align-items: center;
                        border-radius: 12px;">
                    <input style="margin-bottom: 0px; background: rgba(53, 53, 53, 0);   border: 0px solid;
                    background-image: none;" type="text" name="filter_search" class="kot brown-input skillup__search" placeholder="Введите текст">
                    <input style="margin-right: 15px;" class="kott admin__logo search__logo" type="image" src="http://mykombain.ru/data/img/skill-search-icon.png">
                     </div>
                    <?php if ($_smarty_tpl->tpl_vars['data']->value['search_desc']) {?></div><?php }?>
 
                </div>



                <div class="catalog__sort skillup__sort">
                  <div class="sort__text sort__text_sort">
                    Сортировка:
                  </div>
                  <label for="#sort-category"></label>
                  <select style="    background: rgba(98, 98, 98, 0.95);
                  border: 1px solid rgba(255, 255, 255, 0.2);
                  border-radius: 12px;
                  padding: 15px;
                  margin-left: 30px;
                  color: #fff;" name="sort__category" id="sort-category1" class="skillup__input">
                    <option  class="rating rating-active sort-z" onclick="sorting('rait', $(this));" value="rait">Рейтинг</option>
                    <option  class="sort-a-z" onclick="sorting('a_z', $(this));" value="a_z">А-я</option>
                  
                  
                  </select>
                
                </div>
              </div>



        

        </form>




            


           
              <div class="skillup__wrap products">










         
      
      






















                      <?php $_smarty_tpl->tpl_vars['foo'] = new Smarty_variable(0, null, 0);?>   
		
                      <?php $_smarty_tpl->tpl_vars['test'] = new Smarty_variable($_GET['ser_item']*8, null, 0);?>
                      <?php $_smarty_tpl->tpl_vars['test1'] = new Smarty_variable($_smarty_tpl->tpl_vars['test']->value+1, null, 0);?>
                      <?php $_smarty_tpl->tpl_vars['test2'] = new Smarty_variable($_smarty_tpl->tpl_vars['test1']->value-8, null, 0);?>
              






        <?php if (isset($_smarty_tpl->tpl_vars['formsData']->value['elements'][0]['id'])) {?>

            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['formsData']->value['elements']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>


  
            <div style="display: none;"> <?php echo $_smarty_tpl->tpl_vars['foo']->value++;?>
   </div> 
            <?php if ($_smarty_tpl->tpl_vars['foo']->value<$_smarty_tpl->tpl_vars['test2']->value) {?>
              
            <?php continue 1?>
            
            
                  <?php }?>
              <?php if ($_smarty_tpl->tpl_vars['foo']->value==$_smarty_tpl->tpl_vars['test1']->value) {?>
              
        <?php break 1?>
        
        
              <?php }?>


       

            <div sort="<?php echo $_smarty_tpl->tpl_vars['item']->value['sort'];?>
" class="skillup__item games__card">
                <?php if ($_smarty_tpl->tpl_vars['item']->value['photo']) {?>
                <img style="height: 75%;" src="http://mykombain.ru/data/photo/<?php echo $_smarty_tpl->tpl_vars['item']->value['photo'];?>
" alt="Skillup" class="skillup__bg">           
            <?php } else { ?>
                <img src="http://mykombain.ru/data/img/azerty_money-foto.png">
            <?php }?>
                <div class="skillup__head">
                  <h5 class="skillup__name">
                    <?php echo $_smarty_tpl->tpl_vars['item']->value['caption'];?>

                  </h5>
                  <span class="skillup__price">
                    <?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>

                  </span>
                  <span class="skillup__cur">
                    ₽
                  </span>
                </div>
                <div class="skillup__bottom">
                  <div class="skillup__icons">
                    <div class="icons__info" data-title="Лучшие цены и способы оплаты">
                      <img src="http://mykombain.ru/data/img/skillup-like.png" alt="Like" class="skillup__img">
                    </div>
                    <div class="icons__info" data-title="Моментальная доставка">
                      <img src="http://mykombain.ru/data/img/skillup-fast.png" alt="Fast" class="skillup__img">
                    </div>
                    <div class="icons__info" data-title="Гарантия качества">
                      <img src="http://mykombain.ru/data/img/skillup-safe.png" alt="Shield" class="skillup__img">
                    </div>
                  </div>
                  <a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['seo_link'];?>
" class="btn skillup__btn">
                    Купить
                  </a>
                </div>
              </div>


             




         








                     

                           <div class="advantages" style="display: none;">
                                <?php  $_smarty_tpl->tpl_vars['advantage'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['advantage']->_loop = false;
 $_smarty_tpl->tpl_vars['key1'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['item']->value['advantages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['advantage']->key => $_smarty_tpl->tpl_vars['advantage']->value) {
$_smarty_tpl->tpl_vars['advantage']->_loop = true;
 $_smarty_tpl->tpl_vars['key1']->value = $_smarty_tpl->tpl_vars['advantage']->key;
?>
                                    <div class="tooltip" data-title="<?php echo $_smarty_tpl->tpl_vars['advantage']->value['caption'];?>
"><img src="/<?php echo $_smarty_tpl->tpl_vars['advantage']->value['photo'];?>
"></div>
                                <?php } ?>
                            </div> 

                            <div class="clear" style="display: none;"></div>
                       
             
            <?php } ?>



         


        </div>
        <div class="catalog__pages review__pages">
                  
            <?php $_smarty_tpl->tpl_vars['foo'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['foo']->step = 1;$_smarty_tpl->tpl_vars['foo']->total = (int) ceil(($_smarty_tpl->tpl_vars['foo']->step > 0 ? $_SESSION['ser_item1']+1 - (1) : 1-($_SESSION['ser_item1'])+1)/abs($_smarty_tpl->tpl_vars['foo']->step));
if ($_smarty_tpl->tpl_vars['foo']->total > 0) {
for ($_smarty_tpl->tpl_vars['foo']->value = 1, $_smarty_tpl->tpl_vars['foo']->iteration = 1;$_smarty_tpl->tpl_vars['foo']->iteration <= $_smarty_tpl->tpl_vars['foo']->total;$_smarty_tpl->tpl_vars['foo']->value += $_smarty_tpl->tpl_vars['foo']->step, $_smarty_tpl->tpl_vars['foo']->iteration++) {
$_smarty_tpl->tpl_vars['foo']->first = $_smarty_tpl->tpl_vars['foo']->iteration == 1;$_smarty_tpl->tpl_vars['foo']->last = $_smarty_tpl->tpl_vars['foo']->iteration == $_smarty_tpl->tpl_vars['foo']->total;?>
            <?php $_smarty_tpl->tpl_vars['tes'] = new Smarty_variable($_GET['ser_item']+1, null, 0);?>
            <?php $_smarty_tpl->tpl_vars['tes1'] = new Smarty_variable($_GET['ser_item']-1, null, 0);?>
    
            <?php if ($_smarty_tpl->tpl_vars['tes']->value<$_smarty_tpl->tpl_vars['foo']->value) {?>
    
            <?php break 1?>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['tes1']->value>$_smarty_tpl->tpl_vars['foo']->value) {?>
            <?php continue 1?>
        
            <?php }?>


            <a class="	<?php if ($_smarty_tpl->tpl_vars['foo']->value==$_GET['ser_item']) {?>  active__page   <?php }?>"
            style="text-decoration:none;" href=?ser_item=<?php echo $_smarty_tpl->tpl_vars['foo']->value;?>
>
                <?php echo $_smarty_tpl->tpl_vars['foo']->value;?>

                </a>
                <?php }} ?>
        </div>

    </div>
    </section>
 <!-- 
            <div class="clear"></div>
            <?php if (isset($_smarty_tpl->tpl_vars['data']->value['paginatorData'])&&$_smarty_tpl->tpl_vars['data']->value['paginatorData']['count']>1) {?>
                <div class="pagination">
                    <p>Страницы:</p>
                    <ul><?php if ($_smarty_tpl->tpl_vars['data']->value['paginatorData']['page']>5&&$_smarty_tpl->tpl_vars['data']->value['paginatorData']['count']>4) {?>
                            <li class="pagination-li"><a href="<?php echo $_smarty_tpl->tpl_vars['p_get']->value;?>
">1</a></li>
                            <li class="pagination-li"><a href="#">...</a></li>
                        <?php }?>
                        <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['pager'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['pager']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['name'] = 'pager';
$_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['start'] = (int) 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['paginatorData']['page']+4) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['step'] = 1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['start'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['start'] = max($_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['step'] > 0 ? 0 : -1, $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['loop'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['start']);
else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['start'] = min($_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['loop'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['loop']-1);
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['total']);
?>
                            <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['pager']['index']>0&&$_smarty_tpl->getVariable('smarty')->value['section']['pager']['index']>($_smarty_tpl->tpl_vars['data']->value['paginatorData']['page']-4)&&$_smarty_tpl->getVariable('smarty')->value['section']['pager']['index']<$_smarty_tpl->tpl_vars['data']->value['paginatorData']['count']+1) {?>

                                <li <?php if ($_smarty_tpl->tpl_vars['data']->value['paginatorData']['page']==$_smarty_tpl->getVariable('smarty')->value['section']['pager']['index']) {?>class="pagination-li active"<?php }?>  class="pagination-li">
                                    <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['pager']['index']==1) {?>
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['p_get']->value;?>
"><?php echo $_smarty_tpl->getVariable('smarty')->value['section']['pager']['index'];?>
</a>
                                    <?php } else { ?>
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['p_get']->value;?>
?page=<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['pager']['index'];?>
"><?php echo $_smarty_tpl->getVariable('smarty')->value['section']['pager']['index'];?>
</a>
                                    <?php }?>
                                </li>
                            <?php }?>
                        <?php endfor; endif; ?>
                        <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['pager']['index']<$_smarty_tpl->tpl_vars['data']->value['paginatorData']['count']&&$_smarty_tpl->tpl_vars['data']->value['paginatorData']['count']>4) {?>
                            <li class="pagination-li"><a href="#">...</a></li>
                            <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['pager']['index']==1) {?>
                                <li class="pagination-li"><a href="<?php echo $_smarty_tpl->tpl_vars['p_get']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['paginatorData']['count'];?>
</a></li>
                            <?php } else { ?>
                                <li class="pagination-li"><a href="<?php echo $_smarty_tpl->tpl_vars['p_get']->value;?>
?page=<?php echo $_smarty_tpl->tpl_vars['data']->value['paginatorData']['count'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['paginatorData']['count'];?>
</a></li>
                            <?php }?>
                        <?php }?>
                    </ul>
                </div>
            <?php }?>-->
   
        <?php } else { ?>
        <p style="color:white">В категории временно нет товаров</p>
        <?php }?>
 

    </article>
<?php }?>









<script>
	$("body").on("click","#button_item", function(e){
			alert(' Что бы купить этот товар свяжитесь с нами по контактным данным или через онлайн чат');
			});
</script>
<?php if ($_smarty_tpl->tpl_vars['formsMode']->value=='levelup') {?>
    <article class="content-info">
    <h2><?php echo $_smarty_tpl->tpl_vars['formsData']->value['caption'];?>
</h2>
    <div class="content-info-div">
        <form method="post">
            <p class="content-info-div-p"><?php echo $_smarty_tpl->tpl_vars['formsData']->value['about'];?>
</p>
            <input class="gold_input_name" <?php if (isset($_smarty_tpl->tpl_vars['user']->value['email'])) {?>value="<?php echo $_smarty_tpl->tpl_vars['user']->value['email'];?>
"<?php }?> name="email">
            <p class="leave_a_comment-p">Ваша эл. почта</p>
            <p class="input_information-p">Оставьте ваши контактные данные</p>
            <textarea class="input_information" name="Оставьте ваши контактные данные" cols="40" rows="3"></textarea>
            <div class="accord">
                <input id="ch1" type="checkbox" required>
                <label for="ch1">Я ознакомился с <a target="_blank" href="/content/view/3">условиями соглашения</a></label>
            </div>
            <div class="btn-wrap">
                    <button class="btn" type="submit">Отправить заявку</button>
            </div>
        </form>
    </div>
    </article>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['formsMode']->value=='text') {?>
<div class="container" style="margin-bottom: 100px;">
    <article class="content-info">
    <h2><?php echo $_smarty_tpl->tpl_vars['formsData']->value['caption'];?>
</h2>
    <div class="content-info-div">
            <p class="content-info-div-p"><?php echo $_smarty_tpl->tpl_vars['formsData']->value['about'];?>
</p>
    </div>
    </article>
</div>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['formsMode']->value=='paymentYandex') {?>
    <?php if (isset($_smarty_tpl->tpl_vars['user']->value['id'])&&$_smarty_tpl->tpl_vars['user']->value['id']==$_smarty_tpl->tpl_vars['pyandex']->value['uid']||isset($_smarty_tpl->tpl_vars['cook_order']->value)&&$_smarty_tpl->tpl_vars['cook_order']->value==$_smarty_tpl->tpl_vars['pyandex']->value['code']) {?>
    <article class="content-info">
    <h2>Оплата заказа</h2>
    <div class="container" style="margin-bottom: 100px;"> 
    <div class="content-info-div">
        
              <p class="leave_a_comment-p"><?php echo $_smarty_tpl->tpl_vars['pyandex']->value['data'];?>
</p>
        </div>
              <br>
              <div style="display: flex;
              justify-content: center;"> </div>
        <iframe frameborder="0" allowtransparency="true" scrolling="no" src="https://money.yandex.ru/embed/small.xml?account=<?php echo $_smarty_tpl->tpl_vars['account']->value;?>
&quickpay=small&yamoney-payment-type=on&button-text=02&button-size=m&button-color=orange&targets=Заказ №<?php echo $_smarty_tpl->tpl_vars['pyandex']->value['id'];?>
&default-sum=<?php echo $_smarty_tpl->tpl_vars['pyandex']->value['money'];?>
&label=<?php echo $_smarty_tpl->tpl_vars['pyandex']->value['id'];?>
" width="160" height="42"></iframe>
    </div>
    </div>
</div>
    </article>
    <?php } else { ?>
    <article class="content-info">
    <h2>404</h2>
    <p>Страница не найдена<br>
    К сожалению, если вы оказались на этой странице - что то пошло не так.<br>
    Для решения данной проблемы напишите нашим операторам и сообщите о проблеме.</p>
    </article>
    <?php }?>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['formsMode']->value=='paymentRobo') {?>
    <?php if (isset($_smarty_tpl->tpl_vars['user']->value['id'])&&$_smarty_tpl->tpl_vars['user']->value['id']==$_smarty_tpl->tpl_vars['probo']->value['uid']||isset($_smarty_tpl->tpl_vars['cook_order']->value)&&$_smarty_tpl->tpl_vars['cook_order']->value==$_smarty_tpl->tpl_vars['probo']->value['code']) {?>
    <article class="content-info">
    <h2>Оплата заказа</h2>
    <div class="container" style="margin-bottom: 100px;"> 
    <div class="content-info-div">
        <p class="leave_a_comment-p"><?php echo $_smarty_tpl->tpl_vars['probo']->value['data'];?>
</p><br>
        <div class="btn-wrap"  style="display: flex;
        justify-content: center;">
            <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
"><button class="btn" type="submit">Купить</button></a>
        </div>
    </div>
</div>
    </article>
    <?php } else { ?>
    <article class="content-info">
    <h2>404</h2>
    <p>Страница не найдена<br>
    К сожалению, если вы оказались на этой странице - что то пошло не так.<br>
    Для решения данной проблемы напишите нашим операторам и сообщите о проблеме.</p>
    </article>
    <?php }?>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['formsMode']->value=='paymentWM') {?>
    <?php if (isset($_smarty_tpl->tpl_vars['user']->value['id'])&&$_smarty_tpl->tpl_vars['user']->value['id']==$_smarty_tpl->tpl_vars['paywm']->value['uid']||isset($_smarty_tpl->tpl_vars['cook_order']->value)&&$_smarty_tpl->tpl_vars['cook_order']->value==$_smarty_tpl->tpl_vars['paywm']->value['code']) {?>
        <article class="content-info">
        <h2>Оплата заказа</h2>
        <div class="container" style="margin-bottom: 100px;"> 
        <div class="content-info-div">
            <p class="leave_a_comment-p"><?php echo $_smarty_tpl->tpl_vars['paywm']->value['data'];?>
</p><br>
            <form id=pay name=pay method="POST" action="https://merchant.webmoney.ru/lmi/payment.asp">
                <input type="hidden" name="LMI_PAYMENT_AMOUNT" value="<?php echo $_smarty_tpl->tpl_vars['paywm']->value['money'];?>
">
                <input type="hidden" name="LMI_PAYMENT_DESC_BASE64" value="<?php echo $_smarty_tpl->tpl_vars['description']->value;?>
">
                <input type="hidden" name="LMI_PAYMENT_NO" value="<?php echo $_smarty_tpl->tpl_vars['paywm']->value['id'];?>
">
                <input type="hidden" name="LMI_PAYEE_PURSE" value="<?php echo $_smarty_tpl->tpl_vars['purse']->value;?>
">
                <div class="btn-wrap"  style="display: flex;
                justify-content: center;">
                    <button class="btn" type="submit">Купить</button>
                </div>
            </form>
        </div>
    </div>
        </article>
    <?php } else { ?>
        <article class="content-info">
        <h2>404</h2>
        <p>Страница не найдена<br>
        К сожалению, если вы оказались на этой странице - что то пошло не так.<br>
        Для решения данной проблемы напишите нашим операторам и сообщите о проблеме.</p>
        </article>
    <?php }?>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['formsMode']->value=='paymentQiwi') {?>
    <?php if (isset($_smarty_tpl->tpl_vars['user']->value['id'])&&$_smarty_tpl->tpl_vars['user']->value['id']==$_smarty_tpl->tpl_vars['pqiwi']->value['uid']||isset($_smarty_tpl->tpl_vars['cook_order']->value)&&$_smarty_tpl->tpl_vars['cook_order']->value==$_smarty_tpl->tpl_vars['pqiwi']->value['code']) {?>
        <article class="content-info">
        <h2>Оплата заказа</h2>
        <div class="container" style="margin-bottom: 100px;"> 
        <div class="content-info-div">

            <p class="leave_a_comment-p"><?php echo $_smarty_tpl->tpl_vars['pqiwi']->value['data'];?>
</p><br>
            <form id="post_paym" name="post_paym" method="GET" action="https://w.qiwi.com/order/external/create.action" onsubmit="return check_form($(this));">
            <p class="leave_a_comment-p">Введите свой номер киви кошелька, вместе с кодом страны(+7,+38 и т.д.)</p>
            <input type="text" class="gold_input_name_qiwi" name="to" required>
            <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['shop_id']->value;?>
" name="from">
            <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['pqiwi']->value['money'];?>
" name="summ">
            <input type="hidden" value="Payment orders: <?php echo $_smarty_tpl->tpl_vars['pqiwi']->value['id'];?>
" name="com">
            <input type="hidden" value="1056" name="lifetime">
            <input type="hidden" value="false" name="check_agt">
            <input type="hidden" value="RUB" name="currency">
            <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['pqiwi']->value['id'];?>
" name="txn_id">
            <input type="hidden" value="http://www.azerty-money.ru/forms/qiwiSuccess" name="successUrl">
            <input type="hidden" value="http://www.azerty-money.ru/forms/qiwiFail" name="failUrl">
            <div class="btn-wrap"  style="display: flex;
            justify-content: center;">
                <input type="hidden" value=0 name="calc_type" />
                <button class="btn" type="submit">Купить</button>
            </div>
            </form>
        </div>
    </div>
        </article>
    <?php } else { ?>
        <article class="content-info">
        <h2>404</h2>
        <p>Страница не найдена<br>
        К сожалению, если вы оказались на этой странице - что то пошло не так.<br>
        Для решения данной проблемы напишите нашим операторам и сообщите о проблеме.</p>
        </article>
    <?php }?>
<?php }?>


<?php if ($_smarty_tpl->tpl_vars['formsMode']->value=='payment_unitpay') {?>
    <?php if (isset($_smarty_tpl->tpl_vars['user']->value['id'])&&$_smarty_tpl->tpl_vars['user']->value['id']==$_smarty_tpl->tpl_vars['order_data']->value['uid']||isset($_smarty_tpl->tpl_vars['cook_order']->value)&&$_smarty_tpl->tpl_vars['cook_order']->value==$_smarty_tpl->tpl_vars['order_data']->value['code']) {?>
        <article class="content-info">
        <h2>Оплата заказа</h2>
        <div class="container" style="margin-bottom: 100px;"> 
        <div class="content-info-div">
            <p class="leave_a_comment-p"><?php echo $_smarty_tpl->tpl_vars['order_data']->value['data'];?>
</p><br>
            <?php if (isset($_smarty_tpl->tpl_vars['phone_unit']->value)) {?>
            <form method="post">
                <p class="leave_a_comment-p">Введите номер телефона(только цифры, пример: 79871234567)</p>
                <input type="text" class="gold_input_name_qiwi" required name="phone_unit">
                <div class="btn-wrap">
                    <button class="btn" type="submit">Купить</button>
                </div>
            </form>
            <?php } else { ?>
            <div class="btn-wrap"  style="display: flex;
            justify-content: center;">
                <a href="<?php echo $_smarty_tpl->tpl_vars['redirect_url']->value;?>
"><button class="btn" type="submit">Купить</button></a>
            </div>
            <?php }?>
        </div>
    </div>
        </article>
    <?php } else { ?>
        <article class="content-info">
        <h2>404</h2>
        <p>Страница не найдена<br>
        К сожалению, если вы оказались на этой странице - что то пошло не так.<br>
        Для решения данной проблемы напишите нашим операторам и сообщите о проблеме.</p>
        </article>
    <?php }?>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['formsMode']->value=='order') {?>
    <?php if ($_smarty_tpl->tpl_vars['formsData']->value['type']==0) {?>
    <script>
        function calculation_price(val){
            if(val){
                var coef = <?php echo $_smarty_tpl->tpl_vars['servers']->value[0]['coef'];?>
;
                var array_coef = { 0:'0'<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['servers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>,<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
:'<?php echo $_smarty_tpl->tpl_vars['item']->value['coef'];?>
'<?php } ?>};
                coef = array_coef[val];
                var money = Number(unit_of_currency()) / coef;
                var nmoney = money.toFixed(2);
                return nmoney;
            }
            return false;
        }
        $(document).ready(function() {

            var spent = <?php echo $_smarty_tpl->tpl_vars['spentMoney']->value;?>
;
            var all_money = spent;
            var pc = 0;
            var min_price = <?php if (isset($_smarty_tpl->tpl_vars['min_price']->value)&&$_smarty_tpl->tpl_vars['min_price']->value) {?><?php echo $_smarty_tpl->tpl_vars['min_price']->value;?>
<?php } else { ?>50<?php }?>;
            var one_val = 1;
            var vv = 1;
            var symbol = '<del> P</del>';
            var symbol_end = '<img src="/data/img/rouble.png">';
          
          $(".payment__item").click(function(){
            var inp = $(".payment__item_active input").attr('value');
            $("#inp_hid").attr('value', inp);
                var cc = $(".payment__item_active input").attr('cc');
              
                if(cc && cc != 'RUR'){
                  var cc = $(".payment__item_active input").attr('cc');
                    $.ajax({
                        type: 'POST',
                        url : '/forms/currency_rate',
                        dataType:'text',
                        data: "cc=" + cc,
                        success:function(data){
                           
                 
                         
                          
                              
                                data = JSON.parse(data);
                             
                                symbol = data["symbol"];
console.log(symbol);
                                symbol_end = symbol;
                                vv = data["value"] / data["nominal"];
                                one_val = data["nominal"] / data["value"];
                                var min_text = one_val * min_price;
                                $('select[name=server]').change();
                                if(min_text){
                                    min_text = Math.round(parseFloat(min_text) * 100) / 100;
                                    $('#message_minimum').text('Минимальная сумма заказа ' + min_text + ' ' + data['symbol']);
                                    $('.bg-valut').html(data['symbol']);
                                } else {
                                    alert('Произошла ошибка при смене валюты, свяжитсь с менеджером1');
                                    $('select[name=payment]').val(1).change();
                                }
                           
                        }
                    });
                } else {
                    $('#message_minimum').text('Минимальная сумма заказа ' + min_price + ' ').append('<del> P</del>');
                    symbol = '<del> P</del>';
                    one_val = 1;
                    vv = 1;
                    $('.bg-valut').html('<img src="/data/img/rouble.png">');
                    symbol_end = '<img src="/data/img/rouble.png">';
                    $('select[name=server]').change();
                }
            });
            $('input[name=promo_code]').on('keyup paste cut', function(){
                $.ajax({
                    type: 'POST',
                    url : '/forms/promo_code',
                    dataType:'text',
                    data: 'code=' + $(this).val() + '&gid=' + <?php echo $_smarty_tpl->tpl_vars['formsData']->value['gid'];?>
,
                    success:function(data){
                        if(data) pc = Number(data); else pc = 0;
                        if($('select[name=server]').val()) $('select[name=server]').change();
                    }
                });
            });
            var coef = <?php echo $_smarty_tpl->tpl_vars['servers']->value[0]['coef'];?>
;
            $('select[name=server]').change(function ()
            {
                var discount = 0;
                <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['discounts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                    if (all_money>=<?php echo $_smarty_tpl->tpl_vars['item']->value['start'];?>
 <?php if ($_smarty_tpl->tpl_vars['item']->value['end']!='><') {?>&& all_money<<?php echo $_smarty_tpl->tpl_vars['item']->value['end'];?>
<?php }?>) { discount = <?php echo $_smarty_tpl->tpl_vars['item']->value['d'];?>
}
                <?php } ?>
                discount += pc;
                var array_coef = { 0:'0'<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['servers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>,<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
:'<?php echo $_smarty_tpl->tpl_vars['item']->value['coef'];?>
'<?php } ?>};
                coef = array_coef[$('select[name=server]').val()];

                var total = 0;
                var $row = $(this).parent();
                var n1 = parseFloat($('input[name=calc1]').val());
                var n2 = parseFloat($('input[name=calc2]').val());

                var nm = calculation_price($(this).val());
                $('p[name=sum_game]').find('span').html(' ' + (Math.round((nm * one_val) * 1000) / 1000) + ' ' + symbol);
                $('p[name=sum_game]').show();

                if ($.isNumeric(n1) || $.isNumeric(n2))
                {
                    var money = n2;
                    var valute = n2 * coef * vv;

                    valute = Math.ceil((valute * (discount / 100 + 1))*100)/100;

                    $('input[name=calc_type]').val('0');

                    $('input[name=calc1]').val(valute);
                    $('input[name=calc2]').val(money);

                    $('p[name=n_discount]').text(discount + ' %');
                    $('p[name=c_discount]').text('Ваша скидка:');

                    $('p[name=n_sum]').text(money).append('<span class="sum-valut">' + symbol_end + '</span>');
                    $('p[name=c_sum]').text('Итого к оплате:');
                }

            });

            $('input[name=calc1],input[name=calc2]').keyup(function(e) {
                var discount = 0;
                <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['discounts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                    if (all_money>=<?php echo $_smarty_tpl->tpl_vars['item']->value['start'];?>
 <?php if ($_smarty_tpl->tpl_vars['item']->value['end']!='><') {?>&& all_money<<?php echo $_smarty_tpl->tpl_vars['item']->value['end'];?>
<?php }?>) { discount = <?php echo $_smarty_tpl->tpl_vars['item']->value['d'];?>
}
                <?php } ?>
                discount += pc;
                var total = 0;
                var $row = $(this).parent();
                var n1 = parseFloat($('input[name=calc1]').val());
                var n2 = parseFloat($('input[name=calc2]').val());

                if ($.isNumeric(n1) || $.isNumeric(n2))
                {
                    if (parseFloat($(this).val()) == n2) // вводил я оплачу
                    {
                        var money = n2;
                        var valute = n2 * coef * vv;

                        valute = Math.ceil((valute * (discount / 100 + 1))*100)/100;
                        $('input[name=calc_type]').val('0');
                    }

                    if (parseFloat($(this).val()) == n1) // вводил я покупаю
                    {
                        var valute = n1;
                        var money = n1 / coef / vv;
                        //all_money = spent;

                        money = Math.round((money / (discount / 100 + 1) )*100)/100;
                        $('input[name=calc_type]').val('1');
                    }


                    $('input[name=calc1]').val(valute);
                    $('input[name=calc2]').val(money);

                    $('p[name=n_discount]').text(discount + ' %');
                    $('p[name=c_discount]').text('Ваша скидка:');

                    $('p[name=n_sum]').text(money).append('<span class="sum-valut">' + symbol_end + '</span> ');
                    $('p[name=c_sum]').text('Итого к оплате:');

                }
            });
        });


    </script>
    <?php }?>
  
    <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['formsData']->value['template'], $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


    <!--<article class="content-info">
    <h2><?php echo $_smarty_tpl->tpl_vars['formsData']->value['caption'];?>
</h2>
    <div class="content-info-div">
        <form method="post" onsubmit="return check_form($(this));">
           
               <?php echo $_smarty_tpl->tpl_vars['formsData']->value['order_info'];?>

            <p style="float:right;" >Для отображения цены выберите сервер</p>
    <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['formsData']->value['template'], $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <?php if ($_smarty_tpl->tpl_vars['formsData']->value['type']==0) {?>
    <input class="gold_input_name" name="promo_code">
    <p class="leave_a_comment-p calculator">Промокод</p>
    <?php }?>
    <div class="accord">
        <input id="ch1" type="checkbox" required>
        <label for="ch1">Я ознакомился с <a target="_blank" href="/content/view/3">условиями соглашения</a></label>
    </div>
    <div class="for_payment">
        <p class="p-for_payment" name="c_discount"></p>
        <p class="sum" name="n_discount" style="background:none"></p>
    </div>
    <div class="for_payment">
        <p class="p-for_payment" name="c_sum"></p>
        <p class="sum" name="n_sum"></p>
    </div>
    <div class="btn-wrap">
        <input type="hidden" value=0 name="calc_type" />
        <?php if ($_smarty_tpl->tpl_vars['formsData']->value['type']==0) {?>
        <input type="hidden" value="" name="manok_1" />
        <input type="hidden" value="i_got" name="manok_2" />
        <?php }?>
        <button class="btn" type="submit">Купить</button>
        </form>
    </div>
    </div>
    </article>
    <article class="content-info">
        <h2>Отзывы</h2>
        <div class="content-info-div">
            <div class="header-comment">
                <a id="leave-review" class="pen a-zoloto-wow active-leave-review">
                    <span class="blue-text">Оставить отзыв</span>
                </a>
                <a id="collapse-review" class="pen a-zoloto-wow">
                    <span  class="blue-text">Свернуть</span>
                </a>
                <p class="all-comment"><strong><a <?php if ($_smarty_tpl->tpl_vars['feedback']->value['count']<8) {?> href="/content/feedback#<?php echo $_smarty_tpl->tpl_vars['feedback']->value['id'];?>
" <?php } else { ?>href="/content/feedback/page/1#<?php echo $_smarty_tpl->tpl_vars['feedback']->value['id'];?>
"<?php }?>>Все отзывы</a></strong><span>(<?php echo $_smarty_tpl->tpl_vars['feedback']->value['count'];?>
)</span></p>
                <div class="field-form-review">
                    <h3 id="leave-a-review" class="leave_a_comment">Оставить отзыв</h3>
                    <form name="feedback" method="post" action="/content/feedback<?php if ($_smarty_tpl->tpl_vars['feedback']->value['count']>8) {?>/page/1<?php }?>">
                        <p class="leave_a_comment-p">Ваше имя:</p>
                        <input class="input_name" required type="text" name="name">
                        <p class="leave_a_comment-p">Ваша эл. почта</p>
                        <input <?php if (isset($_smarty_tpl->tpl_vars['user']->value['email'])) {?> value="<?php echo $_smarty_tpl->tpl_vars['user']->value['email'];?>
" <?php }?> class="gold_input_name" required name="email">
                        <p class="leave_a_comment-p">Выберите игру</p>
                        <select class="gold_game_selection" required name="game">
                            <?php if (isset($_smarty_tpl->tpl_vars['games']->value[0]['id'])) {?>
                            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['games']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                            <option <?php if ($_smarty_tpl->tpl_vars['gid']->value==$_smarty_tpl->tpl_vars['item']->value['id']) {?> selected <?php }?> value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['caption'];?>
</option>
                            <?php } ?>
                            <?php }?>
                        </select>
                        <p class="leave_a_comment-p">Ваш отзыв:</p>
                        <textarea required class="input_comment" name="comment" cols="40" rows="3"></textarea>
                        <p class="kod">Введите символы указанные на картинке</p>
                        <img  src = "/data/captcha/captcha.php" >
                        <input required class="input_kod" type = "text" name = "captcha">
                        <div class="btn-wrap">
                            <input class="btn" type="submit" value="Оставить отзыв">
                        </div>
                    </form>
                </div>
            </div>
            <?php if (isset($_smarty_tpl->tpl_vars['error']->value)) {?><p class="register-p" style="color:red"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</p><?php }?>
            <div id="cont_res">
                <?php if (isset($_smarty_tpl->tpl_vars['feedback_game']->value[0]['id'])) {?>
                <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['feedback_game']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                <?php if ($_smarty_tpl->tpl_vars['item']->value['id']>0) {?>
                    <div class="container-news">
                        <a class="img-comment"><img src="/data/photo/<?php echo $_smarty_tpl->tpl_vars['gimg']->value;?>
"></a>
                        <div class="text-comment">
                            <p class="review_name"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</p>
                            <time class="review-time">(<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['data'],"%d.%m.%Y \ %H:%M");?>
)</time>
                            <p class="content-info-div-p" name="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['text_feedback'];?>
<?php if ($_smarty_tpl->tpl_vars['item']->value['is_edited']) {?><br><span>Отредактировано администратором</span><?php }?></p>
                            <?php if ($_smarty_tpl->tpl_vars['item']->value['answer']) {?>
                            <div class="sub-comment">
                                <a class="img-sub-comment"><img src="/data/img/sack.png"></a>
                                <div class="text-sub-comment">
                                    <p class="admin review_name"><?php echo $_smarty_tpl->tpl_vars['admin_name']->value;?>
</p>
                                    <p class="content-info-div-p"><?php echo $_smarty_tpl->tpl_vars['item']->value['answer'];?>
</p>
                                </div>
                            </div>
                            <?php }?>
                        </div>
                    </div>
                    <span class="line"> </span>
                <?php }?>
                <?php } ?>
                <?php if (isset($_smarty_tpl->tpl_vars['paginatorData']->value)&&$_smarty_tpl->tpl_vars['paginatorData']->value['count']>1) {?>
                    <div class="pagination">
                        <p>Страницы:</p>
                        <ul><?php if ($_smarty_tpl->tpl_vars['paginatorData']->value['page']>5&&$_smarty_tpl->tpl_vars['paginatorData']->value['count']>4) {?>
                                <li class="pagination-li"><a href="javascript:void(0);" onclick="func_pagination(1, <?php echo $_smarty_tpl->tpl_vars['gid']->value;?>
);">1</a></li>
                                <li class="pagination-li"><a href="javascript:void(0);">...</a></li>
                            <?php }?>
                            <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['pager'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['pager']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['name'] = 'pager';
$_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['start'] = (int) 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['paginatorData']->value['page']+4) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['step'] = 1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['start'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['start'] = max($_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['step'] > 0 ? 0 : -1, $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['loop'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['start']);
else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['start'] = min($_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['loop'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['loop']-1);
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['pager']['total']);
?>
                                <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['pager']['index']>0&&$_smarty_tpl->getVariable('smarty')->value['section']['pager']['index']>($_smarty_tpl->tpl_vars['paginatorData']->value['page']-4)&&$_smarty_tpl->getVariable('smarty')->value['section']['pager']['index']<$_smarty_tpl->tpl_vars['paginatorData']->value['count']+1) {?>
                                    <li <?php if ($_smarty_tpl->tpl_vars['paginatorData']->value['page']==$_smarty_tpl->getVariable('smarty')->value['section']['pager']['index']) {?>class="pagination-li active"<?php }?>  class="pagination-li"><a href="javascript:void(0);" onclick="func_pagination(<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['pager']['index'];?>
, <?php echo $_smarty_tpl->tpl_vars['gid']->value;?>
);"><?php echo $_smarty_tpl->getVariable('smarty')->value['section']['pager']['index'];?>
</a></li>
                                <?php }?>
                            <?php endfor; endif; ?>
                            <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['pager']['index']<$_smarty_tpl->tpl_vars['paginatorData']->value['count']&&$_smarty_tpl->tpl_vars['paginatorData']->value['count']>4) {?>
                                <li class="pagination-li"><a href="javascript:void(0);">...</a></li>
                                <li class="pagination-li"><a href="javascript:void(0);" onclick="func_pagination(<?php echo $_smarty_tpl->tpl_vars['paginatorData']->value['count'];?>
, <?php echo $_smarty_tpl->tpl_vars['gid']->value;?>
);"><?php echo $_smarty_tpl->tpl_vars['paginatorData']->value['count'];?>
</a></li>
                            <?php }?>
                        </ul>
                    </div>
                <?php }?>
                <?php }?>
            </div>
            <p class="content-info-div-p"><?php echo $_smarty_tpl->tpl_vars['formsData']->value['about'];?>
</p>
        </div>
    </article>-->
<?php }?><?php }} ?>
