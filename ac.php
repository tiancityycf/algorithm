<?php
/**
 *  问题1：从0,1,2,3,4,5,6,7,8,9，这十个数字中任意选出三个不同的数字，“三个数字中不含0和5”的概率是
 *  return  7/15
 *  所有组合 = C10 3  = 10!/(10-3)!/3! = 10*9*8/3*2 = 120
 *  没有0，5的组合=C8 3 = 8!/(8-3)!/3! =  8*7*6/3*2 = 56      56/120 = 7/15
 *
 * 问题2：一个三角形三个顶点有3只老鼠，一声枪响，3只老鼠开始沿三角形的边匀速运动，请问他们相遇的概率是
 * return 75%，每只老鼠都有顺时针、逆时钟两种运动方向，3只老鼠共有8种运动情况，只有当3只老鼠都为顺时针或者逆时钟，它们才不会相遇，剩余的6中情况都会相遇，故相遇的概率为6/8=75%。
 *
 * 问题3：以体彩11选5为例，共计11个数字，实现11个数字任3的全排列/全组合。
 */


// 阶乘
function factorial($n) {
    return array_product(range(1, $n));
}

// 排列数
function A($n, $m) {
    return factorial($n)/factorial($n-$m);
}

// 组合数
function C($n, $m) {
    return A($n, $m)/factorial($m);
}

// 排列
function arrangement($a, $m) {
    $r = array();

    $n = count($a);
    if ($m <= 0 || $m > $n) {
        return $r;
    }

    for ($i=0; $i<$n; $i++) {
        $b = $a;
        $t = array_splice($b, $i, 1);
        if ($m == 1) {
            $r[] = $t;
        } else {
            $c = arrangement($b, $m-1);
            foreach ($c as $v) {
                $r[] = array_merge($t, $v);
            }
        }
    }

    return $r;
}

// 组合
function combination($a, $m) {
    $r = array();

    $n = count($a);
    if ($m <= 0 || $m > $n) {
        return $r;
    }

    for ($i=0; $i<$n; $i++) {
        $t = array($a[$i]);
        if ($m == 1) {
            $r[] = $t;
        } else {
            $b = array_slice($a, $i+1);
            $c = combination($b, $m-1);
            foreach ($c as $v) {
                $r[] = array_merge($t, $v);
            }
        }
    }

    return $r;
}


// ====== 测试 ======
$a = array("A", "B", "C", "D");

$r = arrangement($a, 2);
var_dump($r);

$r = A(4, 2);
echo $r."\n";

$r = combination($a, 2);
var_dump($r);

$r = C(4, 2);
echo $r."\n";

?>
