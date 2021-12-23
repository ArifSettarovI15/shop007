<?php
//
//class Speed {
//	/**
//	 * @var MainClass
//	 */
//	var $registry;
//
//	/**
//	 * @var DatabaseClass
//	 */
//	var $db;
//
//	function __construct($registry)
//	{
//		$this->registry =& $registry;
//		$this->db =& $this->registry->db;
//	}
//
//	public function optiHtml($html) {
//		$html=$this->noCookieDomain($html);
//		$html=$this->dnsPrefetch($html);
//		$html=$this->minHtml($html);
//		return $html;
//	}
//	private function noCookieDomain ($buffer) {
//		$buffer=str_replace(BASE_URL.'/assets/','//cdn-thesmak.ru/assets/',$buffer);
//		$buffer=str_replace(BASE_URL.'/uploads/','//cdn-thesmak.ru/uploads/',$buffer);
//		$buffer=str_replace("'/uploads/","'//cdn-thesmak.ru/uploads/",$buffer);
//		$buffer=str_replace("'/assets/","'//cdn-thesmak.ru/assets/",$buffer);
//		$buffer=str_replace('"/uploads/','"//cdn-thesmak.ru/uploads/',$buffer);
//		$buffer=str_replace('"/assets/','"//cdn-thesmak.ru/assets/',$buffer);
//		return $buffer;
//	}
//
//	private function dnsPrefetch($buffer) {
//		$dns=array();
//		// dns prefetch
//		if (preg_match_all("#'([[a-zA-Z0-9-_./:\?-]*).js#Uis", $buffer, $res)) {
//			foreach ($res[1] as $a) {
//				$parse = parse_url($a);
//				if ($parse['host']!=$_SERVER['HTTP_HOST'] and $parse['host']!='') {
//					$dns['//'.$parse['host']]=1;
//				}
//
//			}
//		}
//		if (preg_match_all('#"([[a-zA-Z0-9-_./:\?-]*).js#Uis', $buffer, $res)) {
//			foreach ($res[1] as $a) {
//				$parse = parse_url($a);
//				if ($parse['host']!=$_SERVER['HTTP_HOST'] and $parse['host']!='') {
//					$dns['//'.$parse['host']]=1;
//				}
//
//			}
//		}
//		if (preg_match_all('#([href|src])="([[a-zA-Z0-9-_./:\?-]*).png#', $buffer, $res)) {
//			foreach ($res[2] as $a) {
//				$parse = parse_url($a);
//				if ($parse['host']!=$_SERVER['HTTP_HOST'] and $parse['host']!='') {
//					$dns['//'.$parse['host']]=1;
//				}
//
//			}
//		}
//		foreach ($dns as $a=>$b) {
//			$buffer=str_replace('<head>','<head><link rel="dns-prefetch preconnect" href="'.$a.'">',$buffer);
//		}
//		return $buffer;
//	}
//
//	private function minHtml ($buffer) {
//		$search = array(
//			'/\>[^\S ]+/s',
//			'/[^\S ]+\</s',
//			'/(\s)+/s'
//		);
//		$replace = array(
//			'>',
//			'<',
//			'\\1'
//		);
//		$buffer = preg_replace($search, $replace, $buffer);
//
//		return $buffer;
//	}
//}
