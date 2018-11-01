<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/10/10
 * Time: 上午10:44
 */


function randomDivInt($div, $total)
{
    $remain = $total;
    echo "remain = {$remain} \n";
    $max_sum = ($div - 1) * $div / 2;
    echo "max_sum = {$max_sum} \n";
    $p = $div;
    echo "p = {$p} \n\n";
    $min = 1;
    $a = array();
    for ($i = 0; $i < $div - 1; $i++) {
        $max = ($remain - $max_sum) / ($div - $i);
        echo "{$max} = ({$remain} - {$max_sum}) / ({$div} - {$i}) \n";
        $e = rand($min, $max);
        $min = $e + 1;
        echo "e = {$e} min = {$min}  p =  {$p} \n";
        $max_sum -= --$p;
        echo "max_sum = {$max_sum} \n\n";
        $remain -= $e;
        $a[$e] = true;
    }
    $a = array_keys($a);
    $a[] = $remain;
    return $a;
}


var_dump(randomDivInt(10,30));

//for ($i = 0; $i < 3; $i++) {
//    $a = randomDivInt(5, 100);
//    var_dump($a);//$a中便是分的不等数
//    var_dump(array_sum($a));
//}

