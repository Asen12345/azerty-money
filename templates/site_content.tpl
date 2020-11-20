{if $contentMode=='one'}   

<article class="content-info">
	<h2>{$contentData.caption}</h2>
	<div class="content-info-div">
			{$contentData.content}
	</div>
</article>

{/if}





{if $contentMode=='result'}   
<div><div class="gcse-searchresults"></div></div>


{/if}






{if $contentMode=='itemca'}   


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
	  <img src="https://azerty-money.ru/data/img/faq-line.png" alt="" class="faq__line">
	  <div class="games__wrap game__wrap option__wrap">
		{foreach key=key item=item from=$smarty.session.itemca}
<a href="{$item.link}" class="games__card">
	<img src="https://azerty-money.ru/data/img/{$item.back}" alt="Game-option-bg" class="game__bg">
	<img src="https://azerty-money.ru/data/img/{$item.front}" alt="option-icon-1" class="game__img">
	<div class="card__overlay">{$item.caption}</div>
  </a>
  {/foreach}
  {foreach key=key item=item from=$contentData}
  <a href="{$item.seo_link}" class="games__card">
	  <img src="https://azerty-money.ru/data/img/{$item.back}" alt="Game-option-bg" class="game__bg">
	  <img src="https://azerty-money.ru/data/img/{$item.front}" alt="option-icon-1" class="game__img">
	  <div class="card__overlay">{$item.caption}</div>
	</a>
	{/foreach}



</div>
</div>
</section>

{/if}





{if $contentMode=='cateus'}   
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
	  <img src="https://azerty-money.ru/data/img/faq-line.png" alt="" class="faq__line">
	  <div class="games__wrap game__wrap option__wrap">
		{foreach key=key item=item from=$smarty.session.cats}
		<a style="margin-right: 5px; margin-left: 5px;" sort="{$item.sort}" href="/itemca?itemca={$item.id}" class="games__card">
		  <img src="https://azerty-money.ru/data/img/{$item.back}" alt="Game-option-bg" class="game__bg">
		  <img src="https://azerty-money.ru/data/img/{$item.front}" alt="option-icon-1" class="game__img">
		  <div class="card__overlay">{$item.caption}</div>
		</a>
		<div class="clear" style="     display: contents;
    width: 0px;
">
    
</div>
		{/foreach}
		{foreach key=key item=item from=$smarty.session.elem1}
		<a style="margin-right: 5px; margin-left: 5px;"  sort="{$item.sort}" href="{$item.link}" class="games__card">
		  <img src="https://azerty-money.ru/data/img/{$item.back}" alt="Game-option-bg" class="game__bg">
		  <img src="https://azerty-money.ru/data/img/{$item.front}" alt="option-icon-1" class="game__img">
		  <div class="card__overlay">{$item.caption}</div>
		</a>
		<div class="clear" style="  display: contents;
    width: 0px;
">
    
</div>
		{/foreach}
	<!----	{foreach key=key item=item from=$smarty.session.elem}
		<a style="margin-right: 5px; margin-left: 5px;"  sort="{$item.sort}" href="{$item.seo_link}" class="games__card">
		  <img src="https://azerty-money.ru/data/img/{$item.back}" alt="Game-option-bg" class="game__bg">
		  <img src="https://azerty-money.ru/data/img/{$item.front}" alt="option-icon-1" class="game__img">
		  <div class="card__overlay">{$item.caption}</div>
		</a>
		<div class="clear" style="  display: contents;
    width: 0px;
">
    
</div>
		{/foreach}-->
	  </div>
	</div>
  </section>
{/if}





{if $contentMode == 'gamingam'}


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
		
	
	

{foreach key=key item=item from=$smarty.session.game}




<a href="/cateus?cateus={$item.id}" class="games__card">
	<img style="max-width:100%; max-height: 100%;" src="data/photo/{$item.photo_feedback}" alt="Wowo-circle" class="game__img">
	<div class="card__overlay">{$item.caption}</div>
  </a>






{/foreach}
</div>
</div>
</section>


{/if}


{if $contentMode=='catalog'}


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
		{$foo = 0}   
		
		{$test = $smarty.get.page * 15}
		{$test1 = $test + 1}
		{$test2 = $test1 - 15}

	  {foreach key=key item=item from=$map}
	  {if $item.children == 0 }
	<div style="display: none;"> {$foo++}   </div> 
	{if $foo < $test2 }
	  
	{continue}
	
	
		  {/if}
	  {if $foo == $test1 }
	  
{break}


	  {/if}
	 
		  <a sort="{$item.sort}" href="{if $item.parent == 0} /cateus?cateus={$item.id} {else}/gamingam?game={$item.id}  {/if}" class="games__card">
			  <img src="/data/photo/{$item.photo}" alt="Game" class="games__img">
			  <div class="card__overlay">{$item.caption} </div>			
		  </a>
		  {/if}
	
	  {/foreach}
	  </div>



	  <div class="catalog__pages">
		{for $foo=1 to $smarty.session.test}
	

		<a class="	{if $foo == $smarty.get.page }  active__page   {/if}"style="text-decoration:none;" href=https://azerty-money.ru/catalogs?page={$foo}>
			{$foo}
			</a>
		
		
		 
	

			
			
			

			
		

	{/for}
	

	  </div>





	</div>
  </section>

