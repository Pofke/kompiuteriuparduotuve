<?php

	include 'libraries/sale.class.php';
	$saleObj = new sale();
	
	$formErrors = null;
	$fields = array();
	$formSubmitted = false;
		
	$data = array();
	if(!empty($_POST['submit'])) {
		$formSubmitted = true;

		// nustatome laukų validatorių tipus
		$validations = array (
			'kainaNuo' => 'positivenumber',
			'kainaIki' => 'positivenumber');
		
		// sukuriame validatoriaus objektą
		include 'utils/validator.class.php';
		$validator = new validator($validations);
		

		if($validator->validate($_POST)) {
			// suformuojame laukų reikšmių masyvą SQL užklausai
			$data = $validator->preparePostFieldsForSQL();
		} else {
			// gauname klaidų pranešimą
			$formErrors = $validator->getErrorHTML();
			// gauname įvestus laukus
			$fields = $_POST;
		}
	}
	
if($formSubmitted == true && ($formErrors == null)) { ?>
	<div id="header">
		<ul id="reportInfo">
			<li class="title">Pardavimo ataskaita</li>
			<li>Sudarymo data: <span><?php echo date("Y-m-d"); ?></span></li>
			<li>Kainų palyginimas:
				<span>
					<?php
						if(!empty($data['kainaNuo'])) {
							if(!empty($data['kainaIki'])) {
								echo "nuo {$data['kainaNuo']} iki {$data['kainaIki']}";
							} else {
								echo "nuo {$data['kainaNuo']}";
							}
						} else {
							if(!empty($data['kainaIki'])) {
								echo "iki {$data['kainaIki']}";
							} else {
								echo "nenurodyta";
							}
						}
					?>
				</span>
				<a href="report.php?id=3" title="Nauja ataskaita" class="newReport">nauja ataskaita</a>
			</li>
		</ul>
	</div>
<?php } ?>
<div id="content">
	<div id="contentMain">
		<?php if($formSubmitted == false || $formErrors != null) { ?>
			<div id="formContainer">
				<?php if($formErrors != null) { ?>
					<div class="errorBox">
						Neįvesti arba neteisingai įvesti šie laukai:
						<?php 
							echo $formErrors;
						?>
					</div>
				<?php } ?>
				<form action="" method="post">
					<fieldset>
						<legend>Įveskite ataskaitos kriterijus</legend>
						<p><label class="field" for="kainaNuo">Kaina sudaryta nuo</label><input type="text" id="kainaNuo" name="kainaNuo" value="<?php echo isset($fields['kainaNuo']) ? $fields['kainaNuo'] : ''; ?>" /></p>
						<p><label class="field" for="kainaIki">Kaina sudaryta iki</label><input type="text" id="kainaIki" name="kainaIki" value="<?php echo isset($fields['kainaIki']) ? $fields['kainaIki'] : ''; ?>" /></p>
					</fieldset>
					<p><input type="submit" class="submit" name="submit" value="Sudaryti ataskaitą"></p>
				</form>
			</div>
		<?php } else {
				// išrenkame ataskaitos duomenis
				$contractData = $saleObj->getSaleStuff($data['kainaNuo'], $data['kainaIki']);
			//	$totalPrice = $saleObj->getSumPriceOfContracts($data['kainaNuo'], $data['kainaIki']);
			//	$totalServicePrice = $saleObj->getSumPriceOfOrderedServices($data['kainaNuo'], $data['kainaIki']);
				
				if(sizeof($contractData) > 0) { ?>
		
					<table class="reportTable">
						<tr>
							<th>ID</th>
							<th>Pirkėjas</th>
							<th>Kaina</th>
							<th>Garantija</th>
							<th>Kaina su pap</th>
						</tr>

						<?php

							// suformuojame lentelę
							for($i = 0; $i < sizeof($contractData); $i++) {
								
								if($i == 0 || $contractData[$i]['bumsakalaka'] != $contractData[$i-1]['bumsakalaka']) {
									echo
										"<tr class='rowSeparator'><td colspan='5'></td></tr>"
										. "<tr>"
											. "<td class='groupSeparator' colspan='5'>{$contractData[$i]['komp_firma']} {$contractData[$i]['komp_modelis']}</td>"
										. "</tr>";
								}
								
								echo
									"<tr>"
										. "<td>#{$contractData[$i]['id']}</td>"
										. "<td>{$contractData[$i]['vardas']} {$contractData[$i]['pavardė']}</td>"
										. "<td>{$contractData[$i]['kaina']}</td>"
										. "<td>{$contractData[$i]['garantija']} metai</td>"
										. "<td>{$contractData[$i]['galutine_kaina']}</td>"
									. "</tr>";
								/*if($i == (sizeof($contractData) - 1) || $contractData[$i]['asmens_kodas'] != $contractData[$i+1]['asmens_kodas']) {

									if($contractData[$i]['bendra_kliento_paslaugu_kaina'] == 0) {
										$contractData[$i]['bendra_kliento_paslaugu_kaina'] = "neužsakyta";
									} else {
										$contractData[$i]['bendra_kliento_paslaugu_kaina'] .= " &euro;";
									}
									
									echo 
										"<tr class='aggregate'>"
											. "<td colspan='2'></td>"
											. "<td class='border'>{$contractData[$i]['bendra_kliento_sutarciu_kaina']} &euro;</td>"
											. "<td class='border'>{$contractData[$i]['bendra_kliento_paslaugu_kaina']}</td>"
										. "</tr>";
								}*/
							}
						?>
						
						
						
					
					</table>
			<?php   } else { ?>
						<div class="warningBox">
							Nurodytu laikotartpiu sutarčių nebuvo užsakyta
						</div>
					<?php
					}
			} ?>
	</div>
</div>