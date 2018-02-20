<?php
	include("database.php");
	$follow_to = $_POST['follow_to'];
	$user = getUser($follow_to);
	$current_user = getLoginUser();
	createFollow($current_user->id, $follow_to);
?>
<script type="text/javascript">
	location.href = "./user.php?n=<?php echo($user->name); ?>";
</script>