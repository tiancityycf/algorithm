<?php
/**
参考：http://www.php.net/manual/en/class.spldoublylinkedlist.php

 SplDoublyLinkedList

 rewind:使链表的当前指针指向链表的底部(bottom)

 push:向链表的顶部（尾部）插入一个节点

 pop:获取链表中的顶部(尾部)节点,并且从链表中删除这个节点;操作不改变当前指针的位置

 current:指向链表当前节点的指针,必须在调用之前先调用rewind。当指向的节点被删除之后，会指向一个空节点。

 next:让链表当前节点的指针指向下一个节点,current的返回值随之改变

 unshift:向链表的底部(头部)插入一个节点

 shift:删除一个链表底部（头部）节点

 bottom:获取链表底部(头部)元素,当前指针位置不变

 top:获取链表顶部(尾部)元素,当前指针位置不变

 */
$doubly=new SplDoublyLinkedList();  
$doubly->push('a');  
$doubly->push('b');  
$doubly->push('c');  
$doubly->push('d');  

echo '初始链表结构：'.PHP_EOL;  
var_dump($doubly);  
/**  
 * - setIteratorMode 设置迭代模式 
 * - 迭代的顺序 (先进先出、后进先出) 
 * - SplDoublyLnkedList::IT_MODE_LIFO (堆栈) 
 * - SplDoublyLnkedList::IT_MODE_FIFO (队列) 
 * 
 * - 迭代过程中迭代器的行为 
 * - SplDoublyLnkedList::IT_MODE_DELETE (删除已迭代的节点元素) 
 * - SplDoublyLnkedList::IT_MODE_KEEP   (保留已迭代的节点元素) 
 * 
 * 默认的模式是 0 : SplDoublyLnkedList::IT_MODE_FIFO | SplDoublyLnkedList::IT_MODE_KEEP 
 * 
 * @param $mode 新的迭代模式 
 */  
echo PHP_EOL.'先进先出Keep模式迭代输出：'.PHP_EOL;  
$doubly->setIteratorMode(SplDoublyLinkedList::IT_MODE_FIFO | SplDoublyLinkedList::IT_MODE_KEEP);  
//重置节点指针 
$doubly->rewind();  
foreach($doubly as $key=>$value)  
{  
    echo $key.' '.$value.PHP_EOL;  
}  

echo PHP_EOL.'后进先出Keep模式迭代输出：'.PHP_EOL;  
$doubly->setIteratorMode(SplDoublyLinkedList::IT_MODE_LIFO | SplDoublyLinkedList::IT_MODE_KEEP);  
$doubly->rewind();  
foreach($doubly as $key=>$value)  
{  
    echo $key.' '.$value.PHP_EOL;  
}  

echo PHP_EOL.'后进先出Delete模式迭代输出：'.PHP_EOL;  
$doubly->setIteratorMode(SplDoublyLinkedList::IT_MODE_LIFO | SplDoublyLinkedList::IT_MODE_DELETE);  
$doubly->rewind();  
foreach($doubly as $key=>$value)  
{  
    if($key==1) break;
    echo $key.' '.$value.PHP_EOL;  
}  
echo 'Delete模式迭代之后的链表：'.PHP_EOL;  
var_dump($doubly);

?>
