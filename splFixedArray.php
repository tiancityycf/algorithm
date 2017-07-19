<?php
    $len = 10;
    $array = new SplFixedArray($len);
    $arr = array();
    $arr["id"] = 1;
    for($i=0;$i<$len;$i++){
        $array[$i] = $arr; 
    }
    var_dump($array);
?>
