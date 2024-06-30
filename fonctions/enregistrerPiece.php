<?php 
// require 'message.php';
    function enregistrerPiece($idEmploye, $nomEmploye, $prenomEmploye, $immatriculation, $nomPiece, $prixPiece, $service) {
        $host = "localhost"; 
        $user = "root"; 
        $bdd = "stage"; 
        $passwd = "";
    
        try {
            $conn = new PDO("mysql:host=$host;dbname=$bdd", $user, $passwd);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $queryVerification = "SELECT * FROM dailystats WHERE immatriculation = :immatriculation AND piece = :nomPiece AND date = :date";
            $stmt = $conn->prepare($queryVerification);
            $stmt->execute([
                ':immatriculation' => $immatriculation,
                ':nomPiece' => $nomPiece,
                ':date' => date('d-m-Y')
            ]);
    
            if ($rowVerification = $stmt->fetch(PDO::FETCH_NUM)) {
                if ($rowVerification[6] != $prixPiece) {
                    $queryEnregistrement = "UPDATE dailystats SET prix = :prixPiece WHERE immatriculation = :immatriculation AND piece = :nomPiece AND date = :date";
                    $stmtUpdate = $conn->prepare($queryEnregistrement);
                    $stmtUpdate->execute([
                        ':prixPiece' => $prixPiece,
                        ':immatriculation' => $immatriculation,
                        ':nomPiece' => $nomPiece,
                        ':date' => date('d-m-Y')
                    ]);
                }
            } else {
                $queryEnregistrement = "INSERT INTO dailystats (idStatistique, idEmploye, nomEmploye, prenomEmploye, immatriculation, piece, prix, date, service) VALUES (:idStatistique, :idEmploye, :nomEmploye, :prenomEmploye, :immatriculation, :nomPiece, :prixPiece, :date, :service)";
                $stmtInsert = $conn->prepare($queryEnregistrement);
                $stmtInsert->execute([
                    ':idStatistique' => time(),
                    ':idEmploye' => $idEmploye,
                    ':nomEmploye' => $nomEmploye,
                    ':prenomEmploye' => $prenomEmploye,
                    ':immatriculation' => $immatriculation,
                    ':nomPiece' => $nomPiece,
                    ':prixPiece' => $prixPiece,
                    ':date' => date('d-m-Y'),
                    ':service' => $service
                ]);
            }
    
            $service = str_replace(' ', '', $service);
            $queryUpdate = "UPDATE rapport SET $service = true WHERE immatriculation = :immatriculation AND date = :date";
            $stmtUpdateRapport = $conn->prepare($queryUpdate);
            $stmtUpdateRapport->execute([
                ':immatriculation' => $immatriculation,
                ':date' => date('d-m-Y')
            ]);
    
            sleep(1);
        } catch (PDOException $e) {
            message("Erreur : " . $e->getMessage());
        }
    }
    ?>