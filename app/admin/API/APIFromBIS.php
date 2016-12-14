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

    /**
     *
     */
    public function getStudentList()
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'http://weitjerock:8888/pms/wp-json/pms/v2/students',
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
     *
     */
    public function getTaskList(){
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'http://weitjerock:8888/pms/wp-json/pms/v2/tasks',
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
        $data = json_decode($result);
        return $result;
    }

    public function getMadeTaskList(){
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'http://weitjerock:8888/pms/wp-json/pms/v2/made_tasks',
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

}
