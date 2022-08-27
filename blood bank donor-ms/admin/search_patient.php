<?php

require "../class/structure.php";

$selectPatient = new Patient();

$selectPatient->SearchPatient($_POST["value"]);


?>