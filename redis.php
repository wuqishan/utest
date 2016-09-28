<?php


ini_set('session.save_handler', 'redis');
ini_set('session.save_path', 'tcp://127.0.0.1:6379');
session_start();


$_SESSION['name'] = "wuqishan";
$_SESSION['pass'] = "abc123";
$_SESSION['age'] = 24;


$redis = new redis();
$redis->connect('127.0.0.1', 6379);

#var_dump($redis);

#setcookie("a", 123456, time() + 1800);


//redis用session_id作为key并且是以string的形式存储
echo $redis->get('PHPREDIS_SESSION:' . session_id());




