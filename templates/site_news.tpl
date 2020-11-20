<!-- MAKE SWITCH CONSTRUCT -->
{if isset($newsMode)}
{if $newsMode=='one'}
	{if isset($newsData)}
	<div class="container" style="margin-bottom: 100px; display: flex; justify-content: center;">
    <article class="content-info">
        <div class="content-info-div">
			<time class="content-info-div-time">{$newsData.data|date_format:"%d-%m-%Y"}</time>
			<h6>{$newsData.caption}</h6>
			{if $newsData.photo}
				<img class="new-img" src="/data/img/news/{$newsData.photo}">
			{/if}
			<p class="content-info-div-p">{$newsData.ntext}</p>
			<span class="news-span">
                <a {if $news|@count < 6} href="/news/all"{else} href="/news/all/page/1"{/if} class="news-a">Вернуться в раздел «Все новости»</a>
            </span>
		</div>
	</article>
</div>
	{/if}

{/if}

{if $newsMode=='all'} 
{if isset($newsData.0.id)}
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
{foreach key=key item=item from=$newsData}
{if $item.id>0}
            <div class="container-news">
			{if $item.photo}
				<a href="/news/view/{$item.id}"><img class="all_news-img" src="/data/img/news/{$item.photo}"></a>
			{else}
				<a href="/news/view/{$item.id}"><img class="all_news-img" src="/data/img/azerty_money-foto.png"></a>
			{/if}
				<div class="container-news-div">
					<time class="content-info-div-time">{$item.data|date_format:"%d-%m-%Y"}</time>
					<a class="all_news-a" name="{$item.id}" href="/news/view/{$item.id}">{$item.caption}</a>
					<p class="content-info-div-p" name="{$item.id}">{$item.preview|strip_tags}</p>
				</div>
            </div>
            <span class="line"> </span>
{/if}
{/foreach}
	
			</div>
	</article>
	</div>
{else}
<h2>Новостей нет.</h2>
{/if}
{/if}

{/if}