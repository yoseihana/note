<?php

$valideActions = array(
    'lister'=>'lister',
    'voir'=>'voir',
    'modifier'=>'modifier',
    'ajouter'=>'ajouter',
    'supprimer'=>'supprimer');
$valideControlleur = array('note'=>'note');

define('DEFAULT_ACTIONS', $valideActions['lister']);
define('DEFAULT_CONTROLLEUR', $valideControlleur['note']);
define ('DEFAULT_PAGE', 3);

$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
);