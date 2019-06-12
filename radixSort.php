<?php
/**
 * 堆排序
 * 基本思想:
 * 基数排序（radix sort）属于“分配式排序”（distribution sort），又称“桶子法”（bucket sort）或bin sort
 * 顾名思义，它是透过键值的部份资讯，将要排序的元素分配至某些“桶”中，藉以达到排序的作用
 * 基数排序法是属于稳定性的排序，其时间复杂度为O (nlog(r)m)，其中r为所采取的基数，而m为堆数，在某些时候，基数排序法的效率高于其它的稳定性排序法。
 */
//交换函数
function swap(array &$arr,$a,$b){
    $temp = $arr[$a];
    $arr[$a] = $arr[$b];
    $arr[$b] = $temp;
}
//获取数组中的最大数
//就像上面的例子一样，我们最终是否停止算法不过就是看数组中的最大值：4249，它的位数就是循环的次数
function getMax(array $arr){
    $max = 0;
    $length = count($arr);
    for($i = 0;$i < $length;$i ++){
        if($max < $arr[$i]){
            $max = $arr[$i];
        }
    }
    return $max;
}
//获取最大数的位数,最大值的位数就是我们分配桶的次数
function getLoopTimes($maxNum){
    $count = 1;
    $temp = floor($maxNum / 10);
    while($temp != 0){
        $count ++;
        $temp = floor($temp / 10);
    }
    return $count;
}
/**
 * @param array $arr 待排序数组
 * @param $loop 第几次循环标识
 * 该函数只是完成某一位（个位或十位）上的桶排序
 */
function R_Sort(array &$arr,$loop){
    $tempArr = array();
    $count = count($arr);
    for($i = 0;$i < 10;$i ++){
        $tempArr[$i] = array();
    }
    //求桶的index的除数
    //如798个位桶index=(798/1)%10=8
    //十位桶index=(798/10)%10=9
    //百位桶index=(798/100)%10=7
    //$tempNum为上式中的1、10、100
    $tempNum = (int)pow(10, $loop - 1);
    for($i = 0;$i < $count;$i ++){
        //求出某位上的数字
        $row_index = ($arr[$i] / $tempNum) % 10;
        //入桶
        array_push($tempArr[$row_index],$arr[$i]);
    }
    //还原回原数组中
    $k = 0;
    for($i = 0;$i < 10;$i ++){
        //出桶
        while(count($tempArr[$i]) > 0){
            $arr[$k ++] = array_shift($tempArr[$i]);
        }
    }
}
//最终调用的主函数
function RadixSort(array &$arr){
    $max = getMax($arr);
    $loop = getLoopTimes($max);
    //对每一位进行桶分配（1 表示个位，$loop 表示最高位）
    for($i = 1;$i <= $loop;$i ++){
        R_Sort($arr,$i);
    }
}

$arr = array(2, 343, 342, 1, 128, 43, 4249, 814, 687, 654, 3);
RadixSort($arr);
var_dump($arr);