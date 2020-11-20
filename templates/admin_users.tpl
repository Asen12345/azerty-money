{if isset($loginform)}
{if isset($message)}{$message}{/if}
{literal}
<style>
    form{}   
    .form-in{width:300px;margin:0 auto;padding:20px 0;text-align:center;border:1px solid black;} 
</style>
{/literal}
<form method="post" action=""><br /><br /><br /><br /><br />
<div class="form-in">
		<label>Логин:</label>
			<input type="text" name="loginname" /><br /><br />
		<label>Пароль:</label>
			<input type="password" name="loginpassword"  /><br /><br />
			<input type="submit" value="Войти" name="submit" class="submit" />
</div>
</form>	
{/if}
