<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Grade Store</title>
		<link href="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/labResources/gradestore.css" type="text/css" rel="stylesheet" />
	</head>

	<body>

		<?php
		# Ex 4 :
		# Check the existence of each parameter using the PHP function 'isset'.
		# Check the blankness of an element in $_POST by comparing it to the empty string.
		# (can also use the element itself as a Boolean test!)
		#name, id, course, grade, cardNum, cc
			$cardNumber = $_POST['cardNum'];
			$filter = '/[a-z,A-Z,\-,\/s]/';
      echo preg_match($filter, "-김-");
			echo $_POST['name'], $_POST['id'], $_POST['course'], $_POST['name'],
			echo isset($_POST['name'],isset($_POST['id'],isset($_POST['course'],isset($_POST['cardNum'],isset($_POST['cc'];
			if (!isset($_POST['name'], $_POST['id'], $_POST['course'], $_POST['cardNum'], $_POST['cc'])){
		?>

		<!-- Ex 4 :
			Display the below error message : -->
			<h1>Sorry</h1>
			<p>You didn't fill out the form completely. <a href="gradestore.html">Try again?</a></p>


		<?php
		# Ex 5 :
		# Check if the name is composed of alphabets, dash(-), ora single white space.
		  }
			elseif (preg_match($filter, $_POST['name'])) {
		?>

		<!-- Ex 5 :
			Display the below error message : -->
			<h1>Sorry</h1>
			<p>You didn't provide a valid name. <a href="gradestore.html">Try again?</a></p>


		<?php
		 // Ex 5 :
		 // Check if the credit card number is composed of exactly 16 digits.
		 // Check if the Visa card starts with 4 and MasterCard starts with 5.
	   }

// /^[4|5][0-9]{15}$/
	   elseif (strlen($cardNumber) !== 16){
		 ?>
		  <!-- Ex 5 :
			Display the below error message : -->
			<h1>Sorry</h1>
			<p>You didn't provide a valid credit card number. <a href="gradestore.html">Try again?</a></p>
		 <?php
		 }

		 else if(($_POST['cc'] === 'visa' && $cardNumber[0] != 4) || ($_POST['cc'] === 'mastercard' && $cardNumber[0] != 5)){
	   ?>
			<h1>Sorry</h1>
			<p>You didn't provide a valid credit card number. <a href="gradestore.html">Try again?</a></p>
		 <?php
		 }
		 # if all the validation and check are passed

		 else {
			function processCheckbox($names){
				$result = " ";
				if ($names !== null) {
					foreach ($names as $course) {
						if ($result === " "){
							$result .= $course;
						}
						else{
							$result = $result." ,".$course;
						}
					}
				}
				return $result;
			}

			// $array = [];
			// foreach($name as $names){
			// 	if(isset($_POST['$name']))
			// 	  $array[] = $_POST['$name'];
			// 	return implode(", ", $array);
			// }
		?>

		<h1>Thanks, looser!</h1>
		<p>Your information has been recorded.</p>

		<!-- Ex 2: display submitted data -->

		<ul>
			<li>Name: <?= $_POST['name'] ?></li>
			<li>ID: <?= $_POST['id'] ?> </li>
			<li>Course:<?= processCheckbox($_POST['course']) ?></li>
			<li>Grade: <?= $_POST["grade"] ?> </li>
			<li>Credit Card: <?=$_POST['cardNum']." (".$_POST['cc'].")"?></li>
		</ul>

    <!-- Ex 3 : -->
			<p>Here are all the loosers who have submitted here:</p>

		<?php
			$filename = "loosers.txt";
      $checkFile = file_exists($filename);
			$temp = $_POST['name'].";".$_POST['id'].";".$_POST['cardNum'].";".$_POST['cc'];

			if(!$checkFile){
				file_put_contents("loosers.txt", $temp."\n");
			}
			else{
				file_put_contents("loosers.txt", $temp."\n",FILE_APPEND);
			}

			$loosers = file_get_contents("loosers.txt");
			?>

      <pre><?= $loosers ?></pre>

		<?php

	  }
	?>

	</body>
</html>
