<?php
/**
 * Class Node
 * PHP模拟链表的基本操作
 */
class Node{
    public $data = '';
    public $next = null;
}
//初始化
function init($linkList){
    $linkList->data = 0; //用来记录链表长度
    $linkList->next = null;
}
//头插法创建链表
function createHead(&$linkList,$length){
    for($i=0;$i<$length;$i++){
        $newNode = new Node();
        $newNode->data = $i;
        $newNode->next = $linkList->next;//因为PHP中对象本身就是引用所以不用再可用“&”
        $linkList->next = $newNode;
        $linkList->data++;
    }
}
//尾插法创建链表
function createTail(&$linkList,$length){
    $r = $linkList;
    for($i=0;$i<$length;$i++){
        $newNode = new Node();
        $newNode->data = $i;
        $newNode->next = $r->next;
        $r->next = $newNode;
        //echo $i.PHP_EOL;
        //var_dump($r);
        $r = $newNode;
        //var_dump($r);
        //echo PHP_EOL; 
        $linkList->data++;
        //var_dump($linkList);
    }
}
//在指定位置插入指定元素
function insert($linkList,$pos,$elem){
    if($pos<1 && $pos>$linkList->data+1){
        echo "插入位置错误！";
    }
    $p = $linkList;
    for($i=1;$i<$pos;$i++){
        $p = $p->next;
    }
    $newNode = new Node();
    $newNode->data = $elem;
    $newNode->next = $p->next;
    $p->next = $newNode;
}
//删除指定位置的元素
function delete($linkList,$pos){
    if($pos<1 && $pos>$linkList->data+1){
        echo "位置不存在！";
    }
    $p = $linkList;
    for($i=1;$i<$pos;$i++){
        $p = $p->next;
    }
    $q = $p->next;
    $p->next = $q->next;
    unset($q);
    $linkList->data--;
}
//输出链表数据
function show($linkList){
    $p = $linkList->next;
    while($p!=null){
        echo $p->data." ";
        $p = $p->next;
    }
    echo PHP_EOL;
}

$linkList = new Node();
init($linkList);//初始化
//createTail($linkList,10);//尾插法创建链表
createHead($linkList,10);//尾插法创建链表
show($linkList);//打印出链表
insert($linkList,3,'a');//插入
show($linkList);
delete($linkList,3);//删除
show($linkList);

?>
