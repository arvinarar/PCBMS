<?php
include "../model/DTRDAO.php";

session_start();
$process = new DTRDAO();
$process->timeOut($_SESSION["empid"]);
session_unset();
session_destroy();
header("Location: ../")
    ?>