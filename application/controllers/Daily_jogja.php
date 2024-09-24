<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daily_jogja extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('daily_jogja_m');
    }
    public function index()
    {
        // Mengambil data untuk ditampilkan
        $data['row'] = $this->daily_jogja_m->get();    
        $data['sales_names'] = $this->daily_jogja_m->get_sales_names();
        $data['r_week1'] = $this->daily_jogja_m->get_r_week1();
        $data['s_week1'] = $this->daily_jogja_m->get_s_week1();
        $data['v_week1'] = $this->daily_jogja_m->get_v_week1();
        $data['r_week2'] = $this->daily_jogja_m->get_r_week2();
        $data['s_week2'] = $this->daily_jogja_m->get_s_week2();
        $data['v_week2'] = $this->daily_jogja_m->get_v_week2();
        $data['r_week3'] = $this->daily_jogja_m->get_r_week3();
        $data['s_week3'] = $this->daily_jogja_m->get_s_week3();
        $data['v_week3'] = $this->daily_jogja_m->get_v_week3();
        $data['r_week4'] = $this->daily_jogja_m->get_r_week4();
        $data['s_week4'] = $this->daily_jogja_m->get_s_week4();
        $data['v_week4'] = $this->daily_jogja_m->get_v_week4();
        // $data['total_register'] = $this->daily_jogja_m->get_total_register();
        // $data['total_subscribe'] = $this->daily_jogja_m->get_total_subscribe();
        // $data['sales_productivity'] = $this->daily_jogja_m->get_sales_productivity();
    
        // Memuat template dan tampilan
        $this->template->load('template', 'sales/daily_jogja_data', $data);
    }

}
