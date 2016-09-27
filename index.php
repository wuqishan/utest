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

$n = 10000;


$mem = create_memcached($mem_conf);

if (1) {

	for ($i = 1; $i <= $n; $i++) {
		$mem->set("k".$i, $i);
	}
	echo "设置参数1-$n";
} else {
	
	for ($i = 1; $i <= $n; $i++) {
		echo $mem->get("k".$i);
		echo " <--> ";
	}
	echo "<br />获取结果1-$n";
}










