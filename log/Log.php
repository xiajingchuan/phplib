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
	}

	/**
	 * 检查日志文件是否存在
	 */
	protected function checkFile() {
	
	}

	/**
	 * 日志写入函数
	 */
	public function write($str) {
		
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
