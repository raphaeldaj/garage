<?php session_start() ;
require '../../fonctions/message.php'; 
require '../../fonctions/afficherListeAttente.php';
// require '../../fonctions/initialiserRapport.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fil d'Attente</title>
    <link rel="stylesheet" href="../../style/accueilcs.css">
</head>
<body>
    <div class="container">

      <?php afficherListAttente() ?>
  
    </div>
        
</body>


</html>
<?php  




include "../../fonctions/enregistrerPiece.php";

            if( !empty( $_REQUEST['etat_traitement'] ) && ( ($_REQUEST['etat_traitement']=="valider") || ($_REQUEST['etat_traitement']=="terminer") ) )
            {
                $prixTotal=0;
                
                if(!empty($_REQUEST['counter'])){
                    $max = $_REQUEST['counter'];
                }

                for( $i=1 ; $i<$_REQUEST['counter'];$i++ )
                {

                    $nompiece = "piece".$i;
                    $placeholderpiece = "PIECE"." ".$i;
                    $prixPiece  = "prix".$i;
                    $placeholderprix = "PRIX"." ".$i;
                    $prixTotal=$prixTotal+ floatval($_REQUEST[$prixPiece]) ;
                    enregistrerPiece($_SESSION['id'],$_SESSION['nom'],$_SESSION['prenom'],$_REQUEST['immatriculation'],$_REQUEST[$nompiece],$_REQUEST[$prixPiece],$_SESSION['service']);
                    
                }



                $host = "localhost";
                $user = "root";
                $bdd = "stage";
                $passwd = "";

                try {
                    
                    $pdo = new PDO("mysql:host=$host;dbname=$bdd", $user, $passwd);
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    
                    $service = str_replace(' ', '', $_SESSION['service']);
                    $immatriculation = $_REQUEST['immatriculation'];
                    // $prixTotal = $_REQUEST['prixTotal'];
                    $etatTraitement = $_REQUEST['etat_traitement'];


                    $queryVerification = "SELECT * FROM rapport WHERE immatriculation = :immatriculation AND date = :date";
                    $stmtVerification = $pdo->prepare($queryVerification);
                    $stmtVerification->bindParam(':immatriculation', $immatriculation, PDO::PARAM_STR);
                    $stmtVerification->bindValue(':date', date('d-m-Y'), PDO::PARAM_STR);
                    $stmtVerification->execute();
                    if ($rowVerification = $stmtVerification->fetch(PDO::FETCH_NUM)){
                        $prixTotal = $prixTotal + $rowVerification[14] ;
                    }

                
                    $queryUpdate = "UPDATE rapport SET $service = TRUE, montant = :prixTotal WHERE immatriculation = :immatriculation AND date = :date";
                    $stmtUpdate = $pdo->prepare($queryUpdate);
                    $stmtUpdate->bindParam(':prixTotal', $prixTotal, PDO::PARAM_STR);
                    $stmtUpdate->bindParam(':immatriculation', $immatriculation, PDO::PARAM_STR);
                    $stmtUpdate->bindValue(':date', date('d-m-Y'), PDO::PARAM_STR);
                    $stmtUpdate->execute();


                    
                    if ($etatTraitement == "terminer") {
                        $timestampDans21Jours = strtotime('+21 days');
                        $dateDans21Jours = date('d-m-Y', $timestampDans21Jours);
                        
                        $queryDelete = "DELETE FROM journee WHERE immatriculation = :immatriculation AND date >= :dateDebut AND date <= :dateFin";
                        $stmtDelete = $pdo->prepare($queryDelete);
                        $stmtDelete->bindParam(':immatriculation', $immatriculation, PDO::PARAM_STR);
                        $stmtDelete->bindParam(':dateDebut', date('d-m-Y'), PDO::PARAM_STR);
                        $stmtDelete->bindParam(':dateFin', $dateDans21Jours, PDO::PARAM_STR);
                        $stmtDelete->execute();
                    }
                } catch (PDOException $e) {
                    echo "Erreur : " . $e->getMessage();
                }
            }
?>