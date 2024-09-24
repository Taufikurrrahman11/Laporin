<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('register_m');
        $this->load->library('form_validation');
    }

    public function index()
	{
        $data['row'] = $this->user_m->get();
		$this->template->load('template', 'register/register_form_add', $data);
	}


    public function add() {
        $this->form_validation->set_rules('fullname', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|is_unique[user.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
        $this->form_validation->set_rules('passconf', 'Konfirmasi Password', 'required|matches[password]',
            array('matches' => '%s Tidak sesuai dengan password')
        );
        $this->form_validation->set_rules('city_sales', 'City of Sales', 'required');
        $this->form_validation->set_rules('level', 'Level', 'required');

        $this->form_validation->set_message('required', '%s Masih kosong, Silakan isi');
        $this->form_validation->set_message('min_length', '{field} minimal 5 karakter');
        $this->form_validation->set_message('is_unique', '{field} ini sudah dipakai, silakan gunakan username yang lain');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('register/register_form_add');  // Load the view directly without the template
        } else {
            $post = $this->input->post(null, TRUE);
            $this->register_m->add($post);  // Use register_m model
            if($this->db->affected_rows() > 0) {
                echo "<script>alert('Data berhasil disimpan');</script>";
            }
            echo "<script>window.location='".site_url('')."';</script>";
        }
    }

    function username_check() {
        $post = $this->input->post(null, TRUE);
        $query = $this->db->query("SELECT * FROM user WHERE username = '$post[username]' AND user_id != '$post[user_id]'");
        if($query->num_rows() > 0) {
            $this->form_validation->set_message('username_check', '{field} ini sudah dipakai, silakan ganti');
            return FALSE;
        } else {
            return TRUE;
        }
    }
}
