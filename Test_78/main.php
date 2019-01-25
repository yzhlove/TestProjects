<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2019-01-25
 * Time: 11:12
 */

$arr = [1,2,3,4,5,6,7,8,9,10,11,12];

function getIterator($start,$end, $arr) {
    for ($i = $start;$i < $end;$i++) {
        yield $arr[$i];
    }
}

function findEach($arr) {
    $page = 4;
    $per_page = count($arr) / $page;
    for ($i = 1;$i < $page;$i++) {
        $start = ($i - 1) * $page;
        $end = $i * $page;
//        echo "{$start} - {$end} \n";
        yield from getIterator($start,$end,$arr);
    }
}

 function findByEach($arr) {
     $page = 4;
     for ($i = 1;$i < $page;$i++) {
         $start = ($i - 1) * $page;
         $end = $i * $page;
            yield function () use ($start , $end , $arr ) {
                $index = 0;
                for ($i = $start;$i < $end;$i++) {
                  echo "i = {$i} index = {$index} ";
                  $index++;
                  if ($index >= 2) {
                      break ;
                  }
                  yield $arr[$i];
              }
            };
     }
 }

echo "\n";

//foreach (findEach($arr) as $num) {
//    echo $num . ' ';
//}

$values = findByEach($arr);


foreach ($values as $iterator) {
    foreach ($iterator() as $num) {
        echo $num . "\n";
    }
}





