<?php session_start()  ;
require '../fonctions/message.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style/bilanjournalier.css">
    <style>
        .voir-detail{
    /* display: block; */
    /* width: 100%; */
    font-weight: bold;
    background: linear-gradient(45deg, rgb(16, 137, 211) 0%, rgb(18, 177, 209) 100%);
    color: white;
    /* padding-block: 15px; */
    /* margin: 20px auto; */
    /* border-radius: 20px; */
    /* box-shadow: rgba(133, 189, 215, 0.8784313725) 0px 20px 10px -15px; */
    border: none;
    transition: all 0.2s ease-in-out;
  }
  .service:hover{
  animation : slide-left 1s forwards ;
}
@keyframes slide-left {
  0%
  {
    right: -200px;
  }
  100%
  {
    right: 0px;
  }
  
}
.service:not(:hover){
  animation : slide-right 1s forwards ;
}
@keyframes slide-right {
  0%
  {
    right: 0px;
  }
  100%
  {
    right: -200px;
  }
  
}
    </style>
</head>
<body>

  <div class="service" style="width:220px;display : flex; flex-direction : row ; justify-content : space-around;position : fixed;right : -200px; ">
    <form action="bilanjournalier.php">
      <table>
          
          <tr style="background-color: #0099ff00;">
              <div>
                  <input type="text" name="DATE" value="<?php echo $_REQUEST['DATE']  ?>" style="position: absolute;width: 50px;height: 20px;opacity: 0;top: 5px;">
                  <input type="text" name="immatriculation" value="<?php echo $_REQUEST['immatriculation']  ?>" style="position: absolute;width: 50px;height: 20px;opacity: 0;top: 5px;">
                <input type="submit" name="service" class="voir-detail" value="Entretien Et Maintenance" style="position: relative;width: 220px; margin : 5px; height: 30px;border: 0;border-radius: 5px;">
              </div>
            </tr>
            <tr style="background-color: #0099ff00;">
              <div>
                <input type="submit" name="service" class="voir-detail" value="Reparation Mecanique" style="position: relative;width: 220px; margin : 2px; height: 30px;border: 0;border-radius: 5px;">
              </div>
            </tr>
            <tr style="background-color: #0099ff00;">
              <div>
                <input type="submit" name="service" class="voir-detail" value="Diagnostique Et Electronique" style="position: relative;width: 220px; margin : 2px; height: 30px;border: 0;border-radius: 5px;">
              </div>
            </tr>
            <tr style="background-color: #0099ff00;">
              <div>
                <input type="submit" name="service" class="voir-detail" value="Pneumatiques" style="position: relative;width: 220px; margin : 2px; height: 30px;border: 0;border-radius: 5px;">
              </div>
            </tr>
            <tr style="background-color: #0099ff00;">
              <div>
                <input type="submit" name="service" class="voir-detail" value="Carrosserie Et Peinture" style="position: relative;width: 220px; margin : 2px; height: 30px;border: 0;border-radius: 5px;">
              </div>
            </tr>
            <tr style="background-color: #0099ff00;">
              <div>
                <input type="submit" name="service" class="voir-detail" value="Climatisation" style="position: relative;width: 220px; margin : 2px; height: 30px;border: 0;border-radius: 5px;">
              </div>
            </tr>
            <tr style="background-color: #0099ff00;">
              <div>
                <input type="submit" name="service" class="voir-detail" value="Accessoire Et Personnalisation" style="position: relative;width: 220px; margin : 2px; height: 30px;border: 0;border-radius: 5px;">
              </div>
            </tr>
            <tr style="background-color: #0099ff00;">
              <div>
                <input type="submit" name="service" class="voir-detail" value="Assistance Routiere" style="position: relative;width: 220px; margin : 2px; height: 30px;border: 0;border-radius: 5px;">
              </div>
            </tr>
            <tr style="background-color: #0099ff00;">
              <div>
                <input type="submit" name="service" class="voir-detail" value="Controle Technique" style="position: relative;width: 220px; margin : 2px; height: 30px;border: 0;border-radius: 5px;">
              </div>
            </tr>
          
      </table>
    </form>
  </div>
  
  <form action="" >
    
    <?php require '../fonctions/voirBilanJournalier.php';?>
    
  </form>
  
  
</body>
</html>