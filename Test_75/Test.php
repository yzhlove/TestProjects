<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018-12-26
 * Time: 10:30
 */

function count_to_ten() {
    yield 1;
    yield 2;
    yield from [3, 4];
    yield from new ArrayIterator([5, 6]);
    yield from seven_eight();
    yield 9;
    yield 10;
    for ($i = 11;$i <= 12;$i++) {
        yield $i;
    }
    for ($i = 13;$i <= 15;$i++) {
        yield  yield $i;
    }
}

function seven_eight() {
    yield 7;
    yield from eight();
}

function eight() {
    yield 8;
}

foreach (count_to_ten() as $num) {
    echo "$num ";
}

