<?php
/**
 * Created by JetBrains PhpStorm.
 * User: annabelle
 * Date: 28/05/12
 * Time: 12:31
 * To change this template use File | Settings | File Templates.
 */

require_once 'AbstractController.php';
require_once './modele/Note.php';

final class NoteController extends AbstractController
{
    private $note;

    function __construct()
    {
        $this->note = new Note();
    }

    public static function getDefaultAction()
    {
        return 'lister';
    }

    public function lister()
    {
        $totaleNotes = $this->note->countNote();

        $nombreDePages = ceil($totaleNotes['total'] / 3);

        if (isset($_GET['page']))
        {
            $pageActuelle = intval($_GET['page']);

            if ($pageActuelle > $nombreDePages)
            {
                $pageActuelle = $nombreDePages;
            }
        }
        else
        {
            $pageActuelle = 1;
        }

        $premiereEntree = ($pageActuelle - 1) * 3;

        $data = array(
            'view_title'=> 'Liste des notes',
            'notes'     => $this->note->getAll($premiereEntree)
        );

        return array('data'=> $data, 'html'=> MainController::getLastViewFileName());
    }

    public function voir()
    {
        $id = $this->getParameter('id');
        $this->isIdExist($id);

        $note = $this->note->findNotebyId($id);
        $data = array(
            'view_title' => 'Description de la note "' . $note[Note::TITRE],
            'note'       => $note
        );

        return array('data'=> $data, 'html'=> MainController::getLastViewFileName());
    }

    public function modifier()
    {
        $id = $this->getParameter('id');
        $this->isIdExist($id);

        if ($this->isPost())
        {
            $note = array(
                Note::DATE_PARUTION => $this->getParameter('date_parution'),
                Note::TITRE         => $this->getParameter('titre'),
                Note::NOTE          => $this->getParameter('note')
            );

            DB::getPdoInstance()->beginTransaction();
            $this->note->update($note);
            DB::getPdoInstance()->commit();

            header('Location :' . Url::voirNote($this->getParameter('id')));
        }
        elseif ($this->isGet())
        {
            $note = $this->note->findNotebyId($id);

            $data = array(
                'view_title'=> 'Modification de la note " ' . $note[Note::TITRE] . '"',
                'note'      => $note
            );

            return array('data'=> $data, 'html'=> MainController::getLastViewFileName());
        }
    }

    public function supprimer()
    {
        $id = $this->getParameter('id');
        $this->isIdExist($id);

        if ($this->isPost())
        {
            DB::getPdoInstance()->beginTransaction();
            $this->note->delete($id);
            DB::getPdoInstance()->commit();

            header('Location: ' . Url::listerNote());
        }
        elseif ($this->isGet())
        {
            $note = $this->note->findNotebyId($id);
            $data = array(
                'view_title'=> 'Supprimer la note "' . $note[Note::TITRE] . '"',
                'note'      => $note
            );

            return array('data'=> $data, 'html'=> MainController::getLastViewFileName());
        }
    }

    public function ajouter()
    {
        if ($this->isPost())
        {
            $note = array(
                Note::DATE_PARUTION => date('Y-m-d'),
                Note::NOTE          => $this->getParameter('note'),
                Note::TITRE         => $this->getParameter('titre')
            );

            DB::getPdoInstance()->beginTransaction();
            $this->note->add($note);
            DB::getPdoInstance()->commit();

            header('Location: ' . Url::voirNote($this->getParameter('id')));
        }
        elseif ($this->isGet())
        {
            $data = array(
                'view_title'=> 'Ajouter une note'
            );

            return array('data'=> $data, 'html'=> MainController::getLastViewFileName());
        }
    }

    private function isIdExist($id)
    {
        if ($this->note->countNoteById($id) < 1)
        {
            die('L\'id "' . $id . '" fourni n\'existe pas dans la base de donnée');
        }

        return true;
    }

}
