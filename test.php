<?php
$redis = new Redis();
$redis->connect('localhost', 6379);
$redis->set("test", "Hello, Redis!");
echo $redis->get("test");
