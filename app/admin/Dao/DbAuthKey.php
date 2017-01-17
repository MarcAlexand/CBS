<?php

namespace CBS\DAO;

/**
 *
 */
class DbAuthKey
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
    public $shortName;

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
     * @return void
     */
    public function getShortName()
    {
        return $this->shortName;
    }

    /**
     * @param void $shortName
     */
    public function setShortName($shortName)
    {
        $this->shortName = $shortName;
    }




    /**
     *
     */
    public function createDB()
    {
        global $wpdb;
        if(!$this->wpdb->insert(
            $wpdb->prefix.'ivs_auth_sleutel',
            ['auth_sleutel_naam' => $this->getName(),
                'auth_sleutel_systeem_afkorting' => $this->getShortName(),
                'auth_sleutel_code' => $this->getAuthKey()]
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
            "UPDATE `". $wpdb->prefix."ivs_auth_sleutel`
              SET `auth_sleutel_naam` = '". $data['auth_sleutel_naam']. "',
                  `auth_sleutel_systeem_afkorting` = '". $data['auth_sleutel_systeem_afkorting']. "',
                  `auth_sleutel_code` = '".$data['auth_sleutel_code']."'
              WHERE `". $wpdb->prefix."ivs_auth_sleutel`.`id_auth_sleutel` = ".$data['id_auth_sleutel'].";"
        );
    }

    /**
     *
     */
    public function delete($data)
    {
        global $wpdb;
        $this->wpdb->query(
            "DELETE FROM `". $wpdb->prefix."ivs_auth_sleutel`
                WHERE id_auth_sleutel = $data
                 "
        );
    }

    /**
     *
     */
    public function getAuthKeyById($id)
    {
        global $wpdb;
        if(!$result = $this->wpdb->get_row(
            "SELECT * FROM `". $wpdb->prefix."ivs_auth_sleutel` WHERE `id_auth_sleutel` = $id",
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
            FROM `". $wpdb->prefix."ivs_auth_sleutel`
            ",
            ARRAY_A
        )){
            return false;
        }
        return $results;
    }
}
