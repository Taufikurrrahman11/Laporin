<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_m extends CI_Model {

    public function get($id = null)
    {
        $this->db->from('dashboard');
        if ($id != null) {
            $this->db->where('dashboard_id', $id);
        }
        return $this->db->get();
    }

    public function get_customer_city()
    {
        $this->db->select('city_sales, COUNT(customer_id) as count');
        $this->db->from('customer');
        $this->db->group_by('city_sales');
        $query = $this->db->get();

        $results = $query->result();
        foreach ($results as $result) {
            switch ($result->city_sales) {
                case 'Malang':
                    $result->color = '#FF6384'; // Red
                    break;
                case 'Purwokerto':
                    $result->color = '#36A2EB'; // Blue
                    break;
                default:
                    $result->color = '#000000'; // Default color
                    break;
            }
        }
        return $results;
    }

    public function get_sales_data()
    {
        $this->db->select('city_sales, COUNT(city_sales) as total');
        $this->db->from('customer');
        $this->db->group_by('city_sales');
        return $this->db->get()->result();
    }

    // public function process_and_insert_sales_data() {
    //     $this->db->select('city_sales, DATE(created_at) as sale_date, COUNT(*) as total_subscribe');
    //     $this->db->from('customer');
    //     $this->db->where_in('city_sales', ['Jogja', 'Semarang']);
    //     $this->db->group_by(['city_sales', 'sale_date']);
    //     $this->db->order_by('sale_date', 'ASC');
    //     $result = $this->db->get()->result_array();

    //     // Insert ke tabel sales_data
    //     foreach ($result as $row) {
    //         $data = [
    //             'city_sales' => $row['city_sales'],
    //             'sale_date' => $row['sale_date'],
    //             'total_subscribe' => $row['total_subscribe']
    //         ];
    //         $this->db->insert('sales_data', $data);
    //     }
    // }

    public function get_sales_data_total_subscribe() {
        $this->db->select('customer.city_sales, DATE(customer.date) as date, SUM(customer.price) as total_subscribe');
        $this->db->from('customer');
        $this->db->where_in('customer.city_sales', ['Malang', 'Purwokerto']);
        $this->db->group_by(['date', 'customer.city_sales']);
        $this->db->order_by('date', 'ASC');
        return $this->db->get()->result_array();
    }
    
    public function get_sales_data_count_subscribe() {
        $this->db->select('customer.city_sales, DATE(customer.date) as date, COUNT(customer.price) as count_city_subscribe');
        $this->db->from('customer');
        $this->db->where_in('customer.city_sales', ['Malang', 'Purwokerto']);
        $this->db->group_by(['date', 'customer.city_sales']);
        $this->db->order_by('date', 'ASC');
        return $this->db->get()->result_array();
    }

    public function update_total_subscribe()
    {
        // Query untuk menghitung total subscribe per city_sales dan date
        $this->db->select('city_sales, DATE(date) as date, SUM(price) as total_subscribe');
        $this->db->from('customer');
        $this->db->where('customer_type', 'Subscribe (Berlangganan)'); // Menentukan hanya menghitung customer type subscribe
        $this->db->group_by(['city_sales', 'date']);

        // Mengambil hasil query
        $result = $this->db->get()->result();

        // Loop melalui hasil dan memperbarui sales_data
        foreach ($result as $row) {
            // Memperbarui nilai count_subscribe pada tabel sales_data
            $this->db->where(['city_sales' => $row->city_sales, 'DATE(date)' => $row->date]);
            $this->db->update('sales_data', ['total_subscribe' => $row->total_subscribe]);
        }
    }

    public function update_count_city_subscribe()
    {
        // Query untuk menghitung total subscribe per city_sales dan date
        $this->db->select('city_sales, DATE(date) as date, COUNT(customer_type) as count_city_subscribe');
        $this->db->from('customer');
        $this->db->where('customer_type', 'Subscribe (Berlangganan)'); // Menentukan hanya menghitung customer type subscribe
        $this->db->group_by(['city_sales', 'date']);

        // Mengambil hasil query
        $result = $this->db->get()->result();

        // Loop melalui hasil dan memperbarui sales_data
        foreach ($result as $row) {
            // Memperbarui nilai count_subscribe pada tabel sales_data
            $this->db->where(['city_sales' => $row->city_sales, 'DATE(date)' => $row->date]);
            $this->db->update('sales_data', ['count_city_subscribe' => $row->count_city_subscribe]);
        }
    }
    
    public function get_sales_data_count() {
        $this->db->select('city_sales, date, count_subscribe');
        $this->db->from('sales_data');
        $this->db->order_by('date', 'ASC');
        return $this->db->get()->result_array();
    }

    public function update_total_register()
    {
        $this->db->set('total_register', '(SELECT COUNT(*) FROM customer WHERE customer_type = "Download & Registrasi")', false);
        $this->db->update('dashboard');
    }

    public function get_total_register()
    {
        $this->db->select_sum('total_register');
        $query = $this->db->get('daily_target');
        return $query->row()->total_register;
    }

    public function get_total_subscribe()
    {
        $this->db->select_sum('total_subscribe');
        $query = $this->db->get('daily_target');
        return $query->row()->total_subscribe;
    }

    public function get_product_data()
    {
        $this->db->select('sold_out, product_type');
        $this->db->from('products');
        return $this->db->get()->result_array();
    }


    public function get_register_and_subscribe_counts()
    {
        $this->db->select('COUNT(customer_type) as count, customer_type');
        $this->db->from('customer');
        $this->db->where('customer_type', 'Download & Registrasi');
        $query = $this->db->get();
        return $query->row();
    }

    public function get_sales_names()
    {
        // Load the database library if not already loaded
        $this->load->database();

        // Execute the query using Query Builder
        $this->db->distinct();
        $this->db->select('sales_name');
        $query = $this->db->get('customer');

        // Return the result as an array
        return $query->result_array();
    }

    public function get_total_subscribe_sales()
    {
        $this->db->select('sales_name, SUM(price) as total_subscribe');
        $this->db->from('customer');
        $this->db->group_by('sales_name');
        return $this->db->get()->result();
    }
    
    public function get_count_subscribe()
    {
        $this->db->select('sales_name, COUNT(price) as count_subscribe');
        $this->db->from('customer');
        $this->db->group_by('sales_name');
        return $this->db->get()->result();
    }
    
    public function today_sales_jogja() {
        // Mengambil jumlah price dari tabel customer untuk hari ini dengan city_sales = 'Jogja'
        $this->db->select('SUM(price) as total_jogja');
        $this->db->from('customer');
        $this->db->where('DATE(date)', 'CURDATE()', false);
        $this->db->where('city_sales', 'Malang'); // Menambahkan syarat city_sales = 'Jogja'
        $query = $this->db->get();
        
        // Mendapatkan hasil query
        $result = $query->row();
        
        // Kembalikan nilai total subscribe
        return $result->total_jogja;
    }
    
    public function today_sales_semarang() {
        // Mengambil jumlah price dari tabel customer untuk hari ini dengan city_sales = 'Jogja'
        $this->db->select('SUM(price) as total_semarang');
        $this->db->from('customer');
        $this->db->where('DATE(date)', 'CURDATE()', false);
        $this->db->where('city_sales', 'Purwokerto'); // Menambahkan syarat city_sales = 'Jogja'
        $query = $this->db->get();
        
        // Mendapatkan hasil query
        $result = $query->row();
        
        // Kembalikan nilai total subscribe
        return $result->total_semarang;
    }

    public function today_count_jogja() {
        // Menghitung jumlah customer_type 'Subscribe (Berlangganan)' untuk hari ini dengan city_sales = 'Jogja'
        $this->db->select('COUNT(*) as count_jogja');
        $this->db->from('customer');
        $this->db->where('DATE(date)', 'CURDATE()', false);
        $this->db->where('city_sales', 'Malang'); // Mengubah city_sales menjadi 'Jogja'
        $this->db->where('customer_type', 'Subscribe (Berlangganan)'); // Menambahkan syarat customer_type 'Subscribe (Berlangganan)'
        $query = $this->db->get();
        
        // Mendapatkan hasil query
        $result = $query->row();
        
        // Kembalikan nilai total subscribe
        return $result->count_jogja;
    }
    
    
    public function today_count_semarang() {
        // Mengambil jumlah price dari tabel customer untuk hari ini dengan city_sales = 'Jogja'
        $this->db->select('COUNT(*) as count_semarang');
        $this->db->from('customer');
        $this->db->where('DATE(date)', 'CURDATE()', false);
        $this->db->where('city_sales', 'Purwokerto'); // Mengubah city_sales menjadi 'Jogja'
        $this->db->where('customer_type', 'Subscribe (Berlangganan)'); // Menambahkan syarat customer_type 'Subscribe (Berlangganan)'
        $query = $this->db->get();
        
        // Mendapatkan hasil query
        $result = $query->row();
        
        // Kembalikan nilai total subscribe
        return $result->count_semarang;
    }
    // public function delete_yesterday_sales() {
    //     // Hapus data dengan kolom date yang berisi tanggal kemarin
    //     $this->db->where('DATE(date)', 'CURDATE() - INTERVAL 1 DAY', false);
    //     $this->db->delete('today_sales_update');
    // }

    public function update_today_sales() {
        // Ambil total subscribe hari ini
        $total_jogja = $this->today_sales_jogja();
        $total_semarang = $this->today_sales_semarang();
        $count_jogja = $this->today_count_jogja();
        $count_semarang = $this->today_count_semarang();
    
        // Data untuk diupdate
        $data = array(
            'subscribe_j' => isset($total_jogja) ? $total_jogja : null,
            'subscribe_s' => isset($total_semarang) ? $total_semarang : null,
            'count_jogja' => isset($count_jogja) ? $count_jogja : null,
            'count_semarang' => isset($count_semarang) ? $count_semarang : null,
            'date' => date('Y-m-d') // Pastikan kolom date juga diperbarui dengan hari ini
        );
    
        // Hapus data dengan kolom date yang berisi tanggal kemarin
    
        // Cek apakah data dengan tanggal hari ini sudah ada
        $this->db->where('DATE(date)', 'CURDATE()', false);
        $query = $this->db->get('today_sales_update');
    
        if ($query->num_rows() > 0) {
            // Jika sudah ada, lakukan update
            $this->db->where('DATE(date)', 'CURDATE()', false);
            $this->db->update('today_sales_update', $data);
        } else {
            // Jika belum ada, lakukan insert
            $this->db->insert('today_sales_update', $data);
        }
    }
    
    

    // public function get_today_sales_Jogja() {
    //     // Load database library if not already loaded
    //     $this->load->database();
    
    //     // Hapus data yang tanggalnya tidak sesuai dengan tanggal hari ini dari tabel today_sales_update
    //     $this->db->where('DATE(date) != CURDATE()', null, false);
    //     $this->db->delete('today_sales_update');
    
    //     // Hitung jumlah data yang memenuhi syarat
    //     $this->db->select('COUNT(*) as subscribe_j');
    //     $this->db->from('customer');
    //     $this->db->where('customer_type', 'Subscribe (Berlangganan)');
    //     $this->db->where('DATE(date) = CURDATE()', null, false);
    //     $this->db->where('city_sales', 'Jogja');
    
    //     // Execute the query and get the result
    //     $query = $this->db->get();
    
    //     // Check if there are any results
    //     if ($query->num_rows() > 0) {
    //         // Get the total count from the result
    //         $result = $query->row();
    //         $subscribe_j = $result->subscribe_j;
    
    //         // Prepare the data for insertion into today_sales_update
    //         $data = array(
    //             'subscribe_j' => $subscribe_j,
    //             'date' => date('Y-m-d')  // Assuming you want to update for today's date
    //         );
    
    //         // Insert the data into the today_sales_update table
    //         $this->db->insert('today_sales_update', $data);
    //     }
    // }
    


}
