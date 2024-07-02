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