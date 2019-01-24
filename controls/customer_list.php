<?php

	// sukuriame automobilių klasės objektą
	include 'libraries/customer.class.php';
	$customerObj = new customer();
	
	// sukuriame puslapiavimo klasės objektą
	include 'utils/paging.class.php';
	$paging = new paging(NUMBER_OF_ROWS_IN_PAGE);

	if(!empty($removeId)) {
			$customerObj->deleteCustomer($removeId);

		// nukreipiame į automobilių puslapį
		header("Location: index.php?module={$module}{$removeErrorParameter}");
		die();
	}
?>
<ul id="pagePath">
	<li><a href="index.php">Pradžia</a></li>
	<li>Klientai</li>
</ul>
<div id="actions">
	<a href='index.php?module=<?php echo $module; ?>&action=new'>Naujas klientas</a>
</div>
<div class="float-clear"></div>

<?php if(isset($_GET['remove_error'])) { ?>
	<div class="errorBox">
		Klientas nebuvo pašalintas, nes yra įtrauktas į sutartį (-is).
	</div>
<?php } ?>

<table>
	<tr>
		<th>Vardas</th>
		<th>Pavardė</th>
		<th>Asmens kodas</th>
		<th>Telefono nr.</th>
		<th>El. Paštas</th>
		<th></th>
	</tr>
	<?php
		// suskaičiuojame bendrą įrašų kiekį
		$elementCount = $customerObj->getCustomerListCount();

		// suformuojame sąrašo puslapius
		$paging->process($elementCount, $pageId);

		// išrenkame nurodyto puslapio automobilius
		$data = $customerObj->getCustomerList($paging->size, $paging->first);

		// suformuojame lentelę
		foreach($data as $key => $val) {
			echo
				"<tr>"
					. "<td>{$val['vardas']}</td>"
					. "<td>{$val['pavardė']}</td>"
					. "<td>{$val['asmens_kodas']}</td>"
					. "<td>{$val['telefono_numeris']}</td>"
					. "<td>{$val['el_paštas']}</td>"
					. "<td>"
						. "<a href='#' onclick='showConfirmDialog(\"{$module}\", \"{$val['asmens_kodas']}\"); return false;' title=''>šalinti</a>&nbsp;"
						. "<a href='index.php?module={$module}&id={$val['asmens_kodas']}' title=''>redaguoti</a>"
					. "</td>"
				. "</tr>";
		}
	?>
</table>

<?php
	// įtraukiame puslapių šabloną
	include 'controls/paging.php';
?>