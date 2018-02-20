<?php 
	include("database.php");
	$name = $_GET["n"];
	$user = getUser_name($name);
	$current_user = getLoginUser();
?>
<a href="index.php">ホームへ</a>
<h1>ユーザー</h1>
<h2><?php echo($user->display_name)?>(@<?php echo($user->name); ?>)</h2>
<?php if($user->id != $current_user->id && isFollow($current_user->id, $user->id)): ?>
	<p>フォロー済</p>
<?php elseif($user->id != $current_user->id): ?>
	<form action="./follow_process.php" method="post">
		<input type="hidden" name="follow_to" value="<?php echo($user->id); ?>">
		<button>フォローする</button>
	</form>
<?php endif; ?>
<?php 
	$tweets = getTweets();
	foreach (array_reverse($tweets) as $tweet):
		if($tweet->user_id == $user->id):
?>
	<p><?= $user->display_name." (@".$user->name.")" ?></p>
	<p><?= $tweet->content ?></p>
<?php
		endif;
	endforeach;
?>