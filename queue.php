<?php
/**
 * Class Deque
 * 使用PHP实现双向队列
 */
class Deque{
  private $queue = array();
  public function addFirst($item){//头入队
    array_unshift($this->queue,$item);
  }
  public function addLast($item){//尾入队
    array_push($this->queue,$item);
  }
  public function removeFirst(){//头出队
    array_shift($this->queue);
  }
  public function removeLast(){//尾出队
    array_pop($this->queue);
  }
  public function show(){//打印
    foreach($this->queue as $item){
      echo $item." ";
    }
    echo PHP_EOL;
  }
}
$deque = new Deque();
$deque->addFirst(2);
$deque->addLast(3);
$deque->addLast(4);
$deque->addFirst(5);
$deque->show();
 
?>
