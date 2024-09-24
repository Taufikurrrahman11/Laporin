<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function index()
    {
        check_not_login('auth/login');

        // Load the model
        $this->load->model('dashboard_m');
        
        // Fetch data from the model
        $data['city_sales'] = $this->dashboard_m->get_customer_city();
        $data['count_subscribe'] = $this->dashboard_m->get_count_subscribe();
        $data['sales_data'] = $this->dashboard_m->get_sales_data();
        $data['product_types'] = $this->dashboard_m->get_product_data();
        $data['total_subscribe'] = $this->dashboard_m->get_total_subscribe(); 
        $data['total_register'] = $this->dashboard_m->get_total_register();
        $data['total_subscribe_sales'] = $this->dashboard_m->get_total_subscribe_sales();
        $data['sales_name'] = $this->dashboard_m->get_sales_names();
        $data['sales_data_total_subscribe'] = $this->dashboard_m->get_sales_data_total_subscribe();
        $data['sales_data_count_subscribe'] = $this->dashboard_m->get_sales_data_count_subscribe();
        $data['count_city_subscribe'] = $this->dashboard_m->update_count_city_subscribe();
        $data['total_subscribe'] = $this->dashboard_m->update_total_subscribe();
        $data['total_jogja'] = $this->dashboard_m->today_sales_jogja();
        $data['total_semarang'] = $this->dashboard_m->today_sales_semarang();
        $data['count_jogja'] = $this->dashboard_m->today_count_jogja();
        $data['count_semarang'] = $this->dashboard_m->today_count_semarang();
        // $data['subscribe_j'] = $this->dashboard_m->get_today_sales_jogja();
        
        $this->dashboard_m->update_today_sales();
        // $this->dashboard_m->delete_yesterday_sales();
        // Load the template and the main content view
        $data['subscribe_j'] = $this->db->get('today_sales_update')->result();;
        $this->template->load('template', 'dashboard', $data);
    }

    


    

    // public function sales_data_city() 
    // {
    //     // Mengambil data dari database
    //     $sales_data_city = $this->dashboard_m->get_sales_data_city();

    //     // Proses data
    //     $citySalesData = [];
    //     foreach ($sales_data_city as $data) {
    //         // Memastikan nama kolom yang benar
    //         $citySalesData[$data->date][$data->city_sales] = $data->total_subscribe;
    //     }

    //     $labels = array_keys($citySalesData);
    //     $jogjaData = [];
    //     $semarangData = [];

    //     foreach ($citySalesData as $date => $cities) {
    //         // Ganti penggunaan ?? dengan ternary operator
    //         $jogjaData[] = isset($cities['Jogja']) ? $cities['Jogja'] : 0;
    //         $semarangData[] = isset($cities['Semarang']) ? $cities['Semarang'] : 0;
    //     }

    //     // Mengirim data ke view
    //     $data['labels'] = $labels;
    //     $data['jogjaData'] = $jogjaData;
    //     $data['semarangData'] = $semarangData;

    //     $this->load->view('dashboard', $data);
    // }

}
