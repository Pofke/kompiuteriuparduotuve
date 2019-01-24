<?php

/**
 * Sutarčių redagavimo klasė
 *
 * @author ISK
 */

class computer {

	public function __construct() {
		
	}
	
/*
	public function getComputer($id) {
		$query = "  SELECT `kompiuteris`.`id`,
	   `firma`.`pavadinimas`,
	   `modelis`.`pavadinimas` AS `kompiuterio_modelis`,
	   `kompiuteris`.`atminties_kiekis`,
	   `procesorius`.`firma`,
	   `procesorius`.`modelis` AS `procesoriaus_modelis`
FROM `kompiuteris`, `firma`, `modelis`, `procesorius`
WHERE  `kompiuteris`.`id`='{$id}' && `firma`.`pavadinimas` = `modelis`.`fk_Firmapavadinimas`&& `kompiuteris`.`fk_Modelioid` = `modelis`.`pavadinimas` && `procesorius`.`modelis` = `kompiuteris`.`fk_Procesoriusmodelis`";
	}*/


public function getComputer($id) {
	$query = "  SELECT `kompiuteris`.`id`,
	   `kompiuteris`.`pagminimo_data`,
	   `kompiuteris`.`atminties_kiekis` AS `kompiuterio_modelis`,
	   `kompiuteris`.`fk_Procesoriusmodelis`,
	   `kompiuteris`.`fk_Vaizdo_plokštėmodelis`,
	   `kompiuteris`.`fk_Kietasis_diskasmodelis`,
	   `kompiuteris`.`fk_Modelioid`
FROM `kompiuteris`
WHERE  `kompiuteris`.`id`='{$id}'";
$data = mysql::select($query);
		
		return $data[0];
	}






public function deleteComputer($id) {
		$query = "  DELETE FROM `kompiuteris`
					WHERE `id`='{$id}'";
		mysql::query($query);
	}


public function getProcessor() {
		$query = "  SELECT `procesorius`.`modelis`
					FROM `procesorius`";
		$data = mysql::select($query);
		
		return $data;
	}

public function getGPU() {
		$query = "  SELECT `vaizdo_plokštė`.`modelis`
					FROM `vaizdo_plokštė`";
		$data = mysql::select($query);
		
		return $data;
	}

public function getHDD() {
		$query = "  SELECT `kietasis_diskas`.`modelis`
					FROM `kietasis_diskas`";
		$data = mysql::select($query);
		
		return $data;
	}

public function getModel() {
		$query = "  SELECT `modelis`.`pavadinimas`
					FROM `modelis`";
		$data = mysql::select($query);
		
		return $data;
	}

public function getComputerListCount() {
		$query = "  SELECT COUNT(`kompiuteris`.`id`) AS `kiekis`
					FROM `kompiuteris`";
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
		
		$query = " SELECT `kompiuteris`.`id`,
	   `firma`.`pavadinimas`,
	   `modelis`.`pavadinimas` AS `kompiuterio_modelis`,
	   `kompiuteris`.`atminties_kiekis`,
	   `procesorius`.`firma` AS `procesoriaus_firma`,
	   `procesorius`.`modelis` AS `procesoriaus_modelis`
		FROM `kompiuteris`, `firma`, `modelis`, `procesorius`
		WHERE `firma`.`pavadinimas` = `modelis`.`fk_Firmapavadinimas`&& `kompiuteris`.`fk_Modelioid` = `modelis`.`pavadinimas` && `procesorius`.`modelis` = `kompiuteris`.`fk_Procesoriusmodelis`". $limitOffsetString; 


		$data = mysql::select($query);
		
		return $data;
	}

public function updateComputer($data) {
		$query = "  UPDATE `kompiuteris`
					SET    `pagminimo_data`='{$data['pagminimo_data']}',
						   `atminties_kiekis`='{$data['atminties_kiekis']}',
						   `fk_Procesoriusmodelis`='{$data['fk_Procesoriusmodelis']}',
						   `fk_Vaizdo_plokštėmodelis`='{$data['fk_Vaizdo_plokštėmodelis']}',
						   `fk_Kietasis_diskasmodelis`='{$data['fk_Kietasis_diskasmodelis']}',
						   `fk_Modelioid`='{$data['fk_Modelioid']}'
					WHERE `id`='{$data['id']}'";
		mysql::query($query);
	}


	public function insertComputer($data) {
		$query = "  INSERT INTO `kompiuteris` 
								(
									`id`,
									`pagminimo_data`,
									`atminties_kiekis`,
									`fk_Procesoriusmodelis`,
									`fk_Vaizdo_plokštėmodelis`,
									`fk_Kietasis_diskasmodelis`,
									`fk_Modelioid`
									
								) 
								VALUES
								(
									'{$data['id']}',
									'{$data['pagminimo_data']}',
									'{$data['atminties_kiekis']}',
									'{$data['fk_Procesoriusmodelis']}',
									'{$data['fk_Vaizdo_plokštėmodelis']}',
									'{$data['fk_Kietasis_diskasmodelis']}',
									'{$data['fk_Modelioid']}'
								)";
		mysql::query($query);
	}

}