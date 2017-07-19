<?php
/**
 * SplFixedArray主要是处理数组相关的主要功能，与普通php array不同的是，它是固定长度的，且以数字为键名的数组，优势就是比普通的数组处理更快。通常情况下SplFixedArray要比php array快上20%~30%，所以如果你是处理巨大数量的固定长度数组，还是强烈建议使用。
 */
splTest();
function splTest(){
    $len = 5;
    $array = new SplFixedArray($len);
    $arr = array();
    $arr["id"] = 1;
    for($i=0;$i<$len;$i++){
        $array[$i] = $arr; 
    }
    var_dump($array);

    echo "\n获取数组长度=";
    echo $array->getSize();
    echo "=";
    echo count($array);
    echo "\n";
    //设置数组长度
    $array->setSize(6);
    var_dump($array);
}
/**
 * SplFixedArray性能分析
 */
splTime();
function splTime(){
    for ($size=1000; $size<=500000; $size*=2) {  
        pr(PHP_EOL . "Testing size: $size" . PHP_EOL);   
        for($s = microtime(true), $container = Array(), $i = 0; $i < $size; $i++) {  
            $container[$i] = NULL;   
        }  
        pr( "Array(): " . (microtime(true) - $s) . PHP_EOL);   

        for($s = microtime(true), $container = new SplFixedArray($size), $i = 0; $i < $size; $i++) {  
            $container[$i] = NULL;   
        }  
        pr("SplArray(): " . (microtime(true) - $s) . PHP_EOL);   
    }  
}
function pr() {  
    $params = func_get_args();  
    $env = php_sapi_name();  
    if ("cli" == $env) {  
        foreach ($params as $key => $value) {  
            echo $value;  
        }  
    } else {  
        foreach ($params as $key => $value) {  
            echo "<pre>";  
            print_r($value);  
            echo "</pre>";  
        }  
    }  
} // 用来打印输出结果  
?>
