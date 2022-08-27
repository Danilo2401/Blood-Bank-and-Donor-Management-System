<?php

require "../class/structure.php";

$deleteXY = new Patient();

$deleteXY->DeletePatient($_POST["id_patient"]);


?>