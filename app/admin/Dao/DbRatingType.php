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
    public function updateDb($beoordelingstype)
    {
        global $wpdb;
        $this->wpdb->query(
            "UPDATE `". $wpdb->prefix."ivs_beoordelings_type`
              SET `naam` = '". $beoordelingstype['naam']. "'
              WHERE `". $wpdb->prefix."ivs_beoordelings_type`.`id_beoordelings_type` = '".$beoordelingstype['id_beoordelings_type']."';"
        );
    }

    /**
     *
     */
    public function deleteDb($beoordelings_type)
    {

        global $wpdb;
        $this->wpdb->query(
            "DELETE FROM `". $wpdb->prefix."ivs_beoordelings_type`
                WHERE id_beoordelings_type = $beoordelings_type
                 "
        );
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
    public function getDbRatingTypeById($beoordelings_id)
    {
        global $wpdb;
        if(!$result = $this->wpdb->get_row(
            "SELECT * FROM `". $wpdb->prefix."ivs_beoordelings_type` WHERE `id_beoordelings_type` = $beoordelings_id",
            ARRAY_A
        )){
            return false;
        }
        return $result;
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
