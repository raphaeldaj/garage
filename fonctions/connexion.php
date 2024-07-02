<?php  
// require 'message.php';
function connexion($loggin, $mot_de_passe) {

    $host = "localhost"; 
    $user = "root"; 
    $bdd = "stage"; 
    $passwd = "";

    try {
        $conn = new PDO("mysql:host=$host;dbname=$bdd", $user, $passwd);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $queryConnexion = "SELECT * FROM employe WHERE login = :login";
        $stmt = $conn->prepare($queryConnexion);
        $stmt->bindParam(':login', $loggin);
        $stmt->execute();

        if ($rowConnexion = $stmt->fetch(PDO::FETCH_NUM)) {
            if (password_verify($mot_de_passe, $rowConnexion[9])) {
                message('connexion reussie');
                $_SESSION['nom'] = $rowConnexion[1];
                $_SESSION['prenom'] = $rowConnexion[2];
                $_SESSION['service'] = $rowConnexion[6];
                $_SESSION['id'] = $rowConnexion[0];

                if ($rowConnexion[7] == "Chef de Garage") {
                    header("Location: http://localhost/GARAGE/src/chefdegarage/accueilcg.php");
                    exit();
                } elseif ($rowConnexion[7] == "Chef de Service" || $rowConnexion[7] == "Employe de Service") {
                    header("Location: http://localhost/GARAGE/src/chefdeservice/accueilcs.php");
                    exit();
                } elseif ($rowConnexion[7] == "administrateur") {
                    header("Location: http://localhost/GARAGE/src/bilangeneral.php");
                    exit();
                }
            } else {
                message('informations erronee(s)');
            } 
        } else {
            message('utilisateur introuvable');
        }
    } catch (PDOException $e) {
        message("Erreur : " . $e->getMessage());
    }
}
?>
<?php  ?>