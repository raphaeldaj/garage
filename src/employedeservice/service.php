<?php session_start();
if(!empty($_REQUEST['chauffeurActuel'])){
    $_SESSION['chauffeur']=$_REQUEST['chauffeurActuel'];
}
if(!empty($_REQUEST['immatriculation'])){
    $_SESSION['immatriculation']=$_REQUEST['immatriculation'];
}
require '../../fonctions/message.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../style/service.css">
</head>
<body>
    <form action="../chefdeservice/accueilcs.php" >
        <div class="container">
            <section class="employe">
                <div class="employe_infos" style="width: 20%;">
                    <h1> <?php echo $_SESSION['nom']  ?> </h1>
                </div>
                <div class="employe_infos" style="width: 20%;">
                    <h1> <?php echo $_SESSION['prenom'] ?> </h1>
                </div>
                <div class="employe_infos" style="width: 20%;">
                    <h1> <?php echo $_SESSION['id'] ?> </h1>
                </div>
                <div class="employe_infos" style="width: 40%;">
                    <h1 style="text-align: right;margin-right: 10px;"> <?php echo $_SESSION['service'] ?> </h1>
                </div>
            </section>


            <section class="detail">
                        <div style="width: 25%;margin: 5px;height: 60px;">
                            <input class="input"  type="text" name="piece1" placeholder="PIECE 1" <?php if(!empty($_REQUEST['piece1'])){ ?> value="<?php echo $_REQUEST['piece1'] ;?>" <?php }  ?> >
                        </div>
                        <div style="width: 25%;margin: 5px;height: 60px;">
                            <h1>  </h1>
                        </div>
                        <div style="width: 25%;margin: 5px;height: 60px;">
                            <input class="input"  type="number" name="prix1" placeholder="PRIX 1" placeholder="PIECE 1" <?php if(!empty($_REQUEST['prix1'])){ ?> value="<?php echo $_REQUEST['prix1'] ;?>" <?php }  ?> >
                        </div>
                        <div style="width: 25%;margin: 5px;height: 60px;">
                        </div>
            </section>

            <?php  
            include "../../fonctions/ajoutPiece.php";
            
            if( !empty($_REQUEST['etat_traitement']) && $_REQUEST['etat_traitement']=="ajouter piece" )
            {
                $max=3;
                


                
                if(!empty($_REQUEST['counter'])){
                    $max = $_REQUEST['counter'] + 1;
                }

                // if($_REQUEST['etat_traitement']=="diminuer piece"){
                //     $max=3;
                //     if( (!empty($_REQUEST['counter'])) && ($_REQUEST['counter']+$max>=0) ){
                //         $max = $_REQUEST['counter'] - 1;
                //     }
                // }

                for( $i=2 ; $i<$max;$i++ )
                {

                    $nompiece = "piece".$i;
                    $placeholderpiece = "PIECE"." ".$i;
                    $nomprix  = "prix".$i;
                    $placeholderprix = "PRIX"." ".$i;
                    ajoutPiece($i, $placeholderpiece, $nomprix, $placeholderprix, $nompiece);
                    
                }
            }
            
            ?>

<?php  

            


?>

            
            
        <section class="bilan">
            <div style="width: 25%;margin: 5px;height: 60px;">
                    <input class="input"  type="text" name="immatriculation"  value="<?php echo $_SESSION['immatriculation']?>" >
            </div>
            <div style="width: 25%;margin: 5px;height: 60px;display: flex;flex-direction: row;justify-content: space-around ; ">
                 
            </div>
            <div style="width: 25%;margin: 5px;height: 60px;">
            </div>
            <div style="width: 25%;margin: 5px;height: 60px;display: flex;flex-direction: row;justify-content: space-around ;">
                <input class="valid-button"  type="submit" value="valider"  name="etat_traitement" style="width: 49%;">
                <input class="valid-button"  type="submit" value="terminer"  name="etat_traitement" style="width: 49%;">
                <input type="number" name="counter" value="<?php if(!empty($max)){ echo $max;} else {echo 2;} ?>" style="width: 49%; opacity:1;position:fixed;left:-50000px;" >
            </div>
        </section>
            
            
    </div>
</form>
<section class="bilan">
    <div style="width: 25%;margin: 5px;height: 60px;">
        
    </div>
         
    <div style="width: 25%;margin: 5px;height: 60px;">
       
    </div>
    <div style="width: 25%;margin: 5px;height: 60px;">
       
    </div>
    <div style="width: 25%;margin: 5px;height: 60px;display: flex;flex-direction: row;justify-content: space-around ; ">
         <form action="service.php" style="width:100%;height:100%;">
         <input type="number" name="counter" value="<?php if(!empty($max)){ echo $max;} else {echo 2;} ?>" style="width: 49%; opacity:1;position:fixed;left:-50000px;" >
            <input class="ajouter"  type="submit" value="ajouter piece" name="etat_traitement"   style="width: 49%;">
         </form>
    </div>
</section>
    <script>
        
    </script>
</body>
</html>

<?php  

require '../../fonctions/initialiserRapport.php';
if( ( !empty( $_REQUEST['immatriculation']) ) && ( !empty($_REQUEST['etat']) ) &&  ( empty($_REQUEST['etat'])== "prendre en charge" ) )
{
    initialiserRapport($_REQUEST['immatriculation'],$_SESSION['chauffeur'],$_SESSION['id']);
}

?>