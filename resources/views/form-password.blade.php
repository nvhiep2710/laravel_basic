<h1>Reset password</h1>
<form action="{{URL('api/reset')}}" method="post">
	
	<div>
		<input type="hidden" name="token" value="<?php echo $_GET['token'];?>">
		<label>Password</label>
		<input name="password" type="password">
	</div>
	<div>
		<label>Password_confirmation</label>
		<input name="password_confirmation" type="password">
	</div>
	<button type="submit">Resset password</button>
</form>