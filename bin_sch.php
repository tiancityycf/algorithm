<?php
/**
 * 二分查找，要求数组已经排好顺序
 * @param  array $array 数组
 * @param  int $low   数组起始元素下标
 * @param  int $high  数组末尾元素下标
 * @param   $k     要查找的元素
 * @return mixed        成功时返回数组下标，失败返回-1
 */
function bin_sch($array,$low,$high,$k){
    if ($low <= $high) {
        $mid = intval(($low + $high) / 2);
        if ($array[$mid] == $k) {
            return $mid;
        } elseif ($k < $array[$mid]) {
            return bin_sch($array,$low,$mid - 1,$k);
        } else{
            return bin_sch($array,$mid + 1,$high,$k);
        }
    }
    return -1;
}
//常见问题：用二分法查找一个长度为10的排好序的线性表，查找不成功时最多需要比较次数是  (答案：4)
// 测试：二分查找
$arr2 = array(5,9,15,25,34,47,55,76);
echo bin_sch($arr2,0,7,47);//结果为5

 
?>
