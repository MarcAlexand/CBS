<?php
namespace CBS\DAO;

/**
 *
 */
class DbRating
{

    /**
     * @var int
     */
    private $idRating;

    /**
     * @var string
     */
    private $dateRating;

    /**
     * @var string
     */
    private $noteRating;

    /*
     * @var int
     */
    private $idRatingType;

    /*
     * @var int
     */
    private $idCoach;

    /*
     * @var int
     */
    private $idStudent;

    /*
     * @var int
     */
    private $idTask;


    /**
     *
     */
    public function __construct()
    {
        global $wpdb;
        $this->wpdb = $wpdb;
    }


    /**
     * @return string
     */
    public function getDateRating()
    {
        return $this->dateRating;
    }

    /**
     * @return mixed
     */
    public function getIdRatingType()
    {
        return $this->idRatingType;
    }

    /**
     * @return mixed
     */
    public function getIdCoach()
    {
        return $this->idCoach;
    }

    /**
     * @return int
     */
    public function getIdRating()
    {
        return $this->idRating;
    }

    /**
     * @return mixed
     */
    public function getIdStudent()
    {
        return $this->idStudent;
    }

    /**
     * @return string
     */
    public function getNoteRating()
    {
        return $this->noteRating;
    }

    /**
     * @return mixed
     */
    public function getIdTask()
    {
        return $this->idTask;
    }

    /**
     * @param mixed $idRatingType
     */
    public function setIdRatingType($idRatingType)
    {
        $this->idRatingType = $idRatingType;
    }

    /**
     * @param string $dateRating
     */
    public function setDateRating($dateRating)
    {
        $this->dateRating = $dateRating;
    }

    /**
     * @param mixed $idCoach
     */
    public function setIdCoach($idCoach)
    {
        $this->idCoach = $idCoach;
    }

    /**
     * @param int $idRating
     */
    public function setIdRating($idRating)
    {
        $this->idRating = $idRating;
    }

    /**
     * @param mixed $idStudent
     */
    public function setIdStudent($idStudent)
    {
        $this->idStudent = $idStudent;
    }

    /**
     * @param string $noteRating
     */
    public function setNoteRating($noteRating)
    {
        $this->noteRating = $noteRating;
    }

    /**
     * @param mixed $idTask
     */
    public function setIdTask($idTask)
    {
        $this->idTask = $idTask;
    }


    /**
     *
     */
    public function createDb()
    {
        global $wpdb;
        if(!$this->wpdb->insert(
            $wpdb->prefix.'ivs_beoordeling',
                [
                    'notitie' => $this->getNoteRating(),
                    'datum' => date("Y-m-d"),
                    'fk_beoordeling_type' => $this->getIdRatingType(),
                    'fk_coach' => $this->getIdCoach(),
                    'fk_opdracht' => $this->getIdTask(),
                    'fk_leerling' => $this->getIdStudent(),
                ]
            )
        ){
            var_dump($this);
            die();
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
    public function getRatingListDb($studentid)
    {
        global $wpdb;
        if(!$results = $this->wpdb->get_results(
            "
            SELECT *
            FROM `". $wpdb->prefix."ivs_beoordeling`
            WHERE `fk_leerling` = $studentid",
            ARRAY_A
        )){
            return false;
        }

        return $results;
    }

    /**
     *
     */
    public function getRatingByIdDb()
    {
        // TODO: implement here
    }
}
