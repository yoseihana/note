<?php
/**
 * Created by JetBrains PhpStorm.
 * User: annabelle
 * Date: 28/05/12
 * Time: 11:32
 * To change this template use File | Settings | File Templates.
 */
abstract class AbstractController
{
    const SUFFIX = 'Controller';

    /**
     * Permet d'avoir le nom de la class sans le "Controller"
     * @static
     * @return string
     */
    public static final function getClassName($controllerName = NULL)
    {
        return ($controllerName) ? $controllerName . self::SUFFIX : get_called_class();
    }

    public static final function getName()
    {
        return strtolower(substr(get_called_class(), 0, -strlen(self::SUFFIX)));
    }

    //Sera utilisé dans NoteControlleur
    public static abstract function getDefaultAction();

    public static final function getAvailableActions()
    {
        return array_diff(
            get_class_methods(get_called_class()),
            get_class_methods(get_parent_class(get_called_class()))
        );
    }

    public final function isPost()
    {
        return $_SERVER['REQUEST_METHOD'] == 'POST';
    }

    public final function isGet()
    {
        return $_SERVER['REQUEST_METHOD'] == 'GET';
    }

    protected final function getParameter($paramKey)
    {
        switch ($_SERVER['REQUEST_METHOD'])
        {
            case 'POST':
                $param = $_POST[$paramKey];
                break;

            case 'GET':
                $param = $_GET[$paramKey];
                break;

            default:
                $param = $_REQUEST[$paramKey];
        }

        if (!isset($param))
        {
            /* die('Paramètre manquant: "' . $paramKey .
   '" pour l\'action ' . MainController::getLastAction() .
   ' et pour le controlleur ' . MainControlleur::getLastController());  */
            Erreur::erreurParam();
        }

        return $param;
    }
}
