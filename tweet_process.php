<?php
	include("database.php");
	$content = $_POST['tweet'];
	$user = getLoginUser();
	$user_id = $user->id;
	createTweet($user_id, $content);
?>
<script type="text/javascript">
	location.href = "./index.php";
</script>