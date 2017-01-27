<?php

namespace CBS\Controller;

use CBS\API\APIFromBIS;


/**
 *
 */
class gemaakteOpdrachtenController
{

    /**
     * @var int
     */
    private $idStudent;

    /**
     * @var string
     */
    private $studentVoornaam;

    /**
     * @var string
     */
    private $studentTussenvoegsel;

    /**
     * @var string
     */
    private $studentAchternaam;

    /**
     * @var string
     */
    private $studentLevel;

    /*
     * @var string
     */
    private $studentLevelBeschrijving;

    /**
     * @var integer
     */
    private $idOpdracht;

    /**
     * @var string
     */
    public $opdrachtNaam;

    /*
     * @var string
     */
    private $opdrachtBeschrijving;

    /**
     * @var string
     */
    private $opdrachtType;

    /**
     * @var string
     */
    private $opdrachtCategorie;

    /**
     * @var string
     */
    private $opdrachtInleverDatum;

    /*
     * @var array
     */
    private $api;

    /*
     * @var int
     */
    private $id_opdrachten_leerlingen;


    /**
     *
     */
    public function __construct()
    {
        $this->api = new APIFromBIS();
    }
    /**
     * @return integer
     */
    public function getIdOpdracht()
    {
        return $this->idOpdracht;
    }

    /**
     * @return string
     */
    public function getOpdrachtBeschrijving()
    {
        return $this->opdrachtBeschrijving;
    }

    /**
     * @return int
     */
    public function getIdStudent()
    {
        return $this->idStudent;
    }

    /**
     * @return string
     */
    public function getOpdrachtCategorie()
    {
        return $this->opdrachtCategorie;
    }

    /**
     * @return string
     */
    public function getOpdrachtInleverDatum()
    {
        return $this->opdrachtInleverDatum;
    }

    /**
     * @return string
     */
    public function getOpdrachtNaam()
    {
        return $this->opdrachtNaam;
    }

    /**
     * @return string
     */
    public function getOpdrachtType()
    {
        return $this->opdrachtType;
    }

    /**
     * @return string
     */
    public function getStudentAchternaam()
    {
        return $this->studentAchternaam;
    }

    /**
     * @return int
     */
    public function getStudentLevel()
    {
        return $this->studentLevel;
    }

    /**
     * @return mixed
     */
    public function getStudentLevelBeschrijving()
    {
        return $this->studentLevelBeschrijving;
    }

    /**
     * @return string
     */
    public function getStudentTussenvoegsel()
    {
        return $this->studentTussenvoegsel;
    }

    /**
     * @return string
     */
    public function getStudentVoornaam()
    {
        return $this->studentVoornaam;
    }

    /**
     * @return mixed
     */
    public function getIdOpdrachtenLeerlingen()
    {
        return $this->id_opdrachten_leerlingen;
    }

    /**
     * @param int $idOpdracht
     */
    public function setIdOpdracht($idOpdracht)
    {
        $this->idOpdracht = $idOpdracht;
    }

    /**
     * @param int $idStudent
     */
    public function setIdStudent($idStudent)
    {
        $this->idStudent = $idStudent;
    }

    /**
     * @param string $opdrachtCategorie
     */
    public function setOpdrachtCategorie($opdrachtCategorie)
    {
        $this->opdrachtCategorie = $opdrachtCategorie;
    }

    /**
     * @param string $opdrachtBeschrijving
     */
    public function setOpdrachtBeschrijving($opdrachtBeschrijving)
    {
        $this->opdrachtBeschrijving = $opdrachtBeschrijving;
    }

    /**
     * @param string $opdrachtInleverDatum
     */
    public function setOpdrachtInleverDatum($opdrachtInleverDatum)
    {
        $this->opdrachtInleverDatum = $opdrachtInleverDatum;
    }

    /**
     * @param string $opdrachtNaam
     */
    public function setOpdrachtNaam($opdrachtNaam)
    {
        $this->opdrachtNaam = $opdrachtNaam;
    }

    /**
     * @param string $opdrachtType
     */
    public function setOpdrachtType($opdrachtType)
    {
        $this->opdrachtType = $opdrachtType;
    }

    /**
     * @param string $studentAchternaam
     */
    public function setStudentAchternaam($studentAchternaam)
    {
        $this->studentAchternaam = $studentAchternaam;
    }

