<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('products_m');
    }

    public function index()
    {
        $data['row'] = $this->products_m->get();
        $data['sold_out'] = $this->products_m->sold_out();
        $data['total'] = $this->products_m->total();
        $this->template->load('template', 'products/products_data', $data);
    }

    public function add() {
        $products = new stdClass();
        $products->products_id = null;
        $products->product_type = null;
        $products->price = null;
        $data = array(
            'page' => 'add',
            'row' => $products
        );
        $this->template->load('template', 'products/products_form', $data);
    }

    public function edit($id)
    {
        $query = $this->products_m->get($id);
        if($query->num_rows() > 0) {
            $products = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $products
            );
            $this->template->load('template', 'products/products_form', $data);
        } else {
            echo "<script>alert('Data tidak ditemukan');";
            echo "window.location='".site_url('products')."';</script>";
        }
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if(isset($post['add'])) {
            $this->products_m->add($post);
        } else if(isset($post['edit'])) {
            $this->products_m->edit($post);
        }
        if($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
        }
        redirect('products');
    }

    public function del($id)
    {
        $this->products_m->del($id);
        if($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        }
        redirect('products');
    }
}
