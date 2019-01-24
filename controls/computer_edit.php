<?php
	
	include 'libraries/computer.class.php';
	$computerObj = new computer();




	$formErrors = null;
	$fields = array();
	
	// nustatome privalomus formos laukus
	$required = array('id', 'fk_Procesoriusmodelis', 'fk_Vaizdo_plokštėmodelis', 'fk_Kietasis_diskasmodelis', 'fk_Modelioid');
	
	// maksimalūs leidžiami laukų ilgiai
	$maxLengths = array (
		'id' => 11,
		'atminties_kiekis' => 20,
		'fk_Procesoriusmodelis' => 20

	);
	
	// vartotojas paspaudė išsaugojimo mygtuką
	if(!empty($_POST['submit'])) {
		include 'utils/validator.class.php';
		
		// nustatome laukų validatorių tipus
		$validations = array (
			'id' => 'positivenumber',
			'pagminimo_data' => 'date',
			'atminties_kiekis' => 'positivenumber',
			'fk_Procesoriusmodelis' => 'alfanum',
			'fk_Kietasis_diskasmodelis' => 'alfanum',
			'fk_Kietasis_diskasmodelis' => 'alfanum',
			'fk_Kietasis_diskasmodelis' => 'alfanum'
		);
		
		// sukuriame laukų validatoriaus objektą
		$validator = new validator($validations, $required, $maxLengths);

		// laukai įvesti be klaidų
		if($validator->validate($_POST)) {
			// suformuojame laukų reikšmių masyvą SQL užklausai
			$data = $validator->preparePostFieldsForSQL();

			if(isset($data['editing'])) {
				// redaguojame klientą
				$computerObj->updateComputer($data);
			} else {
				// įrašome naują klientą
				$computerObj->insertComputer($data);
			}

			// nukreipiame vartotoją į klientų puslapį
			header("Location: index.php?module={$module}");
			die();
		}
		else {
			// gauname klaidų pranešimą
			$formErrors = $validator->getErrorHTML();
			// laukų reikšmių kintamajam priskiriame įvestų laukų reikšmes
			$fields = $_POST;
		}
	} else {
		// tikriname, ar nurodytas elemento id. Jeigu taip, išrenkame elemento duomenis ir jais užpildome formos laukus.
		if(!empty($id)) {
			// išrenkame klientą
			$fields = $computerObj->getComputer($id);
			$fields['editing'] = 1;
		}
	}
?>
<ul id="pagePath">
	<li><a href="index.php">Pradžia</a></li>
	<li><a href="index.php?module=<?php echo $module; ?>">Kompiuteriai</a></li>
	<li><?php if(!empty($id)) echo "Kompiuterio redagavimas"; else echo "Naujas kompiuteris"; ?></li>
</ul>
<div class="float-clear"></div>
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
			<legend>Kompiuterio informacija</legend>
				<p>
					<label class="field" for="id">id<?php echo in_array('id', $required) ? '<span> *</span>' : ''; ?></label>
					<?php if(!isset($fields['editing'])) { ?>
						<input type="text" id="id" name="id" class="textbox-150" value="<?php echo isset($fields['id']) ? $fields['id'] : ''; ?>" />
						<?php if(key_exists('id', $maxLengths)) echo "<span class='max-len'>(iki {$maxLengths['id']} simb.)</span>"; ?>
					<?php } else { ?>
						<span class="input-value"><?php echo $fields['id']; ?></span>
						<input type="hidden" name="editing" value="1" />
						<input type="hidden" name="id" value="<?php echo $fields['id']; ?>" />
					<?php } ?>
				</p>
			<p>
				<label class="field" for="atminties_kiekis">Atminties kiekis<?php echo in_array('atminties_kiekis', $required) ? '<span> *</span>' : ''; ?></label>
				<input type="text" id="atminties_kiekis" name="atminties_kiekis" class="textbox-150" value="<?php echo isset($fields['atminties_kiekis']) ? $fields['atminties_kiekis'] : ''; ?>" />
				<?php if(key_exists('atminties_kiekis', $maxLengths)) echo "<span class='max-len'>(iki {$maxLengths['atminties_kiekis']} simb.)</span>"; ?>
			</p>
			<p>
				<label class="field" for="fk_Procesoriusmodelis">Procesorius<?php echo in_array('fk_Procesoriusmodelis', $required) ? '<span> *</span>' : ''; ?></label>
				<select id="modelis" name="modelis">
					<option value="">---------------</option>
					<?php
						// išrenkame būsenas
						$states = $computerObj->getProcessor();
						foreach($states as $key => $val) {
							$selected = "";
							if(isset($fields['modelis']) && $fields['modelis'] == $val['id']) {
								$selected = " selected='selected'";
							}
							echo "<option{$selected} value='{$val['id']}'>{$val['modelis']}</option>";
						}
					?>

</select>
					</p>
			<p>
				<label class="field" for="fk_Vaizdo_plokštėmodelis">Vaizdo Plokštė<?php echo in_array('fk_Vaizdo_plokštėmodelis', $required) ? '<span> *</span>' : ''; ?></label>
				<select id="modelis" name="modelis">
					<option value="">---------------</option>
					<?php
						// išrenkame būsenas
						$states = $computerObj->getGPU();
						foreach($states as $key => $val) {
							$selected = "";
							if(isset($fields['modelis']) && $fields['modelis'] == $val['id']) {
								$selected = " selected='selected'";
							}
							echo "<option{$selected} value='{$val['id']}'>{$val['modelis']}</option>";
						}
					?>
					</select>
			</p>
			<p>
				<label class="field" for="fk_Kietasis_diskasmodelis">Kietasis diskas<?php echo in_array('fk_Kietasis_diskasmodelis', $required) ? '<span> *</span>' : ''; ?></label>
				<select id="modelis" name="modelis">
					<option value="">---------------</option>
					<?php
						// išrenkame būsenas
						$states = $computerObj->getHDD();
						foreach($states as $key => $val) {
							$selected = "";
							if(isset($fields['modelis']) && $fields['modelis'] == $val['id']) {
								$selected = " selected='selected'";
							}
							echo "<option{$selected} value='{$val['id']}'>{$val['modelis']}</option>";
						}
					?>
					</select>
			</p>
			</p>
			<p>
				<label class="field" for="fk_Modelioid">Modelis<?php echo in_array('fk_Modelioid', $required) ? '<span> *</span>' : ''; ?></label>
				<select id="pavadinimas" name="pavadinimas">
					<option value="">---------------</option>
					<?php
						// išrenkame būsenas
						$states = $computerObj->getModel();
						foreach($states as $key => $val) {
							$selected = "";
							if(isset($fields['pavadinimas']) && $fields['pavadinimas'] == $val['id']) {
								$selected = " selected='selected'";
							}
							echo "<option{$selected} value='{$val['id']}'>{$val['pavadinimas']}</option>";
						}
					?>
					</select>
			</p>
		</fieldset>
		<p class="required-note">* pažymėtus laukus užpildyti privaloma</p>
		<p>
			<input type="submit" class="submit" name="submit" value="Išsaugoti">
		</p>
	</form>
</div>