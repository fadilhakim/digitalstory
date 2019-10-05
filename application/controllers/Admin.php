<?php

    class Admin extends CI_Controller{

        public function __construct() {
            parent::__construct();
            if ($this->session->userdata('username')=="") {
                redirect(base_url('client/login'));
            }
            $this->load->helper('text');
        }

        public function index(){
            redirect(base_url('client/dashboard'));
        }


        // function logout
        // public function logout() {
        //     $this->session->unset_userdata('username');
        //     $this->session->unset_userdata('role');
        //     session_destroy();
        //     redirect('auth');
        // }
    }