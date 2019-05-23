<?php

class Form {

    function createSelectTag($text, $id, $data, $default, $disabled = false)
    {
        $disabled = ($disabled) ? 'disabled="disabled"' : '';

        $html = "<select size='1' name='$id' id='$id' $disabled>
                    <option value=''>-$text-</option>";
        if (!empty($data)) {
            foreach ($data as $key => $value) {
                $temp_sel = ($default == $key && !empty($default)) ? 'selected' : '';
                $html .= "<option value='$key' $temp_sel>$value</option>";
            }
        }
        $html .= '</select>';
        return $html;
    }

    function RadioTag($name, $value, $default, $text, $disabled = false)
    {
        $checked = ($value == $default) ? 'checked' : '';
        $disabled = ($disabled) ? 'disabled' : '';
        $html = "<label><input type='radio' name='$name' value='$value' $checked $disabled>$text</label>";
        return $html;
    }

    function createRadio($name, $options, $default = '', $disabled = false, $delimiter = '<br>\n')
    {
        $name = htmlentities($name);
        $html = '';
        foreach ($options as $value => $label) {
            $value = htmlentities($value);
            $html .= $this->RadioTag($name, $value, $default, $label, $disabled);
            $html .= $delimiter;
        }
        return $html;
    }

    function CheckboxTag($name, $value, $default, $text, $disabled = false)
    {
        $checked = ($value == $default) ? 'checked' : '';
        $disabled = ($disabled) ? 'disabled' : '';
        $html = "<label><input type='checkbox' name='$name' value='$value' $checked $disabled>$text</label>";
        return $html;
    }

    function createCheckbox($name, $options, $defaults = array(), $disabled = false, $delimiter = ' ')
    {
        $name = htmlentities($name);
        $html = '';
        foreach ($options as $value => $label) {
            $value = htmlentities($value);
            $default = (in_array($value, $defaults)) ? $value : '';
            $html .= $this->CheckboxTag($name, $value, $default, $label, $disabled);
        }
        return $html;
    }
}

$Form = new Form();
?>