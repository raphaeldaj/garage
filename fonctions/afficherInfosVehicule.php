<?php  
// require 'message.php';
function afficherInfosVehicule($immatriculation){
  $host = "localhost"; 
  $user = "root"; 
  $bdd = "stage"; 
  $passwd = "";

  try {
      $conn = new PDO("mysql:host=$host;dbname=$bdd", $user, $passwd);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $queryInfosVehicule = "SELECT * FROM vehicule WHERE immatriculation = :immatriculation";
      $stmt = $conn->prepare($queryInfosVehicule);
      $stmt->bindParam(':immatriculation', $immatriculation);
      $stmt->execute();

      if ($rowInfosVehicule = $stmt->fetch(PDO::FETCH_NUM)) {
          ?>
          <div class="carte-grise-container">
              <div class="heading"> CARTE GRISE </div>
              <div action="rapport.php" class="div">
                  <div style="width: 20%;position: absolute;top: 12%;left: 5%;"><p>N°immatriculation</p></div>
                  <input class="N°immatriculation"            type="text" name="immatriculation"          placeholder="N°immatriculation"             value="<?php echo $rowInfosVehicule[0]  ?>" readonly>
                  <div style="width: 30%;position: absolute;top: 12%;left: 35%;"><p>date 1er mise en circulation</p></div>
                  <input class="date-1er-mise-en-circulation" type="text" name="premiereMiseEnCirculation" placeholder="date 1er mise en circulation" value="<?php echo $rowInfosVehicule[1]  ?>" readonly>
                  <div style="width: 25%;position: absolute;top: 12%;left: 67%;"><p>date immatriculation</p></div>
                  <input class="date-immatriculation"         type="text" name="dateImmatriculation"       placeholder="date immatriculation"         value="<?php echo $rowInfosVehicule[2]  ?>" readonly>
                  <div style="width: 20%;position: absolute;top: 27%;left: 5%;"><p>N° titulaire</p></div>
                  <input class="N°titulaire"                  type="text" name="numeroTitulaire"           placeholder="N° titulaire"                 value="<?php echo $rowInfosVehicule[3]  ?>" readonly>
                  <div style="width: 40%;position: absolute;top: 27%;left: 35%;"><p>titulaire</p></div>
                  <input class="titulaire"                    type="text" name="titulaire"                 placeholder="titulaire"                    value="<?php echo $rowInfosVehicule[4]  ?>" readonly>
                  <div style="width: 30%;position: absolute;top: 42%;left: 5%;"><p>N° immat precedante</p></div>
                  <input class="N°immat-precedante"           type="text" name="immatriculationPrecedente" placeholder="N° immat precedante"          value="<?php echo $rowInfosVehicule[5]  ?>" readonly>
                  <div style="width: 30%;position: absolute;top: 42%;left: 45%;"><p>adresse , commune</p></div>
                  <input class="adresse-commune"              type="text" name="adresseCommune"            placeholder="adresse , commune"            value="<?php echo $rowInfosVehicule[6]  ?>" readonly>
                  <div style="width: 30%;position: absolute;top: 60%;left: 5%;"><p>kilometrage</p></div>
                  <input class="kilometrage"                  type="text" name="kilometrage"               placeholder="kilometrage"                  value="<?php echo $rowInfosVehicule[12] ?>" readonly>
                  <div style="width: 30%;position: absolute;top: 60%;left: 35%;"><p>region , departement</p></div>
                  <input class="region-departement"           type="text" name="regionDepartement"         placeholder="region , departement"         value="<?php echo $rowInfosVehicule[7]  ?>" readonly>
                  <div style="width: 10%;position: absolute;top: 77%;left: 35%;"><p>marque</p></div>
                  <input class="annee"                        type="text" name="marque"                    placeholder="marque"                       value="<?php echo $rowInfosVehicule[8]  ?>" readonly>
                  <div style="width: 10%;position: absolute;top: 77%;left: 50%;"><p>modele</p></div>
                  <input class="numero"                       type="text" name="model"                     placeholder="modele"                       value="<?php echo $rowInfosVehicule[9]  ?>" readonly>
                  <div style="width: 10%;position: absolute;top: 77%;left: 65%;"><p>origine</p></div>
                  <input class="origine"                      type="text" name="origine"                   placeholder="origine"                      value="<?php echo $rowInfosVehicule[10] ?>" readonly>
                  <div style="width: 10%;position: absolute;top: 77%;left: 80%;"><p>annee</p></div>
                  <input class="anneeFabrication"             type="text" name="anneeFabrication"          placeholder="annee"                        value="<?php echo $rowInfosVehicule[11] ?>" readonly>
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