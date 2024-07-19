<?php
require 'initialiserRapport.php';
if (!empty($_REQUEST['etat'])) {
    $host = "localhost"; 
    $user = "root"; 
    $bdd = "stage"; 
    $passwd = "";

    try {
        $conn = new PDO("mysql:host=$host;dbname=$bdd", $user, $passwd);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // $queryDiagnostique = "INSERT INTO rapport (idRapport, immatriculation, numeroPermis, idEmploye, entretienEtMaintenance, reparationMecanique, DiagnostiqueEtElectronique, pneumatiques, carrosserieEtPeinture, climatisation, accessoireEtPersonnalisation, assistanceRoutiere, controleTechnique, date, montant) VALUES (:idRapport, :immatriculation, :numeroPermis, :idEmploye, 0, 0, 0, 0, 0, 0, 0, 0, 0, :date, 0)";
        // $stmt = $conn->prepare($queryDiagnostique);
        // $stmt->execute([
        //     ':idRapport' => time(),
        //     ':immatriculation' => $_REQUEST['immatriculation'],
        //     ':numeroPermis' => $_REQUEST['numeroPermis'],
        //     ':idEmploye' => $_SESSION['id'],
        //     ':date' => date('d-m-Y')
        // ]);
        initialiserRapport($_REQUEST['immatriculation'],$_REQUEST['numeroPermis'],$_SESSION['id']);

        if ($_REQUEST['etat'] == "Prendre En Charge") {
            $queryDiagnostique = "INSERT INTO Journee (immatriculation, premiereMiseEnCirculation, dateImmatriculation, numeroTitulaire, titulaire, immatriculationPrecedente, adresseCommune, regionDepartement, marque, model, origine, anneeFabrication, kilometrage, date, clefprimaire,numeroPermis) VALUES (:immatriculation, :premiereMiseEnCirculation, :dateImmatriculation, :numeroTitulaire, :titulaire, :immatriculationPrecedente, :adresseCommune, :regionDepartement, :marque, :model, :origine, :anneeFabrication, :kilometrage, :date, :clefprimaire , :numeroPermis)";
            $stmt = $conn->prepare($queryDiagnostique);
            $stmt->execute([
                ':immatriculation' => $_REQUEST['immatriculation'],
                ':premiereMiseEnCirculation' => $_REQUEST['premiereMiseEnCirculation'],
                ':dateImmatriculation' => $_REQUEST['dateImmatriculation'],
                ':numeroTitulaire' => $_REQUEST['numeroTitulaire'],
                ':titulaire' => $_REQUEST['titulaire'],
                ':immatriculationPrecedente' => $_REQUEST['immatriculationPrecedente'],
                ':adresseCommune' => $_REQUEST['adresseCommune'],
                ':regionDepartement' => $_REQUEST['regionDepartement'],
                ':marque' => $_REQUEST['marque'],
                ':model' => $_REQUEST['model'],
                ':origine' => $_REQUEST['origine'],
                ':anneeFabrication' => $_REQUEST['anneeFabrication'],
                ':kilometrage' => $_REQUEST['kilometrage'],
                ':date' => date('d-m-Y'),
                ':numeroPermis' => $_REQUEST['numeroPermis'],
                ':clefprimaire' => time()
            ]);
        }

        sleep(1);

        $timestampDans22Jours = strtotime('+22 days');
        $dateDans22Jours = date('d-m-Y', $timestampDans22Jours);

        $queryProgrammation = "INSERT INTO Journee (immatriculation, premiereMiseEnCirculation, dateImmatriculation, numeroTitulaire, titulaire, immatriculationPrecedente, adresseCommune, regionDepartement, marque, model, origine, anneeFabrication, kilometrage, date, clefprimaire,numeroPermis) VALUES (:immatriculation, :premiereMiseEnCirculation, :dateImmatriculation, :numeroTitulaire, :titulaire, :immatriculationPrecedente, :adresseCommune, :regionDepartement, :marque, :model, :origine, :anneeFabrication, :kilometrage, :date, :clefprimaire, :numeroPermis)";
        $stmt = $conn->prepare($queryProgrammation);
        $stmt->execute([
            ':immatriculation' => $_REQUEST['immatriculation'],
            ':premiereMiseEnCirculation' => $_REQUEST['premiereMiseEnCirculation'],
            ':dateImmatriculation' => $_REQUEST['dateImmatriculation'],
            ':numeroTitulaire' => $_REQUEST['numeroTitulaire'],
            ':titulaire' => $_REQUEST['titulaire'],
            ':immatriculationPrecedente' => $_REQUEST['immatriculationPrecedente'],
            ':adresseCommune' => $_REQUEST['adresseCommune'],
            ':regionDepartement' => $_REQUEST['regionDepartement'],
            ':marque' => $_REQUEST['marque'],
            ':model' => $_REQUEST['model'],
            ':origine' => $_REQUEST['origine'],
            ':anneeFabrication' => $_REQUEST['anneeFabrication'],
            ':kilometrage' => $_REQUEST['kilometrage'],
            ':date' => $dateDans22Jours,
            ':numeroPermis' => $_REQUEST['numeroPermis'],
            ':clefprimaire' => time()
        ]);

        sleep(1);

    } catch (PDOException $e) {
        message("Erreur : " . $e->getMessage());
    }
}

?>