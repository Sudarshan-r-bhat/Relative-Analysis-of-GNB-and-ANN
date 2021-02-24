<?php
// This is how you  run the python script and also,
// This is how you read the testData and send to the ajax query.
// session_start();
// $_SESSION["iterateCount"] += 1;
	
// 	if ($_SESSION["iterateCount"] <= 1) {
// 		$command = escapeshellcmd("C:/Users/Microsoft/AppData/Local/Programs/Python/Python37/python.exe classification.py");
// 		exec($command);
// 	}
	
	$fileLines = file("FinalYearProject/datasets/AnimateDataset.csv");
	echo"<b>Initializing.....</b><br>";
	echo "<b>Reading traffic......</b><br><br>";
	foreach($fileLines as $line) {
		echo(str_replace(",", "&nbsp--&nbsp", $line) . "<br> unique_char");
	}
?>

