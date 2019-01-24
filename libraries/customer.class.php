<?php

/**
 * Sutarčių redagavimo klasė
 *
 * @author ISK
 */

class customer {

	public function __construct() {
		
	}
	
	/**
	 * Sutarčių sąrašo išrinkimas
	 * @param type $limit
	 * @param type $offset
	 * @return type
	 */
	public function getCustomerList($limit, $offset) {
		$query = "  SELECT `klientas`.`vardas`,
							`klientas`.`pavardė`,
							`klientas`.`asmens_kodas`,
							`klientas`.`telefono_numeris`,
							`klientas`.`el_paštas`
					FROM `klientas`
					LIMIT {$limit} OFFSET {$offset}";
		$data = mysql::select($query);
		
		return $data;
	}



public function getCustomerListCount() {
		$query = "  SELECT COUNT(`klientas`.`asmens_kodas`) AS `kiekis`
					FROM `klientas`";
		$data = mysql::select($query);
		
		return $data[0]['kiekis'];
	}



public function deleteCustomer($id) {
		$query = "  DELETE FROM `klientas`
					WHERE `asmens_kodas`='{$id}'";
		mysql::query($query);
	}






public function updateCustomer($data) {
		$query = "  UPDATE `klientas`
					SET    `vardas`='{$data['vardas']}',
						   `pavardė`='{$data['pavardė']}',
						   `asmens_kodas`='{$data['asmens_kodas']}',
						   `telefono_numeris`='{$data['telefono_numeris']}',
						   `el_paštas`='{$data['el_paštas']}'
					WHERE `id`='{$data['id']}'";
		mysql::query($query);
	}



public function insertCustomer($data) {
		$query = "  INSERT INTO `klientas`
								(
									`vardas`,
									`pavardė`,
									`asmens_kodas`,
									`telefono_numeris`,
									`el_paštas`
								)
								VALUES
								(
									'{$data['vardas']}',
									'{$data['pavardė']}',
									'{$data['asmens_kodas']}',
									'{$data['telefono_numeris']}',
									'{$data['el_paštas']}'
								)";
		mysql::query($query);
	}



public function getCustomer($id) {
		$query = "  SELECT `klientas`.`vardas`,
						   `klientas`.`pavardė`,
						   `klientas`.`asmens_kodas`,
						   `klientas`.`telefono_numeris`,
						   `klientas`.`el_paštas`,
					FROM `klientas`
					WHERE `klientas'.'asmens_kodas'='{$id}'";
		$data = mysql::select($query);
		
		return $data[0];
	}
	


}
				