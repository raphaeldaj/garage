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
       a{
        color: rgb(0, 0, 0);
        text-decoration: none;
      }
.button {
 --glow-color: rgb(176, 217, 255);
 --enhanced-glow-color: rgb(206, 235, 255);
 --btn-color: rgb(255, 255, 255);
 border: .20em solid var(--glow-color);
 padding: 0.5em 1.5em;
 color: var(--glow-color);
 font-size: 15px;
 font-weight: bold;
 background-color: var(--btn-color);
 border-radius: 1em;
 outline: none;
 box-shadow: 0 0 1em .5em var(--glow-color),
        0 0 4em 1em var(--glow-spread-color),
        inset 0 0 .5em .25em var(--glow-color);
 text-shadow: 0 0 .5em var(--glow-color);
 position: fixed;
 top:10px;
 transition: all 0.3s;
}

button::after {
 pointer-events: none;
 content: "";
 position: absolute;
 top: 120%;
 left: 0;
 height: 100%;
 width: 100%;
 background-color: var(--glow-spread-color);
 filter: blur(2em);
 opacity: .7;
 transform: perspective(1.5em) rotateX(35deg) scale(1, .6);
}

button:hover {
 color: var(--btn-color);
 background-color: var(--glow-color);
 box-shadow: 0 0 1em .5em var(--glow-color),
        0 0 4em 2em var(--glow-spread-color),
        inset 0 0 .5em .5em var(--glow-color);
}

button:active {
 box-shadow: 0 0 0.6em .25em var(--glow-color),
        0 0 2.5em 2em var(--glow-spread-color),
        inset 0 0 .5em .25em var(--glow-color);
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
  <button class="button">
        <a href="bilanindividuel.php">
          Retour
        </a>
      </button>
  
</body>
</html>