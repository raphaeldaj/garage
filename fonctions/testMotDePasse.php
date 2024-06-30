<?php
$password = "luimeme";
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

if (password_verify($password, $hashed_password)) {
    echo "ca passe ";
} else {
    echo "ne passe pas ";
}
echo $hashed_password;
?>