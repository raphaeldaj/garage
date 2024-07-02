<?php  

// require 'message.php';

$host = "localhost";
$user = "root";
$bdd = "stage";
$passwd = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$bdd;charset=utf8", $user, $passwd);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (!empty($_REQUEST['service'])) {
        $service = $_REQUEST['service'];
    } else {
        $service = "Entretien Et Maintenance";
    }

    $total = 0;

    
    $queryBilanJournalierEmploye = "SELECT * FROM dailystats WHERE immatriculation = :immatriculation AND date = :date AND service = :service";
    $stmtEmploye = $pdo->prepare($queryBilanJournalierEmploye);
    $stmtEmploye->execute([
        'immatriculation' => $_REQUEST['immatriculation'],
        'date' => $_REQUEST['DATE'],
        'service' => $service
    ]);

    if ($rowBilanJournalierEmploye = $stmtEmploye->fetch(PDO::FETCH_NUM)) {
        
        ?>
        <section class="employe">
            
            
            <div class="employe_infos" style="width: 20%;">
                <h1><?php echo htmlspecialchars($rowBilanJournalierEmploye[3]); ?></h1>
            </div>
            <div class="employe_infos" style="width: 20%;">
                <h1><?php echo htmlspecialchars($rowBilanJournalierEmploye[2]); ?></h1>
            </div>
            <div class="employe_infos" style="width: 20%;">
                <h1><?php echo htmlspecialchars($rowBilanJournalierEmploye[8]); ?></h1>
            </div>
            <div class="employe_infos" style="width: 40%; text-align: right;">
                <h1><?php echo $_REQUEST['DATE']; ?></h1>
            </div>
        </section>
        <?php
    } else {
        message('Aucune information reliée à ce service');
    }

    
    $stmtDetail = $pdo->prepare($queryBilanJournalierEmploye);
    $stmtDetail->execute([
        'immatriculation' => $_REQUEST['immatriculation'],
        'date' => $_REQUEST['DATE'],
        'service' => $service
    ]);

    while ($rowBilanJournalierdetail = $stmtDetail->fetch(PDO::FETCH_ASSOC)) {
        ?>
        <section class="detail">
            
            <div style="width: 25%; margin: 5px; height: 60px;">
                <h1><?php echo htmlspecialchars($rowBilanJournalierdetail['piece']); ?></h1>
            </div>
            <div style="width: 25%; margin: 5px; height: 60px;">
                <h1></h1>
            </div>
            <div style="width: 25%; margin: 5px; height: 60px;">
                <h1><?php echo htmlspecialchars($rowBilanJournalierdetail['prix']); ?></h1>
            </div>
            <div style="width: 25%; margin: 5px; height: 60px;"></div> 
        </section>
        <?php
        $total += $rowBilanJournalierdetail['prix']; 
    }

    
    $stmtBilan = $pdo->prepare($queryBilanJournalierEmploye);
    $stmtBilan->execute([
        'immatriculation' => $_REQUEST['immatriculation'],
        'date' => $_REQUEST['DATE'],
        'service' => $service
    ]);

    if ($rowBilanJournalierBilan = $stmtBilan->fetch(PDO::FETCH_ASSOC)) {
        ?>
        <section class="bilan">
            <div style="width: 25%; margin: 5px; height: 60px;">
                <h1 class="infos_utile"><?php echo htmlspecialchars($_REQUEST['immatriculation']); ?></h1>
            </div>
            <div style="width: 25%; margin: 5px; height: 60px; display: flex; flex-direction: row; justify-content: space-around;">
                
            </div>
            <div style="width: 25%; margin: 5px; height: 60px;">
                <h1 class="infos_utile"><?php echo htmlspecialchars($total); ?></h1>
            </div>
            <div style="width: 25%; margin: 5px; height: 60px; display: flex; flex-direction: row; justify-content: space-around;">
                
            </div>
        </section>
        <?php
    }
} catch (PDOException $e) {
    message("Erreur : " . $e->getMessage());
}
        
?>
