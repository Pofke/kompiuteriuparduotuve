<?php

	// sukuriame automobilių klasės objektą
	include 'libraries/computer.class.php';
	$computerObj = new computer();
	
	// sukuriame puslapiavimo klasės objektą
	include 'utils/paging.class.php';
	$paging = new paging(NUMBER_OF_ROWS_IN_PAGE);

if(!empty($removeId)) {
		// patikriname, ar automobilis neįtrauktas į sutartis
		//$count = $computerObj->getContractCountOfComputer($removeId);
	
		//$removeErrorParameter = '';
		//if($count == 0) {
			// šaliname automobilį
			$computerObj->deleteComputer($removeId);
		//} else {
			// nepašalinome, nes automobilis įtrauktas bent į vieną sutartį, rodome klaidos pranešimą
		//	$removeErrorParameter = '&remove_error=1';
		//}

		// nukreipiame į automobilių puslapį
		header("Location: index.php?module={$module}{$removeErrorParameter}");
		die();
	}






?>
<ul id="pagePath">
	<li><a href="index.php">Pradžia</a></li>
	<li>Kompiuteriai</li>
</ul>
<div id="actions">
	<a href='index.php?module=<?php echo $module; ?>&action=new'>Naujas kompiuteris</a>
</div>
<div class="float-clear"></div>

<?php if(isset($_GET['remove_error'])) { ?>
	<div class="errorBox">
		Kompiuteris nebuvo pašalinta, nes yra įtrauktas į nuoma.
	</div>
<?php } ?>
<table>
	<tr>
		<th>ID</th>
		<th>Firma</th>
		<th>Modelio pavadinimas</th>
		<th>Atm_Kiekis</th>
		<th>Procesorius</th>
		<th>Procesoriaus_Modelis</th>
		<th></th>
	</tr>
	<?php
		// suskaičiuojame bendrą įrašų kiekį
		$elementCount = $computerObj->getComputerListCount();
		// suformuojame sąrašo puslapius
		$paging->process($elementCount, $pageId);

		// išrenkame nurodyto puslapio automobilius
		$data = $computerObj->getComputerList($paging->size, $paging->first);

		// suformuojame lentelę
		foreach($data as $key => $val) {
			echo
				"<tr>"
					. "<td>{$val['id']}</td>"
					. "<td>{$val['pavadinimas']}</td>"
					. "<td>{$val['kompiuterio_modelis']}</td>"
					. "<td>{$val['atminties_kiekis']}</td>"
					. "<td>{$val['procesoriaus_firma']} </td>"
					. "<td>{$val['procesoriaus_modelis']}</td>"
					. "<td>"
						. "<a href='#' onclick='showConfirmDialog(\"{$module}\", \"{$val['id']}\"); return false;' title=''>šalinti</a>&nbsp;"
						. "<a href='index.php?module={$module}&id={$val['id']}' title=''>redaguoti</a>"
					. "</td>"
				. "</tr>";
		}
	?>
</table>
<?php
	// įtraukiame puslapių šabloną
	include 'controls/paging.php';
?>