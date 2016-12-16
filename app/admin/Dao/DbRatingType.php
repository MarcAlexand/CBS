<?php

namespace CBS\DAO;
/**
 *
 */
class DbRatingType
{

    /**
     * @var void
     */
    protected $idRatingType;

    /**
     * @var void
     */
    protected $nameRatingType;


    /**
     *
     */
    public function __construct()
    {
        global $wpdb;
        $this->wpdb = $wpdb;
    }

    /**
     *
     */
    public function createDb()
    {
        global $wpdb;
        if(!$this->wpdb->insert(
            $wpdb->prefix.'ivs_beoordelings_type',
            ['naam' => $this->getNameRatingType()]
        )
        ){
            return false;
        }
        return $this->wpdb->insert_id;
    }

    /**
     *
     */
    public function updateDb()
    {
        // TODO: implement here
    }

    /**
     *
     */
    public function deleteDb()
    {
        // TODO: implement here
    }

    /**
     *
     */
    public function getDbRatingTypeList()
    {
        global $wpdb;
        if(!$results = $this->wpdb->get_results(
            "
            SELECT *
            FROM `". $wpdb->prefix."ivs_beoordelings_type`
            ",
            ARRAY_A
        )){
            return false;
        }
        return $results;
    }

    /**
     *
     */
    public function getDbRatingTypeById()
    {
        // TODO: implement here
    }


    /**
     * @return void
     */
    public function getIdRatingType()
    {
        return $this->idRatingType;
    }

    /**
     * @return void
     */
    public function getNameRatingType()
    {
        return $this->nameRatingType;
    }


    /**
     * @param void $idRatingType
     */
    public function setIdRatingType($idRatingType)
    {
        $this->idRatingType = $idRatingType;
    }

    /**
     * @param void $nameRatingTyoe
     */
    public function setNameRatingType($nameRatingTyoe)
    {
        $this->nameRatingType = $nameRatingTyoe;
    }
}
