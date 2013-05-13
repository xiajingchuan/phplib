<?php
//验证自定义verifier类
include '.\verifier.php';
$kong = 3;
var_dump(Verifier::isNull($kong));

$minlength = "abcdefg";
$num = 'a';
var_dump(Verifier::minLength($minlength, $num));

$telp = "123456792";
var_dump(Verifier::telePhone($telp));

