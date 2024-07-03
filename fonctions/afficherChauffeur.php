<?php
// require 'message.php';
function afficherCauffeur() {
  $host = "localhost"; 
  $user = "root"; 
  $passwd = ""; 
  $bdd = "stage";
  
  try {
      $conn = new PDO("mysql:host=$host;dbname=$bdd", $user, $passwd);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $query = "SELECT * FROM chauffeur"; 
      $stmt = $conn->query($query);

      while ($rowInformation = $stmt->fetch(PDO::FETCH_NUM)) {
          ?>
          <div>
              <table>
                  <tr>
                      <td> <?php echo $rowInformation[0]  ?> </td>
                      <td> <?php echo $rowInformation[1]   ?> </td>
                      <td> <?php echo $rowInformation[2]   ?> </td>
                      <td> <?php echo $rowInformation[3]   ?> </td>
                      <td> <?php echo $rowInformation[4]   ?> </td>
                      <td> <?php echo $rowInformation[5]   ?> </td>
                      <td> <?php echo $rowInformation[6]   ?> </td>
                      <td> <?php echo $rowInformation[7]   ?> </td>
                      <td> <?php echo $rowInformation[8]   ?> </td>
                      <td> <?php echo $rowInformation[9]   ?> </td>
                      <td style="background-color: #0099ff00;">
                          <form action="gestiondesdonnees.php">
                              <input type="text" name="permis" value="<?php echo $rowInformation[0] ?>"  style="position: absolute;width: 50px;height: 20px;opacity: 0;top: 5px;">
                              <input type="submit" class="voir-detail" value="Supprimer" style="position: relative;width: 102px;height: 30px;border: 0;border-radius: 5px;" name="suppression">
                          </form>
                      </td>
                  </tr>
              </table>
          </div>
          <?php  
      }
  } catch (PDOException $e) {
        message("Erreur : " . $e->getMessage());
  }
}
?>
<?php  ?>