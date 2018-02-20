<?php

// ini_set( 'display_errors',1);
// include("database.php");

// $tweets = getTweets();
// foreach ($tweets as $t) {
// 	var_dump($t);
// 	echo"<br>";
// 	var_dump(getUser($t->user_id));
// 	// echo($t->content);
// }
// $user = getUser(2);
// echo($user->display_name);



include("database.php");

$tweets = getTweets();
foreach ($tweets as $t) {
	var_dump($t);
	echo"<br>";
	echo($t->id);
	echo"<br>";
	echo($t->user_id);
	echo"<br>";
	echo($t->content);
	echo"<br>";
}
?>