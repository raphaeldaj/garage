<?php session_start()  ;
require '../fonctions/message.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STATISTIQUES</title>
    <link rel="stylesheet" href="../style/bilangeneral.css">
</head>
<body>

    
    <div class="Bilan-General">
      <div class="heading">BILAN GENERAL</div>
      <section>

        <div>
          <table>
            <tr>
              <td>immatriculation</td>
              <td>entretien et maintenance</td>
              <td>reparation mecanique</td>
              <td>diagnostique et electronique</td>
              <td>pneumatiques</td>
              <td>carrosserie et peinture</td>
              <td>climatisation</td>
              <td>accessoire et personnalisation</td>
              <td>assistance routiere</td>
              <td>controle technique</td>
              <td>moyenne</td>
              <td>appreciation</td>
              <td>appercue</td>
            </tr>
          </table>
        </div>

        <?php require '../fonctions/voirBilanGeneral.php';
        voiBilanGeneral();
  ?>

        

      </section>
    </div>

        
        <div id="add-auto-form" style="width: 100%;height: 100%;background-color: rgba(0, 0, 0, 0.638);position: fixed;top: 0px;left: 150%;display: flex;justify-content: space-around;">

          <div class="carte-grise-container" style="top: 100px;border-radius: 40px;">
            <div class="heading">Nouveau VEHICULE</div>
            <form action="bilangeneral.php" class="div">
              <div style="width: 20%;position: absolute;top: 12%;left: 5%;"><p>N°immatriculation</p></div>
              <input  class="N°immatriculation"            type="text"      name="immatriculation"             placeholder="N°immatriculation"    required="">
              <div style="width: 30%;position: absolute;top: 12%;left: 35%;"><p>date 1er mise en circulation</p></div>
              <input  class="date-1er-mise-en-circulation" type="date"      name="premiereMiseEnCirculation"  placeholder="date 1er mise en circulation">
              <div style="width: 20%;position: absolute;top: 12%;left: 67%;"><p>date immatriculation</p></div>
              <input  class="date-immatriculation"         type="date"      name="dateImmatriculation"          placeholder="date immatriculation" required="">
              <div style="width: 20%;position: absolute;top: 27%;left: 5%;"><p>N° titulaire</p></div>
              <input  class="N°titulaire"                 type="text"      name="numeroTitulaire"                  placeholder="N° titulaire"          required="">
              <div style="width: 40%;position: absolute;top: 27%;left: 35%;"><p>titulaire</p></div>
              <input  class="titulaire"                    type="text"      name="titulaire"                     placeholder="titulaire"            required="">
              <div style="width: 30%;position: absolute;top: 42%;left: 5%;"><p>N° immat precedante</p></div>
              <input  class="N°immat-precedante"          type="text"      name="immatriculationPrecedente"           placeholder="N° immat precedante"   required="">
              <div style="width: 30%;position: absolute;top: 42%;left: 45%;"><p>adresse , commune</p></div>
              <input  class="adresse-commune"            type="text"      name="adresseCommune"             placeholder="adresse , commune"      required="">
              <div style="width: 30%;position: absolute;top: 60%;left: 5%;"><p>kilometrage</p></div>
              <input  class="kilometrage"            type="number"      name="kilometrage"             placeholder="kilometrage">
              <div style="width: 30%;position: absolute;top: 60%;left: 35%;"><p>region , departement</p></div>
              <input  class="region-departement"         type="text"      name="regionDepartement"          placeholder="region , departement"   required="">
              <div style="width: 10%;position: absolute;top: 77%;left: 35%;"><p>marque</p></div>
              <input  class="annee"                        type="text"      name="marque"                         placeholder="marque"                required="">
              <div style="width: 10%;position: absolute;top: 77%;left: 50%;"><p>modele</p></div>
              <input  class="numero"                       type="text"      name="modele"                        placeholder="modele"               required="">
              <div style="width: 10%;position: absolute;top: 77%;left: 65%;"><p>origine</p></div>
              <input  class="origine"                      type="text"      name="origine"                       placeholder="origine"              required="">
              <div style="width: 10%;position: absolute;top: 77%;left: 80%;"><p>annee</p></div>
                <input  class="anneeFabrication"                      type="text"      name="anneeFabrication"                       placeholder="annee">
              <input type="submit" value="enregistrer" style="width: 100px;bottom: 0%;left: 5%;text-align: center;" class="traiter">
            </form>
            <!-- <div class="vitre"></div> -->
          </div>
        </div>



        <div id="add-chauf-form" style="width: 100%;height: 100%;background-color: rgba(0, 0, 0, 0.638);position: fixed;top: 0px;left: 150%;display: flex;justify-content: space-around;">

          <div class="permis-container" style="top : 150px;">
              <div class="heading"> PERMIS DE CONDUIRE </div>
              <div action="rapport.php" class="div">
                  <div style="width: 20%;position: absolute;top: 12%;left: 5%;"><p>N° Permis</p></div>
                  <input class="N°immatriculation"            type="text" name="numeroPermis"              placeholder="N° Permis"                 value="" >
                  <div style="width: 30%;position: absolute;top: 12%;left: 35%;"><p>date d'Emission</p></div>
                  <input class="date-1er-mise-en-circulation" type="text" name="dateEmission"              placeholder="date d'Emission"           value="" >
                  <div style="width: 25%;position: absolute;top: 12%;left: 67%;"><p>date d'Expiration</p></div>
                  <input class="date-immatriculation"         type="text" name="dateExpiration"            placeholder="date d'Expiration"         value="" >
                  <div style="width: 20%;position: absolute;top: 27%;left: 5%;"><p>Nom</p></div>
                  <input class="N°titulaire"                  type="text" name="nomChauffeur"              placeholder="Nom"                       value="" >
                  <div style="width: 40%;position: absolute;top: 27%;left: 35%;"><p>Prenom</p></div>
                  <input class="titulaire"                    type="text" name="prenomChauffeur"           placeholder="Prenom"                    value="" >
                  <div style="width: 30%;position: absolute;top: 42%;left: 5%;"><p>date de Naissance</p></div>
                  <input class="N°immat-precedante"           type="text" name="immatriculationPrecedente" placeholder="date de Naissance"         value="" >
                  <div style="width: 30%;position: absolute;top: 42%;left: 45%;"><p>lieu de Naissance</p></div>
                  <input class="adresse-commune"              type="text" name="dateNaissance"             placeholder="lieu de Naissance"         value="" >
                  <div style="width: 30%;position: absolute;top: 60%;left: 5%;"><p>delivre par</p></div>
                  <input class="kilometrage"                  type="text" name="delivrePar"                placeholder="delivre Par"               value="" >
                  <div style="width: 30%;position: absolute;top: 60%;left: 35%;"><p>groupe sanguin</p></div>
                  <input class="region-departement"           type="text" name="groupeSanguin"             placeholder="groupe sanguin"            value="" >
                  <div style="width: 10%;position: absolute;top: 60%;left: 65%;"><p>cathegorie</p></div>
                  <input class="origine"                      type="text" name="cathegorie"                placeholder="cathegorie"                value=""  style="top :68% ;">
                  <input type="submit" value="enregistrer" style="width: 100px;bottom: 3%;left: 5%;text-align: center;" class="traiter">
              </div>
          </div>

        </div>



        <div id="add-empl-form" style="width: 100%;height: 100%;background-color: rgba(0, 0, 0, 0.638);position: fixed;top: 0px;left: 150%;display: flex;justify-content: space-around;">

          <div class="carte-perso-container" style="top: 25px;border-radius: 40px; align-items: center;background: linear-gradient(0deg, rgb(255, 255, 255) 0%, rgb(244, 247, 251) 100%);height: 600px;">
            <div class="heading"> Nouvel Employe </div>
            <form action="bilangeneral.php" class="div"  style="display: flex ; flex-direction: column; align-items: center;width: 100%;height: 80%;left: 10%;">
              <input required=""   type="text"   name="nom"        placeholder="NOM"             style="width: 80%;position: relative;text-align: center;">
              <input required=""   type="text"   name="prenom"     placeholder="PRENOM"          style="width: 80%;position: relative;text-align: center;">
              <input required=""   type="text"   name="adresse"    placeholder="ADRESSE"         style="width: 80%;position: relative;text-align: center;">
              <input required=""   type="email"  name="email"      placeholder="E-MAIL"          style="width: 80%;position: relative;text-align: center;">
              <input required=""   type="text"   name="telephone"  placeholder="TELEPHONE"       style="width: 80%;position: relative;text-align: center;">
              <select style="text-align: center;width: 80%;" class="select" name="service">
                <option value="indefini">SERVICE</option>
                <option value="administration">administration</option>
                <option value="chef de garage">chef de garage</option>
                <option value="entretien Et Maintenance">Entretien Et Maintenance</option>
                <option value="reparation Mecanique">Reparation Mecanique</option>
                <option value="diagnostique Et Electronique">Diagnostique Et Electronique</option>
                <option value="pneumatiques">Pneumatiques</option>
                <option value="carrosserie Et Peinture">Carrosserie Et Peinture</option>
                <option value="climatisation">Climatisation</option>
                <option value="accessoire Et Personnalisation">Accessoire Et Personnalisation</option>
                <option value="assistance Routiere">Assistance Routiere</option>
                <option value="controle Technique">Controle Technique</option>
            </select>


            <select style="text-align: center;width: 80%;" class="select" name="poste">
                <option value="indefini">ROLE</option>
                <option value="administrateur">Secretaire</option>
                <option value="Chef de Garage">Chef de Garage</option>
                <option value="Chef de Service">Chef de Service</option>
                <option value="Employe de Service">Employe de Service</option>
            </select>
              <input required=""   type="text"   name="loggin"     placeholder="LOGGIN"          style="width: 80%;position: relative;text-align: center;">
              <input required=""   type="text"   name="motDePasse"     placeholder="MOT DE PASSE"    style="width: 80%;position: relative;text-align: center;">
              

              <input type="submit" value="enregistrer" style="width: 100px;bottom: 5%;left: 5%;text-align: center;" class="traiter">
            </form>
            <!-- <div class="vitre"></div> -->
          </div>
        </div>


        <div id="add" style="position: fixed;width: 40px;background-color: #0099ff;border-radius: 20px;right: 10px;top: 15px;height:40px; ">
          <button id="add-active" style="width: 30px;height: 30px;border-radius: 15px;left: 5px;position: relative;top: 5px;"></button>
          <button id="add-auto"   style="width: 30px;height: 30px;border-radius: 15px;left: 150px;position: relative;top: 5px;background-image : url('../pictures/add-auto-icon.jpeg');background-size : cover;"></button>
          <button id="add-empl"   style="width: 30px;height: 30px;border-radius: 15px;left: 150px;position: relative;top: 5px;background-image : url('../pictures/add-empl-icon.jpeg');background-size : cover;"></button>
          <button id="add-chauf"  style="width: 30px;height: 30px;border-radius: 15px;left: 150px;position: relative;top: 5px;background-image : url('../pictures/add-driver-icon.jpeg');background-size : cover;"></button>
        </div>
        
        <script src="../script/bilangeneral.js"></script>
</body>


</html>
<?php  
require '../fonctions/inscrireemploye.php';
require '../fonctions/inscrirevehicule.php';
if(!empty($_REQUEST['immatriculation'])){inscrireVehicule($_REQUEST['immatriculation'],$_REQUEST['premiereMiseEnCirculation'],$_REQUEST['dateImmatriculation'],$_REQUEST['numeroTitulaire'],$_REQUEST['titulaire'],$_REQUEST['immatriculationPrecedente'],$_REQUEST['adresseCommune'],$_REQUEST['regionDepartement'],$_REQUEST['marque'],$_REQUEST['modele'],$_REQUEST['origine'],$_REQUEST['anneeFabrication'],$_REQUEST['kilometrage']);}
if(!empty($_REQUEST['loggin'])){inscrireEmploye($_REQUEST['nom'],$_REQUEST['prenom'],$_REQUEST['email'],$_REQUEST['telephone'],$_REQUEST['adresse'],$_REQUEST['service'],$_REQUEST['poste'],$_REQUEST['loggin'],$_REQUEST['motDePasse']);}

?>