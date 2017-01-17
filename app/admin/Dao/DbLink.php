<?php

namespace CBS\DAO;

/**
 *
 */
class DbLink
{

    /**
     * @var void
     */
    public $id;

    /**
     * @var void
     */
    public $name;

    /**
     * @var void
     */
    public $url;

    /**
     * @var void
     */
    public $authKey;



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
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param void $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return void
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param void $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return void
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param void $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return void
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @param void $authKey
     */
    public function setAuthKey($authKey)
    {
        $this->authKey = $authKey;
    }


    /**
     *
     */
    public function createDB()
    {
        global $wpdb;
        if(!$this->wpdb->insert(
            $wpdb->prefix.'ivs_api_link',
            ['api_link_naam' => $this->getName(),
            'api_link_url' => $this->getUrl(),
            'api_link_sleutel' => $this->getAuthKey()]
        )
        ){
            return false;
        }
        return $this->wpdb->insert_id;
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
    public function update($data)
    {
        global $wpdb;
        $this->wpdb->query(
            "UPDATE `". $wpdb->prefix."ivs_api_link`
              SET `api_link_naam` = '". $data['api_link_naam']. "',
                  `api_link_url` = '". $data['api_link_url']."',
                  `api_link_sleutel` = '".$data['api_link_sleutel']."'
              WHERE `". $wpdb->prefix."ivs_api_link`.`id_api_link` = ".$data['id_api_link'].";"
        );
    }

    /**
     *
     */
    public function delete($data)
    {
        global $wpdb;
        $this->wpdb->query(
            "DELETE FROM `". $wpdb->prefix."ivs_api_link`
                WHERE id_api_link = $data
                 "
        );
    }

    /**
     *
     */
    public function getUrlLinkById($id)
    {
        global $wpdb;
        if(!$result = $this->wpdb->get_row(
            "SELECT * FROM `". $wpdb->prefix."ivs_api_link` WHERE `id_api_link` = $id",
            ARRAY_A
        )){
            return false;
        }
        return $result;
    }

    /**
     *
     */
    public function getUrlLinkByName()
    {
        // TODO: implement here
    }

    /**
     *
     */
    public function getList()
    {
        global $wpdb;
        if(!$results = $this->wpdb->get_results(
            "
            SELECT *
            FROM `". $wpdb->prefix."ivs_api_link`
            ",
            ARRAY_A
        )){
            return false;
        }
        return $results;
    }
}
