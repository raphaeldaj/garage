<?php 
// require 'message.php';
function initialiserRapport($immatriculation, $numeroPermis, $idEmploye) {
    $host = "localhost";
    $user = "root";
    $bdd = "stage";
    $passwd = "";

    try {
        
        $pdo = new PDO("mysql:host=$host;dbname=$bdd", $user, $passwd);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        
        $date = date('d-m-Y');
        $queryVerification = "SELECT * FROM rapport WHERE immatriculation = :immatriculation AND date = :date";
        $stmt = $pdo->prepare($queryVerification);
        $stmt->bindParam(':immatriculation', $immatriculation, PDO::PARAM_STR);
        $stmt->bindParam(':date', $date, PDO::PARAM_STR);
        $stmt->execute();

        if ($stmt->fetch(PDO::FETCH_ASSOC)) {
            
        } else {
            
            $queryInsert = "INSERT INTO rapport (idRapport, immatriculation, numeroPermis, idEmploye, entretienEtMaintenance, reparationMecanique, diagnostiqueEtElectronique, pneumatiques, carrosserieEtPeinture, climatisation, accessoireEtPersonnalisation, assistanceRoutiere, controleTechnique, date, montant) 
                            VALUES (:idRapport, :immatriculation, :numeroPermis, :idEmploye, false, false, false, false, false, false, false, false, false, :date, '0.0')";
            
            $idRapport = time(); 
            
            $stmtInsert = $pdo->prepare($queryInsert);
            $stmtInsert->bindParam(':idRapport', $idRapport, PDO::PARAM_INT);
            $stmtInsert->bindParam(':immatriculation', $immatriculation, PDO::PARAM_STR);
            $stmtInsert->bindParam(':numeroPermis', $numeroPermis, PDO::PARAM_STR);
            $stmtInsert->bindParam(':idEmploye', $idEmploye, PDO::PARAM_STR);
            $stmtInsert->bindParam(':date', $date, PDO::PARAM_STR);
            $stmtInsert->execute();

        }
    } catch (PDOException $e) {
        message( "Erreur : " . $e->getMessage());
    }
}
