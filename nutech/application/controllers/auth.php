<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function login_user()
    {
        
        $this->form_validation->set_rules('username', 'Username', 'required', array(
            'required'  =>'% Harus diisi!!!'
        ));
        $this->form_validation->set_rules('password', 'Password', 'required', array(
            'required'  =>'% Harus diisi!!!'
        ));
        
        if ($this->form_validation->run() == TRUE) {
            $username =$this->input->post('username');
            $password =$this->input->post('password');
            $this->user_login->login($username, $password);
            

        } 
        // $this->session->set_flashdata('error', 'Username atau password yang anda masukan salah'); 
        $data = array(
            'title' => 'Login User',
        );
        $this->load->view('v_login_user', $data, FALSE);
    
       
    }

    public function logout_user()
    {
        // $this->session->set_flashdata('pesan', 'anda berhasil logout'); 

        $this->user_login->logout();
    
    }

}

/* End of file Auth.php */
