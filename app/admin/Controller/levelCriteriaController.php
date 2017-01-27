<?php

namespace CBS\Controller;

use CBS\API\APIFromBIS;
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

    /*
     * @var mixed
     */
    private $api;

    private $id;
    private $number;
    private $description;

    /**
     *
     */
    public function __construct()
    {
        $this->db = new DbLevelCriteria();
        $this->api = new APIFromBIS();
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
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
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
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $number
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
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

    public function setLevelDataFromDatabase($data)
    {
        $this->setId($data->id_level);
        $this->setNumber($data->level);
        $this->setDescription($data->beschrijving);
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
        $this->db->setFkLevel($this->fkLevel);
        $this->db->setOmschrijving($this->omschrijving);
        $this->db->setTotaalAantalOpdracht($this->totaal_aantal_opdracht);
        $this->db->setVerplichtOpdrachtAantal($this->verplicht_opdracht_aantal);
        $this->db->setTechnischOpdrachtAantal($this->technisch_opdracht_aantal);
        $this->db->dbCreate();
    }

    /**
     *
     */
    public function update($leveltype)
    {
        $this->db->dbUpdate($leveltype);
    }


    /**
     *
     */
    public function delete($level_type)
    {
        $this->db->dbDelete($level_type);
    }

    /**
     *
     */
    public function getLevelList()
    {
        $results = $this->db->getDbLevelList();
        $results = is_array($results) ? $results : [];
        foreach($results as $result){
            $level_model[$result['id_level_criteria']] = new $this;
            $level_model[$result['id_level_criteria']]->setLevelCriteria($result);
        }
        return $level_model;
    }

    /**
     *
     */
    public function getLevelDataList()
    {
        $results = $this->api->getLevelList();
        $results = is_array($results) ? $results : [];
        foreach($results as $result){
            $level_model[$result->id_level] = new $this;
            $level_model[$result->id_level]->setLevelDataFromDatabase($result);
        }
        return $level_model;
    }

    /**
     *
     */
    public function getLevelById($level_id)
    {
        $data = $this->db->getLevelById($level_id);
        $this->setLevelCriteria($data);
        return $this;
    }



}
