<?php

ini_set( 'display_errors', 1 );

##############################################

# userを追加

##############################################
// 引数 ・name ・display_name ・description(なくても良い)
function createUser($name, $display_name, $description=""){
	$string = file_get_contents("data/user.txt");
	$users = json_decode($string);
	$id = count($users);
	$user = array( 'id'=>$id, 'name'=>$name, 'display_name'=>$display_name, 'description'=>$description);
	$users[] = $user;
	$json = json_encode($users, JSON_UNESCAPED_UNICODE);
	file_put_contents("data/user.txt", $json);
	return $id;
}
/*
例：
createUser("test003", "ねこ");
*/

##############################################

# userの配列を取得

##############################################
function getUsers(){
	$string = file_get_contents("data/user.txt");
	$users = json_decode($string);
	return $users;
}
/*
例：
$users = getUsers();
foreach ($users as $user) {
	echo("<p>".$user->name."</p>");
	echo("<p>".$user->display_name."</p>");
	echo("<p>".$user->description."</p>");
	echo("<p>*********************************</p>");
}
*/

##############################################

# userを取得

##############################################
function getUser($id){
	$string = file_get_contents("data/user.txt");
	$users = json_decode($string);
	foreach ($users as $user) {
		if($user->id == $id){
			return $user;
		}
	}
}
function getUser_name($name){
	$string = file_get_contents("data/user.txt");
	$users = json_decode($string);
	foreach ($users as $user) {
		if($user->name == $name){
			return $user;
		}
	}
}
/*
例：
$user = getUser(2);
echo($user->name);
*/

##############################################

# tweetを投稿

##############################################
function createTweet($user_id, $content, $reply_to=""){
	$string = file_get_contents("data/tweet.txt");
	$tweets = json_decode($string);
	$tweet = array('id'=>count($tweets), 'user_id'=>$user_id, 'content'=>$content, 'reply_to'=>$reply_to);
	$tweets[] = $tweet;
	$json = json_encode($tweets, JSON_UNESCAPED_UNICODE);
	file_put_contents("data/tweet.txt", $json);
}
/*
例：
createTweet(2, "お腹すいた");
*/

##############################################

# tweet全てを取得

##############################################
function getTweets(){
	$string = file_get_contents("data/tweet.txt");
	$tweets = json_decode($string);
	return $tweets;
}

/*
// 例：
$tweets = getTweets();
foreach ($tweets as $tweet) {
	$user = getUser($tweet->user_id);
	echo("<p>".$user->name."</p>");
	echo("<p>".$user->display_name."</p>");
	echo("<p>".$tweet->content."</p>");
	echo("<p>*********************************</p>");
}
*/

##############################################

# tweetを取得

##############################################
function getTweet($id){
	$string = file_get_contents("data/tweet.txt");
	$tweets = json_decode($string);
	foreach ($tweets as $tweet) {
		if($tweet->id == $id){
			return $tweet;
		}
	}
}

/*
// 例：
$tweet = getTweet(1);
$user = getUser($tweet->user_id);
echo($user->name);
echo($tweet->content);
*/


##############################################

# followする

##############################################
function createFollow($user_id, $follow_to){
	$string = file_get_contents("data/follow.txt");
	$follows = json_decode($string);
	$follow = array('id'=>count($follows), 'user_id'=>$user_id, 'follow_to'=>$follow_to);
	$follows[] = $follow;
	$json = json_encode($follows, JSON_UNESCAPED_UNICODE);
	file_put_contents("data/follow.txt", $json);
}

// 例：
// createFollow(0, 1);

##############################################

# followしてるかを取得

##############################################
function isFollow($user_id, $follow_to){
	$string = file_get_contents("data/follow.txt");
	$follows = json_decode($string);
	$follow = array('id'=>count($follows), 'user_id'=>$user_id, 'follow_to'=>$follow_to);
	$is_follow = false;
	foreach ($follows as $follow) {
		if($follow->user_id == $user_id && $follow->follow_to == $follow_to){
			$is_follow = true;
			break;
		}
	}
	return $is_follow;
}

##############################################

# ログインする

##############################################
function login($user_id){
	file_put_contents("data/login.txt", $user_id);
}
##############################################

# ログアウトする

##############################################
function logout(){
	file_put_contents("data/login.txt", "");
}
##############################################

# ログインしているか

##############################################
function is_login(){
	$string = file_get_contents("data/login.txt");
	return $string!=="";
}
##############################################

# ログインユーザーを取得

##############################################
function getLoginUser(){
	$string = file_get_contents("data/login.txt");
	return getUser($string);
}

 ?>
