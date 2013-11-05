<?php if($user): ?>
	<h2>Hello, <?=$user->first_name;?>!</h2>
	

<?php else: ?>
	<br/>
	<h1>Welcome to Tweeter!</h1>
	<br/>
	<div class="boxleft">
		<h2>Please <a href="/users/signup">Sign Up</a></h2>
		<br/>
		<br/>
		<br/>
			<form method='POST' action='/users/p_signup'>
				
				First Name <input type='text' name='first_name'><br/>
				Last Name <input type='text' name='last_name'><br/>
				Email <input type='text' name='email'><br/>
				Password <input type='password' name='password'><br/>
				<input type='submit' value='Sign Up'>
		    
			</form>
	</div>
	<div class="boxright">
		<h2>or <a href="/users/login">Login</a></h2>
		<br/>
		<br/>
		<br/>
		
			<form method='POST' action='/users/p_login'>
				
				Email<input type='text' name='email'><br/>
			    
				Password<input type='password' name='password'><br/>
			    
				<input type='submit' value='Log in'>
		    
		         </form>
	</div>

	<div class="footer">
		<h3>+1 Features:</h3>
		<p>The user has the ability to <em>edit</em> their own posts.</p>
		<p>The user has the ability to <em>delete</em> their own posts.</p>
	</div>
	
<?php endif; ?>
