<?php

class rent {

	public function __construct() {
		
	}

	public function getRent($id) {
		$query = "  SELECT `nuoma`.`id_Nuoma`,
	`nuoma`.`data`,
	`nuoma`.`grąžinimo_data`,
	`firma`.`pavadinimas`,
	`modelis`.`pavadinimas` AS `model`,
	`nuoma`.`kaina`
FROM `nuoma`, `firma`, `modelis`, `kompiuteris`
WHERE `nuoma`.`id`='{$id}' &&`kompiuteris`.`id` = `nuoma`.`fk_Kompiuterisid` && `modelis`.`pavadinimas` = `kompiuteris`.`fk_Modelioid` && `modelis`.`fk_Firmapavadinimas` = `firma`.`pavadinimas`";
	}








public function getRentListCount() {
		$query = "  SELECT COUNT(`nuoma`.`id_Nuoma`) AS `kiekis`
					FROM `nuoma`";
		$data = mysql::select($query);
		
		return $data[0]['kiekis'];
	}




public function getRentList($limit = null, $offset = null) {
		$limitOffsetString = "";
		if(isset($limit)) {
			$limitOffsetString .= " LIMIT {$limit}";
		}
		if(isset($offset)) {
			$limitOffsetString .= " OFFSET {$offset}";
		}
		
		$query = " SELECT `nuoma`.`id_Nuoma`,
							`nuoma`.`data`,
							`nuoma`.`grąžinimo_data`,
							`firma`.`pavadinimas`,
							`modelis`.`pavadinimas` AS `model`,
							`nuoma`.`kaina`
					FROM `nuoma`, `firma`, `modelis`, `kompiuteris`
					WHERE `kompiuteris`.`id` = `nuoma`.`fk_Kompiuterisid` && `modelis`.`pavadinimas` = `kompiuteris`.`fk_Modelioid` && `modelis`.`fk_Firmapavadinimas` = `firma`.`pavadinimas`". $limitOffsetString; 


		$data = mysql::select($query);
		
		return $data;
	}
	public function deleteRent($id) {
		$query = "  DELETE FROM `nuoma`
					WHERE `id_Nuoma`='{$id}'";
		mysql::query($query);
	}




public function getRenters($dateFrom) {

		$query = " SELECT  `nuoma`.`id_Nuoma`,
							`nuoma`.`data`,
							`nuoma`.`grąžinimo_data`,
							`modelis`.`fk_Firmapavadinimas`,
						    `modelis`.`pavadinimas`,
						    `nuoma`.`kaina`,
						    `klientas`.`vardas`,
						    `klientas`.`pavardė`,
						    `klientas`.`asmens_kodas`
						 
					FROM `nuoma`, `kompiuteris`, `modelis`, `klientas`
					
					WHERE  `kompiuteris`.`fk_Modelioid` = `modelis`.`pavadinimas` && `nuoma`.`fk_Kompiuterisid` = `kompiuteris`.`id` && `klientas`.`asmens_kodas` = `nuoma`.`fk_Klientasasmens_kodas` && `nuoma`.`data` <= '{$dateFrom}' && `nuoma`.`grąžinimo_data` >= '{$dateFrom}'
					Order BY `asmens_kodas`";//" //}"; 

		$data = mysql::select($query);

		return $data;
	}

}