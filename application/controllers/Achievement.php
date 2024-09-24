<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Achievement extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('achievement_m');
    }

    public function index()
    {
        $data['row'] = $this->achievement_m->get();
        // $data['total_subscribe'] = $this->achievement_m->get_total_subscribe(); // Panggil fungsi get_total_register
        // $data['total_register'] = $this->achievement_m->update_total_register(); // Panggil fungsi get_total_register
        $data['r_jogja'] = $this->achievement_m->update_r_jogja(); // Panggil fungsi get_total_register
        $data['r_semarang'] = $this->achievement_m->update_r_semarang(); // Panggil fungsi get_total_register
        $data['s_jogja'] = $this->achievement_m->update_s_jogja(); // Panggil fungsi get_total_register
        $data['s_semarang'] = $this->achievement_m->update_s_semarang(); // Panggil fungsi get_total_register
        // $data['register_p'] = $this->achievement_m->get_ratio_r(); // Panggil fungsi get_total_register
        // $data['subscribe_p'] = $this->achievement_m->get_ratio_s(); // Panggil fungsi get_total_register
        $data['calc_r_jogja'] = $this->achievement_m->get_calc_r_jogja(); // Panggil fungsi get_total_register
        $data['calc_r_semarang'] = $this->achievement_m->get_calc_r_semarang(); // Panggil fungsi get_total_register
        $data['calc_s_jogja'] = $this->achievement_m->get_calc_s_jogja(); // Panggil fungsi get_total_register
        $data['calc_s_semarang'] = $this->achievement_m->get_calc_s_semarang(); // Panggil fungsi get_total_register
        $data['total_r'] = ROUND($this->achievement_m->get_total_r(), 2); // Panggil fungsi get_total_register
        $data['total_s'] = ROUND($this->achievement_m->get_total_s(), 2); // Panggil fungsi get_total_register
        // $data['p_jogja'] = $this->achievement_m->get_percentage_r_jogja(); // Panggil fungsi get_total_register
        // $data['p_semarang'] = $this->achievement_m->get_percentage_r_semarang(); // Panggil fungsi get_total_register
        $data['total_p_r'] = ROUND($this->achievement_m->get_total_p_r(), 2); // Panggil fungsi get_total_register
        $data['total_p_s'] = ROUND($this->achievement_m->get_total_p_s(), 2); // Panggil fungsi get_total_register
        // $data['ratio'] = $this->achievement_m->update_ratio(); // Panggil fungsi get_total_register
        
        $this->template->load('template', 'data/achievement/achievement_data', $data);
    }

    public function add() {
        $data = new stdClass();
        $data->data_id = null;
        $data->sales_amount = null;
        $data->working_days = null;
        $data->target_register = null;
        $data->target_subscribe = null;
        $data->daily_register = null;
        $data->daily_subscribe = null;
        $data->monthly_register = null;
        $data->monthly_subscribe = null;
        $data = array(
            'page' => 'add',
            'row' => $data
        );
        $this->template->load('template', 'data/achievement/achievement_form', $data);
    }

    public function edit($id)
    {
        $query = $this->achievement_m->get($id);
        if($query->num_rows() > 0) {
            $data = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $data
            );
            $this->template->load('template', 'data/achievement/achievement_form', $data);
        } else {
            echo "<script>alert('Data tidak ditemukan');";
            echo "window.location='".site_url('data')."';</script>";
        }
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if(isset($post['add'])) {
            $this->achievement_m->add($post);
        } else if(isset($post['edit'])) {
            $this->achievement_m->edit($post);
        }
        if($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
        }
        redirect('achievement');
    }

    public function del($id)
    {
        $this->achievement_m->del($id);
        if($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        }
        redirect('achievement');
    }

    public function calculate_percentages() { //error
        $data = $this->get_ratio();
        return $data;
    }
}
