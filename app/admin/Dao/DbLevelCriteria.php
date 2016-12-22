<?php

namespace CBS\DAO;

/**
 *
 */
class DbLevelCriteria
{
    /**
     * @var void
     */
    public $idLevelCriteria;

    /**
     * @var void
     */
    public $omschrijving;

    /**
     * @var void
     */
    public $totaal_aantal_opdracht;

    /**
     * @var void
     */
    public $verplicht_opdracht_aantal;

    /**
     * @var void
     */
    public $technisch_opdracht_aantal;

    /**
     *
     */
    public function __construct()
    {
        global $wpdb;
        $this->wpdb = $wpdb;
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

    /**
     *
     */
    public function getHoeveelhedenByIdLevelDb($fk_level)
    {

        global $wpdb;
        if(!$results = $this->wpdb->get_results(
            "
            SELECT *
            FROM `". $wpdb->prefix."ivs_level_criteria`
            WHERE `fk_level` = $fk_level",
            ARRAY_A
        )){
            return false;
        }

        return $results;
    }

    /**
     *
     */
    public function dbCreate()
    {
        // TODO: implement here
    }

    /**
     *
     */
    public function dbUpdate()
    {
        // TODO: implement here
    }

    /**
     *
     */
    public function dbRead()
    {
        // TODO: implement here
    }

    /**
     *
     */
    public function dbDelete()
    {
        // TODO: implement here
    }
}
