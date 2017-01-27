<?php
/**
 * Class FormValidator.php
 *
 * Class documentation
 *
 * @author: Marc de Boer
 * @since: 17/11/2016
 * @version 0.1 24/02/2016 Initial class definition.
 */

namespace CBS\Controller;


class FormValidator
{
    /**
     * This validator is only for the address form.
     * Validate every value from the $_POST.
     *
     * @return mixed
     */
    public function ratingTypeCreateFormValidator()
    {
        $validate = [
            'naam' => FILTER_SANITIZE_STRING,
        ];

        return filter_input_array(INPUT_POST, $validate);
    }

    /**
     * This validator is only for the address form.
     * Validate every value from the $_POST.
     *
     * @return mixed
     */
    public function ratingTypeEditFormValidator()
    {
        $validate = [
            'id_beoordelings_type' => FILTER_SANITIZE_NUMBER_INT,
            'naam' => FILTER_SANITIZE_STRING,
        ];

        return filter_input_array(INPUT_POST, $validate);
    }

    /**
     * This validator is only for the address form.
     * Validate every value from the $_POST.
     *
     * @return mixed
     */
    public function ratingCreateFormValidator()
    {
        $validate = [
            'coachid' => FILTER_SANITIZE_NUMBER_INT,
            'studentid' => FILTER_SANITIZE_NUMBER_INT,
            'opdrachtid' => FILTER_SANITIZE_NUMBER_INT,
            'grade' => FILTER_SANITIZE_NUMBER_INT,
            'opmerking' => FILTER_SANITIZE_STRING,

        ];

        return filter_input_array(INPUT_POST, $validate);
    }

    /**
     * This validator is only for the address form.
     * Validate every value from the $_POST.
     *
     * @return mixed
     */
    public function ratingEditFormValidator()
    {
        $validate = [
            'coachid' => FILTER_SANITIZE_NUMBER_INT,
            'opdracht_leerling_id' => FILTER_SANITIZE_NUMBER_INT,
            'beoordeling_id' => FILTER_SANITIZE_NUMBER_INT,
            'grade' => FILTER_SANITIZE_NUMBER_INT,
            'opmerking' => FILTER_SANITIZE_STRING
        ];

        return filter_input_array(INPUT_POST, $validate);
    }

    /**
     * This validator is only for the address form.
     * Validate every value from the $_POST.
     *
     * @return mixed
     */
    public function apiCreateFormValidator()
    {
        $validate = [
            'api_link_naam' => FILTER_SANITIZE_STRING,
            'api_link_url' => FILTER_SANITIZE_STRING,
            'api_link_sleutel' => FILTER_SANITIZE_STRING
        ];

        return filter_input_array(INPUT_POST, $validate);
    }

    /**
     * This validator is only for the address form.
     * Validate every value from the $_POST.
     *
     * @return mixed
     */
    public function apiEditFormValidator()
    {
        $validate = [
            'id_api_link' => FILTER_SANITIZE_NUMBER_INT,
            'api_link_naam' => FILTER_SANITIZE_STRING,
            'api_link_systeem_afkorting' => FILTER_SANITIZE_STRING,
            'api_link_url' => FILTER_SANITIZE_STRING,
            'api_link_sleutel' => FILTER_SANITIZE_STRING
        ];

        return filter_input_array(INPUT_POST, $validate);
    }

    /**
     * This validator is only for the address form.
     * Validate every value from the $_POST.
     *
     * @return mixed
     */
    public function authSleutelCreateFormValidator()
    {
        $validate = [
            'auth_sleutel_naam' => FILTER_SANITIZE_STRING,
            'auth_sleutel_systeem_afkorting' => FILTER_SANITIZE_STRING,
            'auth_sleutel_code' => FILTER_SANITIZE_STRING
        ];

        return filter_input_array(INPUT_POST, $validate);
    }

    /**
     * This validator is only for the address form.
     * Validate every value from the $_POST.
     *
     * @return mixed
     */
    public function authSleutelEditFormValidator()
    {
        $validate = [
            'id_auth_sleutel' => FILTER_SANITIZE_NUMBER_INT,
            'auth_sleutel_naam' => FILTER_SANITIZE_STRING,
            'auth_sleutel_systeem_afkorting' => FILTER_SANITIZE_STRING,
            'auth_sleutel_code' => FILTER_SANITIZE_STRING
        ];

        return filter_input_array(INPUT_POST, $validate);
    }

    /**
     * This validator is only for the address form.
     * Validate every value from the $_POST.
     *
     * @return mixed
     */
    public function levelEditFormValidator()
    {
        $validate = [
            'id_level_criteria' => FILTER_SANITIZE_NUMBER_INT,
            'totaal_opdracht' => FILTER_SANITIZE_NUMBER_INT,
            'type_opdracht_aantal' => FILTER_SANITIZE_NUMBER_INT,
            'categorie_opdracht_aantal' => FILTER_SANITIZE_NUMBER_INT
        ];

        return filter_input_array(INPUT_POST, $validate);
    }
}