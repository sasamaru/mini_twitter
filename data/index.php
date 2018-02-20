<?php

include("database.php");

$tweets = getTweets();
foreach ($tweets as $t) {
	var_dump($t);
}
?>