    /**
     * @param string $studentLevel
     */
    public function setStudentLevel($studentLevel)
    {
        $this->studentLevel = $studentLevel;
    }

    /**
     * @param mixed $studentLevelBeschrijving
     */
    public function setStudentLevelBeschrijving($studentLevelBeschrijving)
    {
        $this->studentLevelBeschrijving = $studentLevelBeschrijving;
    }

    /**
     * @param string $studentTussenvoegsel
     */
    public function setStudentTussenvoegsel($studentTussenvoegsel)
    {
        $this->studentTussenvoegsel = $studentTussenvoegsel;
    }

    /**
     * @param string $studentVoornaam
     */
    public function setStudentVoornaam($studentVoornaam)
    {
        $this->studentVoornaam = $studentVoornaam;
    }

    /**
     * @param mixed $id_opdrachten_leerlingen
     */
    public function setIdOpdrachtenLeerlingen($id_opdrachten_leerlingen)
    {
        $this->id_opdrachten_leerlingen = $id_opdrachten_leerlingen;
    }

    /**
     * Fills the Student model with data.
     *
     * @param array $data
     */
    public function setMadeTasks($data)
    {
        $this->setIdStudent($data->id_leerlingnummer);
        $this->setStudentVoornaam($data->voornaam_leerling);
        $this->setStudentTussenvoegsel($data->tussenvoegsel_leerling);
        $this->setStudentAchternaam($data->achternaam_leerling);
        $this->setStudentLevel($data->level);
        $this->setStudentLevelBeschrijving($data->beschrijving);
        $this->setIdOpdracht($data->id_opdracht);
        $this->setOpdrachtNaam($data->opdracht_naam);
        $this->setOpdrachtBeschrijving($data->opdracht_omschrijving);
        $this->setOpdrachtType($data->opdracht_type);
        $this->setOpdrachtCategorie($data->opdracht_categorie);
        $this->setOpdrachtInleverDatum($data->inleverDatum);
    }

    /**
     * Fills the Student model with data.
     *
     * @param array $data
     */
    public function setMadeTasksByStudents($data)
    {
        $this->setIdStudent($data->id_leerlingnummer);
        $this->setStudentVoornaam($data->voornaam_leerling);
        $this->setStudentTussenvoegsel($data->tussenvoegsel_leerling);
        $this->setStudentAchternaam($data->achternaam_leerling);
        $this->setStudentLevel($data->level);
        $this->setStudentLevelBeschrijving($data->beschrijving);
        $this->setOpdrachtInleverDatum($data->inleverDatum);
        $this->setIdOpdracht($data->fk_opdracht);
        $this->setIdOpdrachtenLeerlingen($data->id_opdrachten_leerlingen);
    }

    /**
     * Fills the Student model with data.
     *
     * @param array $data
     */
    public function setMadeTasksByTasks($data)
    {
        $this->setIdOpdracht($data->id_opdracht);
        $this->setOpdrachtNaam($data->opdracht_naam);
        $this->setOpdrachtBeschrijving($data->opdracht_omschrijving);
        $this->setOpdrachtType($data->opdracht_type);
        $this->setOpdrachtCategorie($data->opdracht_categorie);
        $this->setOpdrachtInleverDatum($data->inleverDatum);
    }

    /**
     * Fills the Student model with data.
     *
     * @param array $data
     */
    public function setMadeTasksStudentsByTaskId($data)
    {
        $this->setIdStudent($data->id_leerlingnummer);
        $this->setIdOpdracht($data->id_opdracht);
        $this->setOpdrachtNaam($data->opdracht_naam);
        $this->setOpdrachtBeschrijving($data->opdracht_omschrijving);
        $this->setStudentVoornaam($data->voornaam_leerling);
        $this->setStudentTussenvoegsel($data->tussenvoegsel_leerling);
        $this->setStudentAchternaam($data->achternaam_leerling);
        $this->setOpdrachtInleverDatum($data->inleverDatum);
        $this->setIdOpdrachtenLeerlingen($data->id_opdrachten_leerlingen);
        $this->setStudentLevel($data->level);
        $this->setStudentLevelBeschrijving($data->beschrijving);
    }

