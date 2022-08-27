<?php

session_start();

unset($_SESSION["name_admin"]);
unset($_SESSION["password_admin"]);
session_destroy();
header("Location:admin.php");

?>