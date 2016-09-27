<?php

$mem_conf = [
	['localhost', 11211, 10],
	['localhost', 11212, 90]
];

function create_memcached($conf) {
	$mem = new Memcached();
	$mem->addServers($conf);
	return $mem;
}

$n = 100;


$mem = create_memcached(mem_conf);

for ($i = 1; $i <= $n; $i++) {
	$mem->set("k".$i, $i);
}











