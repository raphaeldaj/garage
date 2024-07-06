<?php 
// require 'message.php';
function inscrireChauffeur($numeroPermis,$nom, $prenom, $dateNaissance, $lieuNaissance, $dateEmission, $dateExpiration, $delivrePar, $type, $groupeSanguin) {
    $host = "localhost"; 
    $user = "root"; 
    $bdd = "stage"; 
    $passwd = "";
    try {
        $conn = new PDO("mysql:host=$host;dbname=$bdd", $user, $passwd);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $queryEmploye = "SELECT * FROM chauffeur WHERE numeroPermis  = :numeroPermis";
        $stmt = $conn->prepare($queryEmploye);
        $stmt->execute([':numeroPermis' => $numeroPermis]);

        if ($rowEmploye = $stmt->fetch(PDO::FETCH_NUM)) {
            message("ce Chauffeur est deja enregistre ...... annulation");
        } else {
            $queryAdd = "INSERT INTO chauffeur (numeroPermis , nom, prenom, dateNaissance, lieuNaissance, dateEmission, dateExpiration, delivrePar, categorie, groupeSanguin) VALUES (:numeroPermis, :nom, :prenom, :dateNaissance, :lieuNaissance, :dateEmission, :dateExpiration, :delivrePar, :categorie, :groupeSanguin)";
            $stmtAdd = $conn->prepare($queryAdd);
            $stmtAdd->execute([
                ':numeroPermis' => $numeroPermis,
                ':nom' => $nom,
                ':prenom' => $prenom,
                ':dateNaissance' => $dateNaissance,
                ':lieuNaissance' => $lieuNaissance,
                ':dateEmission' => $dateEmission,
                ':dateExpiration' => $dateExpiration,
                ':delivrePar' => $delivrePar,
                ':categorie' => $type,
                ':groupeSanguin' => $groupeSanguin
            ]);
        }
    } catch (PDOException $e) {
        message("Erreur : " . $e->getMessage());
    }
}




?>



