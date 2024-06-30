<?php  
// require 'message.php';
function suprimerVehicule($idEmploye) {
   $host = "localhost"; 
   $user = "root"; 
   $passwd = ""; 
   $bdd = "stage";

   try {
       $conn = new PDO("mysql:host=$host;dbname=$bdd", $user, $passwd);
       $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

       $queryEmploye = "SELECT * FROM employe WHERE idEmploye = :idEmploye";
       $stmt = $conn->prepare($queryEmploye);
       $stmt->execute([':idEmploye' => $idEmploye]);

       if ($stmt->fetch(PDO::FETCH_NUM)) {

           $queryRemove = "DELETE FROM employe WHERE idEmploye = :idEmploye";
           $stmtRemove = $conn->prepare($queryRemove);
           $stmtRemove->execute([':idEmploye' => $idEmploye]);
       } else {
           message("Cet Employe n'est pas enregistre verifier les informations entrees");
       }
   } catch (PDOException $e) {
    message("Erreur : " . $e->getMessage());
   }
}
?>