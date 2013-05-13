<?php
/**
 * 验证器
 * 验证数据是否符合某项规则
 * 对用户提交的数据进行验证
 * @author panke
 * @version 2013-5-13
 */

class Verifier {

	/**
	 * 验证数据是否为空
	 * 如果为空返回true，否则返回false。
	 */
	public static function isNull($data) {
		if (strlen($data) == 0 || empty($data)) {
			return true;
		}
		return false;
	}

	/**
	 * 验证数据的长度
	 * 如果数据小于等于给定的长度则返回true，否则false
	 */
	public static function minLength($data, $minlength) {
		if (!is_numeric($minlength)) {
			return false;
		}
		if (strlen($data) > $minlength) {
			return false;
		}
		return true;
	}

	/**
	 * 比较两个数据是否相同
	 * 如果相同返回true， 否则返回false
	 */
	public static function same($dataOne, $dataTwo) {
		return ($dataOne != $dataTwo) ? false : true;
	}

	/**
	 * 验证手机号码
	 * 如果是手机号码返回true，否则返回false
	 */
	 public static function mobilePhone($data) {
		 $result = preg_match("/^1[358]{1}[0-9]{1}[0-9]{8}$/", $data);
		 return $result ? true : false;
	 }

	/**
	 * 验证固话号码
	 */
	public static function telePhone($data) {
		$reg = "/(^(86)\-(\d{3,4})\-(\d{7,8})\-(\d{1,4})$)" . "|(^(\d{3,4})\-(\d{7,8})$)" . "|(^(\d{3,4})\-(\d{7,8})\-(\d{1,4})$)" . "|(^(86)\-(\d{3,4})\-(\d{7,8})$)" . "|(^(\d{7,8})$)/";
		$result = preg_match($reg, $data);
		return $result ? true : false;
	}

	/**
	 * 验证邮箱地址
	 */
	public static function email($email) {
    	$isValid = true;
    	$atIndex = strrpos($email, "@");
    	if (is_bool($atIndex) && !$atIndex) {
        	$isValid = false;
    	} else {
        	$domain = substr($email, $atIndex + 1);
        	$local = substr($email, 0, $atIndex);
        	$localLen = strlen($local);
        	$domainLen = strlen($domain);
        	if ($localLen < 1 || $localLen > 64) {
            	// local part length exceeded
            	$isValid = false;
        	} else if ($domainLen < 1 || $domainLen > 255) {
            	// domain part length exceeded
            	$isValid = false;
        	} else if ($local[0] == '.' || $local[$localLen - 1] == '.') {
            	// local part starts or ends with '.'
            	$isValid = false;
        	} else if (preg_match('/\\.\\./', $local)) {
            	// local part has two consecutive dots
            	$isValid = false;
        	} else if (!preg_match('/^[A-Za-z0-9\\-\\.]+$/', $domain)) {
            	// character not valid in domain part
            	$isValid = false;
        	} else if (preg_match('/\\.\\./', $domain)) {
            	// domain part has two consecutive dots
            	$isValid = false;
			} else if (!preg_match('/^(\\\\.|[A-Za-z0-9!#%&`_=\\/$\'*+?^{}|~.-])+$/', str_replace("\\\\", "", $local))) {
            	// character not valid in local part unless 
            // local part is quoted
            	if (!preg_match('/^"(\\\\"|[^"])+"$/', str_replace("\\\\", "", $local))) {
                	$isValid = false;
            	}
        	}
        	if ($isValid && !(checkdnsrr($domain, "MX") || checkdnsrr($domain, "A"))) {
            // domain not found in DNS
            	$isValid = false;
        	}
    	}
    	return $isValid;
	}

	/**
	 * 验证邮编号
	 */
	public static function postCode($data) {
		$reg = "/^[0-9]{6}$/";
		$result = preg_match($reg, $data);
		return $result ? true : false;
	}

	/**
	 * 验证url地址
	 * 只验证http和https地址
	 */
	public static function URL($data) {
		$reg = "/http[s]?:[\/]{2}[a-z]+[.]{1}[a-z\d\-]+[.]{1}[a-z\d]*[\/]*[A-Za-z\d]*[\/]*[A-Za-z\d]*[.]*/";
		$res = preg_match($reg, $data);
		return $res ? true : false;
	}

	/**
	 * 验证ip地址
	 */
	public static function IP($data) {
		$reg = "/\A((([0-9]?[0-9])|(1[0-9]{2})|(2[0-4][0-9])|(25[0-5]))\.){3}(([0-9]?[0-9])|(1[0-9]{2})|(2[0-4][0-9])|(25[0-5]))\Z/";
		return preg_match($reg, $data) ? true : false;
	}
}
