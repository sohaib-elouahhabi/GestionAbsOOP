<?php
include_once "../includes/AbsenceTreatment.php";
include_once "../includes/EleveTreatment.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../bootstrap/bootstrap.min.css" rel="stylesheet">
    <title>Absences</title>
</head>
<body>
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

<div class="container mt-5" >
    <h2 class="text-center mb-4 text-info fw-bold">
    </h2>
    <center>
        <div class="card  bg-secondary " style="max-width: 30rem;">
            <div class="card-body ">
                <div class="form-outline mb-4">
                    <?php
                    if (isset($_GET['mod']))
                    {
                        echo'
                            <form action="SwitchCaseAbs.php?action=mod" method="post">
                            <div class="form-outline mb-4">';?>
                        <input type="hidden" name="cne" value="<?=$_GET['cne']?>">
                        <input type="hidden" name="semain" value="<?=$_GET['semain']?>">

                        <?php
                        echo"<label class='form-label text-black fw-bold'>SEMAINE</label><br>";
                        echo"<label class='text-white'>".$_GET['semain']. "</label><br>";
                        echo"<label class='form-label text-black fw-bold'>CNE</label><br>";
                        echo"<label class='text-white'>".$_GET['cne']. "</label>";
                        $var=AbsenceTreatment::AfficherAbs($_GET['semain'],$_GET['cne']);
                        $row=$var->fetch();
                        $nbrAbs=$row["nbr_abs"];
                        $ButtonName="MODIFIER";


                    }
                    else
                    {
                        echo'
                            <form action="SwitchCaseAbs.php?action=ajout" method="post">
                            <div class="form-outline mb-4">';
                        echo"<label class='form-label text-black fw-bold' for='form1Example1' >SEMAINE</label>";
                        echo"<input type='number'  name='semain' id='form1Example1' class='form-control'/>";?>

                         <div class='form-outline mb-4 mt-2'>
                          <label class='form-label text-black fw-bold'  for='form1Example2'>CNE</label><br>
                          <select class='form-control' id='form1Example2' name="cne" ><?php
                              $res=EleveTreatment::display();
                              while($row=$res->fetch()){?>
                                  <option value="<?php echo $row['cne']?>"><?php echo $row['cne']?></option>
                                <?php } ?>
                          </select>
                          </div><?php
                        $ButtonName="AJOUTER";
                    }
                    ?>
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label text-black fw-bold" for="form1Example4">NBR ABSENCES</label>
                    <input type="number" value="<?php echo @$nbrAbs ?>" name="nbr_abs" id="form1Example4" class="form-control" />
                </div>

                <!-- Submit button -->
                <input type="submit"  class="btn btn-info btn-block fw-bold" value="<?php echo @$ButtonName;?>">
                <!-- Reset button -->
                <button type="reset"  class="btn btn-info btn-block fw-bold">ANNULER</button>

                </form>
            </div>
        </div>
    </center>
    <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>