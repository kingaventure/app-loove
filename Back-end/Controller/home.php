<?php
require_once __DIR__ . '/../Model/home.php'; 

$id = 1;

$profil = getProfil($pdo, $id);

$age = $profil['age'];
$image = $profil['img'];
$bio = $profil['bio'];
$name = $profil['name'];
$prenom = $profil['prenom'];
if ($profil['sex'] == 0) {
    $sex = 'homme';
} elseif ($profil['sex'] == 1) {
    $sex = 'femme';
} else {
    $sex = 'autre';
}
if ($profil['os'] == 0) {
    $os = 'hétéro';
} elseif ($profil['os'] == 1) {
    $os = 'homo';
} elseif ($profil['os'] == 2) {
    $os = 'bi';
} else {
    $os = 'autre';
}


require_once __DIR__ . '/../../Front-end/View/home.php';