<?php

include_once("../includes/AbsenceTreatment.php");
$action = "SwitchCaseAbs";
if (isset($_GET['action']))
    $action = $_GET['action'];

switch ($action) {
    case "mod":
        AbsenceTreatment::edit($_POST);
        break;
    case "ajout":
        AbsenceTreatment::add($insert=new Absence($_POST['semain'],$_POST['cne'],$_POST['nbr_abs']));
        break;
}
//var_dump($_POST);
header('Location:AbsenceIndex.php');

