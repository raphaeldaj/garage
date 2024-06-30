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
        <form action="services.php" methode="post" class="container">


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

            <!-- <input class="valid-button"         type="submit" name="etat" value="Rien A Signaler"  style="width: 35%;position: absolute;bottom: -15%;left: 10%;text-align: center;">
            <input class="invalid-button"       type="submit" name="etat" value="Prendre En Charge" style="width: 35%;position: absolute;bottom: -15%;right: 10%;text-align: center;"> -->

        </form>
        
    </div>

    
    <!-- <div class="historique">
      <div class="heading">historique</div>
      <section>

        <div>
          <table>
            <tr>
              <td>date</td>
              <td>N° Permi</td>
              <td>idEmploye</td>
              <td style="background-color: rgb(255, 0, 0);">service</td>
              <td>service</td>
              <td>service</td>
              <td>service</td>
              <td>service</td>
              <td>service</td>
              <td>service</td>
              <td>service</td>
              <td>service</td>
              <td>prix</td>
            </tr>
          </table>
        </div>

        <div>
          <table>
            <tr>
              <td>date</td>
              <td>N° Permi</td>
              <td>idEmploye</td>
              <td>service</td>
              <td>service</td>
              <td>service</td>
              <td>service</td>
              <td>service</td>
              <td>service</td>
              <td>service</td>
              <td>service</td>
              <td>service</td>
              <td>prix</td>
            </tr>
          </table>
        </div>


        <div>
          <table>
            <tr>
              <td>date</td>
              <td>N° Permi</td>
              <td>idEmploye</td>
              <td style="background-color: rgb(255, 0, 0);">service</td>
              <td>service</td>
              <td>service</td>
              <td>service</td>
              <td style="background-color: rgb(255, 0, 0);">service</td>
              <td>service</td>
              <td style="background-color: rgb(255, 0, 0);">service</td>
              <td>service</td>
              <td>service</td>
              <td>prix</td>
            </tr>
          </table>
        </div>

        <div class="heading">bilan</div>

        <div>
          <table>
            <tr>
              <td>date</td>
              <td>N° Permi</td>
              <td>%service</td>
              <td>%service</td>
              <td>%service</td>
              <td>%service</td>
              <td>%service</td>
              <td>%service</td>
              <td>%service</td>
              <td>%service</td>
              <td>%service</td>
              <td>%service</td>
              <td>total</td>
            </tr>
          </table>
        </div>


      </section>
    </div> -->

</body>


</html>