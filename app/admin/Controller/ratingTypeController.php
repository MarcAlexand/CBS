<?php

namespace CBS\Controller;

use CBS\DAO\DbRatingType;

/**
 *
 */
class ratingTypeController
{

    /**
     * @var int
     */
    private $idRatingType;

    /**
     * @var string
     */
    private $nameRatingType;

    /**
     * @var database
     */
    private $db;


    /**
     *
     */
    public function __construct()
    {
        $this->db = new DbRatingType();
    }

    /**
     * @return int
     */
    public function getIdRatingType()
    {
        return $this->idRatingType;
    }

    /**
     * @return string
     */
    public function getNameRatingType()
    {
        return $this->nameRatingType;
    }

    /**
     * @param int $idRatingType
     */
    public function setIdRatingType($idRatingType)
    {
        $this->idRatingType = $idRatingType;
    }

    /**
     * @param string $nameRatingType
     */
    public function setNameRatingType($nameRatingType)
    {
        $this->nameRatingType = $nameRatingType;
    }

    /**
     * @param $data
     */
    public function setRatingTypeFromDatabase($data)
    {
        $this->setIdRatingType($data['id_beoordelings_type']);
        $this->setNameRatingType($data['naam']);
    }

    /**
     * Fills the model with data.
     *
     * @param $data
     */
    public function setRatingTypeToDatabase($data)
    {
        $this->setNameRatingType($data['naam']);
    }

    /**
     *
     */
    public function create()
    {
        $this->db->setNameRatingType($this->nameRatingType);
        $this->db->createDb();

    }

    /**
     *
     */
    public function update($data)
    {
        $this->setRatingTypeFromDatabase($data);
        $this->db->updateDb($data);
    }

    /**
     *
     */
    public function delete($beoordelings_type)
    {
        $this->db->deleteDb($beoordelings_type);
    }

    /**
     *
     */
    public function getRatingTypeList()
    {
        $results = $this->db->getDbRatingTypeList();
        $results = is_array($results) ? $results : [];
        foreach($results as $result){
            $level_model[$result['id_beoordelings_type']] = new $this;
            $level_model[$result['id_beoordelings_type']]->setRatingTypeFromDatabase($result);
        }
        return $level_model;
    }

    /**
     *
     */
    public function getRatingTypeById($beoordelingstype_id)
    {
        $data = $this->db->getDbRatingTypeById($beoordelingstype_id);
        $this->setRatingTypeFromDatabase($data);
        return $this;
    }

}
