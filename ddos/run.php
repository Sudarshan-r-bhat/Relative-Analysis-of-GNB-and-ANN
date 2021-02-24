<?php

	$command = escapeshellcmd("C:/Users/Microsoft/AppData/Local/Programs/Python/Python37/python.exe classification.py");
    $result = exec($command, $out, $signal);
    var_dump($signal);

    //sleep(1000);
    // var_dump($res);
    // echo($out. "  " . $status);

?>