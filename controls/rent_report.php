<?php

	include 'libraries/rent.class.php';
	$rentObj = new rent();
	
	$formErrors = null;
	$fields = array();
	$formSubmitted = false;
		
	$data = array();
	if(!empty($_POST['submit'])) {
		$formSubmitted = true;

		// nustatome laukų validatorių tipus
		$validations = array (
			'isnuomotaData' => 'date'
		);
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
			<li class="title">Nuomos ataskaita</li>
			<li>Sudarymo data: <span><?php echo date("Y-m-d"); ?></span></li>
			<li>Data:
				<span>
					<?php
						if(!empty($data['isnuomotaData'])) {
								echo "nuo {$data['isnuomotaData']}";
							 
						} else {
								echo "nenurodyta";
							
						}
					?>
				</span>
				<a href="report.php?id=2" title="Nauja ataskaita" class="newReport">nauja ataskaita</a>
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
						<legend>Įveskite Nuomos kriterijus</legend>
						<p><label class="field" for="isnuomotaData">Data pažiūrėti kiek išnuomota kompiuteriu</label><input type="text" id="isnuomotaData" name="isnuomotaData" class="textbox-100 date" value="<?php echo isset($fields['isnuomotaData']) ? $fields['isnuomotaData'] : ''; ?>" /></p>
						</fieldset>
					<p><input type="submit" class="submit" name="submit" value="Sudaryti ataskaitą"></p>
				</form>
			</div>
		<?php } else {
			
				// išrenkame ataskaitos duomenis
				$contractData = $rentObj->getRenters($data['isnuomotaData']);
			//	$totalPrice = $rentObj->getSumPriceOfContracts($data['isnuomotaData']);
			//	$totalServicePrice = $rentObj->getSumPriceOfOrderedServices($data['isnuomotaData']);
				
				if(sizeof($contractData) > 0) { ?>
		
					<table class="reportTable">
						<tr>
							<th>ID</th>
							<th>Pasiemimo data</th>
							<th>Grąžinimo data</th>
							<th>Kompiuteris</th>
							<th>Kaina</th>
						</tr>

						<?php

							// suformuojame lentelę
							for($i = 0; $i < sizeof($contractData); $i++) {
								
								if($i == 0 || $contractData[$i]['asmens_kodas'] != $contractData[$i-1]['asmens_kodas']) {
									echo
										"<tr class='rowSeparator'><td colspan='5'></td></tr>"
										. "<tr>"
											. "<td class='groupSeparator' colspan='5'>{$contractData[$i]['vardas']} {$contractData[$i]['pavardė']}</td>"
										. "</tr>";
								}
							/*	
								if($contractData[$i]['sutarties_paslaugu_kaina'] == 0) {
									$contractData[$i]['sutarties_paslaugu_kaina'] = "neužsakyta";
								} else {
									$contractData[$i]['sutarties_paslaugu_kaina'] .= " &euro;";
								}
								*/
								echo
									"<tr>"
										. "<td>#{$contractData[$i]['id_Nuoma']}</td>"
										. "<td>{$contractData[$i]['data']}</td>"
										. "<td>{$contractData[$i]['grąžinimo_data']}</td>"
										. "<td>{$contractData[$i]['fk_Firmapavadinimas']} {$contractData[$i]['pavadinimas']}</td>"
										. "<td>{$contractData[$i]['kaina']}</td>"
									. "</tr>";
								/*if($i == (sizeof($contractData) - 1) || $contractData[$i]['asmens_kodas'] != $contractData[$i+1]['asmens_kodas']) {

									if($contractData[$i]['bendra_kliento_paslaugu_kaina'] == 0) {
										$contractData[$i]['bendra_kliento_paslaugu_kaina'] = "neužsakyta";
									} else {
										$contractData[$i]['bendra_kliento_paslaugu_kaina'] .= " &euro;";
									}
									*/
									/*echo 
										"<tr class='aggregate'>"
											. "<td colspan='2'></td>"
											. "<td class='border'>{$contractData[$i]['bendra_kliento_sutarciu_kaina']} &euro;</td>"
											. "<td class='border'>{$contractData[$i]['bendra_kliento_paslaugu_kaina']}</td>"
										. "</tr>";*/
								//}
							}
						?>
						
						<tr class="rowSeparator">
							<td colspan="5"></td>
						</tr>
						
						<tr class="rowSeparator">
							<td colspan="5"></td>
						</tr>
						
						
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