<?php

class SearchAuto {
	/**
	 * @var MainClass
	 */
	var $registry;
	/**
	 * @var DatabaseClass
	 */
	var $db;

	public function __construct( &$registry ) {
		$this->registry  =& $registry;
		$this->db        =& $this->registry->db;
	}

	// Search by car
	function GetCars () {
		$array=array(

		);
		/*$result=$this->GetCarsFromDb();
		while ($result_item = $this->db->fetch_array($result))
		{
			$array[]=$result_item['vendor'];
		}*/

		return $array;
	}
	function GetCarsFromDb () {
		return $this->db->query_read("SELECT `vendor`
        FROM `shop_vehicles`
        GROUP BY `vendor`
		Order by `vendor` ASC");
	}

	function GetModels ($vendor) {
		$array=array();
		$result=$this->GetModelsFromDb($vendor);
		while ($result_item = $this->db->fetch_array($result))
		{
			$array[]=$result_item['car'];
		}
		return $array;
	}
	function GetModelsFromDb ($vendor) {
		return $this->db->query_read("SELECT `car`
        FROM `shop_vehicles`
        WHERE `vendor`=".$this->db->sql_prepare($vendor)."
        GROUP BY `car`
		Order by `car` ASC");
	}

	function GetCarsYears ($vendor,$car) {
		$array=array();
		$result=$this->GetCarsYearsFromDb($vendor,$car);
		while ($result_item = $this->db->fetch_array($result))
		{
			$array[]=$result_item['year'];
		}
		return $array;
	}
	function GetCarsYearsFromDb ($vendor,$car) {
		return $this->db->query_read("SELECT `year`
        FROM `shop_vehicles`
        WHERE `vendor`=".$this->db->sql_prepare($vendor)." and `car`=".$this->db->sql_prepare($car)."
        GROUP BY `year`
		Order by `year` ASC");
	}

	function GetCarsMods ($vendor,$car,$year) {
		$array=array();
		$result=$this->GetCarsModsFromDb($vendor,$car,$year);
		while ($result_item = $this->db->fetch_array($result))
		{
			$array[]=$result_item['modification'];
		}
		return $array;
	}

	function GetCarsModsFromDb ($vendor,$car,$year) {
		return $this->db->query_read("SELECT `modification`
        FROM `shop_vehicles`
        WHERE `vendor`=".$this->db->sql_prepare($vendor)." and `car`=".$this->db->sql_prepare($car)." and `year`=".$this->db->sql_prepare($year)."
        GROUP BY `modification`
		Order by `modification` ASC");
	}

	function GetAutoInfo ($vendor,$car,$year,$mod) {
		return $this->GetAutoInfoFromDb($vendor,$car,$year,$mod);
	}
	function GetAutoInfo2 ($url) {
		$file=ROOT_DIR.'/app/data/oil/to4ki_data_'.$url.'.dat';

		if (file_exists($file)) {
			return json_decode(file_get_contents($file),true);

		}
		else {
			return false;
		}
	}
	function GetAutoInfoFromDb ($vendor,$car,$year,$mod) {
		return $this->db->query_first("SELECT *
        FROM `shop_vehicles`
        WHERE `vendor`=".$this->db->sql_prepare($vendor)." and 
        `car`=".$this->db->sql_prepare($car)." and 
        `year`=".$this->db->sql_prepare($year)." and 
        `modification`=".$this->db->sql_prepare($mod));
	}

	function GetTyres ($auto_info) {
		$array=array();
		$result_item=$auto_info;

		$types=array(
			'factory',
			'replace',
			'tuning'
		);

		foreach ($types as $type) {
			if (isset($result_item['tyres_'.$type])) {
				$jj=explode('|',$result_item['tyres_'.$type]);
				foreach ($jj as $a) {
					$b=explode(',',$a);

					foreach ($b as $b_item) {
						$g=explode(' ',$b_item);
						$g2=explode('/',$g[0]);

						$array[]=array(
							'type'=>$type,
							'width'=>$g2[0],
							'profile'=>$g2[1],
							'diametr'=>$g[1]
						);
					}
				}
			}
		}

		return $array;
	}

	function GetWheels ($auto_info) {
		$array=array();
		$result_item=$auto_info;

		$types=array(
			'factory',
			'replace',
			'tuning'
		);

		foreach ($types as $type) {
			if (isset($result_item['wheels_'.$type]) and $result_item['wheels_'.$type]) {
				$jj=explode('|',$result_item['wheels_'.$type]);
				foreach ($jj as $a) {
					$b=explode(',',$a);

					foreach ($b as $b_item) {
						$g=explode(' ',$b_item);
						$g2=explode('*',$result_item['param_pcd']);

						$array[]=array(
							'type'=>$type,
							'width'=>$g[0],
							'diametr'=>$g[2],
							'et'=>str_replace('ET','',$g[3]),
							'dia'=>$result_item['param_dia'],
							'bolt'=>$g2[0],
							'pcd'=>$g2[1]
						);
					}
				}
			}
		}

		return $array;
	}
}
