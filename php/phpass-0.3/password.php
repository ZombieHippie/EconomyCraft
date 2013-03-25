<?php
header('Content-Type: application/json');
require 'PasswordHash.php';
$word = strtolower($_REQUEST['word']);
$prehash = $_REQUEST['hash'];
$t_hasher = new PasswordHash(8, TRUE);
$hash = $t_hasher->HashPassword($word);
$pass = $t_hasher->CheckPassword($word,$prehash);
unset($t_hasher);
$output = array('hash' => $hash, 'pass' => $pass);
echo json_encode($output);
?>