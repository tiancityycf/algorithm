<?php
/**
 * Class Stack
 * 用PHP模拟顺序栈的基本操作
 */
class Stack{
  //用默认值直接初始化栈了，也可用构造方法初始化栈
  private $top = -1;
  private $maxSize = 5;
  private $stack = array();
 
  //入栈
  public function push($elem){
    if($this->top >= $this->maxSize-1){
      echo "栈已满！<br/>";
      return;
    }
    $this->top++;
    $this->stack[$this->top] = $elem;
  }
  //出栈
  public function pop(){
    if($this->top == -1){
      echo "栈是空的！";
      return ;
    }
    $elem = $this->stack[$this->top];
    unset($this->stack[$this->top]);
    $this->top--;
    return $elem;
  }
  //打印栈
  public function show(){
    for($i=$this->top;$i>=0;$i--){
      echo $this->stack[$i]." ";
    }
    echo "<br/>";
  }
}
 
$stack = new Stack();
$stack->push(3);
$stack->push(5);
$stack->push(8);
$stack->push(7);
$stack->push(9);
$stack->push(2);
$stack->show();
$stack->pop();
$stack->pop();
$stack->pop();
$stack->show();
 
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
    echo "<br/>";
  }
}
$deque = new Deque();
$deque->addFirst(2);
$deque->addLast(3);
$deque->addLast(4);
$deque->addFirst(5);
$deque->show();
 
//PHP解决约瑟夫环问题
//方法一
function joseph_ring($n,$m){
  $arr = range(1,$n);
  $i = 0;
  while(count($arr)>1){
    $i=$i+1;
    $head = array_shift($arr);
    if($i%$m != 0){ //如果不是则重新压入数组
      array_push($arr,$head);
    }
  }
  return $arr[0];
}
//方法二
function joseph_ring2($n,$m){
  $r = 0;
  for($i=2;$i<=$n;$i++){
    $r = ($r+$m)%$i;
  }
  return $r + 1;
}
echo "<br/>".joseph_ring(60,5)."<br/>";
echo "<br/>".joseph_ring2(60,5)."<br/>";
?>
