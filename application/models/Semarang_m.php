<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Semarang_m extends CI_Model {

    public function get($start_date = null, $end_date = null, $sort_by = 'semarang_id', $order = 'asc') {
        $this->db->from('semarang');
        if ($start_date && $end_date) {
            $this->db->where('date >=', $start_date);
            $this->db->where('date <=', $end_date);
        }
        $this->db->order_by($sort_by, $order);
        $query = $this->db->get();
        return $query;
    }

    public function get_presence($s_date = null, $e_date = null) {
        $this->db->select('sales_name, date');
        $this->db->from('active_p');
        if ($s_date && $e_date) {
            $this->db->where('date >=', $s_date);
            $this->db->where('date <=', $e_date);
        }
        $query = $this->db->get();
        return $query->result(); // Return the result as an array of objects
    }

    public function insert_presence() {
        // Delete existing records from 'active_p' where the sales_name and date match records in 'customer'
        $this->db->where("EXISTS (SELECT 1 FROM customer c WHERE c.sales_name = active_p.sales_name AND c.date = active_p.date)", null, false);
        $this->db->delete('active_p');

        // Step 2: Insert records into 'active_p' from 'user' where the sales_name is not in 'customer'
        $this->db->select('u.username as sales_name, c.date');
        $this->db->from('user u');
        $this->db->join('customer c', '1=1', 'cross'); // Simulate cross join using a true condition
        $this->db->join('customer c2', 'u.username = c2.sales_name AND c.date = c2.date', 'left');
        $this->db->join('active_p a', 'u.username = a.sales_name AND c.date = a.date', 'left');
        $this->db->where('c2.sales_name IS NULL'); // Ensure user is not in customer
        $this->db->where('a.sales_name IS NULL'); // Ensure the record doesn't already exist in active_p
        $this->db->group_by('c.date, u.username'); // Ensure uniqueness

        $query = $this->db->get();

        // Insert the result into the 'active_p' table
        foreach ($query->result() as $row) {
            $this->db->insert('active_p', array(
                'sales_name' => $row->sales_name,
                'date' => $row->date
            ));
        }
    }
    
    public function delete_record() {
        // Step 1: Get rows to delete based on join condition
        $this->db->select('a.sales_name, a.date'); // Select columns to identify rows
        $this->db->from('active_p a');
        $this->db->join('user u', 'a.sales_name = u.username', 'inner');
        $this->db->where('u.city_sales', 'Malang');
    
        // Get the rows to be deleted
        $query = $this->db->get();
        $rows_to_delete = $query->result_array();
    
        // Step 2: Delete the rows from 'active_p' table
        foreach ($rows_to_delete as $row) {
            $this->db->where('sales_name', $row['sales_name']);
            $this->db->where('date', $row['date']);
            $this->db->delete('active_p');
        }
    }

    public function get_sales_by_semarang() {
        $sql = "
        INSERT INTO semarang (date, sales_name)
        SELECT DISTINCT c.date, c.sales_name
        FROM customer c
        LEFT JOIN semarang s
        ON c.date = s.date
        AND c.sales_name = s.sales_name
        WHERE c.city_sales = 'Purwokerto'
        AND s.sales_name IS NULL;
        ";
        $this->db->query($sql);
    }

    public function get_total_register() {
        $this->db->query("
            UPDATE semarang s
            JOIN (
                SELECT 
                    sales_name, 
                    date,
                    COUNT(price) AS total_register
                FROM 
                    customer
                WHERE 
                    customer_type = 'Download & Registrasi'
                GROUP BY 
                    sales_name, date
            ) c ON s.sales_name = c.sales_name AND s.date = c.date
            SET s.total_register = c.total_register;
        ");
    }
    
    public function get_total_subscribe() {
        $this->db->query("
            UPDATE semarang s
            JOIN (
                SELECT 
                    sales_name, 
                    date,
                    COUNT(price) AS total_subscribe
                FROM 
                    customer
                WHERE 
                    customer_type = 'Subscribe (Berlangganan)'
                GROUP BY 
                    sales_name, date
            ) c ON s.sales_name = c.sales_name AND s.date = c.date
            SET s.total_subscribe = c.total_subscribe;
        ");
    }
    
    public function get_sales_subscribe() {
        $this->db->query("
            UPDATE semarang s
            JOIN (
                SELECT 
                    sales_name, 
                    date,
                    SUM(price) AS sales_subscribe
                FROM 
                    customer
                WHERE 
                    customer_type = 'Subscribe (Berlangganan)'
                GROUP BY 
                    sales_name, date
            ) c ON s.sales_name = c.sales_name AND s.date = c.date
            SET s.sales_subscribe = c.sales_subscribe;
        ");
    }

    public function get_semarang_email() {
        $sql = "
            UPDATE semarang s
            JOIN user u ON s.sales_name = u.username
            SET s.email = u.email;
        ";
        $this->db->query($sql);
    }

}
