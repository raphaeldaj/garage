<?php  
// require 'message.php';
function suprimerVehicule($immatriculation) {
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
           
           $queryRemove = "DELETE FROM vehicule WHERE immatriculation = :immatriculation";
           $stmtRemove = $conn->prepare($queryRemove);
           $stmtRemove->execute([':immatriculation' => $immatriculation]);
       } else {
           message("ce vehicule n'est pas enregistre verifier les informations entrees");
       }
   } catch (PDOException $e) {
    message("Erreur : " . $e->getMessage());
   }
}
?>
<?php  ?>