<?php

$mem_conf = [
	['host' => 'localhost', 'port' => 11211, 'weight' => 10],
	['host' => 'localhost', 'port' => 11212, 'weight' => 90]
];

function create_memcached($conf) {
	$mem = new Memcached();
	// 必须使用这个选项，权重设置才会有效果
	$mem->setOption(Memcached::OPT_LIBKETAMA_COMPATIBLE, true);
	foreach ($conf as $v) {
		$mem->addServer($v['host'], $v['port'], $v['weight']);
	}
	
	return $mem;
}

$n = 1000;


$mem = create_memcached($mem_conf);

if (1) {

	for ($i = 1; $i <= $n; $i++) {
		$mem->set("k".$i, $i);
	}
	echo "设置参数1-$n";
} else {
	
	for ($i = 1; $i <= $n; $i++) {
		var_dump($mem->get("k".$i));
		echo " <--> ";
	}
	echo "<br />获取结果1-$n";
}










