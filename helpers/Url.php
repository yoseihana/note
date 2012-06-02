<?php
final class Url
{
    private static function build($controller, $action, array $param = array())
    {
        $p = array(
            'c'=> $controller,
            'a'=> $action,
        );

        return $_SERVER['PHP_SELF'] . '?' . http_build_query(array_merge($p, $param));
    }

    public static function listerNote()
    {
        return Url::build(NoteController::getName(), 'lister');
    }

    public static function voirNote($id)
    {
        return Url::build(NoteController::getName(), 'voir', array('id'=> $id));
    }

    public static function ajouterNote()
    {
        return Url::build(NoteController::getName(), 'ajouter');
    }

    public static function modifierNote($id)
    {
        return Url::build(NoteController::getName(), 'modifier', array('id'=> $id));
    }

    public static function supprimerNote($id)
    {
        return Url::build(NoteController::getName(), 'supprimer', array('id'=> $id));
    }
}