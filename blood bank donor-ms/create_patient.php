<?php

require "class/structure.php";

$createPatient = new Patient();

$createPatient->Create($_POST["name_patient"],$_POST["surname_patient"],$_POST["gender"],$_POST["blood_group"],$_POST["body_weight"],$_POST["email_patient"],$_POST["phone_patient"]);

?>