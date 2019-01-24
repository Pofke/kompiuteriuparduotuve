<?php

	// sukuriame automobilių klasės objektą
	include 'libraries/bill.class.php';
	$billObj = new bill();
	
	// sukuriame puslapiavimo klasės objektą
	include 'utils/paging.class.php';
	$paging = new paging(NUMBER_OF_ROWS_IN_PAGE);

	if(!empty($removeId)) {
			$billObj->deleteBill($removeId);

		// nukreipiame į automobilių puslapį
		header("Location: index.php?module={$module}{$removeErrorParameter}");
		die();
	}
?>
<ul id="pagePath">
	<li><a href="index.php">Pradžia</a></li>
	<li>Sąskaita</li>
</ul>
<div id="actions">
	<a href="report.php?id=1" target="_blank">Sąskaitų ataskaita</a>
	<a href='index.php?module=<?php echo $module; ?>&action=new'>Nauja sąskaita</a>
</div>
<div class="float-clear"></div>

<?php if(isset($_GET['remove_error'])) { ?>
	<div class="errorBox">
		Klientas nebuvo pašalintas, nes yra įtrauktas į sutartį (-is).
	</div>
<?php } ?>

<table>
	<tr>
		<th>Nr.</th>
		<th>Data</th>
		<th>Kliento Vardas</th>
		<th>Kliento Pavardė</th>
		<th></th>
	</tr>
	<?php
		// suskaičiuojame bendrą įrašų kiekį
		$elementCount = $billObj->getBillListCount();

		// suformuojame sąrašo puslapius
		$paging->process($elementCount, $pageId);

		// išrenkame nurodyto puslapio automobilius
		$data = $billObj->getBillList($paging->size, $paging->first);

		// suformuojame lentelę
		foreach($data as $key => $val) {
			echo
				"<tr>"
					. "<td>{$val['nr']}</td>"
					. "<td>{$val['krcdata']}</td>"
					. "<td>{$val['vardas']}</td>"
					. "<td>{$val['pavardė']}</td>"
					. "<td>"
						. "<a href='#' onclick='showConfirmDialog(\"{$module}\", \"{$val['nr']}\"); return false;' title=''>šalinti</a>&nbsp;"
						. "<a href='index.php?module={$module}&id={$val['nr']}' title=''>redaguoti</a>"
					. "</td>"
				. "</tr>";
		}
	?>
</table>

<?php
	// įtraukiame puslapių šabloną
	include 'controls/paging.php';
?>