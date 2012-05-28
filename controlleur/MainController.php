<?php
/**
 * Created by JetBrains PhpStorm.
 * User: annabelle
 * Date: 28/05/12
 * Time: 12:01
 * To change this template use File | Settings | File Templates.
 */
require_once 'NoteController.php';

abstract class MainController
{
    const DEFAULT_ACTION = 'def_action';
    const DEFAULT_CONTROLLER = 'def_controller';

    private static $lastController;
    private static $lastAction;

    //Routage
    public static function route()
    {
        if (isset($_REQUEST['a']) && isset($_REQUEST['c']))
        {
            self::$lastAction = $_REQUEST['a'];
            self::$lastController = $_REQUEST['c'];
        }
        else
        {
            self::$lastAction = constant(self::DEFAULT_ACTION);
            self::$lastController = constant(self::DEFAULT_CONTROLLER);
        }

        //Récupèrer le nom supposer de la class pour le controller demander
        $lastControllerClass = AbstractController::getClassName(self::$lastController);

        if (!class_exists($lastControllerClass, false))
        {
            die('Il n\'y a pas de controlleur pour "' . self::$lastController . '"');
        }

        //Changement du $lastControllerClass
        $lastControllerClass = new $lastControllerClass;

        //Vérifie si le nom de la class controller est un controlleur valide
        if (!($lastControllerClass instanceof AbstractController))
        {
            die('Il n\'y a pas de controlleur valide pour "' . self::$lastController . '"');
        }

        //Récupèration des actions disponibles du controlleur
        $avaibleActions = call_user_func(array(
            $lastControllerClass,
            'getAvailableActions'
        ));

        if (!in_array(self::getLastAction(), $avaibleActions))
        {
            die('Il n\'y a pas d\'action pour "' . self::$lastAction .
                '" au controlleur "' . self::$lastController . '"');
        }

        return call_user_func(array(
            $lastControllerClass,
            self::$lastAction
        ));
    }

    public static function getLastAction()
    {
        return self::$lastAction;
    }

    public static function getLastController()
    {
        return self::getLastController();
    }

    public static function getLastViewFileName()
    {
        return strtolower(self::$lastAction . self::$lastController . '.php');
    }
}