    /**
     * Fills the Student model with data.
     *
     * @param array $data
     */
    public function setMadeTasksById($data)
    {
        $this->setIdStudent($data->id_leerlingnummer);
        $this->setStudentVoornaam($data->voornaam_leerling);
        $this->setStudentTussenvoegsel($data->tussenvoegsel_leerling);
        $this->setStudentAchternaam($data->achternaam_leerling);
        $this->setIdOpdracht($data->id_opdracht);
        $this->setOpdrachtNaam($data->opdracht_naam);
        $this->setOpdrachtInleverDatum($data->inleverDatum);
        $this->setIdOpdrachtenLeerlingen($data->id_opdrachten_leerlingen);
    }

    public function setMadeTasksByStudentId($data){
        $this->setIdStudent($data->id_leerlingnummer);
        $this->setStudentVoornaam($data->voornaam_leerling);
        $this->setStudentTussenvoegsel($data->tussenvoegsel_leerling);
        $this->setStudentAchternaam($data->achternaam_leerling);
        $this->setIdOpdracht($data->id_opdracht);
        $this->setOpdrachtNaam($data->opdracht_naam);
        $this->setOpdrachtInleverDatum($data->inleverDatum);
        $this->setIdOpdrachtenLeerlingen($data->id_opdrachten_leerlingen);
    }

    /**
     *
     */
    public function getGemaakteOpdrachtenByOpdrachten()
    {
        $results = $this->api->getMadeTaskList();
        $results = is_array($results) ? $results :[];
        foreach ($results as $result) {
            $tasks_model[$result->id_opdracht] = new $this;
            $tasks_model[$result->id_opdracht]->setMadeTasksByTasks($result);
        }
        return $tasks_model;
    }

    /**
     *
     */
    public function getGemaakteOpdrachtById($id)
    {
        $results = $this->api->getMadeTaskByTaskId($id);
        foreach ($results as $result) {

            $task_model[$result->id_opdracht] = new $this;
            $task_model[$result->id_opdracht]->setMadeTasksById($result);
        }
        return $task_model;
    }

    /**
     *
     */
    public function getGemaakteOpdrachtLeerlingenByOpdrachtId($id)
    {

        $results = $this->api->getMadeTaskStudentsByTasksId($id);
        $results = is_array($results) ? $results :[];
        foreach ($results as $result) {
            $student_model[$result->id_leerlingnummer] = new $this;
            $student_model[$result->id_leerlingnummer]->setMadeTasksStudentsByTaskId($result);
        }
        return $student_model;
    }

    /**
     *
     */
    public function getGemaakteOpdrachtLeerlingByOpdrachtleerlingId($id)
    {
        $results = $this->api->getMadeTaskStudentsByStudentTaskId($id);
        $results = is_array($results) ? $results :[];
        foreach ($results as $result) {
            $student_model[$result->id_leerlingnummer] = new $this;
            $student_model[$result->id_leerlingnummer]->setMadeTasksStudentsByTaskId($result);
        }
        return $student_model;
    }

    /**
     *
     */
    public function getGemaakteOpdrachtenByLeerlingen()
    {
        $results = $this->api->getMadeTaskList();
        $results = is_array($results) ? $results :[];
        foreach ($results as $result) {
            $student_model[$result->id_leerlingnummer] = new $this;
            $student_model[$result->id_leerlingnummer]->setMadeTasksByStudents($result);
        }
        return $student_model;
    }

    /**
     *
     */
    public function getGemaakteOpdrachtenByStudentId($id)
    {
        $results = $this->api->getMadeTasksByStudentId($id);
        foreach ($results as $result) {

            $student_model[$result->id_opdracht] = new $this;
            $student_model[$result->id_opdracht]->setMadeTasksByStudentId($result);
        }
        return $student_model;
    }

    /**
     *
     */
    public function getGemaakteOpdrachtenByOpdrachtId()
    {
        $results = $this->api->getMadeTaskListById();
        $results = is_array($results) ? $results :[];
        foreach ($results as $result) {
            $tasks_model[$result->id_opdracht] = new $this;
            $tasks_model[$result->id_opdracht]->setMadeTasksByTaskByStudents($result);
        }
        return $tasks_model;
    }

    /**
     *
     */
    public function getGemaakteOpdrachtInleverDatumByOpdrachLeerlingId($id)
    {

        $results = $this->api->getMadeTaskSubmussionDateByTaskStudentId($id);
        foreach ($results as $result) {
            $task_model[$result->id_opdracht] = new $this;
            $task_model[$result->id_opdracht]->setMadeTasksById($result);
        }
        return $task_model;
    }






}
