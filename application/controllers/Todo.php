<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Todo extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Todo_model');
    }

    public function index() {
        $data['todos'] = $this->Todo_model->getAll();
        $this->render('todo/index', $data, 'To-Do List', 'todo');
    }

    public function store() {
        $data = [
            'task' => $this->input->post('task'),
            'deadline' => $this->input->post('deadline'), // Format datetime-local
            'status' => 'pending'
        ];

        $this->Todo_model->insert($data);
        $this->session->set_flashdata('success', 'Tugas baru ditambahkan.');
        redirect('todo');
    }

    public function toggle($id) {
        $this->Todo_model->toggleStatus($id);
        redirect('todo');
    }

    public function delete($id) {
        $this->Todo_model->delete($id);
        redirect('todo');
    }

    public function edit($id) {
        $data['todo'] = $this->Todo_model->getById($id);
        if (!$data['todo']) {
            show_404();
        }
        $this->render('todo/edit', $data, 'Edit Tugas', 'todo');
    }

    public function update($id) {
        $task = $this->input->post('task');
        $deadline = $this->input->post('deadline');

        $data = [
            'task' => $task,
            'deadline' => !empty($deadline) ? $deadline : null
        ];

        $this->Todo_model->update($id, $data);
        $this->session->set_flashdata('success', 'Tugas berhasil diperbarui.');
        redirect('todo');
    }
}