<?php

namespace CBS\API;

use CBS\Controller\LinkController;

/**
 *
 */
class APIFromBIS {

    private $Url = 'Backend IVS';
    /*
     * @var api
     */
    public $apiFrom;

    public function __construct()
    {
        $this->ApiUrl = new LinkController();
    }

    public function getMadeTaskList(){
        $this->ApiUrl->getUrlLinkByName('Backend IVS');
        $url = $this->ApiUrl->getUrl(). 'made_tasks/';
        $key = $this->ApiUrl->getAuthKey();
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_FAILONERROR, true);
        curl_setopt($ch, CURLOPT_ENCODING, '');
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: '. $key));

        $result = curl_exec($ch);
        $info = curl_getinfo($ch);
        var_dump($url);
        // Execute and catch curl errors
        if($result == false){
            throw new Exception('Curl error: ' . curl_error($ch) . ' - ' . curl_errno($ch));
        }
        if($httpcode = $info['http_code'] != 200) {
            switch($httpcode){
                case 400:
                    // Bad request missing authorzation key
                    break;
                case 401:
                    // Unauthorized invalid authorization key
                    break;
                default:
                    // Something different
                    break;
            }
            // if response not equals 200 OK
            // notify user
        }
        $key = $this->ApiUrl->getAuthKey();
        $decoded = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($result), MCRYPT_MODE_CBC, md5(md5($key))), "\0");
        $result_array = unserialize($decoded);
        curl_close($ch);
        return $result_array;
    }

    public function getMadeTaskByStudents()
    {
        $this->ApiUrl->getUrlLinkByName('Backend IVS');

        $url = $this->ApiUrl->getUrl(). 'made_tasks_by_students/';
        $key = $this->ApiUrl->getAuthKey();

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_FAILONERROR, true);
        curl_setopt($ch, CURLOPT_ENCODING, '');
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: '. $key));

        $result = curl_exec($ch);

        $info = curl_getinfo($ch);
        // Execute and catch curl errors
        if($result == false){
            throw new Exception('Curl error: ' . curl_error($ch) . ' - ' . curl_errno($ch));
        }

        if($httpcode = $info['http_code'] != 200) {
            switch($httpcode){
                case 400:
                    // Bad request missing authorzation key
                    break;
                case 401:
                    // Unauthorized invalid authorization key
                    break;
                default:
                    // Something different
                    break;
            }
            // if response not equals 200 OK
            // notify user
        }
        $key = $this->ApiUrl->getAuthKey();
        $decoded = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($result), MCRYPT_MODE_CBC, md5(md5($key))), "\0");
        $result_array = unserialize($decoded);

        curl_close($ch);

        return $result_array;
    }

    public function getMadeTaskByTasks()
    {
        $this->ApiUrl->getUrlLinkByName('Backend IVS');

        $url = $this->ApiUrl->getUrl(). 'made_tasks_by_tasks';
        $key = $this->ApiUrl->getAuthKey();

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_FAILONERROR, true);
        curl_setopt($ch, CURLOPT_ENCODING, '');
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: '. $key));

        $result = curl_exec($ch);

        $info = curl_getinfo($ch);
        // Execute and catch curl errors
        if($result == false){
            throw new Exception('Curl error: ' . curl_error($ch) . ' - ' . curl_errno($ch));
        }

        if($httpcode = $info['http_code'] != 200) {
            switch($httpcode){
                case 400:
                    // Bad request missing authorzation key
                    break;
                case 401:
                    // Unauthorized invalid authorization key
                    break;
                default:
                    // Something different
                    break;
            }
            // if response not equals 200 OK
            // notify user
        }

        $key = $this->ApiUrl->getAuthKey();
        $decoded = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($result), MCRYPT_MODE_CBC, md5(md5($key))), "\0");
        $result_array = unserialize($decoded);
        curl_close($ch);

        return $result_array;

    }

    public function getMadeTaskStudentsByTasksId($opdrachtid)
    {
        $this->ApiUrl->getUrlLinkByName('Backend IVS');

        $url = $this->ApiUrl->getUrl(). 'made_tasks_students_by_taskid/'.$opdrachtid.'/';
        $key = $this->ApiUrl->getAuthKey();

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_FAILONERROR, true);
        curl_setopt($ch, CURLOPT_ENCODING, '');
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: '. $key));

        $result = curl_exec($ch);

        $info = curl_getinfo($ch);
        // Execute and catch curl errors
        if($result == false){
            throw new Exception('Curl error: ' . curl_error($ch) . ' - ' . curl_errno($ch));
        }

        if($httpcode = $info['http_code'] != 200) {
            switch($httpcode){
                case 400:
                    // Bad request missing authorzation key
                    break;
                case 401:
                    // Unauthorized invalid authorization key
                    break;
                default:
                    // Something different
                    break;
            }
            // if response not equals 200 OK
            // notify user
        }
        $key = $this->ApiUrl->getAuthKey();
        $decoded = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($result), MCRYPT_MODE_CBC, md5(md5($key))), "\0");
        $result_array = unserialize($decoded);
        $result_data = json_decode($result);
        curl_close($ch);

        return $result_array;
    }

    public function getMadeTaskStudentsByStudentTaskId($opdrachtid)
    {
        $this->ApiUrl->getUrlLinkByName('Backend IVS');

        $url = $this->ApiUrl->getUrl(). 'made_task_student_by_student_task_id/'.$opdrachtid.'/';
        $key = $this->ApiUrl->getAuthKey();

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_FAILONERROR, true);
        curl_setopt($ch, CURLOPT_ENCODING, '');
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: '. $key));

        $result = curl_exec($ch);

        $info = curl_getinfo($ch);
        // Execute and catch curl errors
        if($result == false){
            throw new Exception('Curl error: ' . curl_error($ch) . ' - ' . curl_errno($ch));
        }

        if($httpcode = $info['http_code'] != 200) {
            switch($httpcode){
                case 400:
                    // Bad request missing authorzation key
                    break;
                case 401:
                    // Unauthorized invalid authorization key
                    break;
                default:
                    // Something different
                    break;
            }
            // if response not equals 200 OK
            // notify user
        }
        $key = $this->ApiUrl->getAuthKey();
        $decoded = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($result), MCRYPT_MODE_CBC, md5(md5($key))), "\0");
        $result_array = unserialize($decoded);
        $result_data = json_decode($result);
        curl_close($ch);

