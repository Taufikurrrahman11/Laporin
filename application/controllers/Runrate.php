<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Runrate extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('runrate_m');
    }

    public function index()
    {
        $data['row'] = $this->runrate_m->get();
        // $data['total_subscribe'] = $this->runrate_m->get_total_subscribe(); // Panggil fungsi get_total_register
        // $data['total_register'] = $this->runrate_m->update_total_register(); // Panggil fungsi get_total_register
        $data['r_jogja'] = $this->runrate_m->update_runrate_r_jogja(); // Panggil fungsi get_total_register
        $data['r_semarang'] = $this->runrate_m->update_runrate_r_semarang(); // Panggil fungsi get_total_register
        $data['s_jogja'] = $this->runrate_m->update_runrate_s_jogja(); // Panggil fungsi get_total_register
        $data['s_semarang'] = $this->runrate_m->update_runrate_s_semarang(); // Panggil fungsi get_total_register
        // // $data['register_p'] = $this->runrate_m->get_ratio_r(); // Panggil fungsi get_total_register
        // // $data['subscribe_p'] = $this->runrate_m->get_ratio_s(); // Panggil fungsi get_total_register
        $data['calc_r_jogja'] = $this->runrate_m->get_calc_r_jogja(); // Panggil fungsi get_total_register
        $data['calc_r_semarang'] = $this->runrate_m->get_calc_r_semarang(); // Panggil fungsi get_total_register
        $data['calc_s_jogja'] = $this->runrate_m->get_calc_s_jogja(); // Panggil fungsi get_total_register
        $data['calc_s_semarang'] = $this->runrate_m->get_calc_s_semarang(); // Panggil fungsi get_total_register
        $data['total_r'] = ROUND($this->runrate_m->get_total_r(), 2); // Panggil fungsi get_total_register
        $data['total_s'] = ROUND($this->runrate_m->get_total_s(), 2); // Panggil fungsi get_total_register
        // // $data['p_jogja'] = $this->runrate_m->get_percentage_r_jogja(); // Panggil fungsi get_total_register
        // // $data['p_semarang'] = $this->runrate_m->get_percentage_r_semarang(); // Panggil fungsi get_total_register
        $data['total_p_r'] = ROUND($this->runrate_m->get_total_p_r(), 2); // Panggil fungsi get_total_register
        $data['total_p_s'] = ROUND($this->runrate_m->get_total_p_s(), 2); // Panggil fungsi get_total_register
        // $data['ratio'] = $this->runrate_m->update_ratio(); // Panggil fungsi get_total_register
        
        $this->template->load('template', 'data/runrate/runrate_data', $data);
    }

    public function add() {
        $data = new stdClass();
        $data->data_id = null;
        $data->sales_amount = null;
        $data->working_days = null;
        $data->daily_register = null;
        $data->daily_subscribe = null;
        $data->monthly_register = null;
        $data->monthly_subscribe = null;
        $data = array(
            'page' => 'add',
            'row' => $data
        );
        $this->template->load('template', 'data/runrate/runrate_form', $data);
    }

    public function edit($id)
    {
        $query = $this->runrate_m->get($id);
        if($query->num_rows() > 0) {
            $data = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $data
            );
            $this->template->load('template', 'data/runrate/runrate_form', $data);
        } else {
            echo "<script>alert('Data tidak ditemukan');";
            echo "window.location='".site_url('data')."';</script>";
        }
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if(isset($post['add'])) {
            $this->runrate_m->add($post);
        } else if(isset($post['edit'])) {
            $this->runrate_m->edit($post);
        }
        if($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
        }
        redirect('runrate');
    }

    public function del($id)
    {
        $this->runrate_m->del($id);
        if($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        }
        redirect('runrate');
    }

    public function calculate_percentages() { //error
        $data = $this->get_ratio();
        return $data;
    }
}
