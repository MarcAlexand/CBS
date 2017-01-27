<?php

namespace CBS\Controller;

use CBS\DAO\DbLink;


/**
 *
 */
class LinkController
{

    /**
     * @var void
     */
    private $id;

    /**
     * @var void
     */
    private $name;

    /*
     * @var string
     */
    private $shortcode;

    /**
     * @var void
     */
    private $url;

    /**
     * @var void
     */
    private $authKey;

    /**
     *
     */
    public function __construct()
    {
        $this->db = new DbLink();
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
     * @return mixed
     */
    public function getShortcode()
    {
        return $this->shortcode;
    }

    /**
     * @param mixed $shortcode
     */
    public function setShortcode($shortcode)
    {
        $this->shortcode = $shortcode;
    }

    /**
     * @param $data
     */
    public function setApiUrlLinkFromDatabase($data)
    {
        $this->setId($data['id_api_link']);
        $this->setName($data['api_link_naam']);
        $this->setShortcode($data['api_link_systeem_afkorting']);
        $this->setUrl($data['api_link_url']);
        $this->setAuthKey($data['api_link_sleutel']);
    }

    /**
     * Fills the model with data.
     *
     * @param $data
     */
    public function setApiUrlLinkToDatabase($data)
    {
        $this->setName($data['api_link_naam']);
        $this->setShortcode($data['api_link_systeem_afkorting']);
        $this->setUrl($data['api_link_url']);
        $this->setAuthKey($data['api_link_sleutel']);
    }

    /**
     *
     */
    public function create()
    {
        $this->db->setName($this->name);
        $this->db->setShortcode($this->shortcode);
        $this->db->setUrl($this->url);
        $this->db->setAuthKey($this->authKey);
        $this->db->createDb();
    }

    /**
     *
     */
    public function update($data)
    {
        $this->setApiUrlLinkToDatabase($data);
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
    public function getUrlLinkById($id)
    {
        $data = $this->db->getUrlLinkById($id);
        $this->setApiUrlLinkFromDatabase($data);
        return $this;
    }

    /**
     *
     */
    public function getUrlLinkByName($info)
    {
        $data = $this->db->getUrlLinkByName($info);
        $this->setApiUrlLinkFromDatabase($data);
        return $this;
    }

    /**
     *
     */
    public function getList()
    {
        $results = $this->db->getList();
        $results = is_array($results) ? $results : [];
        foreach($results as $result){
            $api_model[$result['id_api_link']] = new $this;
            $api_model[$result['id_api_link']]->setApiUrlLinkFromDatabase($result);
        }
        return $api_model;
    }


}
