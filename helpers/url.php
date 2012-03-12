<?php

function listerNoteUrl(){
    global $valideActions, $valideControlleur;

    $params['a'] = $valideActions['lister'];
    $params['c'] = $valideControlleur['note'];

    return $_SERVER['PHP_SELF'] . '?' . http_build_query($params);
}

function voirNoteUrl($id){
    global $valideActions, $valideControlleur;

    $params['a'] = $valideActions['voir'];
    $params['c'] = $valideControlleur['note'];
    $params['id'] = $id;

    return $_SERVER['PHP_SELF'] . '?' . http_build_query($params);
}

function modifierNoteUrl($id){
    global $valideActions, $valideControlleur;

    $params['a'] = $valideActions['modifier'];
    $params['c'] = $valideControlleur['note'];
    $params['id'] = $id;

    return $_SERVER['PHP_SELF'] . '?' . http_build_query($params);
}

function supprimerNoteUrl($id){
    global $valideActions, $valideControlleur;

    $params['a'] = $valideActions['supprimer'];
    $params['c'] = $valideControlleur['note'];
    $params['id'] = $id;

    return $_SERVER['PHP_SELF'] . '?' . http_build_query($params);
}

function ajouterNoteUrl(){
    global $valideActions, $valideControlleur;

    $params['a'] = $valideActions['ajouter'];
    $params['c'] = $valideControlleur['note'];

    return $_SERVER['PHP_SELF'] . '?' . http_build_query($params);
}
