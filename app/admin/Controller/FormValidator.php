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
}