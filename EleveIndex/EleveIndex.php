<?php
include_once "../includes/EleveTreatment.php";
include_once "../includes/AbsenceTreatment.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../bootstrap/bootstrap.min.css" rel="stylesheet">
    <title >GESTION DES ELEVES </title>
</head>
<!--Navbar -->
<div class="navbar navbar-expand-md bg-secondary navbar-dark text-dark">
    <div class="container">
        <a href="../Home.html" class="navbar-brand">HOME</a>

        <div>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a href="EleveIndex.php" class="nav-link">GESTION ELEVES</a></li>
                <li class="nav-item"><a href="../AbsencesIndex/AbsenceIndex.php" class="nav-link">GESTION ABSENCES</a></li>
            </ul>
        </div>
    </div>
</div>

<center>
<div class="card-body">
    <div id="tables" class="countainer">
        <h2 class="fs-3 text-center mb-4 fw-bold badge bg-warning text-wrap text-black " style="max-width: 40rem" >
            GESTION DES ELEVES
        </h2>
        <table class="table bg-secondary table-hover table-bordered text-center">
            <tr class="text-info">
                <th scope="col" >CNE</th>
                <th scope="col">NOM</th>
                <th scope="col">PRENOM</th>
                <th scope="col">GROUPE</th>
                <th scope="col">ACTION</th>
            </tr>
            <?php
            $cur=EleveTreatment::display();
            while($row=$cur->fetch()){?>
                <tr>
                    <th scope="col"><?=$row['cne']?></th>
                    <th scope="col"><?=$row['nom']?></th>
                    <th scope="col"><?=$row['prenom']?></th>
                    <th scope="col"><?=$row['groupe']?></th>
                    <td  class="text-right ">
                        <a class="btn btn-info fw-bold" href="Traitement.php?mod&cne=<?=$row['cne']?>" style="width: 100px;">Modifier</a>
                        <a class="btn btn-danger badge-pill fw-bold" href="EleveIndex.php?sup&cne=<?=$row['cne']?>" style="width: 100px;">Suprimer</a>
                        <a class="btn btn-warning fw-bold" href="EleveIndex.php?id=<?=$row['cne']?>" style="width: 100px;">Absences</a>
                    </td>
                </tr>
            <?php }
            $cur->closeCursor();?>
        </table>
        <div class="text-center" >
            <a class="btn btn-info fw-bold " style="width: 170px;" href="Traitement.php?action=Ajouter">AJOUTER ELEVES</a>
        </div><br>

            <!-- Liste des absences -->
            <?php
            if(isset($_GET['id'])){
                $a=AbsenceTreatment::AfficherAbsEleve($_GET['id']);?>
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
                        <input type="submit" name="sub" class="btn btn-info btn-block" value="VALIDER">
                        <!-- Reset button -->
                        <button type="reset"  class="btn btn-info btn-block">ANNULER</button>
                        </form><br>
                        <!-- message des absences dans un semaine donner-->
                        <?php
                        if(isset($_POST['sub'])) {
                            $r = AbsenceTreatment::AfficherAbs($_POST['sm'], $_GET['id']);
                            while ($row = $r->fetch()) {
                                echo "<p class='fw-bold text-dark badge bg-warning text-wrap' style='width:21rem '>Dans le semaine " . $_POST['sm'] . " eleve ayant le CNE  " . $_GET['id'] . " a " . $row['nbr_abs'] . "  absences</p>";
                            }
                        }
                       ?>
                        <p class="text-warning fw-bold">Liste d'absences de l'eleve <?=$_GET['id']?></p>
                        <table class="table bg-secondary table-hover table-bordered text-center">
                            <tr class="text-info">
                                <th scope="col">Semaine</th>
                                <th scope="col">Nbr_Abs</th>
                            </tr>
                            <?php
                            while($row=$a->fetch()){?>
                                <tr>
                                    <th scope="col"><?=$row['semain']?></th>
                                    <th scope="col"><?=$row['nbr_abs']?></th>
                                </tr>
                            <?php } }?>

                    </div>
                 </div>
               </center>
            </div>
                            <!--verification supprimer eleve-->
        <?php
        if(isset($_GET['sup'])) {?>
        <div class="container mt-3" >
            <center>
                <div class="card  bg-secondary" style="max-width: 50rem;">
                    <div class="card-body ">
                           <?php
                            $data = EleveTreatment::search($_GET['cne']);
                            $row = $data->fetch();
                            echo '<p class="fw-bold text-warning">Etes-vous sur de vouloir supprimer eleve qui porte le code ' . $_GET["cne"] . '?</p>';
                            ?>
                        <form action="" method="post">

                                <label  for="flexRadioDefault1">OUI</label>
                                <input  type="radio" name="flexRadio" value="oui" id="flexRadioDefault1" checked>

                                <label  for="flexRadioDefault2">NO</label>
                                <input  type="radio" name="flexRadio" value="no" id="flexRadioDefault2" >
                               <input type="submit" name="act" class="btn btn-info btn-block" value="VALIDER">


                        </form>
                        <?php
                        $cne=$_GET['cne'];
                        if(isset($_POST['act'])){
                        if ($_POST['flexRadio'] =="oui"){
                            echo "<-pt>window.location.href='SwitchCase.php?action=sup&cne=$cne'</-pt>";
                        }
                        else{
                        echo"<script>window.location='EleveIndex.php'</script>";
                        } }?>
                    </div>
                </div>
            </center>
        </div>
    <?php } ?>



