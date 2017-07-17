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
    $r = $newNode;
    $linkList->data++;
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
  echo '<br/>';
}
 
$linkList = new Node();
init($linkList);//初始化
createTail($linkList,10);//尾插法创建链表
show($linkList);//打印出链表
insert($linkList,3,'a');//插入
show($linkList);
delete($linkList,3);//删除
show($linkList);
 
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
