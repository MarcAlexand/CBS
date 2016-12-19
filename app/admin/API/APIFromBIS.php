<?php

namespace CBS\API;

/**
 *
 */
class APIFromBIS
{
    /*
     * @var api
     */
    public $apiFrom;


    public function getMadeTaskListById($studentid){
        $url = 'http://weitjerock:8888/pms/wp-json/pms/v2/made_tasks_students_by_taskid/'.$studentid.'/';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_FAILONERROR, true);
        curl_setopt($ch, CURLOPT_ENCODING, '');

        // Execute and catch curl errors
        if(($result = curl_exec($ch)) === false){
            throw new Exception('Curl error: ' . curl_error($ch) . ' - ' . curl_errno($ch));
        }
        curl_close($ch);
        $result = json_decode($result);
        return $result;
    }

    /**
     * @return mixed
     */
    public function getMadeTaskByStudents()
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'http://weitjerock:8888/pms/wp-json/pms/v2/made_tasks_by_students',
            CURLOPT_SSL_VERIFYPEER => TRUE,
            CURLOPT_SSL_VERIFYHOST => 2, // Use 2, 1 is deprecated
            CURLOPT_FAILONERROR => true,
            CURLOPT_ENCODING => '', // Do not send Accept-Encoding header to API, due to CRIME / BREACH attacks (see Mollie API)
//        CURLOPT_POSTFIELDS => $customer_details
        ));

        // Execute and catch curl errors
        if(($result = curl_exec($curl)) === false){
            throw new Exception('Curl error: ' . curl_error($curl) . ' - ' . curl_errno($curl));
        }
        curl_close($curl);
        $result = json_decode($result);
        return $result;
    }

    /**
     * @return mixed
     */
    public function getMadeTaskByTasks()
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'http://weitjerock:8888/pms/wp-json/pms/v2/made_tasks_by_tasks',
            CURLOPT_SSL_VERIFYPEER => TRUE,
            CURLOPT_SSL_VERIFYHOST => 2, // Use 2, 1 is deprecated
            CURLOPT_FAILONERROR => true,
            CURLOPT_ENCODING => '', // Do not send Accept-Encoding header to API, due to CRIME / BREACH attacks (see Mollie API)
//        CURLOPT_POSTFIELDS => $customer_details
        ));

        // Execute and catch curl errors
        if(($result = curl_exec($curl)) === false){
            throw new Exception('Curl error: ' . curl_error($curl) . ' - ' . curl_errno($curl));
        }
        curl_close($curl);
        $result = json_decode($result);
        return $result;
    }

    /**
     * @return mixed
     */
    public function getMadeTaskStudentsByTasksId($opdrachtid)
    {
        $url = 'http://weitjerock:8888/pms/wp-json/pms/v2/made_tasks_students_by_taskid/'.$opdrachtid.'/';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_FAILONERROR, true);
        curl_setopt($ch, CURLOPT_ENCODING, '');

        // Execute and catch curl errors
        if(($result = curl_exec($ch)) === false){
            throw new Exception('Curl error: ' . curl_error($ch) . ' - ' . curl_errno($ch));
        }
        curl_close($ch);
        $result = json_decode($result);
        return $result;
    }

    /**
     * @return mixed
     */
    public function getMadeTaskId($opdrachtid)
    {
        $url = 'http://weitjerock:8888/pms/wp-json/pms/v2/made_taskid/'.$opdrachtid.'/';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_FAILONERROR, true);
        curl_setopt($ch, CURLOPT_ENCODING, '');

        // Execute and catch curl errors
        if(($result = curl_exec($ch)) === false){
            throw new Exception('Curl error: ' . curl_error($ch) . ' - ' . curl_errno($ch));
        }
        curl_close($ch);
        $result = json_decode($result);
        return $result;
    }

    /**
     * @return mixed
     */
    public function getMadeTasksByStudentId($studentid)
    {
        $url = 'http://weitjerock:8888/pms/wp-json/pms/v2/made_task_by_student_id/'.$studentid.'/';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_FAILONERROR, true);
        curl_setopt($ch, CURLOPT_ENCODING, '');

        // Execute and catch curl errors
        if(($result = curl_exec($ch)) === false){
            throw new Exception('Curl error: ' . curl_error($ch) . ' - ' . curl_errno($ch));
        }
        curl_close($ch);
        $result = json_decode($result);
        return $result;
    }

}
