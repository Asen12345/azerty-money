
<div class="sort">
	<div class="sort-wrap">
		<small>Сортировать:</small>
		<!--сотировка от а до я у блока sort-a-z дополнительный класс sort-a,
		сотировка от я до а у блока sort-a-z дополнительный класс sort-z-->
		<a class="sort-a-z" onclick="sorting('a_z', $(this));"><span>А-я</span></a>
		<a class="rating rating-active sort-z" onclick="sorting('rait', $(this));"><span>рейтинг</span></a>
	</div>
</div>
<ul class="sidebar-ul">
	{foreach key=key item=item from=$map}
	<div sort="{$item.sort}" class="sidebar-li">
        <a href="{$item.link}">
            <div {if $fullPath == "{$item.link|replace:'/':''}"} class="dedicated sidebar-li" {else} class="sidebar-li" {/if}class="sidebar-li">
                {$item.caption}
            </div>
        </a>
	</div>
    {/foreach}
</ul>