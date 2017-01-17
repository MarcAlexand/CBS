<?php

namespace CBS\Controller;

use CBS\DAO\DbAuthKey;


/**
 *
 */
class AuthKeyController{

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
        $this->db = new DbAuthKey();
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
     * @param $data
     */
    public function setAuthSleutelFromDatabase($data)
    {
        $this->setId($data['id_auth_sleutel']);
        $this->setName($data['auth_sleutel_naam']);
        $this->setShortName($data['auth_sleutel_systeem_afkorting']);
        $this->setAuthKey($data['auth_sleutel_code']);
    }

    /**
     * Fills the model with data.
     *
     * @param $data
     */
    public function setAuthKeyToDatabase($data)
    {
        $this->setId($data['id_auth_sleutel']);
        $this->setName($data['auth_sleutel_naam']);
        $this->setShortName($data['auth_sleutel_systeem_afkorting']);
        $this->setAuthKey($data['api_link_sleutel']);
    }

    /**
     *
     */
    public function create()
    {
        $this->db->setName($this->name);
        $this->db->setAuthKey($this->authKey);
        $this->db->setShortName($this->shortName);
        $this->db->createDb();
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
        $this->setAuthKeyToDatabase($data);
        $this->db->update($data);
    }

    /**
     *
     */
    public function delete($data)
    {
        $this->db->delete($data);
    }

    /**
     *
     */
    public function getAuthKeyById($id)
    {
        $data = $this->db->getAuthKeyById($id);
        $this->setAuthSleutelFromDatabase($data);
        return $this;
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
        $results = $this->db->getList();
        $results = is_array($results) ? $results : [];
        foreach($results as $result){
            $api_model[$result['id_auth_sleutel']] = new $this;
            $api_model[$result['id_auth_sleutel']]->setAuthSleutelFromDatabase($result);
        }
        return $api_model;
    }
}
