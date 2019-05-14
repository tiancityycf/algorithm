<?php
/**
 * 顺序查找
 * @param  array $arr 数组
 * @param   $k   要查找的元素
 * @return   mixed  成功返回数组下标，失败返回-1
 */
function seq_sch($arr,$k){
    for ($i=0,$n = count($arr); $i < $n; $i++) {
        if ($arr[$i] == $k) {
            break;
        }
    }
    if($i < $n){
        return $i;
    }else{
        return -1;
    }
}

// 测试：顺序查找
$arr1 = array(9,15,34,76,25,5,47,55);
echo seq_sch($arr1,47);//结果为6
 
?>
