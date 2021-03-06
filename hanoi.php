<?php
/**
 * 汉诺塔（3根柱子）
 * @param unknown $n
 * @param string $a        // 当前位置
 * @param string $b        // 中转位置
 * @param string $c        // 目标位置
 * 问题描述：
 * 相传在古印度圣庙中，有一种被称为汉诺塔(Hanoi)的游戏。该游戏是在一块铜板装置上，有三根杆(编号A、B、C)，在A杆自下而上、由大到小按顺序放置64个金盘(如下图)。游戏的目标：把A杆上的金盘全部移到C杆上，并仍保持原有顺序叠好。操作规则：每次只能移动一个盘子，并且在移动过程中三根杆上都始终保持大盘在下，小盘在上，操作过程中盘子可以置于A、B、C任一杆上。
 * 解决思路：
 * (1)以C盘为中介，从A杆将1至n-1号盘移至B杆；
 * (2)将A杆中剩下的第n号盘移至C杆；
 * (3)以A杆为中介；从B杆将1至n-1号盘移至C杆。
 */
function hanoi($n,$a='A',$b='B',$c='C'){
    if( $n==1 ){
        echo "{$a}->{$c} <br/>";
    }else{
        hanoi($n-1,$a,$c,$b);    // 将最大盘上的盘子，借助C柱，全部移动到B柱上
        echo "{$a}->{$c} <br/>";  // 将最大盘直接从A柱移到C柱
        hanoi($n-1,$b,$a,$c);    // 再将B柱上的盘子，借助A柱，全部移到C柱
    }
}
//测试：
hanoi(3,$a='A',$b='B',$c='C')
?>
