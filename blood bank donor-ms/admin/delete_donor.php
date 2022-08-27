<?php

require "../class/structure.php";

$deleteXY = new UserDonor();

$deleteXY->DeleteDonor($_POST["id_donor"]);

?>