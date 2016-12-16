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
}