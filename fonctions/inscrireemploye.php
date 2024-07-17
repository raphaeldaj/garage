<?php 
// require 'message.php';
require 'corrigerNumero.php'; 
function inscrireEmploye($nom, $prenom, $email, $telephone, $adresse, $service, $poste, $login, $motDePasse) {
    $host = "localhost"; 
    $user = "root"; 
    $bdd = "stage"; 
    $passwd = "";

    $motDePasse = password_hash($motDePasse, PASSWORD_DEFAULT);

    try {
        $conn = new PDO("mysql:host=$host;dbname=$bdd", $user, $passwd);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $queryEmploye = "SELECT * FROM employe WHERE login = :login";
        $stmt = $conn->prepare($queryEmploye);
        $stmt->execute([':login' => $login]);

        if ($rowEmploye = $stmt->fetch(PDO::FETCH_NUM)) {
            message("cet Employe est deja enregistre .... modifiez le loggin ");
        } else {
            $telephone = corrigerNumero($telephone);
            $queryAdd = "INSERT INTO employe (idEmploye, nom, prenom, email, telephone, adresse, service, poste, login, motDePasse) VALUES (:idEmploye, :nom, :prenom, :email, :telephone, :adresse, :service, :poste, :login, :motDePasse)";
            $stmtAdd = $conn->prepare($queryAdd);
            $stmtAdd->execute([
                ':idEmploye' => time(),
                ':nom' => $nom,
                ':prenom' => $prenom,
                ':email' => $email,
                ':telephone' => $telephone,
                ':adresse' => $adresse,
                ':service' => $service,
                ':poste' => $poste,
                ':login' => $login,
                ':motDePasse' => $motDePasse
            ]);
        }
    } catch (PDOException $e) {
        message("Erreur : " . $e->getMessage());
    }
}
?>



