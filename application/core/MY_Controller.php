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
