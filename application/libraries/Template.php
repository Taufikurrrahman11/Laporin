<?php

class Template {

    protected $ci;
    var $template_data = array();

    public function __construct() {
        $this->ci =& get_instance();
    }

    function set($name, $value) {
        $this->template_data[$name] = $value;
    }

    public function load($template = '', $view = '', $view_data = array(), $return = FALSE) {
        $this->ci =& get_instance(); // Use $this->ci instead of $this->CI
        $this->set('contents', $this->ci->load->view($view, $view_data, TRUE));
        return $this->ci->load->view($template, $this->template_data, $return);
    }
}
?>
