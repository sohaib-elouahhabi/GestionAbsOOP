<?php

include_once("../includes/EleveTreatment.php");
$action = "SwitchCase";
if (isset($_GET['action']))
    $action = $_GET['action'];

switch ($action) {
    case "sup":
        EleveTreatment::delete($_GET['cne']);
        break;
    case "mod":
       EleveTreatment::Update($_POST);
        break;
    case "ajout":
        EleveTreatment::InsertEleve($inser=new Eleve($_POST['cne'],$_POST['nom'],$_POST['prenom'],$_POST['groupe']));
        break;
}
header('Location:EleveIndex.php');

