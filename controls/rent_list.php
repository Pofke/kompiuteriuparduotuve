<?php

	// sukuriame automobilių klasės objektą
	include 'libraries/rent.class.php';
	$rentObj = new rent();
	
	// sukuriame puslapiavimo klasės objektą
	include 'utils/paging.class.php';
	$paging = new paging(NUMBER_OF_ROWS_IN_PAGE);

if(!empty($removeId)) {
		// patikriname, ar automobilis neįtrauktas į sutartis
			// šaliname automobilį
			$rentObj->deleteRent($removeId);

		// nukreipiame į automobilių puslapį
		header("Location: index.php?module={$module}{$removeErrorParameter}");
		die();
	}






?>
<ul id="pagePath">
	<li><a href="index.php">Pradžia</a></li>
	<li>Nuoma</li>
</ul>
<div id="actions">
	<a href='index.php?module=<?php echo $module; ?>&action=new'>Nauja nuoma</a>
	<a href="report.php?id=2" target="_blank">Nuomos ataskaita</a>
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
		<th>Pasiemimo data</th>
		<th>Grąžinimo data</th>
		<th>Firma</th>
		<th>Modelis</th>
		<th>Kaina</th>
		<th></th>
	</tr>
	<?php
		// suskaičiuojame bendrą įrašų kiekį
		$elementCount = $rentObj->getRentListCount();
		// suformuojame sąrašo puslapius
		$paging->process($elementCount, $pageId);

		// išrenkame nurodyto puslapio automobilius
		$data = $rentObj->getRentList($paging->size, $paging->first);

		// suformuojame lentelę
		foreach($data as $key => $val) {
			echo
				"<tr>"
					. "<td>{$val['id_Nuoma']}</td>"
					. "<td>{$val['data']}</td>"
					. "<td>{$val['grąžinimo_data']}</td>"
					. "<td>{$val['pavadinimas']}</td>"
					. "<td>{$val['model']} </td>"
					. "<td>{$val['kaina']} </td>"
					. "<td>"
						. "<a href='#' onclick='showConfirmDialog(\"{$module}\", \"{$val['id_Nuoma']}\"); return false;' title=''>šalinti</a>&nbsp;"
						. "<a href='index.php?module={$module}&id={$val['id_Nuoma']}' title=''>redaguoti</a>"
					. "</td>"
				. "</tr>";
		}
	?>
</table>
<?php
	// įtraukiame puslapių šabloną
	include 'controls/paging.php';
?>