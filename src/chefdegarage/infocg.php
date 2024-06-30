<?php session_start();
require '../../fonctions/message.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CARTE GRISE</title>
    <link rel="stylesheet" href="../../style/infocg.css">
</head>
<body>
    <div class="container">
        <form action="accueilcg.php" method="" class="container">

        <?php require '../../fonctions/afficherInfosVehicule.php';
              require '../../fonctions/afficherInfosChauffeur.php';
        
        if(!empty($_REQUEST['immatriculation'])){
            afficherInfosVehicule($_REQUEST['immatriculation']);
        }
        
        if(!empty($_REQUEST['permis'])){
            afficherInfosChauffeur($_REQUEST['permis']);
        }
        
        ?>
            <input class="valid-button"         type="submit" name="etat" value="Rien A Signaler"  style="width: 35%;position: absolute;bottom: -15%;left: 10%;text-align: center;">
            <input class="invalid-button"       type="submit" name="etat" value="Prendre En Charge" style="width: 35%;position: absolute;bottom: -15%;right: 10%;text-align: center;">

        </form>
        
    </div>

    

</body>


</html>
