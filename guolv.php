<?php
/**
 * 字符过滤类
 * 2014-01-09
 * ver 0.1
 * panke
 */
class Filter
{
	/**
	 * 构造函数
	 */
	public function __construct()
	{
	}

	/**
	 * 过滤空格方法
	 * 包含全角空格
	 */
	public function space($str)
	{
		return str_replace(array(" ","　"), '', $str);
	}

	/**
	 * 过滤所有空白字符
	 * 并不能过滤掉ascii的低位非打印字符
	 */
	public function allBlankChar($str)
	{
		return preg_replace("/\s+/", '', $str);
	}

	/**
	 * 过滤ASCII非打印字符 不包含空格
	 */
	public function asciiBlankChar($str)
	{
		//$len = strlen($str);
		for ($i=0; $i<strlen($str); $i++)
		{
			$tmp = ord($str[$i]);
			if ((($tmp >= 0) && ($tmp <= 8)) || (($tmp >= 11) && ($tmp <= 12)) || (($tmp >= 14)&&($tmp < 32)))
		   	{
				$str = substr_replace($str,"",$i,1);
			}
		}
		return $str;
	}

	/**
	 * 过滤所有换行符
	 */
	public function allBr($str)
	{
		$patten = array("\r\n", "\n", "\r");
		return str_replace($patten, "", $str);
	}

	/**
	 * 过滤html标签
	 */
	public function html($str)
	{
		return strip_tags($str);
	}

	/**
	 * 自定义过滤方法
	 * 不支持正则
	 */
	public function custom($str, $p = array())
	{
		return str_replace($p, "", $str);
	}

	/**
	 * 魔术方法 tostring
	 */
	public function __toString()
	{
		return '字符过滤类';
	}
}
$ft = new Filter();
$str = "元 限";
//echo $ft->allBlankChar($str);
echo $ft->asciiBlankChar($str);
