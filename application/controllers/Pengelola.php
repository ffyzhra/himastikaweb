<?php
class Pengelola extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        if($this->session->userdata('role') != 'admin') {
            redirect('login');
        }
    }

    public function index() {
        $data['users'] = $this->User_model->get_all();
        $this->load->view('pengelola/index', $data);
    }

    public function create() {
        if ($this->input->post()) {
            $nama = $this->input->post('nama');
            $username = $this->input->post('username');
            $password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);

            $this->User_model->insert([
                'nama' => $nama,
                'username' => $username,
                'password' => $password,
                'role' => 'admin'
            ]);
            redirect('pengelola');
        }
        $this->load->view('pengelola/form');
    }

    public function delete($id) {
        $this->User_model->delete($id);
        redirect('pengelola');
    }
}
?>