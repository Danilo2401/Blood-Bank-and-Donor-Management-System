<?php

require "class/structure.php";

$createDonor = new UserDonor();

$createDonor->CreateDonor($_POST["name_donor"],$_POST["surname_donor"],$_POST["blood_group"],$_POST["email_donor"],$_POST["phone_donor"]);

?>