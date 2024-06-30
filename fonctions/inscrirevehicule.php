<?php  
// require 'message.php';
function inscrireVehicule($immatriculation, $premiereMiseEnCirculation, $dateImmatriculation, $numeroTitulaire, $titulaire, $immatriculationPrecedente, $adresseCommune, $regionDepartement, $marque, $model, $origine, $anneeFabrication, $kilometrage) {
    $host = "localhost"; 
    $user = "root"; 
    $passwd = ""; 
    $bdd = "stage";

    try {
        $conn = new PDO("mysql:host=$host;dbname=$bdd", $user, $passwd);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        
        $queryVehicule = "SELECT * FROM vehicule WHERE immatriculation = :immatriculation";
        $stmt = $conn->prepare($queryVehicule);
        $stmt->execute([':immatriculation' => $immatriculation]);

        if ($stmt->fetch(PDO::FETCH_NUM)) {
            message("ce vehicule est deja enregistre .... annulation");
        } else {
           
            $queryAdd = "INSERT INTO vehicule (immatriculation, premiereMiseEnCirculation, dateImmatriculation, numeroTitulaire, titulaire, immatriculationPrecedente, adresseCommune, regionDepartement, marque, model, origine, anneeFabrication, kilometrage) VALUES (:immatriculation, :premiereMiseEnCirculation, :dateImmatriculation, :numeroTitulaire, :titulaire, :immatriculationPrecedente, :adresseCommune, :regionDepartement, :marque, :model, :origine, :anneeFabrication, :kilometrage)";
            $stmtAdd = $conn->prepare($queryAdd);
            $stmtAdd->execute([
                ':immatriculation' => $immatriculation,
                ':premiereMiseEnCirculation' => $premiereMiseEnCirculation,
                ':dateImmatriculation' => $dateImmatriculation,
                ':numeroTitulaire' => $numeroTitulaire,
                ':titulaire' => $titulaire,
                ':immatriculationPrecedente' => $immatriculationPrecedente,
                ':adresseCommune' => $adresseCommune,
                ':regionDepartement' => $regionDepartement,
                ':marque' => $marque,
                ':model' => $model,
                ':origine' => $origine,
                ':anneeFabrication' => $anneeFabrication,
                ':kilometrage' => $kilometrage
            ]);

            message("opération réussie");

            
            $queryInitialize = "INSERT INTO statistiques (idStatistique, immatriculation, entretienEtMaintenance, reparationMecanique, diagnostiqueEtElectronique, pneumatiques, carrosserieEtPeinture, climatisation, accessoireEtPersonnalisation, assistanceRoutiere, controleTechnique, moyenne, appreciation) VALUES (:idStatistique, :immatriculation, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'indefini')";
            $stmtInitialize = $conn->prepare($queryInitialize);
            $stmtInitialize->execute([
                ':idStatistique' => time(),
                ':immatriculation' => $immatriculation
            ]);
        }
    } catch (PDOException $e) {
        message("Erreur : " . $e->getMessage());
    }
}

?>