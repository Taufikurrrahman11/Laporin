<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class transaction extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('transaction_m');
    }

    public function index()
    {
        $data['row'] = $this->transaction_m->get();
        $this->template->load('template', 'transaction/transaction_data', $data);
    }

    public function add() {
        $transaction = new stdClass();
        $transaction->transaction_id = null;
        $transaction->name = null;
        $transaction->price = null;
        $data = array(
            'page' => 'add',
            'row' => $transaction
        );
        $this->template->load('template', 'transaction/transaction_form', $data);
    }

    public function edit($id)
    {
        $query = $this->transaction_m->get($id);
        if($query->num_rows() > 0) {
            $transaction = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $transaction
            );
            $this->template->load('template', 'transaction/transaction_form', $data);
        } else {
            echo "<script>alert('Data tidak ditemukan');";
            echo "window.location='".site_url('transaction')."';</script>";
        }
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if(isset($post['add'])) {
            $this->transaction_m->add($post);
        } else if(isset($post['edit'])) {
            $this->transaction_m->edit($post);
        }
        if($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
        }
        redirect('transaction');
    }

    public function del($id)
    {
        $this->transaction_m->del($id);
        if($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        }
        redirect('transaction');
    }
}
