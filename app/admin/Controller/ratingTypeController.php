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
        $this->setIdRatingType($data['id_beoordeling_type']);
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
        var_dump($this);
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
    public function delete()
    {
        // TODO: implement here
    }

    /**
     *
     */
    public function getRatingTypeList()
    {
        $results = $this->db->getDbRatingTypeList();
        $results = is_array($results) ? $results : [];
        foreach($results as $result){
            $level_model[$result['id_beoordeling_type']] = new $this;
            $level_model[$result['id_beoordeling_type']]->setRatingTypeFromDatabase($result);
        }
        return $level_model;
    }

    /**
     *
     */
    public function getRatingTypeById()
    {
        // TODO: implement here
    }

}
