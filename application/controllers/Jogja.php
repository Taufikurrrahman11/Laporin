<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jogja extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('jogja_m');
    }

    public function index() {
        // Get date filter parameters
        $start_date = $this->input->get('start_date');
        $end_date = $this->input->get('end_date');
        $s_date = $this->input->get('s_date');
        $e_date = $this->input->get('e_date');
        $sort_by = $this->input->get('sort_by') ?: 'summary_id';
        $order = $this->input->get('order') ?: 'asc';

        $this->jogja_m->insert_presence();
        $this->jogja_m->delete_record(); // Menghapus record yang sesuai
    
        // Get data for display
        $data['row'] = $this->jogja_m->get($start_date, $end_date, $sort_by, $order);
        $data['total_register'] = $this->jogja_m->get_total_register();
        $data['total_subscribe'] = $this->jogja_m->get_total_subscribe();
        $data['sales_subscribe'] = $this->jogja_m->get_sales_subscribe();
        $data['sales_name'] = $this->jogja_m->get_presence($s_date, $e_date); // Mengambil data dengan parameter tanggal yang benar
        
        // Set filter dates to send back to the view
        $data['start_date'] = $start_date;
        $data['end_date'] = $end_date;
        $data['s_date'] = $s_date;
        $data['e_date'] = $e_date;
        $data['sort_by'] = $sort_by;
        $data['order'] = $order;
    
        // Load template and view
        $this->template->load('template', 'sales/jogja_data', $data);
    }

    
    
}
