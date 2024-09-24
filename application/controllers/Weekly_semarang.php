<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Weekly_semarang extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('weekly_semarang_m');
    }
    public function index()
    {
        // Mengambil data untuk ditampilkan
        $data['row'] = $this->weekly_semarang_m->get();    
        $data['sales_names'] = $this->weekly_semarang_m->get_sales_names();
        $data['r_week1'] = $this->weekly_semarang_m->get_r_week1();
        $data['s_week1'] = $this->weekly_semarang_m->get_s_week1();
        $data['v_week1'] = $this->weekly_semarang_m->get_v_week1();
        $data['r_week2'] = $this->weekly_semarang_m->get_r_week2();
        $data['s_week2'] = $this->weekly_semarang_m->get_s_week2();
        $data['v_week2'] = $this->weekly_semarang_m->get_v_week2();
        $data['r_week3'] = $this->weekly_semarang_m->get_r_week3();
        $data['s_week3'] = $this->weekly_semarang_m->get_s_week3();
        $data['v_week3'] = $this->weekly_semarang_m->get_v_week3();
        $data['r_week4'] = $this->weekly_semarang_m->get_r_week4();
        $data['s_week4'] = $this->weekly_semarang_m->get_s_week4();
        $data['v_week4'] = $this->weekly_semarang_m->get_v_week4();
    
        // Memuat template dan tampilan
        $this->template->load('template', 'sales/weekly_semarang_data', $data);
    }

}