</div>


{/if}












{if $contentMode=='faq'}


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
			   {assign var="lastcat" value='Категория с таким названием никогда не будет существовать'}
			{foreach key=key item=item from=$contentData}
			{if $item.category != $lastcat}
			
			  <div class="faq__item">
				<div class="faq__type">
				  <h2 class="faq__type_text name-of">
					{$item.category}
				  </h2>
				</div>
				{/if}
				<div class="faq__questions">
					<div class="faq__question">
					{$item.question}
					<div class="faq__answer">
						{$item.answer}
					  </div>
					</div>
					
				</div>
				{assign var="lastcat" value=$item.category}
					{if $item.category != $lastcat}
			</div>
			
			{/if}
			{/foreach}
		  </div>
		</div>
	</div>
	</div>
</div>


{/if}









{if $contentMode=='feedback'}  






<div class="container">
<div class="head-of">
	
	<h1 class="title-of">
	  Наши отзывы
	</h1>
  </div>
</div>



  <section class="reviews-wrap" id="reviews-wrap">
	<img src="https://azerty-money.ru/data/img/review-please.png" alt="Review" class="reviews__please">
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
		  <input type="text" name="email" {if isset($user.email)}value="{$user.email}"{/if} class="brown-input reviews-input" id="modal__input_mail">
		  <label for="#reviews_input_select">Выберите игру</label>
		  <select name="game" id="reviews_input_select" class="brown-input reviews-input">
				{if isset($games.0.id)}
				{foreach key=key item=item from=$games}
				<option value="{$item.id}">{$item.caption}</option>
				{/foreach}
				{/if}
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
		  Отзывы <span style=" font-size: 26px;   font-family: 'Montserrat', sans-serif;">{$smarty.session.feed_cou}</span> 
		</h2>




	
	
	
	 
		
		  {$foo = 0}   
		
		  {$test = $smarty.get.page1 * 15}
		  {$test1 = $test + 1}
		  {$test2 = $test1 - 15}
  
	  
		
		{foreach key=key item=item from=$contentData}
		{if $item.id>0}
		<div style="display: none;"> {$foo++}   </div> 
	{if $foo < $test2 }
	  
	{continue}
	
	
		  {/if}
	  {if $foo == $test1 }
	  
{break}


	  {/if}
		<div class="reviews__item pay-line">
		  <img src="https://azerty-money.ru/data/photo/{$item.gimg}" alt="Person" class="reviews__img">
		  <div class="reviews__content">
			<div class="reviews__head">
			  <h5 class="reviews__name">
				{$item.name}
			  </h5>
			  <div class="reviews__date">
				<time class="review-time">({$item.data|date_format:"%d.%m.%Y \ %H:%M"})</time>
			  </div>
			</div>
			<div style="word-break: break-word;" class="reviews__text" name="{$item.id}">
				{$item.text_feedback}
			</div>
			{if $item.answer}
			<div class="reviews__admin">
			  <img src="https://azerty-money.ru/data/img/admin-icon.png" alt="admin" class="reviews__admin-img">
			  <div class="reviews__admin-side">
				<div class="reviews__admin-name">
				  Администратор Azerty Money
				</div>
				<div style="word-break: break-word;" class="reviews__admin-text">
					{$item.answer}
				</div>
			  </div>
			</div>

			{/if}


		  </div>
		</div>
		{/if}
		{/foreach}









		{if $smarty.session.feed_c > 1}

        <div class="catalog__pages review__pages">

       {if $smarty.get.page1 > 2}
          <a
          style="text-decoration:none;" href=?page1=1>
     
        1
            </a>

        

          <a
          style="text-decoration:none;" href="#">
       ...
            </a>
            {/if}
          {for $foo=1 to $smarty.session.test1}
          {$tes = $smarty.get.page1 + 1}
          {$tes1 = $smarty.get.page1 - 1}
      
          {if $tes < $foo }
      
          {break}
          {/if}
          {if $tes1 > $foo }
          {continue}
        
          {/if}

      
    
    
          <a class="	{if $foo == $smarty.get.page1 }  active__page   {/if}"
          style="text-decoration:none;" href=?page1={$foo}>
            {$foo}
            </a>
            {/for}

            {if $smarty.get.page1 < $smarty.session.feed_c - 2}

            <a
            style="text-decoration:none;">
           
          
               ...
         
      
           
              </a>



            <a
            style="text-decoration:none;" href=?page1={$smarty.session.feed_c}>
           
          
                <p>{$smarty.session.feed_c}</p>
         
      
           
              </a>


              {/if}
          </div>


{/if}































	  </div>
	</div>
  </section>

{/if}

{if $contentMode=='search'}
<article class="content-info">
{if $contentData}
    <h2>Результаты:</h2>
        <div class="content-info-div">
		{foreach key=key item=item from=$contentData}
			<a class="link" href="{$item.link}">{$item.caption}</a>
		{/foreach}
		</div>
{else}
    <h2>Результатов нет</h2>
{/if}
</article>
{/if}