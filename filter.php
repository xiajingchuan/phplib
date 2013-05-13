<?php
/**
 * 数据过滤器类
 * @author panke
 * @version 2013-5-13
 */
class Filter{
	//存放待过滤数据
	private $data;
	/**
	 * 构造函数
	 */
	public function __construct($mydata) {
		$this->data = (string)$mydata;
	}	

	/**
	 * 过滤数据中的空格
	 * 包括全角空格
	 */
	public function filterSpace() {
		return str_replace(array(" ","　"), "", $this->data);
	}	

	/**
	 * 过滤数据中的换行
	 */
	public function filterBr() {
		$patten = array("\r\n", "\n", "\r");
		return str_replace($patten, "", $this->data);
	}

	/**
	 * 过滤html标签
	 */
	public function filterHTML() {
		return strip_tags($this->data);
	}
	/**
	 * 自定义过滤
	 */
	public function filterCustom($str = array()) {
		return str_replace($str, "", $this->data);
	}
}
