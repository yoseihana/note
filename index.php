<?php

ini_set('display_errors', 1);

include ('./config/config.php');
include ('./helpers/url.php');

try
{
    $connexion = new PDO('mysql:host=localhost;dbname=notes', 'root', 'root');
    $connexion->query('SET CHARACTER SET UTF8');
    $connexion->query('SET NAMES UTF8');
}
catch(PDOException $e)
{
    $e->getMessage();
}

    if(isset($_REQUEST['a']) && isset($_REQUEST['c']))
    {
        if(in_array($_REQUEST['a'], $valideActions) && in_array($_REQUEST['c'], $valideControlleur))
        {
            $a = $_REQUEST['a'];
            $c = $_REQUEST['c'];
        }
        else
        {
            echo 'Il y a eu un problème lors de la connexion';
        }
    }
    else
    {
        $a = DEFAULT_ACTIONS;
        $c = DEFAULT_CONTROLLEUR;
    }

    include ('./controlleur/'.$c.'.php');

$view = call_user_func($a); // pq $a?

    include ('./vue/layout.php');