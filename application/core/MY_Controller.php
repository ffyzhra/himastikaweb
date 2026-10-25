<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Base controller for every admin page.
 * Redirects to the login page when nobody is logged in, and renders
 * views inside the shared admin layout (sidebar + top bar).
 */
class Admin_Controller extends CI_Controller {

    /** Methods that stay public in a child controller (e.g. the registration form). */
    protected $public_methods = [];

    public function __construct() {
        parent::__construct();

        $method = $this->router->fetch_method();
        if (!$this->session->userdata('logged_in') && !in_array($method, $this->public_methods, true)) {
            redirect('login');
        }
    }

    /**
     * Save an uploaded photo from <input type="file" name="$field"> into uploads/$folder/.
     * Returns the stored path (e.g. "uploads/anggota/ab12.jpg"), null when no file was
     * chosen, or false when the upload failed (an error flash message is set).
     */
    protected function upload_foto($field, $folder) {
        if (empty($_FILES[$field]['name'])) return null;

        $dir = './uploads/' . $folder . '/';
        if (!is_dir($dir)) mkdir($dir, 0755, true);

        $this->load->library('upload');
        $this->upload->initialize([
            'upload_path'   => $dir,
            'allowed_types' => 'jpg|jpeg|png|webp',
            'max_size'      => 4096,
            'encrypt_name'  => true,
        ]);
        if (!$this->upload->do_upload($field)) {
            $this->session->set_flashdata('error', 'Foto gagal diunggah: ' . strip_tags($this->upload->display_errors()));
            return false;
        }
        return 'uploads/' . $folder . '/' . $this->upload->data('file_name');
    }

    /** Delete a previously uploaded photo (never touches the bundled assets/ photos). */
    protected function hapus_foto($path) {
        if (!empty($path) && strpos($path, 'uploads/') === 0 && is_file(FCPATH . $path)) {
            @unlink(FCPATH . $path);
        }
    }

    /**
     * Render a view inside the admin layout.
     *
     * @param string $view   view path, e.g. 'anggota/index'
     * @param array  $data   data passed to the view
     * @param string $title  page title shown in the top bar
     * @param string $active sidebar item to highlight
     */
    protected function render($view, $data = [], $title = '', $active = '') {
        $data['page_title'] = $title;
        $data['active']     = $active;

        $this->load->view('layouts/admin_header', $data);
        $this->load->view($view, $data);
        $this->load->view('layouts/admin_footer', $data);
    }
}
