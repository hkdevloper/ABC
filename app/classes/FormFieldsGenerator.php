<?php

namespace App\classes;

class FormFieldsGenerator
{
    // Function to generate CheckBox Field
    public function CheckBox($fieldName, $label, $value = '1', $isChecked = false)
    {
        $checkbox = '<div class="form-check">';
        $checkbox .= '<input type="checkbox" name="' . $fieldName . '" id="' . $fieldName . '" value="' . $value . '"';

        if ($isChecked) {
            $checkbox .= ' checked';
        }

        $checkbox .= '>';
        $checkbox .= '<label class="form-check-label" for="' . $fieldName . '">' . $label . '</label>';
        $checkbox .= '</div>';

        return $checkbox;
    }




}
