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
      echo "栈已满！".PHP_EOL;
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
    echo PHP_EOL;
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
?>
