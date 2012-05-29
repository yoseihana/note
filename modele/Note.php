<?php

include_once 'AbstractModel.php';

final class Note extends AbstractModel
{
    const TABLE = 'notes';
    const ID = 'id';
    const DATE_PARUTION = 'date_parution';
    const NOTE = 'note';
    const TITRE = 'titre';

    function __construct()
    {
        parent::__construct();
    }

    /**
     * Récupèrer toutes les notes avec 3 par page
     * @param $premiereEntree
     * @return PDOStatement
     */
    public function getAll($premiereEntree)
    {

        $req = 'SELECT * FROM ' . self::TABLE . ' ORDER BY ' . self::ID . ' DESC LIMIT ' . $premiereEntree . ',3';

        return $this->fetchAll($req);
    }

    /**
     * Récupère une note selon son ID
     * @param $id
     * @return mixed
     */
    public function findNotebyId($id)
    {

        $req = 'SELECT * FROM ' . self::TABLE . ' WHERE ' . self::ID . '= :id';
        $param = array(':id' => $id);

        return $this->fetch($req, $param);
    }

    /**
     * Ajouter une note
     * @param array $data
     * @return bool
     */
    public function add(array $data)
    {

        $req = 'INSERT INTO ' . self::TABLE . ' VALUES(null, :date_parution, :note, :titre)';
        $param = array(
            ':id'           => $data[self::ID],
            ':date_parution'=> $data[self::DATE_PARUTION],
            ':note'         => $data[self::NOTE],
            ':titre'        => $data[self::TITRE]
        );
        return $this->execute($req, $param);
    }

    /**
     * Supression d'une note selon son ID
     * @param $id
     * @return bool
     */
    public function delete($id)
    {

        $req = 'DELETE FROM ' . self::TABLE . ' WHERE ' . self::ID . '= :id';
        $param = array(
            ':id' => $id
        );
        return $this->execute($req, $param);
    }

    /**
     * Mise à jour de la note
     * @param array $data
     * @return bool
     */
    public function update(array $data)
    {

        $req = 'UPDATE ' . self::TABLE . ' SET ' . self::NOTE . '= :note, ' . self::TITRE . '= :titre WHERE ' . self::ID . '= :id';
        $param = array(
            ':note' => $data[self::NOTE],
            ':titre'=> $data[self::TITRE],
            ':id'   => $data[self::ID]
        );
        return $this->execute($req, $param);
    }

    /**
     * Compte si il y a déjà une note a cet id, retourn 1 si existe déhà sinon 0
     * @param $id
     * @return mixed
     */
    public function countNoteById($id)
    {

        $req = 'SELECT count(' . self::ID . ') as nb_id FROM ' . self::TABLE . ' WHERE ' . self::ID . '= :id';
        $param = array(
            ':id'=> $id
        );
        $nbIdnote = $this->fetch($req, $param);

        return $nbIdnote['nb_id'];
    }

    public function countNote()
    {
        //global $connexion;

        $req = 'SELECT COUNT(*) AS total FROM ' . self::TABLE;
        $totaleNotes = $this->fetch($req);
        //$totaleNotes = $this->fetchAll($req);

        /*try
       {
           $ps = $connexion->query($req);
           $totaleNotes = $ps->fetch();
       } catch (PDOException $e)
       {
           die($e->getMessage());
       } */

        return $totaleNotes;
    }
}