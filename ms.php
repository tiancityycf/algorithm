<?php
//请写一段PHP代码，确保多个进程同时写入同一个文件成功
function fw(){
	$fp = fopen("lock.txt","w+");
	if (flock($fp,LOCK_EX)) {
		//获得写锁，写数据
		fwrite($fp, "write something");

		// 解除锁定
		flock($fp, LOCK_UN);
	} else {
		echo "file is locking...";
	}
	fclose($fp);
}
//无限级分类
function tree($arr,$pid=0,$level=0){
	static $list = array();
	foreach ($arr as $v) {
		//如果是顶级分类，则将其存到$list中，并以此节点为根节点，遍历其子节点
		if ($v['pid'] == $pid) {
			$v['level'] = $level;
			$list[] = $v;
			tree($arr,$v['id'],$level+1);
		}
	}
	return $list;
}
//获取上个月第一天 和 最后一天
function dd(){
	//获取上个月第一天
	date('Y-m-01',strtotime('-1 month'));

	//获取上个月最后一天
	date('Y-m-t',strtotime('-1 month'));
} 

?>
