<?php
//验证过滤器
header("Content-Type:text/html;charset=utf-8");
include '.\filter.php';
$data = "dd dd c　c aa   ee  <?dd> <b> ddd</b> \n";
echo $data;
$myfilter = new Filter($data);
var_dump($myfilter->filterSpace());
var_dump($myfilter->filterBr());
var_dump($myfilter->filterHTML());
var_dump($myfilter->filterCustom(array("dd","ee")));
