<?php session_start()  ;
require '../fonctions/message.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DK-7852-AS</title>
    <link rel="stylesheet" href="../style/bilanindividuel.css">
    <style>
      .kilometrage{
    width: 30%;
    position: absolute;
    top: 68%;
    left: 5%;
  }
  .voir-detail{
    /* display: block; */
    /* width: 100%; */
    font-weight: bold;
    background: linear-gradient(45deg, rgb(16, 137, 211) 0%, rgb(18, 177, 209) 100%);
    color: white;
    /* padding-block: 15px; */
    /* margin: 20px auto; */
    /* border-radius: 20px; */
    /* box-shadow: rgba(133, 189, 215, 0.8784313725) 0px 20px 10px -15px; */
    border: none;
    transition: all 0.2s ease-in-out;
  }
  .voir-detail:hover {
    transform: scale(1.03);
    background: linear-gradient(45deg, rgb(0, 108, 175) 0%, rgb(16, 137, 211) 100%);
    box-shadow: rgba(133, 189, 215, 0.8784313725) 0px 23px 10px -20px;
  }
  td{
    /* min-width: 90px; */
  }
    </style>
</head>
<body>
  
    <div class="container">
        <form action="services.php" methode="post" class="container">

        <?php require '../fonctions/afficherInfosVehicule.php';
        
        ?>

        </form>
        
    </div>

    
    <div class="historique">
      <div class="heading">historique</div>
      <section>
     <div>
          <table>
            <tr>
              <td style="min-width: 35px;">date</td>
              <td style="min-width: 40px;">chaffeur</td>
              <td style="min-width: 40px;">idEmploye  </td>
              <td>entretien et maintenance</td>
              <td>reparation mecanique</td>
              <td>diagnostique et electronique</td>
              <td>pneumatiques</td>
              <td>carrosserie et peinture</td>
              <td>climatisation</td>
              <td>accessoire et personnalisation</td>
              <td>assistance routiere</td>
              <td>controle technique</td>
              <td style="min-width:105px;">prix</td>
              <td style="min-width: 105px">appercue</td>
            </tr>
          </table>
        </div>

      <?php require '../fonctions/voirBilanVehicule.php';
      if(!empty($_REQUEST['immatriculation'])){
        VoirBilanVehicule($_REQUEST['immatriculation']);
        $_SESSION['immatriculation']=$_REQUEST['immatriculation'];
      }
      else{
        VoirBilanVehicule($_SESSION['immatriculation']);
      }
  ?>

        


      </section>
    </div>

    

</body>


</html>