<?php

require_once("config/bootstrap.php");
$TweetFetcher = new Retweetr\TweetFetcher(new TwitterAPIExchange(array_values($accounts)[0]));

if (!empty($_POST['username'])) {
	$TweetFetcher->setUsername($_POST['username']);
}
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
		<form method="POST">
			<div class="form-group">
				<input type="text" name="username" id="username" placeholder="Enter @username" class="form-control">
			</div>

			<button class="btn btn-primary" type="submit">Get Tweets</button>
		</form>

		<br>

		<?php if(!empty($_POST['username'])) : ?>
			<p class="text-center text-danger lead">Clicking Like or Retweet will perform the action on all of your accounts!</p>
			<p class="small">
				Showing tweets by <a href="https://twitter.com/<?=$_POST['username']; ?>" target="_blank">@<?=$_POST['username']; ?></a>
			</p>
		<?php endif; ?>
		<ul class="list-group">
			<?php foreach ($TweetFetcher->get() as $tweet) : ?>
				<li class='list-group-item'>
					<div style="width: 80%">
						<?= $tweet['text'] ;?>
					</div>
					<div class="mx-auto">
						<form action="retweet.php" method="POST">
							<input type="hidden" name="id" value="<?=$tweet['id'];?>">
							<button type="submit" class="btn btn-info btn-sm">Retweet</button>
						</form>	
					</div>
					<div class="mx-auto">
						<form action="like.php" method="POST">
							<input type="hidden" name="id" value="<?=$tweet['id'];?>">
							<button type="submit" class="btn btn-info btn-sm">Like</button>
						</form>	
					</div>
				</li>
			<?php endforeach; ?>
		</ul>
		<hr>
		<h3>Active Accounts (<?= count($accounts); ?>)</h3>
		<ul>
			<?php foreach ($accounts as $name => $data) : ?>
				<li><?= $name; ?></li>
			<?php endforeach; ?>
		</ul>
	</div>

	<br><br><br>
	
	<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</body>
</html>

