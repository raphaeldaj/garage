<?php 

function corrigerNumero($telephone) {

$telephone = str_replace([' ', '-'], '', $telephone);

// if (substr($telephone, 0, 4) === '+221' && strlen($telephone) === 15) {
    // return $telephone;
// }

if (substr($telephone, 0, 4) === '+221') {
    $telephone = substr($telephone, 4);
} else {
    $telephone = $telephone;
}

if (strlen($telephone) !== 9 || !ctype_digit($telephone)) {
    throw new Exception("Le numéro de téléphone doit contenir exactement 9 chiffres après +221.");
}

$numero_corrige = '+221' . ' '. substr($telephone, 0, 2) . ' ' . substr($telephone, 2, 3) . ' ' . substr($telephone, 5, 2) . ' ' . substr($telephone, 7, 2);
return $numero_corrige;
}
?>