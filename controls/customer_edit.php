<?php
	
	include 'libraries/customer.class.php';
	$customerObj = new customer();

	$formErrors = null;
	$fields = array();
	
	// nustatome privalomus formos laukus
	$required = array('asmens_kodas', 'vardas', 'pavardė');
	
	// maksimalūs leidžiami laukų ilgiai
	$maxLengths = array (
		'asmens_kodas' => 11,
		'vardas' => 20,
		'pavardė' => 20
	);
	
	// vartotojas paspaudė išsaugojimo mygtuką
	if(!empty($_POST['submit'])) {
		include 'utils/validator.class.php';
		
		// nustatome laukų validatorių tipus
		$validations = array (
			'asmens_kodas' => 'positivenumber',
			'vardas' => 'alfanum',
			'pavardė' => 'alfanum',
			'telefono_numeris' => 'positivenumber',
			'el_paštas' => 'email'
		);
		
		// sukuriame laukų validatoriaus objektą
		$validator = new validator($validations, $required, $maxLengths);

		// laukai įvesti be klaidų
		if($validator->validate($_POST)) {
			// suformuojame laukų reikšmių masyvą SQL užklausai
			$data = $validator->preparePostFieldsForSQL();

			if(isset($data['editing'])) {
				// redaguojame klientą
				$customerObj->updateCustomer($data);
			} else {
				// įrašome naują klientą
				$customerObj->insertCustomer($data);
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
			$fields = $customerObj->getCustomer($id);
			$fields['editing'] = 1;
		}
	}
?>
<ul id="pagePath">
	<li><a href="index.php">Pradžia</a></li>
	<li><a href="index.php?module=<?php echo $module; ?>">Klientai</a></li>
	<li><?php if(!empty($id)) echo "Kliento redagavimas"; else echo "Naujas klientas"; ?></li>
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
			<legend>Kliento informacija</legend>
				<p>
					<label class="field" for="asmens_kodas">Asmens kodas<?php echo in_array('asmens_kodas', $required) ? '<span> *</span>' : ''; ?></label>
					<?php if(!isset($fields['editing'])) { ?>
						<input type="text" id="asmens_kodas" name="asmens_kodas" class="textbox-150" value="<?php echo isset($fields['asmens_kodas']) ? $fields['asmens_kodas'] : ''; ?>" />
						<?php if(key_exists('asmens_kodas', $maxLengths)) echo "<span class='max-len'>(iki {$maxLengths['asmens_kodas']} simb.)</span>"; ?>
					<?php } ?>
				</p>
			<p>
				<label class="field" for="vardas">Vardas<?php echo in_array('vardas', $required) ? '<span> *</span>' : ''; ?></label>
				<input type="text" id="vardas" name="vardas" class="textbox-150" value="<?php echo isset($fields['vardas']) ? $fields['vardas'] : ''; ?>" />
				<?php if(key_exists('vardas', $maxLengths)) echo "<span class='max-len'>(iki {$maxLengths['vardas']} simb.)</span>"; ?>
			</p>
			<p>
				<label class="field" for="pavardė">Pavardė<?php echo in_array('pavardė', $required) ? '<span> *</span>' : ''; ?></label>
				<input type="text" id="pavardė" name="pavardė" class="textbox-150" value="<?php echo isset($fields['pavardė']) ? $fields['pavardė'] : ''; ?>" />
				<?php if(key_exists('pavardė', $maxLengths)) echo "<span class='max-len'>(iki {$maxLengths['pavardė']} simb.)</span>"; ?>
			</p>
			<p>
				<label class="field" for="telefono_numeris">telefono_numeris<?php echo in_array('telefono_numeris', $required) ? '<span> *</span>' : ''; ?></label>
				<input type="text" id="telefono_numeris" name="telefono_numeris" class="textbox-150" value="<?php echo isset($fields['telefono_numeris']) ? $fields['telefono_numeris'] : ''; ?>" />
			</p>
			<p>
				<label class="field" for="el_paštas">Elektroninis paštas<?php echo in_array('el_paštas', $required) ? '<span> *</span>' : ''; ?></label>
				<input type="text" id="el_paštas" name="el_paštas" class="textbox-150" value="<?php echo isset($fields['el_paštas']) ? $fields['el_paštas'] : ''; ?>" />
			</p>
		</fieldset>
		<p class="required-note">* pažymėtus laukus užpildyti privaloma</p>
		<p>
			<input type="submit" class="submit" name="submit" value="Išsaugoti">
		</p>
	</form>
</div>