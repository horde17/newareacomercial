<?php
session_start();
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sesion extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('sesion_model');
        $this->load->library('session');
    }

    public function index() {
        //This method will have the credentials validation
        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');
        
        if ($this->form_validation->run() == FALSE) {
            //Field validation failed.  User redirected to login page
            $data = array(
                "main" => 'sesion/sesion_view'
            );
            $this->load->view('include/sesion_template', $data);
        } else {
            $tipousuario = $this->sesion_model->tipo_sesion($this->input->post('username'));
            //Go to private area
            $this->redireccion((int)$tipousuario[0]['ase_tipo']);
        }
    }

    function check_database($password) {
        //Field validation succeeded.  Validate against database
        $username = $this->input->post('username');

        //query the database
        $result = $this->sesion_model->autorizacion($username, $password);

        if ($result) {
            $sess_array = array();
            foreach ($result as $row) {
                $sess_array = array(
                    'username' => $row['ase_cedula'],
                    'password' => $row['ase_password'],
                    'tipo_sesion' => $row['ase_tipo']
                );
                $this->session->set_userdata('logged_in', $sess_array);
            }
            return TRUE;
        } else {
            $this->form_validation->set_message('check_database', 'Usuario o contraseña incorrectos');
            return false;
        }
    }

    function redireccion($tipo) {
        switch ((int)$tipo) {
            case 1:
                $_SESSION['username'] = $this->input->post('username');
                redirect('admin', 'refresh');
                break;
            case 2:
                $_SESSION['username'] = $this->input->post('username');
                redirect('asesor', 'refresh');
                break;
        }
    }

    function logout() {
        $this->session->unset_userdata('logged_in');
        $this->session->sess_destroy();
        session_destroy();
        unset($_SESSION['username']);
//        session_destroy();
        redirect(base_url(), 'refresh');
    }

}

?>
