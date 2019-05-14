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
/**
 * 公式法
约瑟夫环是一个经典的数学问题，我们不难发现这样的依次报数，似乎有规律可循。为了方便导出递推式，我们重新定义一下题目。
问题： N个人编号为1，2，……，N，依次报数，每报到M时，杀掉那个人，求最后胜利者的编号。

这边我们先把结论抛出了。之后带领大家一步一步的理解这个公式是什么来的。
递推公式：
f(N,M)=(f(N−1,M)+M)%N
f(N,M)=(f(N−1,M)+M)%N
f(N,M)f(N,M)表示，N个人报数，每报到M时杀掉那个人，最终胜利者的编号
f(N−1,M)f(N−1,M)表示，N-1个人报数，每报到M时杀掉那个人，最终胜利者的编号
下面我们不用字母表示每一个人，而用数字。
1、2、3、4、5、6、7、8、9、10、11

现在再来看我们递推公式是怎么得到的！
将上面表格的每一行看成数组，这个公式描述的是：幸存者在这一轮的下标位置

f(1,3)f(1,3)：只有1个人了，那个人就是获胜者，他的下标位置是0
f(2,3)=(f(1,3)+3)%2=3%2=1f(2,3)=(f(1,3)+3)%2=3%2=1：在有2个人的时候，胜利者的下标位置为1
f(3,3)=(f(2,3)+3)%3=4%3=1f(3,3)=(f(2,3)+3)%3=4%3=1：在有3个人的时候，胜利者的下标位置为1
f(4,3)=(f(3,3)+3)%4=4%4=0f(4,3)=(f(3,3)+3)%4=4%4=0：在有4个人的时候，胜利者的下标位置为0
……
f(11,3)=6f(11,3)=6
很神奇吧！现在你还怀疑这个公式的正确性吗？上面这个例子验证了这个递推公式的确可以计算出胜利者的下标，下面将讲解怎么推导这个公式。
问题1：假设我们已经知道11个人时，胜利者的下标位置为6。那下一轮10个人时，胜利者的下标位置为多少？
答：其实吧，第一轮删掉编号为3的人后，之后的人都往前面移动了3位，胜利这也往前移动了3位，所以他的下标位置由6变成3。

问题2：假设我们已经知道10个人时，胜利者的下标位置为3。那下一轮11个人时，胜利者的下标位置为多少？
答：这可以看错是上一个问题的逆过程，大家都往后移动3位，所以f(11,3)=f(10,3)+3f(11,3)=f(10,3)+3。不过有可能数组会越界，所以最后模上当前人数的个数，f(11,3)=（f(10,3)+3）%11f(11,3)=（f(10,3)+3）%11
问题3：现在改为人数改为N，报到M时，把那个人杀掉，那么数组是怎么移动的？
答：每杀掉一个人，下一个人成为头，相当于把数组向前移动M位。若已知N-1个人时，胜利者的下标位置位f(N−1,M)f(N−1,M)，则N个人的时候，就是往后移动M为，(因为有可能数组越界，超过的部分会被接到头上，所以还要模N)，既f(N,M)=(f(N−1,M)+M)%nf(N,M)=(f(N−1,M)+M)%n
注：理解这个递推式的核心在于关注胜利者的下标位置是怎么变的。每杀掉一个人，其实就是把这个数组向前移动了M位。然后逆过来，就可以得到这个递推式。

因为求出的结果是数组中的下标，最终的编号还要加1
 */
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
