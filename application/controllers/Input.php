<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Input extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('input_m');
    }

    
    public function index()
    {
        $data['row'] = $this->input_m->get();
        $this->template->load('template', 'input/input_data', $data);
    }

    public function add() {
        $customer = new stdClass();
        $customer->customer_id = null;
        $customer->date = null;
        $customer->name = null;
        $customer->email = null;
        $customer->phone_nmbr = null;
        $customer->customer_type = null;
        $customer->product_type = null;
        $customer->bukti = null;
        $customer->sales_name = null;
        $customer->city_sales = null;
        $data = array(
            'page' => 'add',
            'row' => $customer,
            'username' => $this->session->userdata('username') // Mengambil username dari session
        );
        $this->template->load('template', 'input/input_form', $data);
    }

    // public function edit($id)
    // {
    //     $query = $this->input_m->get($id);
    //     if($query->num_rows() > 0) {
    //         $customer = $query->row();
    //         $data = array(
    //             'page' => 'edit',
    //             'row' => $customer,
    //             'username' => $this->session->userdata('username') // Mengambil username dari session
    //         );
    //         $this->template->load('template', 'input/input_form', $data);
    //     } else {
    //         echo "<script>alert('Data tidak ditemukan');";
    //         echo "window.location='".site_url('input')."';</script>";
    //     }
    // }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if(isset($post['add'])) {
            $this->input_m->add($post);
        } else if(isset($post['edit'])) {
            $this->input_m->edit($post);
        }
        if($this->db->affected_rows() > 0) {
            echo "<script>alert('Data berhasil disimpan');</script>";
        }
        echo "<script>window.location='".site_url('input')."';</script>";
    }

    // public function del($id)
    // {
    //     $this->input_m->del($id);
    //     if($this->db->affected_rows() > 0) {
    //         echo "<script>alert('Data berhasil dihapus');</script>";
    //     }
    //     echo "<script>window.location='".site_url('input')."';</script>";
    // }
    
}
?>
