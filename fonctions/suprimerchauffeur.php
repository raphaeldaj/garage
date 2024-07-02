<?php  
// require 'message.php';
function supprimerChauffeur($permis) {
   $host = "localhost"; 
   $user = "root"; 
   $passwd = ""; 
   $bdd = "stage";

   try {
       $conn = new PDO("mysql:host=$host;dbname=$bdd", $user, $passwd);
       $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

       $queryEmploye = "SELECT * FROM chauffeur WHERE numeroPermis = :chauffeur";
       $stmt = $conn->prepare($queryEmploye);
       $stmt->execute([':chauffeur' => $permis]);

       if ($stmt->fetch(PDO::FETCH_NUM)) {

           $queryRemove = "DELETE FROM chauffeur WHERE numeroPermis = :chauffeur";
           $stmtRemove = $conn->prepare($queryRemove);
           $stmtRemove->execute([':chauffeur' => $permis]);
       } else {
           message("Ce chauffeur n'est pas enregistre verifier les informations entrees");
       }
    //    header("Location: http://localhost/GARAGE/src/gestiondesdonnees.php");
   } catch (PDOException $e) {
    message("Erreur : " . $e->getMessage());
   }
}
?>