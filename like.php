<?php

if (empty($_POST['id'])) {
	header("Location: /");
	exit();
}

require_once("config/bootstrap.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Retweetr by joe</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
</head>
<body>

	<nav class="nav">
	  <a class="nav-link active" href="/">Retweetr</a>
	</nav>

	<div class="container">
		<h1 id="status">Likes Complete: Summary below</h1>

		<ul class="list-group">
			<?php foreach ($accounts as $name => $account) : ?>
					<?php $response = \Retweetr\TweetLiker::execute(new TwitterAPIExchange($account), $_POST['id']); ?>
					
					<?php if (!empty($response['errors'])) : ?>
						<li class="list-group-item list-group-item-danger">
							Error Liking on @<?=$name;?>: <br>
							<ul>
								<?php foreach ($response['errors'] as $error) : ?>
									<li><?= $error['code']; ?> : <?= $error['message']; ?></li>
								<?php endforeach; ?>
							</ul>
						</li>
					<?php else : ?>
						<li class="list-group-item list-group-item-success">
							Successfully liked by @<?=$name;?>
						</li>
					<?php endif; ?>


					<?php sleep(rand(4, 15)); ?>
			<?php endforeach; ?>
		</ul>
	</div>
	
	<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</body>
</html>


