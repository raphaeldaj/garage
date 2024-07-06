<?php session_start()  ;
require '../fonctions/message.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GESTION DE DONNE</title>
    <link rel="stylesheet" href="../style/gestiondesdonnees.css">
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

    
    <div class="Bilan-General">
      <div class="heading">VEHICULE</div>
      <section>

        <div>
          <table>
            <tr>
              <td>immatriculation</td>
              <td>tutulaire</td>
              <td>immatriculation precedente</td>
              <td>Adresse Comune</td>
              <td>Region Departement</td>
              <td>marque</td>
              <td>modele</td>
              <td>Origine</td>
              <td>Anne de Fabrication</td>
              <td>kilometrage</td>
              <td>1er mise en circulation</td>
              <td>date immatriculation</td>
              <td>Supprimer</td>
            </tr>
          </table>
        </div>

        
        <?php 
        require '../fonctions/afficherVehicule.php';
        voiBilanVehicule();
        ?>
      </section>
    </div>
    <div class="Bilan-General">
      <div class="heading">CHAUFFEUR</div>
      <section>
        
        <div>
          <table>
            <tr>
              <td>Numero Permis</td>
              <td>Nom</td>
              <td>Prenom</td>
              <td>Date de Naissance</td>
              <td>Lieu de Naissance</td>
              <td>Date Emission</td>
              <td>Date Expiration</td>
              <td>delivre par</td>
              <td>Permis de conduire</td>
              <td>Groupe sanguin</td>
              <td>Supprimer</td>
            </tr>
          </table>
        </div>
        
        <?php 
        require '../fonctions/afficherChauffeur.php';
        afficherCauffeur();
        ?>
        
      </section>
      
    </div>
    
    <div class="Bilan-General">
      <div class="heading">EMPLOYE</div>
      <section>

        <div>
          <table>
            <tr>
              <td>Nom</td>
              <td>Prenom</td>
              <td style="min-width : 250px;">Adresse EMAIL</td>
              <td style="max-width : 80px;">Telephone</td>
              <td>Adresse</td>
              <td>Service</td>
              <td>Role</td>
              <td>Supprimer</td>
            </tr>
          </table>
        </div>

        <?php 
        require '../fonctions/afficherEmploye.php';
        afficherEmploye();
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
<?php  
require '../fonctions/suprimerchauffeur.php';
require '../fonctions/suprimeremploye.php';
require '../fonctions/supprimervehicule.php';

if(!empty($_REQUEST['employe'])){
  supprimerEmploye($_REQUEST['employe']);
}

if( !empty($_REQUEST['permis']) ){
  supprimerChauffeur($_REQUEST['permis']);
}

if( ( !empty($_REQUEST['immatriculation']) ) ){
  suprimerVehicule($_REQUEST['immatriculation']);
}

?>