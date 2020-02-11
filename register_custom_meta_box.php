<?php

use function PHPSTORM_META\type;

class pbo_register_meta_box extends pbo_form_render
{
    public $id_meta_box = '';
    public $menu_name = '';
    public $apply_custom_post_type = array('post');
    public $context = 'advanced'; // advanced, side, normal
    public $priority = 'default'; // aefault, high, low
    public $form_render_inputs = array();
    public $form_fields_name = array();

    function __construct($id_meta_box, $menu_name, $apply_custom_post_type)
    {
        $this->id_meta_box = $id_meta_box;
        $this->menu_name = $menu_name;
        $this->apply_custom_post_type = $apply_custom_post_type;
        
        add_action('save_post', array($this, 'save_option'));
        add_action('add_meta_boxes', array($this, 'create_metabox'));
    }

    public function create_metabox()
    {
        add_meta_box($this->id_meta_box, $this->menu_name, array($this, 'formrenderoptions'), $this->apply_custom_post_type, $this->context, $this->priority);
    }

    public function formrenderoptions($post)
    {
        if ($this->form_render_inputs && !empty($this->form_render_inputs)) {

            wp_nonce_field('pbo_custom_meta_box', 'pbo_post_save');

            foreach ($this->form_render_inputs as $key => $value) {

                if ($post) {
                    $get_field = get_post_meta($post->ID, sanitize_text_field($value['args']['atributos']['name']), true);

                    if ($get_field) {
                        if ($value['type'] != 'select') {
                            $value['args']['atributos']['value'] = $get_field;
                        } else {
                            $value['args']['selected'] = $get_field;
                        }
                    }
                }

                echo '<div class="custom-form-fields-pbo">';
                echo $this->renderInputType($value['type'], $value['args']);
                echo '</div>';
            }
        }
    }

    public function save_option($post_id)    
    {        
        $post_type = get_post_type($post_id);

        if (in_array($post_type,  $this->apply_custom_post_type)) {

            if (isset($_POST['pbo_post_save']) && wp_verify_nonce($_POST['pbo_post_save'], 'pbo_custom_meta_box')) {

                foreach ($this->form_fields_name as $key => $field_name) {
                    if (isset($_POST[$field_name])) {
                       
                        update_post_meta($post_id, $field_name, $this->clean_fields_save($_POST[$field_name]));
                    }
                }
            }
        }
    }

    public function clean_fields_save($field)
    {
        if (is_array($field)) {
            foreach ($field as $key => $value) {
                $field[$key] = $this->clean_fields_save($field);
            }
        } else {
            sanitize_text_field($field);
        }

        return $field;
    }
    
    public function add_field_form($type, $args = array())
    {
        $this->form_render_inputs[] = array(
            'type' => $type,
            'args' => $args
        );

        $this->form_fields_name[] = isset($args['atributos']['name']) ? $args['atributos']['name'] : '';
    }
}
