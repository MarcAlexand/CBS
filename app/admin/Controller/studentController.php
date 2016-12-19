<?php

namespace CBS\Controller;

use CBS\API\APIFromBIS;


/**
 *
 */
class studentController
{

    /**
     * @var void
     */
    public $idStudent;

    /**
     * @var void
     */
    public $voornaam;

    /**
     * @var void
     */
    public $tussenvoegsel;

    /**
     * @var void
     */
    public $achternaam;

    /**
     * @var void
     */
    public $level;

    /*
     * @var api
     */
    private $api;


    /**
     *
     */
    public function __construct()
    {
        $this->api = new APIFromBIS();
    }

    /**
     *
     */
    public function getStudentLijst()
    {
        // TODO: implement here
    }

    /**
     * @return void
     */
    public function getIdStudent()
    {
        return $this->idStudent;
    }

    /**
     * @return void
     */
    public function getVoornaam()
    {
        return $this->voornaam;
    }

    /**
     * @return void
     */
    public function getTussenvoegsel()
    {
        return $this->tussenvoegsel;
    }

    /**
     * @return void
     */
    public function getAchternaam()
    {
        return $this->achternaam;
    }

    /**
     * @return void
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * @param void $idStudent
     */
    public function setIdStudent($idStudent)
    {
        $this->idStudent = $idStudent;
    }

    /**
     * @param void $voornaam
     */
    public function setVoornaam($voornaam)
    {
        $this->voornaam = $voornaam;
    }

    /**
     * @param void $tussenvoegsel
     */
    public function setTussenvoegsel($tussenvoegsel)
    {
        $this->tussenvoegsel = $tussenvoegsel;
    }

    /**
     * @param void $achternaam
     */
    public function setAchternaam($achternaam)
    {
        $this->achternaam = $achternaam;
    }

    /**
     * @param void $level
     */
    public function setLevel($level)
    {
        $this->level = $level;
    }
}
