<?php session_start()  ;
require '../fonctions/message.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> BILAN INDIVIDUEL </title>
    <link rel="stylesheet" href="../style/bilanindividuel.css">
    <style>
     a{
        color: rgb(0, 0, 0);
        text-decoration: none;
      }
.button {
 --glow-color: rgb(176, 217, 255);
 --enhanced-glow-color: rgb(206, 235, 255);
 --btn-color: rgb(255, 255, 255);
 border: .20em solid var(--glow-color);
 padding: 0.5em 1.5em;
 color: var(--glow-color);
 font-size: 15px;
 font-weight: bold;
 background-color: var(--btn-color);
 border-radius: 1em;
 outline: none;
 box-shadow: 0 0 1em .5em var(--glow-color),
        0 0 4em 1em var(--glow-spread-color),
        inset 0 0 .5em .25em var(--glow-color);
 text-shadow: 0 0 .5em var(--glow-color);
 position: fixed;
 top:10px;
 transition: all 0.3s;
}

button::after {
 pointer-events: none;
 content: "";
 position: absolute;
 top: 120%;
 left: 0;
 height: 100%;
 width: 100%;
 background-color: var(--glow-spread-color);
 filter: blur(2em);
 opacity: .7;
 transform: perspective(1.5em) rotateX(35deg) scale(1, .6);
}

button:hover {
 color: var(--btn-color);
 background-color: var(--glow-color);
 box-shadow: 0 0 1em .5em var(--glow-color),
        0 0 4em 2em var(--glow-spread-color),
        inset 0 0 .5em .5em var(--glow-color);
}

button:active {
 box-shadow: 0 0 0.6em .25em var(--glow-color),
        0 0 2.5em 2em var(--glow-spread-color),
        inset 0 0 .5em .25em var(--glow-color);
}
    </style>
</head>
<body>
    
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

    <button class="button">
        <a href="bilangeneral.php">
          Retour
        </a>
      </button>

</body>


</html>