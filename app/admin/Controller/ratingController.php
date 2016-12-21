<?php

namespace CBS\Controller;

use CBS\DAO\DbRating;

/**
 *
 */
class ratingController
{
    /**
     * @var int
     */
    private $idRating;

    /**
     * @var string
     */
    private $dateRating;

    /**
     * @var string
     */
    private $noteRating;

    /*
     * @var int
     */
    private $idRatingType;

    /*
     * @var int
     */
    private $idCoach;

    /*
     * @var int
     */
    private $idStudentTask;

    /*
     * @var int
     */
    private $idTask;

    /*
     * @var db
     */
    private $db;

    /**
     *
     */
    public function __construct()
    {
        $this->db = new DbRating();
    }


    /**
     * @return string
     */
    public function getDateRating()
    {
        return $this->dateRating;
    }

    /**
     * @return mixed
     */
    public function getIdRatingType()
    {
        return $this->idRatingType;
    }

    /**
     * @return mixed
     */
    public function getIdCoach()
    {
        return $this->idCoach;
    }

    /**
     * @return int
     */
    public function getIdRating()
    {
        return $this->idRating;
    }

    /**
     * @return string
     */
    public function getNoteRating()
    {
        return $this->noteRating;
    }

    /**
     * @return mixed
     */
    public function getIdStudentTask()
    {
        return $this->idStudentTask;
    }

    /**
     * @return mixed
     */
    public function getIdTask()
    {
        return $this->idTask;
    }

    /**
     * @param mixed $idRatingType
     */
    public function setIdRatingType($idRatingType)
    {
        $this->idRatingType = $idRatingType;
    }

    /**
     * @param string $dateRating
     */
    public function setDateRating($dateRating)
    {
        $this->dateRating = $dateRating;
    }

    /**
     * @param mixed $idCoach
     */
    public function setIdCoach($idCoach)
    {
        $this->idCoach = $idCoach;
    }

    /**
     * @param int $idRating
     */
    public function setIdRating($idRating)
    {
        $this->idRating = $idRating;
    }

    /**
     * @param string $noteRating
     */
    public function setNoteRating($noteRating)
    {
        $this->noteRating = $noteRating;
    }

    /**
     * @param mixed $idTask
     */
    public function setIdTask($idTask)
    {
        $this->idTask = $idTask;
    }
    /**
     * @param mixed $idStudentTask
     */
    public function setIdStudentTask($idStudentTask)
    {
        $this->idStudentTask = $idStudentTask;
    }

    public function setRatedTaskFromDatabase($data){
        $this->setIdRating($data['id_beoordeling']);
        $this->setNoteRating($data['notitie']);
        $this->setDateRating($data['datum']);
        $this->setIdRatingType($data['fk_beoordeling_type']);
        $this->setIdCoach($data['fk_coach']);
        $this->setIdTask($data['fk_opdracht']);
        $this->setIdStudentTask($data['fk_leerling_opdracht']);
    }

    /**
     *
     */
    public function create()
    {
        $this->db->setIdRatingType($this->idRatingType);
        $this->db->setIdCoach($this->idCoach);
        $this->db->setIdStudentTask($this->idStudentTask);
        $this->db->setNoteRating($this->noteRating);
        $this->db->setIdTask($this->idTask);
        $this->db->createDb();
    }

    /**
     *
     */
    public function update()
    {
        // TODO: implement here
    }

    /**
     *
     */
    public function setRatedTask()
    {
        // TODO: implement here
    }

    /**
     *
     */
    public function getRatingById()
    {
        // TODO: implement here
    }

    /**
     *
     */
    public function getRatedTaskList()
    {
        $results = $this->db->getRatingListDb();
        $results = is_array($results) ? $results :[];
        foreach ($results as $result) {
            $rated_task_model[$result['id_beoordeling']] = new $this;
            $rated_task_model[$result['id_beoordeling']]->setRatedTaskFromDatabase($result);
        }
        return $rated_task_model;
    }

    /**
     *
     */
    public function getRatedTaskListById($idtask_student)
    {
        $results = $this->db->getRatingListDb($idtask_student);
        $results = is_array($results) ? $results :[];
        foreach ($results as $result) {
            $rated_task_model[$result['id_beoordeling']] = new $this;
            $rated_task_model[$result['id_beoordeling']]->setRatedTaskFromDatabase($result);
        }
        return $rated_task_model;
    }

    /**
     *
     */
    public function getRatedTaskListByStudent($studentid)
    {
        $results = $this->db->getRatingListDb($studentid);
        $results = is_array($results) ? $results :[];
        foreach ($results as $result) {
            $rated_task_model[$result['id_beoordeling']] = new $this;
            $rated_task_model[$result['id_beoordeling']]->setRatedTaskFromDatabase($result);
        }
        return $rated_task_model;
    }



}
