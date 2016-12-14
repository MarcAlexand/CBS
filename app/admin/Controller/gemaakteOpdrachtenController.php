<?php

namespace CBS\gemaakteOpdrachtenController;


/**
 *
 */
class gemaakteOpdrachtenController
{

    /**
     * @var int
     */
    public $idStudent;

    /**
     * @var string
     */
    public $studentVoornaam;

    /**
     * @var string
     */
    public $studentTussenvoegsel;

    /**
     * @var string
     */
    public $studentAchternaam;

    /**
     * @var string
     */
    public $studentLevel;

    /*
     * @var string
     */
    public $studentLevelBeschrijving;

    /**
     * @var integer
     */
    public $idOpdracht;

    /**
     * @var string
     */
    public $opdrachtNaam;

    /*
     * @var string
     */
    public $opdrachtBeschrijving;

    /**
     * @var string
     */
    public $opdrachtType;

    /**
     * @var string
     */
    public $opdrachtCategorie;

    /**
     * @var string
     */
    public $opdrachtInleverDatum;

    /*
     * @var array
     */
    public $api;


    /**
     *
     */
    public function __construct()
    {
        $this->api = new \CBS\API\APIFromBIS();
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
        $this->setOpdrachtInleverDatum($data->opdracht_inleverDatum);
    }

    /**
     *
     */
    public function getGemaakteOpdrachten()
    {

        $results = $this->api->getMadeTaskList();
        $results = is_array($results) ? $results :[];
        foreach ($results as $result) {
            $student_model[$result->id_opdracht] = new $this;
            $student_model[$result->id_opdracht]->setMadeTasks($result);
        }
        return $student_model;
    }



    /**
     *
     */
    public function getGemaakteOpdrachtenByStudentId()
    {
        // TODO: implement here
    }

    /**
     *
     */
    public function getGemaakteOpdrachtenByOpdrachtId()
    {
        // TODO: implement here
    }

    /**
     *
     */
    public function getGemaakteOpdrachtenByOpdrachten()
    {
        // TODO: implement here
    }

    /**
     *
     */
    public function getGemaakteOpdrachtenByLeerlingen()
    {
        // TODO: implement here
    }


}
