<?php
	include("database.php");
	$name = $_POST['name'];
	$display_name = $_POST['display_name'];
	$id = createUser($name, $display_name);
	login($id);
?>
<script type="text/javascript">
	location.href = "./index.php";
</script>