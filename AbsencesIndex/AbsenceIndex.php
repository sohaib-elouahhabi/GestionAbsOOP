<?php

include_once "../includes/AbsenceTreatment.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../bootstrap/bootstrap.min.css" rel="stylesheet">
    <title >GESTION DES ABSENCES</title>
</head>
<!--Navbar -->
<div class="navbar navbar-expand-md bg-secondary navbar-dark text-dark">
    <div class="container">
        <a href="../Home.html" class="navbar-brand">HOME</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainmenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mainmenu">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a href="../EleveIndex/EleveIndex.php" class="nav-link">GESTION ELEVES</a></li>
                <li class="nav-item"><a href="AbsenceIndex.php" class="nav-link">GESTION ABSENCES</a></li>

            </ul>
        </div>
    </div>
</div>

<center>
    <div class="card-body">
        <div id="tables" class="countainer">
            <h1  class=" fs-3 text-center mb-4 fw-bold badge bg-info text-wrap text-black " style="max-width: 40rem" >
                GESTION DES ABSENCES

            </h1>
            <table class="table table-hover bg-secondary table-bordered text-center">
                <tr class="text-info ">
                    <th scope="col">CNE</th>
                    <th scope="col">SEMAINE</th>
                    <th scope="col">NBR ABSENCES</th>
                    <th scope="col">ACTION</th>
                </tr>
                <?php
                $cur=AbsenceTreatment::Afficher();
                while($row=$cur->fetch()){?>
                    <tr class="">
                        <th scope="col"><?=$row['cne']?></th>
                        <th scope="col"><?=$row['semain']?></th>
                        <th scope="col"><?=$row['nbr_abs']?></th>
                        <td  class="text-right ">
                            <a class="btn btn-info" href="TraitemenAbs.php?mod&cne=<?= $row['cne']?>&semain=<?= $row['semain']?>" style="width: 100px;">Modifier</a>
                            <a class="btn btn-danger badge-pill" href="AbsenceIndex.php?delete&cne=<?=$row['cne']?>&semaine=<?=$row['semain']?>" style="width: 100px;">Suprimer</a>
                        </td>
                    </tr>
                <?php }
                $cur->closeCursor();?>
            </table>
            <div class="text-center" >
                <a class="btn btn-info " style="width: 180px;" href="TraitemenAbs.php?action=Ajouter">AJOUTER ABSENCES</a>
            </div><br>
            <div class="container mt-3" >
                <center>
                    <div class="card  bg-secondary" style="max-width: 30rem;">
                        <div class="card-body ">
                            <form action="" method="post">
                                <div class="form-outline mb-4">
                                    <label class="form-label text-black fw-bold" for="form1Example2">SEMAINE</label>
                                    <input type="number"  name="sm" id="form1Example2" class="form-control" />
                                </div>
                                <!-- Submit button -->
                                <input type="submit" name="submit" class="btn btn-info btn-block" value="VALIDER">
                                <!-- Reset button -->
                                <button type="reset"  class="btn btn-info btn-block">ANNULER</button>
                            </form><br>
                            <?php
                            if(isset($_POST['submit'])){
                                $a=AbsenceTreatment::search($_POST['sm']);
                                echo "<p class='fw-bold text-dark badge bg-warning text-wrap' style='width:15rem '>Les Absences de  la semaine " . $_POST['sm'] ."</p>";
                                ?>
                                <table class="table bg-secondary table-hover table-bordered text-center">
                            <tr class="text-info">
                                <th scope="col">CNE</th>
                                <th scope="col">NOM & PRENOM</th>
                                <th scope="col">NOMBRE D'ABSENCES</th>
                            </tr>
                            <?php
                            while($row=$a->fetch()){?>
                                <tr>
                                    <th scope="col"><?=$row['cne']?></th>
                                    <th scope="col"><?=$row['nom'] . " ".$row['prenom']?></th>
                                    <th scope="col"><?=$row['nbr_abs']?></th>
                                </tr>
                            <?php } }?>

                        </div>
                    </div>
                </center>
            </div>
            <!--verification supprimer Absences-->
            <?php
            if(isset($_GET['delete'])) {?>
                <div class="container mt-3" >
                    <center>
                        <div class="card  bg-secondary" style="max-width: 50rem;">
                            <div class="card-body ">
                                <?php
                                $data = AbsenceTreatment::AfficherAbs($_GET['cne'],$_GET['semaine']);
                                echo '<p class="fw-bold text-warning">Etes-vous sur de vouloir supprimer absence de la semaine ' . $_GET["semaine"] .' qui porte le code ' . $_GET["cne"] . '?</p>';
                                ?>
                                <form action="" method="post">

                                    <label  for="flexRadioDefault1">OUI</label>
                                    <input  type="radio" name="flexRadio" value="oui" id="flexRadioDefault1" checked>

                                    <label  for="flexRadioDefault2">NO</label>
                                    <input  type="radio" name="flexRadio" value="no" id="flexRadioDefault2" >
                                    <input type="submit" name="acti" class="btn btn-info btn-block" value="VALIDER">
                                </form>
                                <?php
                                $cne=$_GET['cne'];
                                $semaine=$_GET['semaine'];
                                if(isset($_POST['acti'])){
                                    if ($_POST['flexRadio'] =="oui"){
                                        AbsenceTreatment::delete($_GET['cne'],$_GET['semaine']);
                                        echo "<script>window.location.href='AbsenceIndex.php'</script>";
                                    }
                                    else{
                                        echo"<script>window.location='AbsenceIndex.php'</script>"; }
                                    }?>
                            </div>
                        </div>
                    </center>
                </div>
            <?php } ?>


