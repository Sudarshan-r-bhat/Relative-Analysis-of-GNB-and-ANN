<?php

$command = escapeshellcmd("C:/Users/Microsoft/AppData/Local/Programs/Python/Python37/python.exe classification.py");
exec($command);
// $res = exec($command, $out, $signal);
// echo($signal . "<br>");

?>