<?php
// require 'message.php';
function voiBilanGeneral() {
  $host = "localhost"; 
  $user = "root"; 
  $passwd = ""; 
  $bdd = "stage";
  
  try {
      $conn = new PDO("mysql:host=$host;dbname=$bdd", $user, $passwd);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $query = "SELECT * FROM statistiques ORDER BY immatriculation"; 
      $stmt = $conn->query($query);

      while ($rowStatistique = $stmt->fetch(PDO::FETCH_NUM)) {
          ?>
          <div>
              <table>
                  <tr>
                      <td> <?php echo $rowStatistique[1]   ?>  </td>
                      <td> <?php echo $rowStatistique[2]   ?>% </td>
                      <td> <?php echo $rowStatistique[3]   ?>% </td>
                      <td> <?php echo $rowStatistique[4]   ?>% </td>
                      <td> <?php echo $rowStatistique[5]   ?>% </td>
                      <td> <?php echo $rowStatistique[6]   ?>% </td>
                      <td> <?php echo $rowStatistique[7]   ?>% </td>
                      <td> <?php echo $rowStatistique[8]   ?>% </td>
                      <td> <?php echo $rowStatistique[9]   ?>% </td>
                      <td> <?php echo $rowStatistique[10]  ?>% </td>
                      <td> <?php echo $rowStatistique[11]  ?>% </td>
                      <td> <?php echo $rowStatistique[12]  ?>  </td>
                      <td style="background-color: #0099ff00;">
                          <form action="bilanindividuel.php" method="post">
                              <input type="text" name="immatriculation" value="<?php echo $rowStatistique[1] ?>"  style="position: absolute;width: 50px;height: 20px;opacity: 0;top: 5px;">
                              <input type="submit" class="voir-detail" value="voir-detail" style="position: relative;width: 102px;height: 30px;border: 0;border-radius: 5px;">
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