<?php session_start() ;
require '../../fonctions/message.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACCUEIL</title>
    <link rel="stylesheet" href="../../style/accueilcg.css">
    <style>

    </style>
</head>
<body>
    <div class="container" style="top: 200px;">
        <form action="infocg.php" class="form" method="post">
          <input required="" class="input" type="text" name="immatriculation"  placeholder="Immatriculation de la Voiture">
          <input required="" class="input" type="text" name="permis"        placeholder="N° de Permis du Chauffeur">
          <input class="login-button" type="submit" value="valider">
        </form>
    </div>

   
</body>
</html>

<?php require '../../fonctions/diagnostique.php';
  ?>
<?php  ?>




