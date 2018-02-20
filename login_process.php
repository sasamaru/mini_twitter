<?php
	include("database.php");
	$name = $_POST['name'];
	$user = getUser_name($name);
	login($user->id);
?>
<script type="text/javascript">
	location.href = "./index.php";
</script>