//        var_dump($result_data);
        return $result_array;
    }

    public function getMadeTaskId($opdrachtid)
    {
        $this->ApiUrl->getUrlLinkByName('Backend IVS');

        $url = $this->ApiUrl->getUrl(). 'made_taskid/'.$opdrachtid.'/';
        $key = $this->ApiUrl->getAuthKey();

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_FAILONERROR, true);
        curl_setopt($ch, CURLOPT_ENCODING, '');
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: '. $key));

        $result = curl_exec($ch);

        $info = curl_getinfo($ch);
        // Execute and catch curl errors
        if($result == false){
            throw new Exception('Curl error: ' . curl_error($ch) . ' - ' . curl_errno($ch));
        }

        if($httpcode = $info['http_code'] != 200) {
            switch($httpcode){
                case 400:
                    // Bad request missing authorzation key
                    break;
                case 401:
                    // Unauthorized invalid authorization key
                    break;
                default:
                    // Something different
                    break;
            }
            // if response not equals 200 OK
            // notify user
        }
        $key = $this->ApiUrl->getAuthKey();
        $decoded = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($result), MCRYPT_MODE_CBC, md5(md5($key))), "\0");
        $result_array = unserialize($decoded);
        $result_data = json_decode($result);
        curl_close($ch);

        return $result_array;
    }

    public function getMadeTaskByTaskId($opdrachtid)
    {
        $this->ApiUrl->getUrlLinkByName('Backend IVS');

        $url = $this->ApiUrl->getUrl(). 'made_task_by_task_id/'.$opdrachtid.'/';
        $key = $this->ApiUrl->getAuthKey();
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_FAILONERROR, true);
        curl_setopt($ch, CURLOPT_ENCODING, '');
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: '. $key));

        $result = curl_exec($ch);

        $info = curl_getinfo($ch);
        // Execute and catch curl errors
        if($result == false){
            throw new Exception('Curl error: ' . curl_error($ch) . ' - ' . curl_errno($ch));
        }

        if($httpcode = $info['http_code'] != 200) {
            switch($httpcode){
                case 400:
                    // Bad request missing authorzation key
                    break;
                case 401:
                    // Unauthorized invalid authorization key
                    break;
                default:
                    // Something different
                    break;
            }
            // if response not equals 200 OK
            // notify user
        }

        $key = $this->ApiUrl->getAuthKey();
        $decoded = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($result), MCRYPT_MODE_CBC, md5(md5($key))), "\0");
        $result_array = unserialize($decoded);
        $result_data = json_decode($result);
        curl_close($ch);
        return $result_array;
    }

    public function getMadeTasksByStudentId($studentid)
    {
        $this->ApiUrl->getUrlLinkByName('Backend IVS');

        $url = $this->ApiUrl->getUrl(). 'made_task_by_student_id/'.$studentid.'/';
        $key = $this->ApiUrl->getAuthKey();

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_FAILONERROR, true);
        curl_setopt($ch, CURLOPT_ENCODING, '');
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: '. $key));

        $result = curl_exec($ch);
        $info = curl_getinfo($ch);
        // Execute and catch curl errors
        if($result == false){
            throw new Exception('Curl error: ' . curl_error($ch) . ' - ' . curl_errno($ch));
        }

        if($httpcode = $info['http_code'] != 200) {
            switch($httpcode){
                case 400:
                    // Bad request missing authorzation key
                    break;
                case 401:
                    // Unauthorized invalid authorization key
                    break;
                default:
                    // Something different
                    break;
            }
            // if response not equals 200 OK
            // notify user
        }
        $key = $this->ApiUrl->getAuthKey();
        $decoded = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($result), MCRYPT_MODE_CBC, md5(md5($key))), "\0");
        $result_array = unserialize($decoded);
        curl_close($ch);
        return $result_array;

    }

    public function getMadeTaskSubmussionDateByTaskStudentId($opdrachtid)
    {
        $this->ApiUrl->getUrlLinkByName('Backend IVS');

        $url = $this->ApiUrl->getUrl(). 'made_task_submission_date_by_taks_student_id/'.$opdrachtid.'/';
        $key = $this->ApiUrl->getAuthKey();

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_FAILONERROR, true);
        curl_setopt($ch, CURLOPT_ENCODING, '');
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: '. $key));

        $result = curl_exec($ch);

        $info = curl_getinfo($ch);
        // Execute and catch curl errors
        if($result == false){
            throw new Exception('Curl error: ' . curl_error($ch) . ' - ' . curl_errno($ch));
        }

        if($httpcode = $info['http_code'] != 200) {
            switch($httpcode){
                case 400:
                    // Bad request missing authorzation key
                    break;
                case 401:
                    // Unauthorized invalid authorization key
                    break;
                default:
                    // Something different
                    break;
            }
            // if response not equals 200 OK
            // notify user
        }
        $key = $this->ApiUrl->getAuthKey();
        $decoded = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($result), MCRYPT_MODE_CBC, md5(md5($key))), "\0");
        $result_array = unserialize($decoded);
        curl_close($ch);
        return $result_array;
    }

    public function getLevelList(){
        $this->ApiUrl->getUrlLinkByName('Backend IVS');

        $url = $this->ApiUrl->getUrl(). 'level/';
        $key = $this->ApiUrl->getAuthKey();

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_FAILONERROR, true);
        curl_setopt($ch, CURLOPT_ENCODING, '');
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: '. $key));

        $result = curl_exec($ch);
        $info = curl_getinfo($ch);
        // Execute and catch curl errors
        if($result == false){
            throw new Exception('Curl error: ' . curl_error($ch) . ' - ' . curl_errno($ch));
        }

        if($httpcode = $info['http_code'] != 200) {
            switch($httpcode){
                case 400:
                    // Bad request missing authorzation key
                    break;
                case 401:
                    // Unauthorized invalid authorization key
                    break;
                default:
                    // Something different
                    break;
            }
            // if response not equals 200 OK
            // notify user
        }
        $key = $this->ApiUrl->getAuthKey();
        $decoded = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($result), MCRYPT_MODE_CBC, md5(md5($key))), "\0");
        $result_array = unserialize($decoded);

        curl_close($ch);


        return $result_array;
    }
}
