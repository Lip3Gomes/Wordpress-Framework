<?php

/**
 * Form Render
 */

class pbo_form_render
{

    function __construtct()
    {
    }

    public function renderInputType($type_input = 'text', $args = array())
    {
        if (isset($args['atributos']['name']) && !empty($args['atributos']['name'] != '')) {

            $output = '';

            if ($type_input == 'checkbox') {
                $output = $this->checkbox($type_input, $args);
            } elseif ($type_input == 'radio') {
                $output = $this->radio($type_input, $args);
            } elseif ($type_input == 'select') {
                $output = $this->select($type_input, $args);
            } elseif ($type_input == 'textarea') {
                $output = $this->textarea($type_input, $args);
            } else {
                $output = $this->input($type_input, $args);
            }
        } else {
            $output = 'Desculpe você deve informar o atributo name para renderizar o form';
        }
        return $output;
    }

    private function checkbox($type = '', $args = array())
    {
        $exist_id = (isset($args['atributos']['id']) && $args['atributos']['id'] != '' ? $args['atributos']['id'] : '');

        if (isset($args['atributos']['value']) && is_array($args['atributos']['value'])) {
            foreach ($args['atributos']['value'] as $key => $value) {

                $output .= '<label>';

                $output .= '<input type="checkbox" name="' . $args['atributos']['name'] . '[]" value="' . $key . '"/>';

                $output .= '<strong> ' . $value . '</strong>';

                $output .= '</label>';
            }
        } else {

            $output = '';

            $output .= '<input type="' . $type . '" ';

            if (isset($args['atributos']) && !empty($args['atributos'])) {
                foreach ($args['atributos'] as $key => $value) {
                    $output .= '' . $key . ' = "' . $value . '"';
                }
            }

            $output .= '';

            $output .= '/>';

            if (isset($args['label']) && $args['label'] != '') {

                $output .= $this->label($args['label'], $exist_id);
            }
        }



        return $output;
    }

    private function radio($type = '', $args = array())
    {
        $exist_id = (isset($args['atributos']['id']) && $args['atributos']['id'] != '' ? $args['atributos']['id'] : '');

        if (isset($args['atributos']['value']) && is_array($args['atributos']['value'])) {
            foreach ($args['atributos']['value'] as $key => $value) {

                $output .= '<label>';

                $output .= '<input type="radio" name="' . $args['atributos']['name'] . '[]" value="' . $key . '"/>';

                $output .= '<strong> ' . $value . '</strong>';

                $output .= '</label>';
            }
        } else {

            $output = '';

            $output .= '<input type="' . $type . '" ';

            if (isset($args['atributos']) && !empty($args['atributos'])) {
                foreach ($args['atributos'] as $key => $value) {
                    $output .= '' . $key . ' = "' . $value . '"';
                }
            }

            $output .= '';

            $output .= '/>';

            if (isset($args['label']) && $args['label'] != '') {

                $output .= $this->label($args['label'], $exist_id);
            }
        }



        return $output;
    }

    private function select($type = '', $args = array())
    {
        $exist_id = (isset($args['atributos']['id']) && $args['atributos']['id'] != '' ? $args['atributos']['id'] : '');

        # Opções para selecionar no select
        $value_select = (isset($args['atributos']['value']) && !empty($args['atributos']['value']) ? $args['atributos']['value'] : '');



        if ($value_select != '') {
            unset($args['atributos']['value']);
        } else {

            $value_select = (isset($args['atributos']['options']) && !empty($args['atributos']['options']) ? $args['atributos']['options'] : '');

            if ($value_select != '') {
                unset($args['atributos']['options']);
            }
        }

        # Quando houver um valor pré selecionado
        $selected = (isset($args['selected']) && $args['selected'] != '' ? $args['selected'] : '');

        $output = '';

        if (isset($args['label']) && $args['label'] != '') {

            $output .= $this->label($args['label'], $exist_id);
        }

        $output .= '<select ';

        if (isset($args['atributos']) && !empty($args['atributos'])) {
            foreach ($args['atributos'] as $key => $value) {
                $output .= '' . $key . ' = "' . $value . '"';
            }
        }

        $output .= '';

        $output .= '>';

        if (is_array($value_select)) {
            foreach ($value_select as $key => $value) {
                $current_option_select = $selected == $key ? 'selected="" ' : '';
                $output .= ' <option ' . $current_option_select . 'value="' . $key . '">' . $value . '</option>';
            }
        }

        $output .= '</select>';


        return $output;
    }


