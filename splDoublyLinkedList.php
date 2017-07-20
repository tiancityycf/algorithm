<?php
$doubly=new SplDoublyLinkedList();  
$doubly->push('a');  
$doubly->push('b');  
$doubly->push('c');  
$doubly->push('d');  

echo '初始链表结构：'.PHP_EOL;  
var_dump($doubly);  

echo PHP_EOL.'先进先出Keep模式迭代输出：'.PHP_EOL;  
$doubly->setIteratorMode(SplDoublyLinkedList::IT_MODE_FIFO | SplDoublyLinkedList::IT_MODE_KEEP);  
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
