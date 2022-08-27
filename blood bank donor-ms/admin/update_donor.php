<?php

require "../class/structure.php";

$updateXY = new UserDonor();

$updateXY->UpdateDonor($_POST["id_donor"],$_POST["name_donor_update"],$_POST["surname_donor_update"],$_POST["blood_group_update"],$_POST["email_donor_update"],$_POST["phone_donor_update"]);

?>