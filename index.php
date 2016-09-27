<?php

$mem_conf = [
	['host' => 'localhost', 'port' => 11211, 'long' => true, 'weight' => 10],
	['host' => 'localhost', 'port' => 11212, 'long' => true, 'weight' => 90]
];

function create_memcached($conf) {
	$mem = new Memcached();
	foreach ($conf as $v) {
		$mem->addServer($v['host'], $v['port'], $v['long'], $v['weight']);
	}
	
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










