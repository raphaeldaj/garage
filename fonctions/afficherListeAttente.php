<?php  

// require 'message.php';
function afficherListAttente(){
    
    $host = "localhost"; 
    $user = "root"; 
    $bdd = "stage"; 
    $passwd = "";
    
    try {
        $conn = new PDO("mysql:host=$host;dbname=$bdd", $user, $passwd);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $queryListeAttente = "SELECT * FROM journee WHERE date = :date";
        $stmt = $conn->prepare($queryListeAttente);
        $currentDate = date('d-m-Y');
        $stmt->bindParam(':date', $currentDate);
        $stmt->execute();
        
        while ($rowListeAttente = $stmt->fetch(PDO::FETCH_NUM)) {
            ?>
            <div>  
                <form action="./../employedeservice/service.php" method="" class="container">
                    <div class="carte-grise">
                        <div class="heading"><?php echo $rowListeAttente[0] ?></div>
                        <div class="div">
                            <div style="width: 20%;position: absolute;top: 12%;left: 5%;"><p>immatriculation</p></div>
                            <input class="N°immatriculation"            type="text" name="immatriculation"              value="<?php echo $rowListeAttente[0]  ?>"    readonly      placeholder="N°immatriculation">
                            <div style="width: 30%;position: absolute;top: 12%;left: 35%;"><p>date 1er mise en circulation</p></div>
                            <input class="date-1er-mise-en-circulation" type="text" name="date 1er mise en circulation" value="<?php echo $rowListeAttente[1]  ?>"    readonly      placeholder="date 1er mise en circulation">
                            <div style="width: 25%;position: absolute;top: 12%;left: 67%;"><p>date immatriculation</p></div>
                            <input class="date-immatriculation"         type="text" name="date immatriculation"         value="<?php echo $rowListeAttente[2]  ?>"    readonly      placeholder="date immatriculation">
                            <div style="width: 20%;position: absolute;top: 27%;left: 5%;"><p>N° titulaire</p></div>
                            <input class="N°titulaire"                  type="text" name="N° titulaire"                 value="<?php echo $rowListeAttente[3]  ?>"    readonly      placeholder="N° titulaire">
                            <div style="width: 40%;position: absolute;top: 27%;left: 35%;"><p>titulaire</p></div>
                            <input class="titulaire"                    type="text" name="titulaire"                    value="<?php echo $rowListeAttente[4]  ?>"    readonly      placeholder="titulaire">
                            <div style="width: 30%;position: absolute;top: 42%;left: 5%;"><p>N° immat precedante</p></div>
                            <input class="N°immat-precedante"           type="text" name="N° immat precedante"          value="<?php echo $rowListeAttente[5]  ?>"    readonly      placeholder="N° immat precedante">
                            <div style="width: 30%;position: absolute;top: 42%;left: 45%;"><p>adresse , commune</p></div>
                            <input class="adresse-commune"              type="text" name="adresse , commune"            value="<?php echo $rowListeAttente[6]  ?>"    readonly      placeholder="adresse , commune">
                            <div style="width: 30%;position: absolute;top: 60%;left: 5%;"><p>kilometrage</p></div>
                            <input class="kilometrage"                  type="text" name="kilometrage"                  value="<?php echo $rowListeAttente[12] ?>"    readonly      placeholder="kilometrage">
                            <div style="width: 30%;position: absolute;top: 60%;left: 35%;"><p>region , departement</p></div>
                            <input class="region-departement"           type="text" name="region , departement"         value="<?php echo $rowListeAttente[7]  ?>"    readonly      placeholder="region , departement">
                            <div style="width: 30%;position: absolute;top: 60%;left: 70%;"><p>Chauffeur Actuel</p></div>
                            <input class="region-departement"           type="text" name="chauffeurActuel"         value="<?php echo $rowListeAttente[15] ?>"    readonly      placeholder="Chauffeur Actuel" style="left: 70%;">
                            <div style="width: 10%;position: absolute;top: 77%;left: 35%;"><p>marque</p></div>
                            <input class="annee"                        type="text" name="marque"                       value="<?php echo $rowListeAttente[8]  ?>"    readonly      placeholder="marque">
                            <div style="width: 10%;position: absolute;top: 77%;left: 50%;"><p>modele</p></div>
                            <input class="numero"                       type="text" name="modele"                       value="<?php echo $rowListeAttente[9]  ?>"    readonly      placeholder="modele">
                            <div style="width: 10%;position: absolute;top: 77%;left: 65%;"><p>origine</p></div>
                            <input class="origine"                      type="text" name="origine"                      value="<?php echo $rowListeAttente[10] ?>"    readonly      placeholder="origine">
                            <div style="width: 10%;position: absolute;top: 77%;left: 80%;"><p>annee</p></div>
                            <input class="anneeFabrication"             type="text" name="anneeFabrication"             value="<?php echo $rowListeAttente[11] ?>"    readonly      placeholder="annee">
                        </div>
                        <div class="vitre"></div>
                        <input class="traiter" type="submit" name="etat" value="prendre en charge" style="width: 20%;position: absolute;bottom: 0%;left: 5%;text-align: center;">
                    </div>
                </form>
            </div>
            <?php 
        }
    } catch(PDOException $e) {
        message("Erreur : " . $e->getMessage());
    }
}
?>