<?php


function getAllNotes($premiereEntree)
{
    global $connexion;

    $req = 'SELECT * FROM notes ORDER BY id DESC LIMIT ' . $premiereEntree . ',5';
    try
    {
        $ps = $connexion->query($req);
        $notes = $ps->fetchAll();
    }
    catch (Exception $e)
    {
        $e->getMessage();
    }
    return $notes;
}

function findNotebyId($id)
{

    global $connexion;

    $req = 'SELECT * FROM notes WHERE id = :id';

    try
    {
        $ps = $connexion->prepare($req);
        $ps->bindValue(':id', $id);
        $ps->execute();

        $note = $ps->fetch();

    } catch (PDOException $e)
    {
        die($e->getMessage());
    }
    return $note;
}

function addNote($data)
{
    global $connexion;

    $req = 'INSERT INTO notes VALUES(null, :date_parution, :note, :titre)';

    try
    {
        $ps = $connexion->prepare($req);
        $ps->bindValue(':date_parution', $data['note']['date']);
        $ps->bindValue(':note', $data['note']['note']);
        $ps->bindValue(':titre', $data['note']['titre']);
        $ps->execute();

    } catch (PDOException $e)
    {
        die($e->getMessage());
    }
    return true;
}

function deleteNote($id)
{
    global $connexion;

    $req = 'DELETE FROM notes WHERE id = :id';

    try
    {
        $ps = $connexion->prepare($req);
        $ps->bindValue(':id', $id);
        $ps->execute();

    } catch (PDOException $e)
    {
        die($e->getMessage());
    }
    return true;
}

function updateNote($data)
{
    global $connexion;

    $req = 'UPDATE notes SET note = :note, titre = :titre WHERE id = :id';

    try
    {
        $ps = $connexion->prepare($req);
        $ps->bindValue(':note', $data['note']['note']);
        $ps->bindValue(':id', $data['note']['id']);
        $ps->bindValue(':titre', $data['note']['titre']);
        $ps->execute();

    } catch (PDOException $e)
    {
        die($e->getMessage());
    }
    return true;
}

function countNoteById($id)
{
    global $connexion;

    $req = 'SELECT count(id) as nb_id FROM notes WHERE id = :id';
    try
    {
        $ps = $connexion->prepare($req);
        $ps->bindValue(':id', $id);
        $ps->execute();

    } catch (PDOException $e)
    {
        die($e->getMessage());
    }

    $nbIdnote = $ps->fetch();

    return $nbIdnote['nb_id'];
}

function countNote()
{
    global $connexion;

    $req = 'SELECT COUNT(*) AS total FROM notes';

    try
    {
        $ps = $connexion->query($req);
        $totaleNotes = $ps->fetch();
    } catch (PDOException $e)
    {
        die($e->getMessage());
    }

    return $totaleNotes;
}