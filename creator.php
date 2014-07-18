<?php
/**
 * Created by PhpStorm.
 * User: Dan
 * Date: 7/16/14
 * Time: 10:17 AM
 */
$a = 6;
++$a;
$a++;
echo "$a++" . '<br/>';

echo "$++a";

echo $_SERVER['PHP_SELF'],"\n\n";
echo $_SERVER['SERVER_PORT'],"\n\n";
if (isset($_SERVER['HTTP_REFERER'])) {
    echo $_SERVER['HTTP_REFERER'];
}
else {
    echo 'NU STIU ';
}

