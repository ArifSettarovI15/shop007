<?php
//
class Caching {

	/**
	 * @var Memcache
	 */
	private $Memcache=false;
	private $prefix='smak_';
	private $force=false;
	private $set_cache=false;

	public function __construct($force=false) {
		$this->force=$force;
	}

	public function init() {
//		$this->Memcache = new Memcache;
//		$this->Memcache->connect('127.0.0.1', 11211);
	}

	private function checkUpTime() {
		$content=file_get_contents(ROOT_DIR.'/app/cache_time.dat');
		if (intval($content)<TIMENOW) {
			file_put_contents(ROOT_DIR.'/app/cache_time.dat',24*3600+TIMENOW);
			return false;
		}
		return true;
	}

	private function getName($name) {
		return $this->prefix.$name;
	}


	public function get ($name) {
		if ($this->Memcache) {
			if ($_SERVER['REQUEST_METHOD']=='GET') {
				$data = @$this->Memcache->get($this->getName($this->prefix.$name));
				if($data) {
					return $data;
				}
			}
		}
		return false;
	}

	public function set($name,$data,$hours=3) {
		if ($this->Memcache) {
			if ($_SERVER['REQUEST_METHOD']=='GET' and preg_match_all('#manager#Us', $_SERVER['REQUEST_URI'], $res)==false) {
				$this->Memcache->set($this->getName($this->prefix.$name), $data, false, $hours*3600);
			}
		}
	}

	public function check(){
		if ($this->Memcache and intval($_REQUEST['page'])<=1 ) {
			if ($_SERVER['REQUEST_METHOD']=='GET') {
				$url=$_SERVER['REQUEST_URI'];

				$rendered = @$this->Memcache->get($this->getName($url));
				if($rendered) {
					echo $rendered;
					exit;
				}
				else {
					$this->set_cache=true;
				}
			}
		}

	}

	public function setCache($html,$hours=24) {
		if ($this->Memcache  and $this->force and $this->set_cache) {
			if ($_SERVER['REQUEST_METHOD']=='GET' and preg_match_all('#manager#Us', $_SERVER['REQUEST_URI'], $res)==false) {
				$url=$_SERVER['REQUEST_URI'];
				$this->Memcache->set($this->getName($url), $html, false, $hours*3600);
			}
		}
	}
}
