<?php session_start() ;
require '../fonctions/message.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACCUEIL</title>
    <link rel="stylesheet" href="../style/accueil.css">
</head>
<body>
    <div class="container" style="top:150px;">

        <form action="accueil.php" class="form" methode="post">

          <input required="" class="input" type="text" name="loggin"       placeholder="LOGGIN">

          <input required="" class="input" type="password" name="mot-de-passe"  placeholder="Mot De Passe">

          <input class="login-button" type="submit" value="valider">

        </form>

    </div>

   
</body>
</html>
<?php require '../fonctions/connexion.php';
if( (!empty($_REQUEST['loggin'])) && (!empty($_REQUEST['mot-de-passe'])) ){
    connexion($_REQUEST['loggin'],$_REQUEST['mot-de-passe']) ;
}
?>