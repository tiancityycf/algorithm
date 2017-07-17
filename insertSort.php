<?php
/*
* 插入排序法
* 每步将一个待排序的纪录，按其关键码值的大小插入前面已经排序的文件中适当位置上，直到全部插入完为止。
* 算法适用于少量数据的排序，时间复杂度为O(n^2)。是稳定的排序方法。
* */
function insertSort($array){ //从小到大排列
    //先默认$array[0]，已经有序，是有序表
    for($i = 1;$i < count($array);$i++){
        $insertVal = $array[$i]; //$insertVal是准备插入的数
        $insertIndex = $i - 1; //有序表中准备比较的数的下标
        while($insertIndex >= 0 && $insertVal < $array[$insertIndex]){
            $array[$insertIndex + 1] = $array[$insertIndex]; //将数组往后挪
            $insertIndex--; //将下标往前挪，准备与前一个进行比较
        }
        if($insertIndex + 1 !== $i){
            $array[$insertIndex + 1] = $insertVal;
        }
    }
    return $array;
}
$list = array(3, 6, 2, 4, 10, 1 ,9, 8, 5, 7);
var_dump(insertSort($list));
?>
