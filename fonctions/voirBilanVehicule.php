<?php  
// require 'message.php';
function VoirBilanVehicule($immatriculation){
    
  

  $host = "localhost";
  $user = "root";
  $bdd = "stage";
  $passwd = "";
  
  try {
      $pdo = new PDO("mysql:host=$host;dbname=$bdd", $user, $passwd);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
      
      $query = "SELECT * FROM rapport WHERE immatriculation = :immatriculation ORDER BY idRapport DESC";
      $stmt = $pdo->prepare($query);
      $stmt->execute(['immatriculation' => $immatriculation]);
  
      $entretien_et_maintenance = 0;
      $reparation_mecanique = 0;
      $diagnostique_et_electronique = 0;
      $pneumatiques = 0;
      $carrosserie_et_peinture = 0;
      $climatisation = 0;
      $accessoire_et_personnalisation = 0;
      $assistance_routiere = 0;
      $controle_technique = 0;
      $montant = 0;
      $centPourCent = 0;
      $nombreIntervention=0;
      $nombreDeVenu=0;
      
      while ($rowRapport = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $intervetion =false;
        ?> 
      
      <div>
        <table>
          <tr>
            <td> <?php echo $rowRapport['date'] ?> </td>
            <td> <?php echo $rowRapport['numeroPermis'] ?> </td>
            <td> <?php echo $rowRapport['idEmploye'] ?> </td>
            <td <?php if($rowRapport['entretienEtMaintenance']) { $entretien_et_maintenance++; ?>             style="background-color: rgba(255, 0, 0, 0.659);" <?php   } ?>>entretien et maintenance</td>
            <td <?php if($rowRapport['reparationMecanique']) { $reparation_mecanique++; ?>                    style="background-color: rgba(255, 0, 0, 0.659);" <?php  if(!$intervetion){ $intervetion =true;} } ?>>reparation mecanique</td>
            <td <?php if($rowRapport['diagnostiqueEtElectronique']) { $diagnostique_et_electronique++; ?>     style="background-color: rgba(255, 0, 0, 0.659);" <?php  if(!$intervetion){ $intervetion =true;} } ?>>diagnostique et electronique</td>
            <td <?php if($rowRapport['pneumatiques']) { $pneumatiques++; ?>                                   style="background-color: rgba(255, 0, 0, 0.659);" <?php  if(!$intervetion){ $intervetion =true;} } ?>>pneumatiques</td>
            <td <?php if($rowRapport['carrosserieEtPeinture']) { $carrosserie_et_peinture++; ?>               style="background-color: rgba(255, 0, 0, 0.659);" <?php  if(!$intervetion){ $intervetion =true;} } ?>>carrosserie et peinture</td>
            <td <?php if($rowRapport['climatisation']) { $climatisation++; ?>                                 style="background-color: rgba(255, 0, 0, 0.659);" <?php  if(!$intervetion){ $intervetion =true;} } ?>>climatisation</td>
            <td <?php if($rowRapport['accessoireEtPersonnalisation']) { $accessoire_et_personnalisation++; ?> style="background-color: rgba(255, 0, 0, 0.659);" <?php  if(!$intervetion){ $intervetion =true;} } ?>>accessoire et personnalisation</td>
            <td <?php if($rowRapport['assistanceRoutiere']) { $assistance_routiere++; ?>                      style="background-color: rgba(255, 0, 0, 0.659);" <?php  if(!$intervetion){ $intervetion =true;} } ?>>assistance routiere</td>
            <td <?php if($rowRapport['controleTechnique']) { $controle_technique++; ?>                        style="background-color: rgba(255, 0, 0, 0.659);" <?php  if(!$intervetion){ $intervetion =true;} } ?>>controle technique</td>
            <td style="min-width:105px;"> <?php echo $rowRapport['montant'] ?> </td>
            <td style="background-color: #0099ff00;">
              <form action="bilanjournalier.php" method="post">
                <div>
                  <input type="text" name="immatriculation" value="<?php echo $rowRapport['immatriculation'] ?>" style="position: absolute;width: 50px;height: 20px;opacity: 0;top: 5px;">
                  <input type="text" name="DATE" value="<?php echo $rowRapport['date'] ?>" style="position: absolute;width: 50px;height: 20px;opacity: 0;top: 5px;">
                  <input type="submit" class="voir-detail" value="voir-detail" style="position: relative;width: 102px;height: 30px;border: 0;border-radius: 5px;">
                </div>
              </form>
            </td>
          </tr>
        </table>
      </div>
      
      <?php
      $montant += $rowRapport['montant'];
      if($intervetion){
        $nombreIntervention++;
      }

      $nombreDeVenu++;
    }
    $centPourCent = $entretien_et_maintenance + $reparation_mecanique + $diagnostique_et_electronique + $pneumatiques + $carrosserie_et_peinture + $climatisation + $accessoire_et_personnalisation + $assistance_routiere + $controle_technique ;
    ?>
    
    <div class="heading">bilan</div>
    
    <div>
      <table>
        <tr>
          <td>vehicule</td>
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
          <td>niveau</td>
          <td>TOTAL</td>
        </tr>
      </table>
    </div>
    
    
    <?php

if($centPourCent==0){
  $centPourCent=1;
}
$diviseur=0;

// $statEM =  $entretien_et_maintenance;
// $statRM =  $reparation_mecanique;
// $statDE =  $diagnostique_et_electronique;
// $statPn =  $pneumatiques;
// $statCP =  $carrosserie_et_peinture;
// $statCl =  $climatisation;
// $statAP =  $accessoire_et_personnalisation;
// $statAR =  $assistance_routiere;
// $statCT =  $controle_technique;
// $moyenne = number_format( ( ( ($statEM+$statRM+$statDE+$statPn+$statCP+$statCl+$statAP+$statAR+$statCT) /9 ) * 100 ) ,2);

$statEM =  number_format( ( ( $entretien_et_maintenance/$centPourCent ) * 100) ,2);
$statRM =  number_format( ( ( $reparation_mecanique/$centPourCent ) * 100) ,2);
$statDE =  number_format( ( ( $diagnostique_et_electronique/$centPourCent ) * 100) ,2);
$statPn =  number_format( ( ( $pneumatiques/$centPourCent ) * 100) ,2);
$statCP =  number_format( ( ( $carrosserie_et_peinture/$centPourCent ) * 100) ,2);
$statCl =  number_format( ( ( $climatisation/$centPourCent ) * 100) ,2);
$statAP =  number_format( ( ( $accessoire_et_personnalisation/$centPourCent ) * 100) ,2);
$statAR =  number_format( ( ( $assistance_routiere/$centPourCent ) * 100) ,2);
$statCT =  number_format( ( ( $controle_technique/$centPourCent ) * 100) ,2);

if($statEM!=0){
  $diviseur++;
}
if($statRM!=0){
  $diviseur++;
}
if($statDE!=0){
  $diviseur++;
}
if($statPn!=0){
  $diviseur++;
}
if($statCP!=0){
  $diviseur++;
}
if($statCl!=0){
  $diviseur++;
}
if($statAP!=0){
  $diviseur++;
}
if($statAR!=0){
  $diviseur++;
}
if($statCT!=0){
  $diviseur++;
}
if($diviseur==0){
  $diviseur=1;
}
if($nombreDeVenu==0){
  $nombreDeVenu=1;
}
$propostionIntervention=number_format( ( $nombreIntervention / $nombreDeVenu ) ,2);
$moyenne = number_format( ( ($statEM+$statRM+$statDE+$statPn+$statCP+$statCl+$statAP+$statAR+$statCT) /$diviseur)*$propostionIntervention ,2);



$appreciation = "indefini";
if(($moyenne > 0) && ($moyenne <= 10))
{
  $appreciation="tres efficace" ;
}
if(($moyenne > 10) && ($moyenne <= 30))
{
  $appreciation="efficace" ;
}
if(($moyenne > 30) && ($moyenne <= 60))
{
  $appreciation="utilisable" ;
}
if(($moyenne > 60) && ($moyenne <= 80))
{
  $appreciation="defectueuse" ;
}
if(($moyenne > 80) && ($moyenne <= 100))
{
  $appreciation="problematique" ;
}



?>


<div>
  <table>    
    <tr>
      <td> <?php echo $immatriculation ?> </td>
      <td> <?php echo $statEM       ; ?>% </td>
      <td> <?php echo $statRM       ; ?>% </td>
      <td> <?php echo $statDE       ; ?>% </td>
      <td> <?php echo $statPn       ; ?>% </td>
      <td> <?php echo $statCP       ; ?>% </td>
      <td> <?php echo $statCl       ; ?>% </td>
      <td> <?php echo $statAP       ; ?>% </td>
      <td> <?php echo $statAR       ; ?>% </td>
      <td> <?php echo $statCT       ; ?>% </td>
      <td> <?php echo $moyenne      ; ?>% </td>
      <td> <?php echo $appreciation ; ?> </td>
      <td> <?php echo $montant      ; ?> </td>
    </tr>
  </table>
</div>

<?php

$queryBilan = "SELECT * FROM statistiques WHERE immatriculation = :immatriculation";
$stmtBilan = $pdo->prepare($queryBilan);
$stmtBilan->execute(['immatriculation' => $immatriculation]);

if ($rowBilan = $stmtBilan->fetch(PDO::FETCH_ASSOC)) {
  $queryUpdate = "UPDATE statistiques 
                    SET entretienEtMaintenance = :statEM, 
                        reparationMecanique = :statRM, 
                        diagnostiqueEtElectronique = :statDE, 
                        pneumatiques = :statPn, 
                        carrosserieEtPeinture = :statCP, 
                        climatisation = :statCl, 
                        accessoireEtPersonnalisation = :statAP, 
                        assistanceRoutiere = :statAR, 
                        controleTechnique = :statCT, 
                        appreciation = :appreciation, 
                        moyenne = :moyenne 
                    WHERE immatriculation = :immatriculation";
    
    $stmtUpdate = $pdo->prepare($queryUpdate);
    $stmtUpdate->execute([
      'statEM' => $statEM,
      'statRM' => $statRM,
      'statDE' => $statDE,
      'statPn' => $statPn,
      'statCP' => $statCP,
      'statCl' => $statCl,
      'statAP' => $statAP,
      'statAR' => $statAR,
      'statCT' => $statCT,
      'appreciation' => $appreciation,
      'moyenne' => $moyenne,
      'immatriculation' => $immatriculation
    ]);
  } else {
    $queryInsert = "INSERT INTO statistiques (idStatistique, immatriculation, entretienEtMaintenance, reparationMecanique, diagnostiqueEtElectronique, pneumatiques, carrosserieEtPeinture, climatisation, accessoireEtPersonnalisation, assistanceRoutiere, controleTechnique, moyenne, appreciation) 
                    VALUES (:idStatistique, :immatriculation, :statEM, :statRM, :statDE, :statPn, :statCP, :statCl, :statAP, :statAR, :statCT, :moyenne, :appreciation)";
    
    $stmtInsert = $pdo->prepare($queryInsert);
    $stmtInsert->execute([
      'idStatistique' => time(),
      'immatriculation' => $immatriculation,
      'statEM' => $statEM,
      'statRM' => $statRM,
      'statDE' => $statDE,
      'statPn' => $statPn,
      'statCP' => $statCP,
      'statCl' => $statCl,
      'statAP' => $statAP,
      'statAR' => $statAR,
      'statCT' => $statCT,
      'moyenne' => $moyenne,
      'appreciation' => $appreciation
    ]);
    
  }
} catch (PDOException $e) {
    message("Erreur : " . $e->getMessage());
}
}
?>
<?php  ?>