    private function textarea($type = '', $args = array())
    {
        $exist_id = (isset($args['atributos']['id']) && $args['atributos']['id'] != '' ? $args['atributos']['id'] : '');

        $value_textarea = (isset($args['atributos']['value']) && $args['atributos']['value'] != '' ? $args['atributos']['value'] : '');

        if ($value_textarea != '') {
            unset($args['atributos']['value']);
        }

        $output = '';

        if (isset($args['label']) && $args['label'] != '') {

            $output .= $this->label($args['label'], $exist_id);
        }

        $output .= '<textarea ';

        if (isset($args['atributos']) && !empty($args['atributos'])) {
            foreach ($args['atributos'] as $key => $value) {
                $output .= '' . $key . ' = "' . $value . '"';
            }
        }

        $output .= '';
        $output .= '>';
        $output .= $value_textarea;
        $output .= '</textarea>';

        return $output;
    }

    private function input($type = '', $args = array())
    {
        $exist_id = (isset($args['atributos']['id']) && $args['atributos']['id'] != '' ? $args['atributos']['id'] : '');

        $output = '';

        if (isset($args['label']) && $args['label'] != '') {

            $output .= $this->label($args['label'], $exist_id);
        }

        $output .= '<input type="' . $type . '" ';

        if (isset($args['atributos']) && !empty($args['atributos'])) {
            foreach ($args['atributos'] as $key => $value) {
                $output .= '' . $key . ' = "' . $value . '"';
            }
        }

        $output .= '';
        $output .= '/>';

        return $output;
    }


    private function label($label, $id = '')
    {
        $output = '<label ' . ($id ? 'for="' . $id . '"' : '') . '>';
        $output .= $label;
        $output .= '</label>';
        return $output;
    }
}

// $form_render = new pbo_form_render();

// $args = array(
//     'label' => 'checkbox',
//     'atributos' => array(
//         'id' => 'asdas',
//         'value' => array(
//             'banana' => 'Comprar essa banana',
//             'Abacate' => 'Comprar esse Abacate',
//             'Arroz' => 'Comprar essa Arroz'
//         ),
//         'name' => 'checkbox'
//     )
// );
// echo $form_render->renderInputType('checkbox', $args);

// $args = array(
//     'label' => 'radio',
//     'atributos' => array(
//         'id' => 'asdas',
//         'value' => array(
//             'banana' => 'Comprar essa banana',
//             'Abacate' => 'Comprar esse Abacate',
//             'Arroz' => 'Comprar essa Arroz'
//         ),
//         'name' => 'radio'
//     )
// );
// echo $form_render->renderInputType('radio', $args);

// $args = array(
//     'label' => 'select',
//     'atributos' => array(
//         'id' => 'testeSelect',
//         'value' => array(
//             'banana' => 'Comprar essa banana',
//             'Abacate' => 'Comprar esse Abacate',
//             'Arroz' => 'Comprar essa Arroz'
//         ),
//         'name' => 'select'
//     )
// );
// echo $form_render->renderInputType('select', $args);

// $args = array(
//     'label' => 'Textarea',
//     'atributos' => array(
//         'id' => 'teste',
//         'value' => 'teste textarea',
//         'placeholder' => 'Digite um texto',
//         'name' => 'textarea'
//     )
// );
// echo $form_render->renderInputType('textarea', $args);

// $args = array(
//     'label' => 'Label de teste',
//     'atributos' => array(
//         'id' => 'teste',
//         'value' => 'teste',
//         'placeholder' => 'Digite um texto',
//         'name' => 'text'
//     )
// );

// echo $form_render->renderInputType('text', $args);