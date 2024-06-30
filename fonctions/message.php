<?php  
function message($message){
?>
<div class="message-container" style="position : fixed;left :0px ;right: 0px;bottom :-40%;display : flex ; flex-directon : row ;justify-content : space-around;height : 200px">
    <div class="historique" style="border-radius : 40px;display : flex ; flex-directon : column ;justify-content : space-around;top : 0px; height : 50px">
      <div class="heading" style="border-radius : 40px;"> <?php echo $message ?> </div>
    </div>
</div>
    <style>
      .message-container{
        animation: message 10s;
      }
      @keyframes message {
        0%{
          opacity: 0;
          left :0px ;
          right: 0px;
          bottom :40%;

        }
        75%{
          opacity: 1;
          left :0px ;
          right: 0px;
          bottom :40%;
        }
        100%{
          opacity: 0;
          left :0px ;
          right: 0px;
          bottom :40%;
        }
      }
    </style>
<?php  
}

?>
<?php ?>