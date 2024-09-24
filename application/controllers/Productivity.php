<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productivity extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('productivity_m');
    }

    public function index()
    {
        $data['row'] = $this->productivity_m->get();
        $data['date'] = $this->productivity_m->update_date_to_today(); // Panggil fungsi get_total_register
        $data['sum_wd'] = $this->productivity_m->update_sum_wd(); // Panggil fungsi get_total_register
        // $data['total_subscribe'] = $this->productivity_m->get_total_subscribe(); // Panggil fungsi get_total_register
        // $data['total_register'] = $this->productivity_m->update_total_register(); // Panggil fungsi get_total_register
        $data['r_jogja'] = $this->productivity_m->update_r_jogja(); // Panggil fungsi get_total_register
        $data['r_semarang'] = $this->productivity_m->update_r_semarang(); // Panggil fungsi get_total_register
        $data['s_jogja'] = $this->productivity_m->update_s_jogja(); // Panggil fungsi get_total_register
        $data['s_semarang'] = $this->productivity_m->update_s_semarang(); // Panggil fungsi get_total_register
        $data['register_p'] = $this->productivity_m->get_ratio_r(); // Panggil fungsi get_total_register
        $data['subscribe_p'] = $this->productivity_m->get_ratio_s(); // Panggil fungsi get_total_register
        $data['calc_r_jogja'] = $this->productivity_m->get_calc_r_jogja(); // Panggil fungsi get_total_register
        $data['calc_r_semarang'] = $this->productivity_m->get_calc_r_semarang(); // Panggil fungsi get_total_register
        $data['calc_s_jogja'] = $this->productivity_m->get_calc_s_jogja(); // Panggil fungsi get_total_register
        $data['calc_s_semarang'] = $this->productivity_m->get_calc_s_semarang(); // Panggil fungsi get_total_register
        $data['total_pr'] = ROUND($this->productivity_m->get_total_pr(), 2); // Panggil fungsi get_total_register
        $data['total_ps'] = ROUND($this->productivity_m->get_total_ps(), 2); // Panggil fungsi get_total_register
        $data['p_jogja'] = $this->productivity_m->get_percentage_r_jogja(); // Panggil fungsi get_total_register
        $data['p_semarang'] = $this->productivity_m->get_percentage_r_semarang(); // Panggil fungsi get_total_register
        $data['total_p_pr'] = ROUND($this->productivity_m->get_total_p_pr(), 2); // Panggil fungsi get_total_register
        $data['total_p_ps'] = ROUND($this->productivity_m->get_total_p_ps(), 2); // Panggil fungsi get_total_register
        // $data['ratio'] = $this->productivity_m->update_ratio(); // Panggil fungsi get_total_register
        
        $this->template->load('template', 'data/productivity/productivity_data', $data);
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
        $data->start = null;
        $data = array(
            'page' => 'add',
            'row' => $data
        );
        $this->template->load('template', 'data/productivity/productivity_form', $data);
    }

    public function edit($id)
    {
        $query = $this->productivity_m->get($id);
        if($query->num_rows() > 0) {
            $data = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $data
            );
            $this->template->load('template', 'data/productivity/productivity_form', $data);
        } else {
            echo "<script>alert('Data tidak ditemukan');";
            echo "window.location='".site_url('data')."';</script>";
        }
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if(isset($post['add'])) {
            $this->productivity_m->add($post);
        } else if(isset($post['edit'])) {
            $this->productivity_m->edit($post);
        }
        if($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
        }
        redirect('productivity');
    }

    public function del($id)
    {
        $this->productivity_m->del($id);
        if($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        }
        redirect('productivity');
    }

    public function calculate_percentages() { //error
        $data = $this->get_ratio();
        return $data;
    }
}
