<?php


/**
 *
 */
class APIToBis
{
    function get_students_abroad() {
        $students = get_students();
        if(empty($students)){
            return null;
        }
        return $students;
    }

    function get_made_tasks_tasks_by_studentid($data){

        global $wpdb;
        $results = $wpdb->get_results(
            'SELECT * FROM wp_ivs_opdracht_has_wp_ivs_leerling INNER JOIN wp_ivs_opdracht ON wp_ivs_opdracht_has_wp_ivs_leerling.fk_opdracht = wp_ivs_opdracht.id_opdracht where wp_ivs_opdracht_has_wp_ivs_leerling.fk_leerling = '.$data['id'].'', OBJECT );

        return $results;
    }
}

add_action( 'rest_api_init', function () {
    register_rest_route( 'pms/v2', '/made_task_submission_date_by_taks_student_id/(?P<id>\d+)',
        array(
            'methods' => 'GET',
            'callback' => 'get_made_task_submission_date_by_taks_student_id_abroad',
        )
    );
} );


