<?php
	include("database.php");
	if(is_login()):
		$current_user = getLoginUser();
?>
	<h1>ツイッターホーム(・8・)</h1>
	<p><?php echo($current_user->display_name); ?>でログインしています。</p>
	<a href="logout.php">ログアウト</a>
	<h2>ツイート一覧</h2>
	<form action="./tweet_process.php" method="post">
			<textarea name="tweet" required=""></textarea>
		<button>ツイート</button>
	</form>
	<?php
		$tweets = getTweets();
		foreach (array_reverse($tweets) as $tweet):
			$user = getUser($tweet->user_id);
	?>
			<div>
				<a href="user.php?n=<?php echo($user->name); ?>">
					<p><?= $user->display_name." (@".$user->name.")" ?></p>
				</a>
				<p><?= $tweet->content ?></p>
			</div>
	<?php endforeach; ?>
<?php else: ?>
	<!-- ログインしていないときは、ログインフォームに飛ぶ -->
	<script type="text/javascript">
		location.href = "./login.php";
	</script>
<?php endif; ?>