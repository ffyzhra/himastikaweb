<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function index() {
        $this->load->view('login');
    }
    public function auth() {
        $this->load->model('User_model');
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->User_model->check_login($username, $password);

        if ($user) {
            $this->session->set_userdata([
                'logged_in' => true,
                'username' => $user->username // jika pakai row()
            ]);
            redirect('dashboard');
        } else {
            $this->session->set_flashdata('error', 'Username/Password Salah');
            redirect('login');
        }
    }
    public function logout() {
        $this->session->sess_destroy();
        redirect('login');
    }
}