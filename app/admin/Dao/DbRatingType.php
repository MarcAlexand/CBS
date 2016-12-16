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
    protected $nameRatingTyoe;


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
    public function createDb($data)
    {
        global $wpdb;
        if(!$this->wpdb->insert(
            $wpdb->prefix.'ivs_beoordelings_type',
            ['naam' => $this->getRatingTypeName()]
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
     *
     */
    public function getRatingTypeId()
    {
        // TODO: implement here
    }

    /**
     *
     */
    public function getRatingTypeName()
    {
        // TODO: implement here
    }

    /**
     *
     */
    public function setRatingTypeId()
    {
        // TODO: implement here
    }

    /**
     *
     */
    public function setRatingTypeName()
    {
        // TODO: implement here
    }
}
