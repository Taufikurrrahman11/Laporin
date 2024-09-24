<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class achievement_m extends CI_Model {

    public function get($id = null)
{
    $this->db->select('daily_target.*, achievement.*');
    $this->db->from('daily_target');
    $this->db->join('achievement', 'achievement.target_id = daily_target.target_id', 'left'); // atau 'inner' jika ingin hanya data yang cocok

    if ($id != null) {
        $this->db->where('daily_target.target_id', $id);
    }

    $query = $this->db->get();
    return $query;
}


    public function add($post) 
    {
        $params = [
            'sales_amount' => $post['sales_amount'],
            'working_days' => $post['working_days'],
            'daily_register' => $post['daily_register'],
            'daily_subscribe' => $post['daily_subscribe'],
            'monthly_register' => $post['monthly_register'],
            'monthly_subscribe' => $post['monthly_subscribe'],
        ];
        $this->db->insert('daily_target', $params);
    }
    
    public function edit($post) 
    {
        $params = [
            'sales_amount' => $post['sales_amount'],
            'working_days' => $post['working_days'],
            'daily_register' => $post['daily_register'],
            'daily_subscribe' => $post['daily_subscribe'],
            'monthly_register' => $post['monthly_register'],
            'monthly_subscribe' => $post['monthly_subscribe'],
            'updated' => date('Y-m-d H:i:s')
        ];
        $this->db->where('target_id', $post['id']);
        $this->db->update('daily_target', $params);
    }

    public function del($id)
    {
        $this->db->where('target_id', $id);
        $this->db->delete('daily_target');
    }
    
    public function update_total_register()
    {
        $sql = "
            UPDATE daily_target
            SET total_register = (
                SELECT COUNT(*)
                FROM customer
                WHERE customer_type = 'Download & Registrasi'
            )
            WHERE daily_target.customer_type = 'Download & Registrasi';
        ";
        
        // Execute the query
        $this->db->query($sql);
    }


    public function update_s_jogja()
    {
        $sql = "UPDATE achievement a
                SET a.s_jogja = (
                    SELECT SUM(c.price) 
                    FROM customer c
                    WHERE c.city_sales = 'Malang'
                )";
        $this->db->query($sql);
    }

    public function update_s_semarang()
    {
        $sql = "UPDATE achievement a
                SET a.s_semarang = (
                    SELECT SUM(c.price) 
                    FROM customer c
                    WHERE c.city_sales = 'Purwokerto'
                )";
        $this->db->query($sql);
    }
    
    public function get_total_subscribe()
    {
        $sql = "UPDATE daily_target
                SET total_subscribe = (
                SELECT SUM(total) FROM products
            )";

        // Execute the query
        $this->db->query($sql);

    }


        // public function get_ratio_r() {
        //     $sql = "
        //     UPDATE daily_target
        //     SET register_p = (total_register / monthly_register) * 100
        //     WHERE monthly_register > 0;

        // ";
    
        // $this->db->query($sql);
    
        // // Retrieve updated data from 'summary' table
        // $query = $this->db->get('summary');
        // return $query->result();
        // }
        
        // public function get_ratio_s() {
        //     $sql = "
        //     UPDATE daily_target
        //     SET subscribe_p = (total_subscribe / monthly_subscribe) * 100
        //     WHERE monthly_subscribe > 0;

        // ";
    
        // $this->db->query($sql);
    
        // // Retrieve updated data from 'summary' table
        // $query = $this->db->get('summary');
        // return $query->result();
        // }

        public function get_calc_r_jogja()
        {
            $sql = "UPDATE achievement a
                    JOIN daily_target dt ON a.target_id = dt.target_id
                    SET a.p_r_jogja = (dt.r_jogja / dt.monthly_register) * 100
                    WHERE dt.monthly_register != 0";
            $this->db->query($sql);
        }

        // public function get_percentage_r_jogja()
        // {
        //     $sql = "UPDATE achievement p
        //             JOIN daily_target dt ON p.target_id = dt.target_id
        //             SET p.p_jogja = (p.p_r_jogja / dt.daily_register)
        //             WHERE dt.sum_wd != 0";
        //     $this->db->query($sql);
        // }
        
        public function get_calc_r_semarang()
        {
            $sql = "UPDATE achievement a
                    JOIN daily_target dt ON a.target_id = dt.target_id
                    SET a.p_r_semarang = (dt.r_semarang  / dt.monthly_register) * 100
                    WHERE dt.sum_wd != 0";
            $this->db->query($sql);
        }

        // public function get_percentage_r_semarang()
        // {
        //     $sql = "UPDATE achievement p
        //             JOIN daily_target dt ON p.target_id = dt.target_id
        //             SET p.p_semarang = (p.p_r_semarang / dt.daily_register)
        //             WHERE dt.sum_wd != 0";
        //     $this->db->query($sql);
        // }
        
        public function get_calc_s_jogja()
        {
            $sql = "UPDATE achievement a
                    JOIN daily_target dt ON a.target_id = dt.target_id
                    SET a.p_s_jogja = (a.s_jogja / dt.monthly_subscribe) * 100
                    WHERE dt.monthly_subscribe != 0";
            $this->db->query($sql);
        }


        public function get_calc_s_semarang()
        {
            $sql = "UPDATE achievement a
                    JOIN daily_target dt ON a.target_id = dt.target_id
                    SET a.p_s_semarang = (a.s_semarang / dt.monthly_subscribe) * 100
                    WHERE dt.monthly_subscribe != 0";
            $this->db->query($sql);
        }

        public function update_r_jogja()
        {
            $sql = "
                UPDATE achievement a
                JOIN daily_target dr ON a.target_id = dr.target_id
                SET a.r_jogja = dr.r_jogja;
            ";
            
            $this->db->query($sql);
        }
        public function update_r_semarang()
        {
            $sql = "
                UPDATE achievement a
                JOIN daily_target dr ON a.target_id = dr.target_id
                SET a.r_semarang = dr.r_semarang;
            ";
            
            $this->db->query($sql);
        }

        public function get_total_r()
        {
            $sql = "UPDATE achievement
                    SET total_r = r_jogja + r_semarang";
            $this->db->query($sql);
        }

        public function get_total_p_r()
        {
            $sql = "UPDATE achievement a
                    JOIN daily_target dt ON a.target_id = dt.target_id
                    SET a.total_p_r = (a.total_r / (dt.daily_register * 2)) * 100
                    WHERE dt.daily_register != 0";
            $this->db->query($sql);
        }

        public function get_total_s()
        {
            $sql = "UPDATE achievement
                    SET total_s = s_jogja + s_semarang";
            $this->db->query($sql);
        }

        public function get_total_p_s()
        {
            $sql = "UPDATE achievement a
                    JOIN daily_target dt ON a.target_id = dt.target_id
                    SET a.total_p_s = a.total_s / (dt.monthly_subscribe * 2) * 100
                    WHERE dt.monthly_subscribe != 0";
            $this->db->query($sql);
        }
        

        public function __construct() {
            $this->load->database();
        }
        
    
    }
    ?>
