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

      while ($rowStatistique = $stmt->fetch(PDO::FETCH_NUM)) {
          ?>
          <div>
              <table>
                  <tr>
                      <td> <?php echo $rowStatistique[0]  ?> </td>
                      <td> <?php echo $rowStatistique[1]   ?> </td>
                      <td> <?php echo $rowStatistique[2]   ?> </td>
                      <td> <?php echo $rowStatistique[3]   ?> </td>
                      <td> <?php echo $rowStatistique[4]   ?> </td>
                      <td> <?php echo $rowStatistique[5]   ?> </td>
                      <td> <?php echo $rowStatistique[6]   ?> </td>
                      <td> <?php echo $rowStatistique[7]   ?> </td>
                      <td> <?php echo $rowStatistique[8]   ?> </td>
                      <td> <?php echo $rowStatistique[9]   ?> </td>
                      <td style="background-color: #0099ff00;">
                          <form action="gestiondesdonnees.php">
                              <input type="text" name="permis" value="<?php echo $rowStatistique[0] ?>"  style="position: absolute;width: 50px;height: 20px;opacity: 0;top: 5px;">
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