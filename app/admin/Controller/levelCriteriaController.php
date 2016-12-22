<?php

namespace CBS\Controller;

use CBS\DAO\DbLevelCriteria;

/**
 *
 */
class levelCriteriaController
{

    /**
     * @var void
     */
    private $idLevelCriteria;

    /*
     * @var int
     */
    private $fkLevel;

    /**
     * @var void
     */
    private $omschrijving;

    /**
     * @var void
     */
    private $totaal_aantal_opdracht;

    /**
     * @var void
     */
    private $verplicht_opdracht_aantal;

    /**
     * @var void
     */
    private $technisch_opdracht_aantal;

    /**
     * @var void
     */
    private $db;


    /**
     *
     */
    public function __construct()
    {
        $this->db = new DbLevelCriteria();
    }


    /**
     * @return void
     */
    public function getIdLevelCriteria()
    {
        return $this->idLevelCriteria;
    }

    /**
     * @return mixed
     */
    public function getFkLevel()
    {
        return $this->fkLevel;
    }

    /**
     * @return void
     */
    public function getOmschrijving()
    {
        return $this->omschrijving;
    }

    /**
     * @return void
     */
    public function getTechnischOpdrachtAantal()
    {
        return $this->technisch_opdracht_aantal;
    }

    /**
     * @return void
     */
    public function getTotaalAantalOpdracht()
    {
        return $this->totaal_aantal_opdracht;
    }

    /**
     * @return void
     */
    public function getVerplichtOpdrachtAantal()
    {
        return $this->verplicht_opdracht_aantal;
    }

    /**
     * @param void $idLevelCriteria
     */
    public function setIdLevelCriteria($idLevelCriteria)
    {
        $this->idLevelCriteria = $idLevelCriteria;
    }

    /**
     * @param mixed $fkLevel
     */
    public function setFkLevel($fkLevel)
    {
        $this->fkLevel = $fkLevel;
    }

    /**
     * @param void $omschrijving
     */
    public function setOmschrijving($omschrijving)
    {
        $this->omschrijving = $omschrijving;
    }

    /**
     * @param void $totaal_aantal_opdracht
     */
    public function setTotaalAantalOpdracht($totaal_aantal_opdracht)
    {
        $this->totaal_aantal_opdracht = $totaal_aantal_opdracht;
    }


    /**
     * @param void $technisch_opdracht_aantal
     */
    public function setTechnischOpdrachtAantal($technisch_opdracht_aantal)
    {
        $this->technisch_opdracht_aantal = $technisch_opdracht_aantal;
    }

    /**
     * @param void $verplicht_opdracht_aantal
     */
    public function setVerplichtOpdrachtAantal($verplicht_opdracht_aantal)
    {
        $this->verplicht_opdracht_aantal = $verplicht_opdracht_aantal;
    }

    public function setLevelCriteria($data){
        $this->setIdLevelCriteria($data['id_level_criteria']);
        $this->setFkLevel($data['fk_level']);
        $this->setOmschrijving($data['omschrijving']);
        $this->setTotaalAantalOpdracht($data['totaal_opdracht']);
        $this->setVerplichtOpdrachtAantal($data['type_opdracht_aantal']);
        $this->setTechnischOpdrachtAantal($data['categorie_opdracht_aantal']);
    }

    /**
     *
     */
    public function getHoeveelhedenByIdLevel($fklevel)
    {
        $results = $this->db->getHoeveelhedenByIdLevelDb($fklevel);
        foreach ($results as $result) {
            $level_criteria[$result->id_level_criteria] = new $this;
            $level_criteria[$result->id_level_criteria]->setLevelCriteria($result);
        }
        return $level_criteria;
    }

    /**
     *
     */
    public function create()
    {
        // TODO: implement here
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
    public function read()
    {
        // TODO: implement here
    }

    /**
     *
     */
    public function delete()
    {
        // TODO: implement here
    }
}
