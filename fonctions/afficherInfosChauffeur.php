<?php  
// require 'message.php';
function afficherInfosChauffeur($chauffeur){
  $host = "localhost"; 
  $user = "root"; 
  $bdd = "stage"; 
  $passwd = "";

  try {
      $conn = new PDO("mysql:host=$host;dbname=$bdd", $user, $passwd);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $queryInfosVehicule = "SELECT * FROM chauffeur WHERE numeroPermis = :numeroPermis";
      $stmt = $conn->prepare($queryInfosVehicule);
      $stmt->bindParam(':numeroPermis', $chauffeur);
      $stmt->execute();

      if ($rowInfosVehicule = $stmt->fetch(PDO::FETCH_NUM)) {
          ?>
          <div class="permis-container">
              <div class="heading"> PERMIS DE CONDUIRE </div>
              <div action="rapport.php" class="div">
                  <div style="width: 20%;position: absolute;top: 12%;left: 5%;"><p>N° Permis</p></div>
                  <input class="N°immatriculation"            type="text" name="numeroPermis"              placeholder="N° Permis"                 value="<?php echo $rowInfosVehicule[0]  ?>" readonly>
                  <div style="width: 30%;position: absolute;top: 12%;left: 35%;"><p>date d'Emission</p></div>
                  <input class="date-1er-mise-en-circulation" type="text" name="dateEmission"              placeholder="date d'Emission"           value="<?php echo $rowInfosVehicule[5]  ?>" readonly>
                  <div style="width: 25%;position: absolute;top: 12%;left: 67%;"><p>date d'Expiration</p></div>
                  <input class="date-immatriculation"         type="text" name="dateExpiration"            placeholder="date d'Expiration"         value="<?php echo $rowInfosVehicule[6]  ?>" readonly>
                  <div style="width: 20%;position: absolute;top: 27%;left: 5%;"><p>Nom</p></div>
                  <input class="N°titulaire"                  type="text" name="nomChauffeur"              placeholder="Nom"                       value="<?php echo $rowInfosVehicule[1]  ?>" readonly>
                  <div style="width: 40%;position: absolute;top: 27%;left: 35%;"><p>Prenom</p></div>
                  <input class="titulaire"                    type="text" name="prenomChauffeur"           placeholder="Prenom"                    value="<?php echo $rowInfosVehicule[2]  ?>" readonly>
                  <div style="width: 30%;position: absolute;top: 42%;left: 5%;"><p>date de Naissance</p></div>
                  <input class="N°immat-precedante"           type="text" name="immatriculationPrecedente" placeholder="date de Naissance"         value="<?php echo $rowInfosVehicule[3]  ?>" readonly>
                  <div style="width: 30%;position: absolute;top: 42%;left: 45%;"><p>lieu de Naissance</p></div>
                  <input class="adresse-commune"              type="text" name="dateNaissance"             placeholder="lieu de Naissance"         value="<?php echo $rowInfosVehicule[4]  ?>" readonly>
                  <div style="width: 30%;position: absolute;top: 60%;left: 5%;"><p>delivre par</p></div>
                  <input class="kilometrage"                  type="text" name="delivrePar"                placeholder="delivre Par"               value="<?php echo $rowInfosVehicule[7] ?>" readonly>
                  <div style="width: 30%;position: absolute;top: 60%;left: 35%;"><p>groupe sanguin</p></div>
                  <input class="region-departement"           type="text" name="groupeSanguin"             placeholder="groupe sanguin"            value="<?php echo $rowInfosVehicule[9]  ?>" readonly>
                  <div style="width: 10%;position: absolute;top: 60%;left: 65%;"><p>cathegorie</p></div>
                  <input class="origine"                      type="text" name="cathegorie"                placeholder="cathegorie"                value="<?php echo $rowInfosVehicule[8] ?>" readonly style="top :68% ;">
              </div>
              <div class="vitre"></div>
          </div>
          <?php
      }
  } catch(PDOException $e) {
      message("Erreur : " . $e->getMessage());
  }
}
?>