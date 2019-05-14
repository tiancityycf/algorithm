<?php
//PHP解决约瑟夫环问题
//约瑟夫环问题：一圈共有N个人，开始报数，报到M的人自杀，然后重新开始报数，问最后自杀的人是谁？
//方法一
function joseph_ring($n,$m){
  $arr = range(1,$n);
  $i = 0;
  while(count($arr)>1){
    $i=$i+1;
    $head = array_shift($arr);//一个个出列最前面的
    if($i%$m != 0){ //如果不是则重新压入数组
      array_push($arr,$head);
    }
  }
  return $arr[0];
}
//方法二 使用数学方法解决
function joseph_ring2($n,$m){
  $r = 0;
  for($i=2;$i<=$n;$i++){
    $r = ($r+$m)%$i;
  }
  return $r + 1;
}
echo joseph_ring(60,5).PHP_EOL;
echo joseph_ring2(60,5).PHP_EOL;
?>
