<?php /* Smarty version Smarty-3.1.18, created on 2020-06-02 11:53:23
         compiled from "templates/site_content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11537988035ebe74a23107a3-80150350%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9cf3b5535c9f50f898672851b3d45c47ad17761a' => 
    array (
      0 => 'templates/site_content.tpl',
      1 => 1591088001,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11537988035ebe74a23107a3-80150350',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5ebe74a23a74f3_93301193',
  'variables' => 
  array (
    'contentMode' => 0,
    'contentData' => 0,
    'item' => 0,
    'test' => 0,
    'test1' => 0,
    'map' => 0,
    'foo' => 0,
    'test2' => 0,
    'lastcat' => 0,
    'user' => 0,
    'games' => 0,
    'tes' => 0,
    'tes1' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ebe74a23a74f3_93301193')) {function content_5ebe74a23a74f3_93301193($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'smarty/plugins/modifier.date_format.php';
?><?php if ($_smarty_tpl->tpl_vars['contentMode']->value=='one') {?>   

<article class="content-info">
	<h2><?php echo $_smarty_tpl->tpl_vars['contentData']->value['caption'];?>
</h2>
	<div class="content-info-div">
			<?php echo $_smarty_tpl->tpl_vars['contentData']->value['content'];?>

	</div>
</article>

<?php }?>





<?php if ($_smarty_tpl->tpl_vars['contentMode']->value=='itemca') {?>   


<section class="game" id="game">
	<div class="container">
	  <div class="catalog__sort">
		<div class="sort__text">
		  Сортировка:
		</div>
		<label for="#sort-category"></label>
		<select name="sort__category" id="sort-category">
		  <option value="Popular">Популярные</option>
		  <option value="Strategy">Стратегий</option>
		  <option value="rpg">РПГ</option>
		</select>
	  </div>
	  <img src="http://mykombain.ru/data/img/faq-line.png" alt="" class="faq__line">
	  <div class="games__wrap game__wrap option__wrap">
		<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_SESSION['itemca']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
<a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['link'];?>
" class="games__card">
	<img src="http://mykombain.ru/data/img/<?php echo $_smarty_tpl->tpl_vars['item']->value['back'];?>
" alt="Game-option-bg" class="game__bg">
	<img src="http://mykombain.ru/data/img/<?php echo $_smarty_tpl->tpl_vars['item']->value['front'];?>
" alt="option-icon-1" class="game__img">
	<div class="card__overlay"><?php echo $_smarty_tpl->tpl_vars['item']->value['caption'];?>
</div>
  </a>
  <?php } ?>
  <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['contentData']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
  <a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['seo_link'];?>
" class="games__card">
	  <img src="http://mykombain.ru/data/img/<?php echo $_smarty_tpl->tpl_vars['item']->value['back'];?>
" alt="Game-option-bg" class="game__bg">
	  <img src="http://mykombain.ru/data/img/<?php echo $_smarty_tpl->tpl_vars['item']->value['front'];?>
" alt="option-icon-1" class="game__img">
	  <div class="card__overlay"><?php echo $_smarty_tpl->tpl_vars['item']->value['caption'];?>
</div>
	</a>
	<?php } ?>



</div>
</div>
</section>

<?php }?>





<?php if ($_smarty_tpl->tpl_vars['contentMode']->value=='cateus') {?>   
<section class="game" id="game">
	<div class="container">
	  <div class="catalog__sort">
		<div class="sort__text">
		  Сортировка:
		</div>
		<label for="#sort-category"></label>
		<select name="sort__category" id="sort-category">
			<option  class="rating rating-active sort-z" onclick="sorting('rait', $(this));" value="rait">Рейтинг</option>
			<option  class="sort-a-z" onclick="sorting('a_z', $(this));" value="a_z">А-я</option>
		  
		  
		  </select>
	  </div>
	  <img src="http://mykombain.ru/data/img/faq-line.png" alt="" class="faq__line">
	  <div class="games__wrap game__wrap option__wrap">
		<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_SESSION['cats']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
		<a style="margin-right: 5px; margin-left: 5px;" sort="<?php echo $_smarty_tpl->tpl_vars['item']->value['sort'];?>
" href="/itemca?itemca=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" class="games__card">
		  <img src="http://mykombain.ru/data/img/<?php echo $_smarty_tpl->tpl_vars['item']->value['back'];?>
" alt="Game-option-bg" class="game__bg">
		  <img src="http://mykombain.ru/data/img/<?php echo $_smarty_tpl->tpl_vars['item']->value['front'];?>
" alt="option-icon-1" class="game__img">
		  <div class="card__overlay"><?php echo $_smarty_tpl->tpl_vars['item']->value['caption'];?>
</div>
		</a>
		<div class="clear" style="     display: contents;
    width: 0px;
">
    
</div>
		<?php } ?>
		<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_SESSION['elem1']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
		<a style="margin-right: 5px; margin-left: 5px;"  sort="<?php echo $_smarty_tpl->tpl_vars['item']->value['sort'];?>
" href="<?php echo $_smarty_tpl->tpl_vars['item']->value['link'];?>
" class="games__card">
		  <img src="http://mykombain.ru/data/img/<?php echo $_smarty_tpl->tpl_vars['item']->value['back'];?>
" alt="Game-option-bg" class="game__bg">
		  <img src="http://mykombain.ru/data/img/<?php echo $_smarty_tpl->tpl_vars['item']->value['front'];?>
" alt="option-icon-1" class="game__img">
		  <div class="card__overlay"><?php echo $_smarty_tpl->tpl_vars['item']->value['caption'];?>
</div>
		</a>
		<div class="clear" style="  display: contents;
    width: 0px;
">
    
</div>
		<?php } ?>
	<!----	<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_SESSION['elem']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
		<a style="margin-right: 5px; margin-left: 5px;"  sort="<?php echo $_smarty_tpl->tpl_vars['item']->value['sort'];?>
" href="<?php echo $_smarty_tpl->tpl_vars['item']->value['seo_link'];?>
" class="games__card">
		  <img src="http://mykombain.ru/data/img/<?php echo $_smarty_tpl->tpl_vars['item']->value['back'];?>
" alt="Game-option-bg" class="game__bg">
		  <img src="http://mykombain.ru/data/img/<?php echo $_smarty_tpl->tpl_vars['item']->value['front'];?>
" alt="option-icon-1" class="game__img">
		  <div class="card__overlay"><?php echo $_smarty_tpl->tpl_vars['item']->value['caption'];?>
</div>
		</a>
		<div class="clear" style="  display: contents;
    width: 0px;
">
    
</div>
		<?php } ?>-->
	  </div>
	</div>
  </section>
<?php }?>





<?php if ($_smarty_tpl->tpl_vars['contentMode']->value=='gamingam') {?>


  <section class="game" id="game">
	<div class="container">
	  <div class="catalog__sort">
		<div class="sort__text">
		  Сортировка:
		</div>
		<label for="#sort-category"></label>
	
	  </div>
	  <img src="img/faq-line.png" alt="" class="faq__line">
	  <div class="games__wrap game__wrap">
		
	
	

<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_SESSION['game']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>




<a href="/cateus?cateus=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" class="games__card">
	<img style="max-width:100%; max-height: 100%;" src="data/photo/<?php echo $_smarty_tpl->tpl_vars['item']->value['photo_feedback'];?>
" alt="Wowo-circle" class="game__img">
	<div class="card__overlay"><?php echo $_smarty_tpl->tpl_vars['item']->value['caption'];?>
</div>
  </a>






<?php } ?>
</div>
</div>
</section>


<?php }?>


<?php if ($_smarty_tpl->tpl_vars['contentMode']->value=='catalog') {?>


<div class="header" id="header">
	<div class="container">
	  <div class="head-of">
		
		<h1 class="title-of">
		  Каталог игр
		</h1>
	  </div>
		</div>
  </div>
  <section class="catalog" id="catalog">
	<div class="container">
	  <div class="catalog__sort">
		<div class="sort__text">
		  Сортировка:
		</div>
		<label for="#sort-category"></label>
		<select name="sort__category" id="sort-category">
		  <option  class="rating rating-active sort-z" onclick="sorting('rait', $(this));" value="rait">Рейтинг</option>
		  <option  class="sort-a-z" onclick="sorting('a_z', $(this));" value="a_z">А-я</option>
		
		
		</select>
	  </div>






	  <img src="../data/img/faq-line.png" alt="" class="faq__line">


	  <div class="games__wrap">
		<?php $_smarty_tpl->tpl_vars['foo'] = new Smarty_variable(0, null, 0);?>   
		
		<?php $_smarty_tpl->tpl_vars['test'] = new Smarty_variable($_GET['page']*15, null, 0);?>
		<?php $_smarty_tpl->tpl_vars['test1'] = new Smarty_variable($_smarty_tpl->tpl_vars['test']->value+1, null, 0);?>
		<?php $_smarty_tpl->tpl_vars['test2'] = new Smarty_variable($_smarty_tpl->tpl_vars['test1']->value-15, null, 0);?>

	  <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['map']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
	  <?php if ($_smarty_tpl->tpl_vars['item']->value['children']==0) {?>
	<div style="display: none;"> <?php echo $_smarty_tpl->tpl_vars['foo']->value++;?>
   </div> 
	<?php if ($_smarty_tpl->tpl_vars['foo']->value<$_smarty_tpl->tpl_vars['test2']->value) {?>
	  
	<?php continue 1?>
	
	
		  <?php }?>
	  <?php if ($_smarty_tpl->tpl_vars['foo']->value==$_smarty_tpl->tpl_vars['test1']->value) {?>
	  
<?php break 1?>


	  <?php }?>
	 
		  <a sort="<?php echo $_smarty_tpl->tpl_vars['item']->value['sort'];?>
" href="<?php if ($_smarty_tpl->tpl_vars['item']->value['parent']==0) {?> /cateus?cateus=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
 <?php } else { ?>/gamingam?game=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
  <?php }?>" class="games__card">
			  <img src="/data/photo/<?php echo $_smarty_tpl->tpl_vars['item']->value['photo'];?>
" alt="Game" class="games__img">
			  <div class="card__overlay"><?php echo $_smarty_tpl->tpl_vars['item']->value['caption'];?>
 </div>			
		  </a>
		  <?php }?>
	
	  <?php } ?>
	  </div>



	  <div class="catalog__pages">
		<?php $_smarty_tpl->tpl_vars['foo'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['foo']->step = 1;$_smarty_tpl->tpl_vars['foo']->total = (int) ceil(($_smarty_tpl->tpl_vars['foo']->step > 0 ? $_SESSION['test']+1 - (1) : 1-($_SESSION['test'])+1)/abs($_smarty_tpl->tpl_vars['foo']->step));
if ($_smarty_tpl->tpl_vars['foo']->total > 0) {
for ($_smarty_tpl->tpl_vars['foo']->value = 1, $_smarty_tpl->tpl_vars['foo']->iteration = 1;$_smarty_tpl->tpl_vars['foo']->iteration <= $_smarty_tpl->tpl_vars['foo']->total;$_smarty_tpl->tpl_vars['foo']->value += $_smarty_tpl->tpl_vars['foo']->step, $_smarty_tpl->tpl_vars['foo']->iteration++) {
$_smarty_tpl->tpl_vars['foo']->first = $_smarty_tpl->tpl_vars['foo']->iteration == 1;$_smarty_tpl->tpl_vars['foo']->last = $_smarty_tpl->tpl_vars['foo']->iteration == $_smarty_tpl->tpl_vars['foo']->total;?>
	

		<a class="	<?php if ($_smarty_tpl->tpl_vars['foo']->value==$_GET['page']) {?>  active__page   <?php }?>"style="text-decoration:none;" href=http://mykombain.ru/catalogs?page=<?php echo $_smarty_tpl->tpl_vars['foo']->value;?>
>
			<?php echo $_smarty_tpl->tpl_vars['foo']->value;?>

			</a>
		
		
		 
	

			
			
			

			
		

	<?php }} ?>
	

	  </div>





	</div>
  </section>

</div>


<?php }?>












<?php if ($_smarty_tpl->tpl_vars['contentMode']->value=='faq') {?>


<div class="faq-wrapper" style="padding-bottom: 0px !important; background-image: none !important;">
	<div class="faq" id="faq">
		  <div class="container">
			<div class="head-of">
			 
			  <h1 class="title-of">
				F.A.Q.
			  </h1>
			</div>
			<img src="data/data/img/faq-line.png" alt="" class="faq__line">
			<div class="faq__body">
			   <?php $_smarty_tpl->tpl_vars["lastcat"] = new Smarty_variable('Категория с таким названием никогда не будет существовать', null, 0);?>
			<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['contentData']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
			<?php if ($_smarty_tpl->tpl_vars['item']->value['category']!=$_smarty_tpl->tpl_vars['lastcat']->value) {?>
			
			  <div class="faq__item">
				<div class="faq__type">
				  <h2 class="faq__type_text name-of">
					<?php echo $_smarty_tpl->tpl_vars['item']->value['category'];?>

				  </h2>
				</div>
				<?php }?>
				<div class="faq__questions">
					<div class="faq__question">
					<?php echo $_smarty_tpl->tpl_vars['item']->value['question'];?>

					<div class="faq__answer">
						<?php echo $_smarty_tpl->tpl_vars['item']->value['answer'];?>

					  </div>
					</div>
					
				</div>
				<?php $_smarty_tpl->tpl_vars["lastcat"] = new Smarty_variable($_smarty_tpl->tpl_vars['item']->value['category'], null, 0);?>
					<?php if ($_smarty_tpl->tpl_vars['item']->value['category']!=$_smarty_tpl->tpl_vars['lastcat']->value) {?>
			</div>
			
			<?php }?>
			<?php } ?>
		  </div>
		</div>
	</div>
	</div>
</div>


<?php }?>









<?php if ($_smarty_tpl->tpl_vars['contentMode']->value=='feedback') {?>  






<div class="container">
<div class="head-of">
	
	<h1 class="title-of">
	  Наши отзывы
	</h1>
  </div>
</div>



  <section class="reviews-wrap" id="reviews-wrap">
	<img src="http://mykombain.ru/data/img/review-please.png" alt="Review" class="reviews__please">
	<div class="container">
	  <div class="reviews__form">
		<h2 class="name-of payment__form_title">
		  Отправьте
		  нам сообщение
		</h2>
		<form name="feedback" method="post" class="modal-form reviews-form lined">
		  <label for="reviews__input_name">Ваше имя</label>
		  <input type="text" name="name" class="brown-input reviews-input" id="modal__input_name" required="">
		  <label for="reviews__input_mail">Ваша эл. почта</label>
		  <input type="text" name="email" <?php if (isset($_smarty_tpl->tpl_vars['user']->value['email'])) {?>value="<?php echo $_smarty_tpl->tpl_vars['user']->value['email'];?>
"<?php }?> class="brown-input reviews-input" id="modal__input_mail">
		  <label for="#reviews_input_select">Выберите игру</label>
		  <select name="game" id="reviews_input_select" class="brown-input reviews-input">
				<?php if (isset($_smarty_tpl->tpl_vars['games']->value[0]['id'])) {?>
				<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['games']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
				<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['caption'];?>
</option>
				<?php } ?>
				<?php }?>
			</select>
		  <label for="reviews__input_text">Оставьте свой отзыв здесь</label>
		  <textarea name="comment" class="brown-input reviews-input" id="reviews_input_text" required=""></textarea>
		  <div class="g-recaptcha" data-sitekey="6Le4JP8UAAAAAGWa0UWmomWAfknFCLaXM1sPAX8Q"></div>	
		  <div class="reviews__footer">
			<button type="submit" class="btn reviews__btn">
			  Отправить
			</button>
		  </div>
		</form>
	  </div>
	  <div class="reviews__reviews reviews">
		<h2 class="name-of reviews-name">
		  Отзывы <span style=" font-size: 26px;   font-family: 'Montserrat', sans-serif;"><?php echo $_SESSION['feed_cou'];?>
</span> 
		</h2>




	
	
	
	 
		
		  <?php $_smarty_tpl->tpl_vars['foo'] = new Smarty_variable(0, null, 0);?>   
		
		  <?php $_smarty_tpl->tpl_vars['test'] = new Smarty_variable($_GET['page1']*15, null, 0);?>
		  <?php $_smarty_tpl->tpl_vars['test1'] = new Smarty_variable($_smarty_tpl->tpl_vars['test']->value+1, null, 0);?>
		  <?php $_smarty_tpl->tpl_vars['test2'] = new Smarty_variable($_smarty_tpl->tpl_vars['test1']->value-15, null, 0);?>
  
	  
		
		<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['contentData']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
		  <img src="http://mykombain.ru/data/photo/<?php echo $_smarty_tpl->tpl_vars['item']->value['gimg'];?>
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
			<div style="word-break: break-word;" class="reviews__text" name="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
				<?php echo $_smarty_tpl->tpl_vars['item']->value['text_feedback'];?>

			</div>
			<?php if ($_smarty_tpl->tpl_vars['item']->value['answer']) {?>
			<div class="reviews__admin">
			  <img src="http://mykombain.ru/data/img/admin-icon.png" alt="admin" class="reviews__admin-img">
			  <div class="reviews__admin-side">
				<div class="reviews__admin-name">
				  Администратор Azerty Money
				</div>
				<div style="word-break: break-word;" class="reviews__admin-text">
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
			
			<?php $_smarty_tpl->tpl_vars['foo'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['foo']->step = 1;$_smarty_tpl->tpl_vars['foo']->total = (int) ceil(($_smarty_tpl->tpl_vars['foo']->step > 0 ? $_SESSION['test1']+1 - (1) : 1-($_SESSION['test1'])+1)/abs($_smarty_tpl->tpl_vars['foo']->step));
if ($_smarty_tpl->tpl_vars['foo']->total > 0) {
for ($_smarty_tpl->tpl_vars['foo']->value = 1, $_smarty_tpl->tpl_vars['foo']->iteration = 1;$_smarty_tpl->tpl_vars['foo']->iteration <= $_smarty_tpl->tpl_vars['foo']->total;$_smarty_tpl->tpl_vars['foo']->value += $_smarty_tpl->tpl_vars['foo']->step, $_smarty_tpl->tpl_vars['foo']->iteration++) {
$_smarty_tpl->tpl_vars['foo']->first = $_smarty_tpl->tpl_vars['foo']->iteration == 1;$_smarty_tpl->tpl_vars['foo']->last = $_smarty_tpl->tpl_vars['foo']->iteration == $_smarty_tpl->tpl_vars['foo']->total;?>
			<?php $_smarty_tpl->tpl_vars['tes'] = new Smarty_variable($_GET['page1']+1, null, 0);?>
			<?php $_smarty_tpl->tpl_vars['tes1'] = new Smarty_variable($_GET['page1']-1, null, 0);?>
	
			<?php if ($_smarty_tpl->tpl_vars['tes']->value<$_smarty_tpl->tpl_vars['foo']->value) {?>
	
			<?php break 1?>
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['tes1']->value>$_smarty_tpl->tpl_vars['foo']->value) {?>
			<?php continue 1?>
		
			<?php }?>


			<a class="	<?php if ($_smarty_tpl->tpl_vars['foo']->value==$_GET['page']) {?>  active__page   <?php }?>"
			style="text-decoration:none;" href=http://mykombain.ru/content/feedback?page1=<?php echo $_smarty_tpl->tpl_vars['foo']->value;?>
>
				<?php echo $_smarty_tpl->tpl_vars['foo']->value;?>

				</a>
				<?php }} ?>
</div>


	  </div>
	</div>
  </section>

<?php }?>

<?php if ($_smarty_tpl->tpl_vars['contentMode']->value=='search') {?>
<article class="content-info">
<?php if ($_smarty_tpl->tpl_vars['contentData']->value) {?>
    <h2>Результаты:</h2>
        <div class="content-info-div">
		<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['contentData']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
			<a class="link" href="<?php echo $_smarty_tpl->tpl_vars['item']->value['link'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['caption'];?>
</a>
		<?php } ?>
		</div>
<?php } else { ?>
    <h2>Результатов нет</h2>
<?php }?>
</article>
<?php }?><?php }} ?>
