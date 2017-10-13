<?php

/* dollar sign examples */

$var1 = 1;

$var_2 = 2;

$var_3 = array();
$var_3[] = 3;
$var_3['test'] = 4;

$var_4 = $var1 + $var_2 + $var_3[0] + $var_3['test'];

$var_5 = "Value $var_2 with space around it";
$var_6 = "Value '$var_2' single quoted";
$var_7 = "Value _{$var_2}_ with underscores around";
$var_8 = "Value _{$var_3[0]}_ with underscores around";
$var_9 = "Value _{$var_3['test']}_ with underscores around";

$var_10 = $var_3[$var1];

$var_11 = 'var1';
$$var_11 = 'var_2';
$$$var_11 = 2;

function func_1($v1) { }

function func_2($v1, $v2) { }

function func_3($v1, $v2, $v3) { }

function func_4($v1, $v2 = array(), $v3, $v4 = false) { }

/* assingment examples */

$eq_one_space = 2;

$eq_no_space =1;

// this one is tricky, try to place cursor at the end of the line!
$eq_new_line =
2;
