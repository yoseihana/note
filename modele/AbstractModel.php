<?php
/**
 * Created by JetBrains PhpStorm.
 * User: annabelle
 * Date: 20/05/12
 * Time: 14:37
 * To change this template use File | Settings | File Templates.
 */

require_once './config/DB.php';

abstract class AbstractModel
{
    protected $connection;

    function __construct()
    {
        $this->connection =& DB::getPdoInstance();
    }

    /**
     * Préparer et executer un PDOStatement
     * @param $request
     * @param array|null $parametres
     * @return bool
     */
    protected function execute($request, array $parametres = NULL)
    {
        try
        {
            $statement = $this->connection->prepare($request);
            return $statement->execute($parametres);
        } catch (PDOException $e)
        {
            $this->_PDOExcptionGestion($e);
        }
    }

    /**
     * Préparation, excetution et collecte des résultat d'un PDOStatement
     * @param $request
     * @param array|null $parametres
     * @return PDOStatement
     */
    protected function fetchAll($request, array $parametres = NULL)
    {
        try
        {
            $statement = $this->connection->prepare($request);
            $statement->execute($parametres);

            return $statement->fetchAll();
        } catch (PDOException $e)
        {
            $this->_PDOExcptionGestion($e);
        }
    }

    /**
     * Prépare, execute, collecte un seul résultat de PDOStament
     * @param $request
     * @param array|null $parametres
     * @return mixed
     */
    protected function fetch($request, array $parametres = NULL)
    {
        try
        {
            $statement = $this->connection->prepare($request);
            $statement->execute($parametres);

            return $statement->fetch();

        } catch (PDOException $e)
        {
            $this->_PDOExcptionGestion($e);
        }
    }

    /**
     * Vérifie si il y a une transaction et gère le PDOException
     * @param PDOException $e
     */
    private function _PDOExcptionGestion(PDOException $e)
    {
        if ($this->connection()->inTransaction())
        {
            $this->connection->rollBack();
        }
        die($e->getMessage());
    }
}


