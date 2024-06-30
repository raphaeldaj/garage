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

            <!-- <select class="input" name="service">
                <option value="indefini">SERVICE</option>
                <option value="administration">administration</option>
                <option value="chef de garage">chef de garage</option>
                <option value="Entretien Et Maintenance">Entretien Et Maintenance</option>
                <option value="Reparation Mecanique">Reparation Mecanique</option>
                <option value="Diagnostique Et Electronique">Diagnostique Et Electronique</option>
                <option value="Pneumatiques">Pneumatiques</option>
                <option value="Carrosserie Et Peinture">Carrosserie Et Peinture</option>
                <option value="Climatisation">Climatisation</option>
                <option value="Accessoire Et Personnalisation">Accessoire Et Personnalisation</option>
                <option value="Assistance Routiere">Assistance Routiere</option>
                <option value="Controle Technique">Controle Technique</option>
            </select>


            <select class="input" name="role">
                <option value="indefini">ROLE</option>
                <option value="administrateur">administrateur</option>
                <option value="Chef de Garage">Chef de Garage</option>
                <option value="Chef de Service">Chef de Service</option>
                <option value="Employe de Service">Employe de Service</option>
            </select> -->

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