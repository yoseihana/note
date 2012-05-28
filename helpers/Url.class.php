<?php
final class Url
{
    private static function buil($controller, $action, array $param = array())
    {
        $p = array(
            'c'=> $controller,
            'a'=> $action,
        );

        return $_SERVER['PHP_SELF'] . '?' . http_build_query(array_merge($p, $param));
    }

    public static function listerNote()
    {
        return Url::buil(NoteControlleur::getName(), 'lister');
    }

    public static function voirNote($id)
    {
        return Url::buil(NoteControlleur::getName(), 'voir', array('id'=> $id));
    }
}