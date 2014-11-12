<?php
/**
 * 日志记录抽象类
 * @author panke
 * @email pankes@qq.com
 * @version 0.1
 * @date 2014-11-12
 */
abstract class LogObject {
	/**
	 * 日志读取抽象方法
	 */
	abstract protected function read();

	/**
	 * 日志全部读取抽象方法
	 */
	abstract protected function readAll();

	/**
	 * 日志写入抽象方法
	 */
	abstract protected function write();

}
