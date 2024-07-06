<?php session_start() ;
require '../../fonctions/message.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRAITEMENT</title>
    <link rel="stylesheet" href="../../style/infoes.css">
    <style>
      .kilometrage{
    width: 30%;
    position: absolute;
    top: 68%;
    left: 5%;
  }
    </style>
</head>
<body>
    <div class="container">
        <form action="services.php" method="post" class="container">


        <?php require '../../fonctions/afficherInfosVehicule.php';
        if(!empty($_REQUEST['immatriculation'])){
          afficherInfosVehicule($_REQUEST['immatriculation']);
        }
        ?>
        
        
            <div class="derriere">
                <div class="heading">N° Permi</div>
                <img src="" alt="">
                <div class="vitre"></div>
            </div>

            

        </form>
        
    </div>

    

</body>


</html>