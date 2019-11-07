<?php


    class Auth extends CI_Controller{

        function __construct()
        {
            parent::__construct();
            $this->load->model('AuthModel');
        }

        public function check_login(){
            $data = array('email' => $this->input->post('email'),
						'password' => md5($this->input->post('password'))
            );
            $resultModel =  $this->AuthModel->check_user($data);
            if($resultModel->num_rows() == 1){
                foreach($resultModel->result() as $sess){
                    $sess_data['status'] = 'Loggin';
                    $sess_data['id'] = $sess->id;
                    $sess_data['username'] = $sess->username;
                    $sess_data['email'] = $sess->email;
                    $sess_data['role'] = $sess->role;
                    $this->session->set_userdata($sess_data);
                }
                if($this->session->userdata('role')=='admin'){
                    redirect('Admin');
                }elseif($this->session->userdata('role')=='member'){
                    redirect('Member');
                }
            }else {
                $this->session->set_flashdata('login_fail', 'Invalid Email or Password');
                redirect(base_url('login'));
            }
        }

        public function googleAuth() {
            $user = $this->AuthModel->googleUser(['email' => $this->input->post('email')]);
            if($user->access_token && $user->access_token != $this->input->post('access_token')){
                $result = $this->AuthModel->updateAccessToken($user->id, $this->input->post('access_token'));
                return $this->output->set_content_type('application/json')->set_output(json_encode($result));
            }
        }
    }

