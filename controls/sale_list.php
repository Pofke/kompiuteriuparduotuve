<?php

	// sukuriame automobilių klasės objektą
	include 'libraries/sale.class.php';
	$saleObj = new sale();
	
	// sukuriame puslapiavimo klasės objektą
	include 'utils/paging.class.php';
	$paging = new paging(NUMBER_OF_ROWS_IN_PAGE);

if(!empty($removeId)) {
		// patikriname, ar automobilis neįtrauktas į sutartis
		//$count = $saleObj->getContractCountOfSale($removeId);
	
//		$removeErrorParameter = '';
//		if($count == 0) {
			// šaliname automobilį
			$saleObj->deleteSale($removeId);
//		} else {
			// nepašalinome, nes automobilis įtrauktas bent į vieną sutartį, rodome klaidos pranešimą
//			$removeErrorParameter = '&remove_error=1';
//		}

		// nukreipiame į automobilių puslapį
		header("Location: index.php?module={$module}{$removeErrorParameter}");
		die();
	}






?>
<ul id="pagePath">
	<li><a href="index.php">Pradžia</a></li>
	<li>Pardavimai</li>
</ul>
<div id="actions">
	<a href='index.php?module=<?php echo $module; ?>&action=new'>Naujas pardavimas</a>
	<a href="report.php?id=3" target="_blank">Pardavimų ataskaita</a>
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
		<th>Kaina</th>
		<th>Garantija</th>
		<th>Pap. garantija</th>
		<th>Pap. draudimas</th>
		<th>Draudimo ir garantijos kaina</th>
		<th></th>
	</tr>
	<?php
		// suskaičiuojame bendrą įrašų kiekį
		$elementCount = $saleObj->getComputerListCount();
		// suformuojame sąrašo puslapius
		$paging->process($elementCount, $pageId);

		// išrenkame nurodyto puslapio automobilius
		$data = $saleObj->getComputerList($paging->size, $paging->first);

		// suformuojame lentelę
		foreach($data as $key => $val) {
			echo
				"<tr>"
					. "<td>{$val['id']}</td>"
					. "<td>{$val['firmos_pavadinimas']}</td>"
					. "<td>{$val['modelio_pavadinimas']}</td>"
					. "<td>{$val['kaina']}</td>"
					. "<td>{$val['garantija']} </td>"
					. "<td>{$val['prgartr']} </td>"
					. "<td>{$val['pradrtr']} </td>"
					. "<td>{$val['drirgarkaina']}</td>"
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