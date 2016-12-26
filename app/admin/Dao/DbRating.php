<?php
namespace CBS\DAO;

use CBS\Controller\ratingController;

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
    private $idStudentTask;

    /*
     * @var int
     */
    private $idTask;

    /*
     * @var int
     */
    private $idStudent;

    /*
     * @var int
     */
    private $total;


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
     * @return string
     */
    public function getNoteRating()
    {
        return $this->noteRating;
    }

    /**
     * @return mixed
     */
    public function getIdStudentTask()
    {
        return $this->idStudentTask;
    }

    /**
     * @return mixed
     */
    public function getIdTask()
    {
        return $this->idTask;
    }

    /**
     * @return student id
     */
    public function getIdStudent()
    {
        return $this->idStudent;
    }

    /**
     * @return total rated task
     */
    public function getTotal()
    {
        return $this->total;
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
     * @param string $noteRating
     */
    public function setNoteRating($noteRating)
    {
        $this->noteRating = $noteRating;
    }

    /**
     * @param mixed $idStudentTask
     */
    public function setIdStudentTask($idStudentTask)
    {
        $this->idStudentTask = $idStudentTask;
    }

    /**
     * @param mixed $idTask
     */
    public function setIdTask($idTask)
    {
        $this->idTask = $idTask;
    }

    /**
     * @param mixed $idStudent
     */
    public function setIdStudent($idStudent)
    {
        $this->idStudent = $idStudent;
    }

    /**
     * @param mixed $total
     */
    public function setTotal($total)
    {
        $this->total = $total;
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
                'fk_leerling_opdracht' =>  $this->getIdStudentTask(),
                'fk_opdracht' => $this->getIdTask(),
                'fk_leerling' => $this->getIdStudent()
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
    public function updateDb()
    {
        // TODO: implement here
    }

    /**
     *
     */
    public function getRatingListDb()
    {
        global $wpdb;
        if(!$results = $this->wpdb->get_results(
            "
            SELECT *
            FROM `". $wpdb->prefix."ivs_beoordeling`
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
    public function getRatingListByStudentIdDb($studentid)
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

    public function getRatedTaskListByStudentAndTaskIdDb($studentid,$task){
        global $wpdb;
        if(!$results = $this->wpdb->get_results(
            "
            SELECT *
            FROM `". $wpdb->prefix."ivs_beoordeling`
            WHERE `fk_opdracht` = $task
            AND `fk_leerling`= $studentid",
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

    /**
     * @return Rate Counter By Student Id
     */
    public function getRateCounterByStudentIdDb($student_id)
    {
        global $wpdb;
        if(!$results = $this->wpdb->get_results(
            "
            SELECT fk_leerling,count(*) AS total
            FROM `". $wpdb->prefix."ivs_beoordeling`
            WHERE `fk_leerling` = $student_id GROUP BY fk_leerling",
            ARRAY_A
        )){

            return false;
        }
        foreach ($results as $idx => $row){
            $counter =  new ratingController();
            $counter->setIdStudent($row['fk_leerling']);
            $counter->setTotal($row['total']);
        }
        return $counter;

    }

    public function getGoodRatedGradesByStudentIdDb($student_id){
        global $wpdb;
        if(!$results = $this->wpdb->get_results(
            "
            SELECT COUNT('.$wpdb->prefix.'ivs_beoordelings_type.naam) AS grade
            FROM `". $wpdb->prefix."ivs_beoordeling`
            INNER JOIN '.$wpdb->prefix.'ivs_beoordelings_type 
            ON ". $wpdb->prefix."ivs_beoordeling.fk_beoordeling_type=". $wpdb->prefix."ivs_beoordelings_type.id_beoordelings_type where '.$wpdb->prefix.'ivs_beoordeling.fk_leerling = $student_id AND '.$wpdb->prefix.'ivs_beoordeling.fk_beoordeling_type <> 3",
            ARRAY_A
        )){

            return false;
        }
        foreach ($results as $idx => $row){
            $grades =  new ratingController();
            $grades->setGrade($row['grade']);
        }
        return $grades;
    }
}
