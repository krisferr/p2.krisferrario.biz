<!DOCTYPE html>
<html>
<head>
	<title><?php if(isset($title)) echo $title; ?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	
					
	<!-- Controller Specific JS/CSS -->
	<link rel="stylesheet" href="/css/sample-app.css" type="text/css">
	<?php if(isset($client_files_head)) echo $client_files_head; ?>
	
</head>

<body>	
	<nav>
		<menu>
			<?php if($user): ?>
				<li><a href="/posts/add">Tweet it</a></li>
				<li><a href="/posts/"> See Tweets</a></li>
				<li><a href="/posts/users"> Follow Tweeter</a></li>
				<li><a href="/users/logout"> Get Out of Here</a></li>
			<?php else: ?>
				<li><a href="/users/signup">Sign Up</a></li>
				<li><a href="/users/login">Login</a></li>
			<?php endif; ?>
			
			
		</menu>
	</nav>
	<?php if(isset($content)) echo $content; ?>

	<?php if(isset($client_files_body)) echo $client_files_body; ?>
</body>
</html>