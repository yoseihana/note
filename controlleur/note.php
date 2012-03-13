<?php
include ('./modele/note.php');

function lister()
{
    global $a, $c;

    $totaleNotes = countNote();

    $nombreDePages=ceil($totaleNotes['total']/3);

    if(isset($_GET['page']))
    {
        $pageActuelle=intval($_GET['page']);

        if($pageActuelle>$nombreDePages)
        {
            $pageActuelle=$nombreDePages;
        }
    }
    else
    {
        $pageActuelle=1;
    }

    $premiereEntree=($pageActuelle-1)*5;

    $data['notes'] = getAllNotes($premiereEntree);
    $data['nbPage'] = $nombreDePages;

    $html = $a . $c . '.php';
    $view = array('data' => $data, 'html' => $html);

    return $view;
}

function modifier()
{
    global $a, $c;

    $id = _getIdFromRequest();
    _testId($id);

    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $champs['note']['id'] = $id;
        $champs['note']['note'] = $_POST['note'];
        $champs['note']['titre'] = $_POST['titre'];

        updateNote($champs);

        header('Location:'.voirNoteUrl($id));
    }
    elseif($_SERVER['REQUEST_METHOD'] == 'GET'){
        $note = findNoteById($id);

        $data['note'] = $note;
        $html = $a.$c.'.php';
        $view = array('data' => $data, 'html' => $html);
        return $view;
    }
}

function voir()
{
    global $a, $c;

    $id = _getIdFromRequest();
    _testId($id);

    $note = findNoteById($id);
    $data['note'] = $note;
    $html = $a . $c . '.php';
    $view = array('data' => $data, 'html' => $html);

    return $view;
}

function ajouter()
{
    global $a, $c;

    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $champs['note']['date'] = date('Y-m-d');
        $champs['note']['note'] = $_POST['note'];
        $champs['note']['titre'] = $_POST['titre'];

        addNote($champs);

        header('Location:'.listerNoteUrl());
    }
    elseif($_SERVER['REQUEST_METHOD'] == 'GET'){
        $data['view_title'] = 'Ajoute de note';
        $html = $a.$c.'.php';
        $view = array('data' => $data, 'html' => $html);
        return $view;
    }
}

function supprimer(){
    global $a, $c;

    $id = _getIdFromRequest();
    _testId($id);

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        deleteNote($id);

        header('Location:'.listerNoteUrl());
    }
    elseif($_SERVER['REQUEST_METHOD'] == 'GET'){

        $note = findNotebyId($id);

        $data['note'] = $note;
        $html = $a.$c.'.php';
        $view = array('data'=>$data, 'html'=>$html);

        return $view;
    }
}

function _getIdFromRequest()
{
    global $a;

    if (!isset($_REQUEST['id']))
    {
        die('vous devez fournir un id pour ' . $a . ' une note');
        //header('Location:index.php?c=error&a=e_404');
    }

    return $_REQUEST['id'];
}

function _testId($id)
{
    if (countNoteById($id) < 1)
    {
        die('l\'isbn fournit n\'existe pas dans la base de donnée!');
        //header('Location:index.php?c=error&a=e_404');
    }
}