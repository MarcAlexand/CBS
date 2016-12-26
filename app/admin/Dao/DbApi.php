<?php

namespace CBS\DAO;

/**
 *
 */
class DbApi
{
    /*
     * @var string
     */
    private $url;

    /*
     * @var string
     */
    private $user;

    /*
     * @var string
     */
    private $password;

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
    public function dbCreate($url, $use, $password)
    {
        global $wpdb;
        if(!$results = $this->wpdb->get_results(
            "
            SELECT *
            FROM `". $wpdb->prefix."ivs_api_info`
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
