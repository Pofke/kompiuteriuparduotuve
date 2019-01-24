<?php

/**
 * Sutarčių redagavimo klasė
 *
 * @author ISK
 */

class bill {

	public function __construct() {
		
	}
	
	/**
	 * Sutarčių sąrašo išrinkimas
	 * @param type $limit
	 * @param type $offset
	 * @return type
	 */
	public function getBillList($limit = null, $offset = null) {
		$limitOffsetString = "";
		if(isset($limit)) {
			$limitOffsetString .= " LIMIT {$limit}";
		}
		if(isset($offset)) {
			$limitOffsetString .= " OFFSET {$offset}";
		}






		$query = "  SELECT `sąskaita`.`nr`,
						   `sąskaita`.`data` AS `krcdata`,
						   `klientas`.`vardas`,
						   `klientas`.`pavardė`
					FROM `sąskaita`, `klientas`
					WHERE `klientas`.`asmens_kodas` = `sąskaita`.`fk_Klientasasmens_kodas`"	. $limitOffsetString; 
					//LIMIT {$limit} OFFSET {$offset}";
		$data = mysql::select($query);
		
		return $data;
	}



public function getBillListCount() {
		$query = "  SELECT COUNT(`sąskaita`.`nr`) AS `kiekis`
					FROM `sąskaita`";
		$data = mysql::select($query);
		
		return $data[0]['kiekis'];
	}

public function deleteBill($id) {
		$query = "  DELETE FROM `sąskaita`
					WHERE `nr`='{$id}'";
		mysql::query($query);
	}


public function getBillContracts($dateFrom, $dateTo) {
		$whereClauseString = "";
		if(!empty($dateFrom)) {
			$whereClauseString .= " WHERE `sąskaita`.`data`>='{$dateFrom}'";
			if(!empty($dateTo)) {
				$whereClauseString .= " AND `sąskaita`.`data`<='{$dateTo}'";
			}
		} else {
			if(!empty($dateTo)) {
				$whereClauseString .= " WHERE `sąskaita`.`data`<='{$dateTo}'";
			}
		}
		
		$query = "  SELECT  `sąskaita`.`nr`,
							`sąskaita`.`data`,
							`klientas`.`vardas`,
						    `klientas`.`pavardė`
					FROM `sąskaita`, `klientas`
					WHERE `klientas`.`asmens_kodas` = `sąskaita`.`fk_Klientasasmens_kodas` && `sąskaita`.`data`>='{$dateFrom}' && `sąskaita`.`data`<='{$dateTo}'
					GROUP BY `sąskaita`.`nr` ORDER BY `klientas`.`pavardė` ASC";
		$data = mysql::select($query);

		return $data;
	}



public function updateBill($data) {
		$query = "  UPDATE `sąskaita`
					SET    `nr`='{$data['nr']}',
						   `data`='{$data['data']}',
						   `fk_Klientasasmens_kodas`='{$data['asmens_kodas']}',
						   `fk_kompiuterisid`='{$data['kompiuterio_id']}'
					WHERE `nr`='{$data['nr']}'";
		mysql::query($query);
	}



public function insertBill($data) {
		$query = "  INSERT INTO `sąskaita`
								(
									`nr`,
									`data`,
									`fk_Klientasasmens_kodas`,
									`fk_kompiuterisid`
								)
								VALUES
								(
									'{$data['nr']}',
									'{$data['data']}',
									'{$data['asmens_kodas']}',
									'{$data['kompiuterio_id']}'
								)";
		mysql::query($query);
	}



public function getBill($id) {
		$query = "  SELECT `sąskaita`.`nr`,
						   `sąskaita`.`data`,
						   `sąskaita`.`fk_Klientasasmens_kodas` AS `asmens_kodas`,
						   `sąskaita`.`fk_kompiuterisid` AS `kompiuterio_id`
					FROM `sąskaita`
					WHERE 'sąskaita'.'nr'='{$id}'";
		$data = mysql::select($query);
		
		return $data[0];
	}
	





}
	