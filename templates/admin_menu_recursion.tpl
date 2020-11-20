{foreach from=$element item=element} 
   {if $element.a.0.id}
		<li class="tree_node">
		<img src="/img/folder.gif">
		<span class="tree_link" href="#"{if $element.active==0} title="{$element.link}" style="color:gray;"{/if}>{$element.caption|truncate:60} <a href="/admin/menu/changeVisible/{$element.id}"><img src="/img/visible.png" /></a><a href="/admin/menu/elementUp/{$element.id}"><img src="/img/arrow_up.png" /></a><a href="/admin/menu/elementDown/{$element.id}"><img src="/img/arrow_down.png" /></a><div style="width:30px; display:inline;"><form action="/admin/menu/changeParent" style="display:inline;" method="post"><input type="hidden" name="map_id" value="{$element.id}" /><select name="map_changeparent" style="width:16px; margin-top:-8px; height:16px;" onChange="this.form.submit()"><option selected>---</option><option value=0>Без папки</option>{foreach key=key item=item from=$mapWithoutLevels}{if $item.id!=$element.id}<option value="{$item.id}">{$item.caption}</option>{/if}{/foreach}</select></form></div><a href="/admin/menu/removeMenu/{$element.id}"><img src="/img/re.png" /></a></span>
		<ul>
{include file="admin_menu_recursion.tpl" element=$element.a}
		</ul>
		</li>
   {else}
		<li class="tree_node">
{if strpos($element.link, 'file') == false}
			<img src="/img/document.gif">
{else}
			<img src="/img/file.gif">
{/if}
			<span class="tree_link" href="#"{if $element.active==0} title="{$element.link}" style="color:gray;"{/if}>{$element.caption|truncate:50}{if $element.ename!='news'} <a href="/admin/menu/changeVisible/{$element.id}"><img src="/img/visible.png" /></a><a href="/admin/menu/elementUp/{$element.id}"><img src="/img/arrow_up.png" /></a><a href="/admin/menu/elementDown/{$element.id}"><img src="/img/arrow_down.png" /></a><div style="width:30px; display:inline;"><form action="/admin/menu/changeParent" style="display:inline;" method="post"><input type="hidden" name="map_id" value="{$element.id}" /><select name="map_changeparent" style="width:16px; margin-top:-8px; height:16px;" onChange="this.form.submit()"><option selected>---</option><option value=0>Без папки</option>{foreach key=key item=item from=$mapWithoutLevels}{if $item.id!=$element.id}<option value="{$item.id}">{$item.caption}</option>{/if}{/foreach}</select></form></div><a href="/admin/menu/removeMenu/{$element.id}"><img src="/img/re.png" /></a>{/if}</span>
		</li>
   {/if}
{/foreach}