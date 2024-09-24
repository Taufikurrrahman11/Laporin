<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class customer_m extends CI_Model {

    public function get($id = null)
    {
        $this->db->from('customer');
        if($id != null) {
            $this->db->where('customer_id', $id);

        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post) 
    {
        $params = [
            'date' => $post['date'],
            'name' => $post['customer_name'],
            'email' => $post['email'],
            'phone_nmbr' => $post['phone_nmbr'],
            'customer_type' => $post['customer_type'],
            'product_type' => $post['product_type'],
            'bukti' => $post['bukti'],
            'sales_name' => $post['sales_name'],
            'city_sales' => $post['city_sales'],
        ];
        $this->db->insert('customer', $params);
    }
    
    public function edit($post) 
    {
        $params = [
            'date' => $post['date'],
            'name' => $post['customer_name'],
            'email' => $post['email'],
            'phone_nmbr' => $post['phone_nmbr'],
            'customer_type' => $post['customer_type'],
            'product_type' => $post['product_type'],
            'bukti' => $post['bukti'],
            'sales_name' => $post['sales_name'],
            'city_sales' => $post['city_sales'],
            'updated' => date('Y-m-d H:i:s')
        ];
        $this->db->where('customer_id', $post['id']);
        $this->db->update('customer', $params);
    }

    public function del($id)
    {
        $this->db->where('customer_id', $id);
        $this->db->delete('customer');
    }

    public function update_customer_price()
    {
        $sql = "UPDATE customer c
                JOIN products p ON c.product_type = p.product_type
                SET c.price = p.price
                WHERE c.product_type IN (
                    'Platinum Mahasiswa', 
                    'SPOTV', 
                    'Platinum 30D', 
                    'Premier League Mobile', 
                    'Diamond Mobile 30D', 
                    'Platinum + SPOTV 30D', 
                    'Diamond All Screen 30D', 
                    'Diamond + SPOTV 30D', 
                    'Platinum 1 Tahun', 
                    'Diamond Mobile 1 Tahun', 
                    'Diamond All Screen 1 Tahun'
                )";
        $this->db->query($sql);
    }

    public function delete_all_customers()
    {
        $this->db->empty_table('customer');
    }

    
    



    public function __construct() {
        $this->load->database();
    }

    public function chart_database() {
        return $this->db->get('customer')->result();
    }
    
}
?>
