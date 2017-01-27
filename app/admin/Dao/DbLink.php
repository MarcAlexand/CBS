<?php

namespace CBS\DAO;

/**
 *
 */
class DbLink
{

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /*
     * @var string
     */
    private $shortcode;

    /**
     * @var string
     */
    private $url;

    /**
     * @var string
     */
    private $authKey;



    /**
     *
     */
    public function __construct()
    {
        global $wpdb;
        $this->wpdb = $wpdb;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @param string $authKey
     */
    public function setAuthKey($authKey)
    {
        $this->authKey = $authKey;
    }

    /**
     * @return string
     */
    public function getShortcode()
    {
        return $this->shortcode;
    }

    /**
     * @param string $shortcode
     */
    public function setShortcode($shortcode)
    {
        $this->shortcode = $shortcode;
    }

    /**
     *
     */
    public function createDB()
    {
        global $wpdb;
        if(
            !$this->wpdb->insert(
                $wpdb->prefix.'ivs_api_link',[
                    'api_link_naam' => $this->getName(),
                    'api_link_systeem_afkorting' => $this->getShortcode(),
                    'api_link_url' => $this->getUrl(),
                    'api_link_sleutel' => $this->getAuthKey()
                ]
            )
        ){
            return false;
        }
        return $this->wpdb->insert_id;
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
                  `api_link_systeem_afkorting` = '". $data['api_link_systeem_afkorting']."',
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
    public function getUrlLinkByName($info)
    {
        global $wpdb;
        if(!$result = $this->wpdb->get_row(
            "SELECT * FROM `". $wpdb->prefix."ivs_api_link` WHERE `api_link_naam` = '$info'",
            ARRAY_A
        )){
            return false;
        }
        return $result;
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
