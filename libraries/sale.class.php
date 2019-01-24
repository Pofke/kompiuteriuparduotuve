<?php

/**
 * Sutarčių redagavimo klasė
 *
 * @author ISK
 */

class sale {

	public function __construct() {
		
	}
	

	public function getSale($id) {
		$query = "  SELECT `pardavimas`.`id`,
        `firma`.`pavadinimas`,
		`modelis`.`pavadinimas`,
		`pardavimas`.`kaina`,
		`pardavimas`.`garantija`,
		`pardavimas`.`pratestos_garantijos_trukme`,
		`pardavimas`.`papildomo_draudimo_trukme`,
		`pardavimas`.`draudimo_ir_garantijos_kaina`
FROM `pardavimas`, `firma`, `modelis`, `kompiuteris`
WHERE  `pardavimas`.`id`='{$id}' && `pardavimas`.`fk_Kompiuterisid` = `kompiuteris`.`id` && `kompiuteris`.`fk_Modelioid` = `modelis`.`pavadinimas` && `modelis`.`fk_Firmapavadinimas` = `firma`.`pavadinimas`";
	}








public function getComputerListCount() {
		$query = "  SELECT COUNT(`pardavimas`.`id`) AS `kiekis`
					FROM `pardavimas`";
		$data = mysql::select($query);
		
		return $data[0]['kiekis'];
	}




public function getComputerList($limit = null, $offset = null) {
		$limitOffsetString = "";
		if(isset($limit)) {
			$limitOffsetString .= " LIMIT {$limit}";
		}
		if(isset($offset)) {
			$limitOffsetString .= " OFFSET {$offset}";
		}
		
		$query = " SELECT `pardavimas`.`id`,
        	`firma`.`pavadinimas` AS `firmos_pavadinimas`,
			`modelis`.`pavadinimas` AS `modelio_pavadinimas`,
			`pardavimas`.`kaina`,
			`pardavimas`.`garantija`,
			`pardavimas`.`pratestos_garantijos_trukme` AS `prgartr`,
			`pardavimas`.`papildomo_draudimo_trukme` AS `pradrtr`,
			`pardavimas`.`draudimo_ir_garantijos_kaina` AS `drirgarkaina`
		FROM `pardavimas`, `firma`, `modelis`, `kompiuteris`
		WHERE  `pardavimas`.`fk_Kompiuterisid` = `kompiuteris`.`id` && `kompiuteris`.`fk_Modelioid` = `modelis`.`pavadinimas` && `modelis`.`fk_Firmapavadinimas` = `firma`.`pavadinimas`". $limitOffsetString; 


		$data = mysql::select($query);
		
		return $data;
	}


public function deleteSale($id) {
		$query = "  DELETE FROM `pardavimas`
					WHERE `id`='{$id}'";
		mysql::query($query);
	}



public function getSaleStuff($dateFrom, $dateTo) {



		
		$query = "  SELECT  `pardavimas`.`id`,
							`klientas`.`vardas`,
							`klientas`.`pavardė`,
							`pardavimas`.`kaina`,
						    `pardavimas`.`garantija`,
						    `kompiuteris`.`id` AS `bumsakalaka`,	
						    `firma`.`pavadinimas` AS `komp_firma` ,
						    `modelis`.`pavadinimas` AS `komp_modelis`,
						    `pardavimas`.`pratestos_garantijos_trukme`,
						    (`pardavimas`.`draudimo_ir_garantijos_kaina` + `pardavimas`.`kaina`) AS `galutine_kaina`
					FROM `pardavimas`, `klientas`, `firma`, `modelis`, `kompiuteris`, `nuoma`
					WHERE `pardavimas`.`kaina` >= '{$dateFrom}' && `pardavimas`.`kaina` <= '{$dateTo}' &&`pardavimas`.`fk_Kompiuterisid` = `kompiuteris`.`id` && `nuoma`.`fk_Kompiuterisid` = `kompiuteris`.`id` && `nuoma`.`fk_Klientasasmens_kodas` = `klientas`.`asmens_kodas` && `kompiuteris`.`fk_Modelioid` = `modelis`.`pavadinimas`&& `modelis`.`fk_Firmapavadinimas` = `firma`.`pavadinimas`";


}