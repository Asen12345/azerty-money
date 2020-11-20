{if isset($menuMode)}
{if $menuMode=='generate'}
{literal}
		<style type="text/css">
		#dhtmlgoodies_tree
		{
			margin:20px 0px 0px 10px;	
			width: 500px;
			float:left;
		}
		
		#dhtmlgoodies_tree li{
			list-style-type:none;
			font-family: arial;
			font-size:11px;
		}
		#dhtmlgoodies_topNodes{
			margin-left:0px;
			padding-left:0px;
			margin-top:-10px;
		}
		#dhtmlgoodies_topNodes ul{
			margin-left:20px;
			padding-left:0px;
		}
		#dhtmlgoodies_tree .tree_link{
			line-height:13px;
			padding-left:2px;

		}
		#dhtmlgoodies_tree img{
			padding-top:2px;
		}
		#dhtmlgoodies_tree a{
			color: #000000;
			text-decoration:none;
		}
		.activeNodeLink{
			background-color: #316AC5;
			color: #FFFFFF;
			font-weight:bold;
		}
		
		#noUsePages {
			float:left;
			width:200px;
			margin-top:20px;
		}
		
		#noUsePages ul {
			list-style:none;
		}
		
		#noUsePages ul li {
			margin-top:5px;
			margin-left:-41px;
			
		}
		</style>
{/literal}

{if isset($activeMap.0.id)}
		<div id="dhtmlgoodies_tree">
<b>Активное меню</b><br /><br />
{foreach key=key item=itemLevel0 from=$activeMap}
		<ul id="dhtmlgoodies_topNodes">
		<li class="tree_node">
{if $itemLevel0.link!=''}
		<img src="/data/admin_images/document.gif">
{else}
		<img src="/data/admin_images/folder.gif">
{/if}
		<a class="tree_link"{if $itemLevel0.active==0} style="color:gray;"{/if}>{$itemLevel0.caption|truncate:30} <a href="/admin/menu/changeVisible/{$itemLevel0.id}"><img src="/data/admin_images/visible.png" /></a><a href="/admin/menu/elementUp/{$itemLevel0.id}"><img src="/data/admin_images/arrow_up.png" /></a><a href="/admin/menu/elementDown/{$itemLevel0.id}"><img src="/data/admin_images/arrow_down.png" /></a><div style="width:30px; display:inline;"><form action="/admin/menu/changeParent" style="display:inline;" method="post"><input type="hidden" name="map_id" value="{$itemLevel0.id}" /><select name="map_changeparent" style="width:16px; margin-top:-8px; height:16px;" onChange="this.form.submit()"><option selected>---</option>{foreach key=key item=item from=$mapWithoutLevels}{if $item.id!=$itemLevel0.id}<option value="{$item.id}">{$item.caption}</option>{/if}{/foreach}</select></form></div><a href="/admin/menu/removeMenu/{$itemLevel0.id}"><img src="/data/admin_images/re.png" /></a></a>
{if isset($itemLevel0.a.0.id)}
   <ul>{include file="admin_menu_recursion.tpl" element=$itemLevel0.a}</ul>
{/if}

</li></ul>
{/foreach}
</div>
{/if}

{if $unusedPages.0.id}
<div id="noUsePages">
<b>Неиспользуемые элементы</b>
<ul>
{foreach key=key item=item from=$unusedPages}
<li>
<img src="/data/admin_images/document.gif">
<span>{$item.caption|truncate:40}<div style="width:30px; display:inline;"><form action="/admin/menu/changeParentUnused" style="display:inline;" method="post"><input type="hidden" name="map_link" value="{$item.link}" /><input type="hidden" name="map_caption" value="{$item.caption}" /><select name="map_changeparent" style="width:16px; margin-top:-8px; height:16px;" onChange="this.form.submit()"><option selected>---</option>{foreach key=key item=item from=$mapWithoutLevels}<option value="{$item.id}">{$item.caption}</option>{/foreach}</select></form></div></span>
</li>
{/foreach}
</ul>
</div>
{/if}

<div style="margin-top:50px; float:left; width:200px;">
<form method="post" action="/admin/menu/addToMenu">
<b>Добавить в меню</b><br />
<span>Заголовок</span><br />
<input type="text" name="menu_caption" /><br />
<span>URL <sup>оставьте пустым, если создаете папку</sup> </span>
<input name="menu_url" >
<br />
<input type="submit" value="Добавить" />
</form>
</div>

{/if}
{/if}
