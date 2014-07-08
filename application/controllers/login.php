<?php

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    function index() {
        $this->load->helper(array('form'));
        $data = array(
            "main" => 'sesion/sesion_view'
        );
        $this->load->view('include/sesion_template', $data);
    }

}

?>
