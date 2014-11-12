<?php
/**
 * 日志类库
 * 将日志信息写入到文件
 * @author panke
 * @email pankes@qq.com
 * @version 0.1
 */
include 'LogObject.php';
class Log extends LogObject {
	protected $logFileName;

	/**
	 * 构造函数
	 */
	public function __construct($fname) {
		$this->logFileName = $fname;
		if (!$this->checkFile()) {
			$this->creatFile();
		}
	}

	/**
	 * 检查日志文件是否存在
	 */
	protected function checkFile() {
		return file_exists($this->logFileName);
	}

	/**
	 * 创建文件
	 */
	protected function creatFile() {
		$fp=fopen("$this->logFileName", "w+"); //打开文件指针，创建文件
		if (!$fp){
			die("文件:" .$this->logFileName. "不可写，请检查！");
		}
		fclose($fp); 
	}

	/**
	 * 日志写入函数
	 * $str : 要写入文件的日志信息
	 */
	public function write($str) {
		echo 'ok';
	}
	/**
	 * 日志读取函数
	 */
	public function read() {

	}

	/**
	 * 读取所有日志函数
	 */
	public function readAll() {

	}

}
