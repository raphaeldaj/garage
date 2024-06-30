<?php 
    function ajoutPiece($i, $placeholderpiece, $nomprix, $placeholderprix, $nompiece) {?>

    <section class="detail">
        <div style="width: 25%;margin: 5px;height: 60px;">
            <input class="input"  type="text" name="<?php echo $nompiece; ?>" placeholder="<?php echo $placeholderpiece; ?>" <?php if(!empty($_REQUEST[$nompiece])){ ?> value="<?php echo $_REQUEST[$nompiece] ;?>" <?php }  ?>>
        </div>
        <div style="width: 25%;margin: 5px;height: 60px;">
            <h1>  </h1>
        </div>
        <div style="width: 25%;margin: 5px;height: 60px;">
            <input class="input"  type="number" name="<?php echo $nomprix ?>" placeholder="<?php echo $placeholderprix ?>" <?php if(!empty($_REQUEST[$nomprix])){ ?> value="<?php echo $_REQUEST[$nomprix] ;?>" <?php }  ?>>
        </div>
        <div style="width: 25%;margin: 5px;height: 60px;">
            <!-- <h1>je sais op quoi mettre ici</h1> -->
        </div>
    </section>
    <?php } 
    ?>